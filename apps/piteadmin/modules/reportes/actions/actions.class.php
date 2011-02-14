<?php

/**
 * reportes actions.
 *
 * @package    pitetravel
 * @subpackage reportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportesActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeGenerarReporteLogistica(sfWebRequest $request)
    {
        $this->reporteLogistica();
    }

    public function executeGenerarReporteLogisticaPDF(sfWebRequest $request)
    {
        $this->reporteLogistica();
        $contenido = $this->getPartial('generarReporteLogisticaPDF');

        $config = sfTCPDFPluginConfigHandler::loadConfig();
        sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());
        
        $pdf_gen = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

        $pdf_gen->writeHTML($contenido, true, 0);

        $pdf_gen->Output('reporte_logistica.pdf');
        return sfView::NONE;
    }

    public function executeGenerarReporteLogisticaMail(sfWebRequest $request)
    {
        $this->reporteLogistica();
        $contenido = $this->getPartial('generarReporteLogisticaPDF');
        $usuario = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));

        $mensaje_correo = Swift_Message::newInstance()
            ->setFrom(sfConfig::get('app_correo_pite'))
            ->setTo($usuario->email_address)
            ->setSubject('Reporte de Logistica para ' . $this->paciente->pac_nombre)
            ->setBody($contenido);

        $this->getMailer()->send($mensaje_correo);

        return sfView::NONE;
    }

    public function executeGenerarReporteMedico(sfWebRequest $request)
    {
        $this->reporteMedico();
    }

    public function executeGenerarReporteMedicoPDF(sfWebRequest $request)
    {
        $this->reporteMedico();
        $this->setLayout('output_pdf');
    }

    public function executeGenerarReporteMedicoMail(sfWebRequest $request)
    {
        $this->reporteMedico();
        $this->setLayout('output_pdf');
        $usuario = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));

        $mensaje_correo = Swift_Message::newInstance()
            ->setFrom(sfConfig::get('app_correo_pite'))
            ->setTo($usuario->email_address)
            ->setSubject('Reporte de Logistica para ' . $this->paciente->pac_nombre)
            ->setBody($contenido);

        $this->getMailer()->send($mensaje_correo);
    }

    public function executeGenerarDieta(sfWebRequest $request)
    {
        // TODO genera la dieta del paciente
    }
    
    protected function cargarInformacionPaciente()
    {
        $this->paciente = Doctrine_Core::getTable('Paciente')->find($this->getUser()->getAttribute('pac_codigo'));
        $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));

        return !(empty($this->paciente) || empty($this->tratamiento));
    }

    protected function reporteLogistica()
    {
        if($this->cargarInformacionPaciente())
        {
            // Datos de la reserva de vuelo
            $this->reserva_vuelo = $this->tratamiento->Reservavuelo->getLast();
            // Datos de la reserva hotelera
            $this->reserva_hotel = $this->tratamiento->Reservahotel->getLast();
            // Datos de los contactos de logistica
            $this->logistica = $this->tratamiento->Logistica->getLast();
        }
    }

    protected function reporteMedico()
    {
        if($this->cargarInformacionPaciente())
        {
            // Informe de Examenes Preoperatorios
            $this->preoperatorio = $this->tratamiento->Preoperatorio->getLast();
            // Informe Postoperatorio
            $this->postoperatorio = $this->tratamiento->Postoperatorio->getLast();
        }
    }
}
