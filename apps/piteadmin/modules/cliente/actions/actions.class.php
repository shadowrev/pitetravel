<?php

/**
 * cliente actions.
 *
 * @package    pitetravel
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->forward('cliente', 'informacionPaciente');
  }

  public function executeInformacionPaciente(sfWebRequest $request)
  {
      // TODO Desplegar formulario del paciente
      //if(strcmp($request->getParameter('nuevo_paciente'), 'si') != 0)
      if(strcmp($this->getUser()->getAttribute('pac_codigo'), '') != 0)
      {
          $this->redirect('cliente/mostrarInformacionPaciente?pac_codigo=' . $this->getUser()->getAttribute('pac_codigo'));
      }
      else
      {
          $this->getUser()->getAttribute('pac_codigo');
          $this->getUser()->getAttribute('pac_nombre');
      }
      $this->form = new PacienteForm();
      $this->contact_form = new ContactoForm();
  }

  public function executeMostrarInformacionPaciente(sfWebRequest $request)
  {
      // TODO cargar la informacion del paciente para su edicion
      //$this->forward404($paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('pac_codigo'))), 'El Paciente no existe');
      $this->paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('pac_codigo')));
      
      $this->getUser()->setAttribute('pac_codigo', $this->paciente->pac_codigo);
      $this->getUser()->setAttribute('pac_nombre', $this->paciente->pac_nombre);

      $this->form = new PacienteForm($this->paciente);
      $this->ids_contactos = array();
      if(sizeof($this->paciente->Contacto) > 0)
      {
          $primero = true;
          foreach($this->paciente->Contacto as $contacto)
          {
              if($primero)
              {
                  $this->contact_form = new ContactoForm($contacto);
                  $primero = false;
              }
              $this->ids_contactos[] = $contacto->con_codigo;
          }
      }
      else
      {
          $this->contact_form = new ContactoForm();
      }
  }

  public function executeEliminarPaciente(sfWebRequest $request) {
      // TODO cargar la informacion del paciente para su edicion
      $this->setLayout(false);
  }

  public function executeGuardarPaciente(sfWebRequest $request)
  {
      // TODO Guardar el paciente en la base de datos
  }

  public function executeListarPacientes(sfWebRequest $request)
  {
      // TODO evaluar la forma para pasar parametros de busqueda a traves de $request
      $this->pacientes = Doctrine_Core::getTable('Paciente')->obtenerPacientesActivos();
      $this->array_pacientes = array();
      foreach($this->pacientes as $paciente)
      {
          $this->array_pacientes[] = array($paciente->pac_codigo, $paciente->get('pac_nombre'), $paciente->get('pac_identificacion'));
      }
      
      $this->setLayout('popUp');
  }

  public function executeCargarHotel(sfWebRequest $request)
  {
      if(strcmp($request->getParameter('hot_codigo'), '') != 0)
      {
          $this->hotel = Doctrine_Core::getTable('Hotel')->find(array($request->getParameter('hot_codigo')));
          $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
          $json_info_hotel = array(
              'hot_direccion' => $this->hotel->hot_direccion,
              'hot_telefono' => $this->hotel->hot_telefono,
              'hot_web' => $this->hotel->hot_web,
              'hot_email' => $this->hotel->hot_email
          );
          $this->getResponse()->setContent(json_encode($json_info_hotel));
      }
      return sfView::NONE;
  }

  public function executeReserva(sfWebRequest $request)
  {
      $this->form = new ReservahotelForm();
  }
  
  public function executeListarReserva(sfWebRequest $request)
  {
      // TODO Listar las reservas como se hace con el cliente
  }
  
  public function executeMostrarReserva(sfWebRequest $request)
  {
      // TODO Cargar la reserva
  }
  
  public function executeEliminarReserva(sfWebRequest $request)
  {
      // TODO Eliminar la reserva
  }

  public function executeVuelo(sfWebRequest $request)
  {
      $this->form = new ReservavueloForm();
  }

  public function executeMostrarVuelo(sfWebRequest $request)
  {
      // TODO Cargar la reserva del vuelo
  }

  public function executeGuardarVuelo(sfWebRequest $request)
  {
      // TODO Guardar la reserva del vuelo
  }

  public function executeEliminarVuelo(sfWebRequest $request)
  {
      // TODO Eliminar la reserva del vuelo
  }
}
