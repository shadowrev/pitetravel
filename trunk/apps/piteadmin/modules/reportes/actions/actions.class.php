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
        $contenido = str_replace('/fieldset', '/div', $contenido);
        $contenido = str_replace('fieldset', 'div class="fieldset"', $contenido);
        $contenido = str_replace('/legend', '/strong></div', $contenido);
        $contenido = str_replace('legend', 'div class="legend"><strong', $contenido);

        $config = sfTCPDFPluginConfigHandler::loadConfig();
        //sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());
        
        $pdf_gen = new sfTCPDF();
        $pdf_gen->AddPage();

        $pdf_gen->writeHTML($contenido, false);

        $pdf_gen->Output('reporte_logistica.pdf');
//        echo $contenido;
        return sfView::NONE;
    }

    public function executeGenerarReporteLogisticaMail(sfWebRequest $request)
    {
        $this->reporteLogistica();
        $contenido = $this->getPartial('generarReporteLogisticaMail');
        $usuario = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));
        
        $mensaje_correo = new Swift_Message('Reporte de Logistica para ' . $this->paciente->pac_nombre, $contenido, 'text/html', 'utf-8');
        $mensaje_correo->setFrom(sfConfig::get('app_correo_pite'))
                ->setTo($usuario->email_address);
        
//        $mensaje_correo = Swift_Message::newInstance()
//            ->setFrom(sfConfig::get('app_correo_pite'))
//            ->setTo($usuario->email_address)
//            ->setSubject('Reporte de Logistica para ' . $this->paciente->pac_nombre)
//            ->setBody($contenido);

        $enviado = $this->getMailer()->send($mensaje_correo);

        if($enviado)
            $this->renderText('<p>Correo Enviado </p><a href="javascript:window.close()">Cerrar</a>');
        else
            $this->renderText('<p>No es posible enviar el correo. Intentelo mas tarde </p><a href="javascript:window.close()">Cerrar</a>');

        return sfView::NONE;
    }

    public function executeGenerarReporteMedico(sfWebRequest $request)
    {
        $this->reporteMedico();
    }

    public function executeGenerarReporteMedicoPDF(sfWebRequest $request)
    {
        $this->reporteMedico();
        $contenido = $this->getPartial('generarReporteMedicoPDF');
        $contenido = str_replace('/fieldset', '/div', $contenido);
        $contenido = str_replace('fieldset', 'div class="fieldset"', $contenido);
        $contenido = str_replace('/legend', '/strong></div', $contenido);
        $contenido = str_replace('legend', 'div class="legend"><strong', $contenido);

        $config = sfTCPDFPluginConfigHandler::loadConfig();
        //sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

        $pdf_gen = new sfTCPDF();
        $pdf_gen->AddPage();

        $pdf_gen->writeHTML($contenido, false);

        $pdf_gen->Output('reporte_medico.pdf');
//        echo $contenido;
        return sfView::NONE;
    }

    public function executeGenerarReporteMedicoMail(sfWebRequest $request)
    {
        $this->reporteMedico();
        $contenido = $this->getPartial('generarReporteMedicoMail');
        $usuario = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));

//        $mensaje_correo = Swift_Message::newInstance()
//            ->setFrom(sfConfig::get('app_correo_pite'))
//            ->setTo($usuario->email_address)
//            ->setSubject('Reporte Medico para ' . $this->paciente->pac_nombre)
//            ->setBody($contenido);

        $mensaje_correo = new Swift_Message('Reporte Medico para ' . $this->paciente->pac_nombre, $contenido, 'text/html', 'utf-8');
        $mensaje_correo->setFrom(sfConfig::get('app_correo_pite'))
                ->setTo($usuario->email_address);

        $enviado = $this->getMailer()->send($mensaje_correo);

        if($enviado)
            $this->renderText('<p>Correo Enviado </p><a href="javascript:window.close()">Cerrar</a>');
        else
            $this->renderText('<p>No es posible enviar el correo en este momento. Intentelo mas tarde </p><a href="javascript:window.close()">Cerrar</a>');

        return sfView::NONE;
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
