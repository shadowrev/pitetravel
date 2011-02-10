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
        if($this->cargarInformacionPaciente())
        {
            // Datos del Paciente
            // Datos del Contacto
            // Datos de la reserva de vuelo
            $this->reserva_vuelo = $this->tratamiento->Reservavuelo;
            // Datos de la reserva hotelera
            $this->reserva_hotel = $this->tratamiento->Reservahotel;
            // Datos de los contactos de logistica
        }
    }

    public function executeGenerarReporteLogisticaPDF(sfWebRequest $request)
    {

    }

    public function executeGenerarReporteMedico(sfWebRequest $request)
    {
        if($this->cargarInformacionPaciente())
        {
            // Datos del Paciente
            // Informe de Examenes Preoperatorios
            // Informe Postoperatorio
        }
    }

    public function executeGenerarReporteMedicoPDF(sfWebRequest $request)
    {

    }

    public function executeGenerarDieta(sfWebRequest $request)
    {
        // TODO genera la dieta del paciente
    }
    
    public function cargarInformacionPaciente()
    {
        $this->paciente = Doctrine_Core::getTable('Paciente')->find($this->getUser()->getAttribute('pac_codigo'));
        $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));

        return !(empty($this->paciente) || empty($this->tratamiento));
    }
}
