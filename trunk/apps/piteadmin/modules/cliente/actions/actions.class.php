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
      if((strcmp($this->getUser()->getAttribute('pac_codigo'), '') != 0) && ($this->getUser()->getAttribute('pac_codigo') != null))
      {
          if(strcmp($request->getParameter('nuevo_paciente'), 'si') == 0)
          {
              $this->form = new PacienteForm();
              $this->contact_form = new ContactoForm();
              $this->getUser()->setAttribute('pac_codigo', '');
              $this->getUser()->setAttribute('pac_nombre', '');
              $this->getUser()->setAttribute('tra_codigo', '');
          }
          else
          {
              $this->redirect('cliente/mostrarInformacionPaciente?pac_codigo=' . $this->getUser()->getAttribute('pac_codigo'));
          }
      }
      else
      {
//          $this->getUser()->setAttribute('pac_codigo', null);
          $this->getUser()->getAttributeHolder()->remove('pac_codigo');
//          $this->getUser()->setAttribute('pac_nombre', null);
          $this->getUser()->getAttributeHolder()->remove('pac_nombre');
//          $this->getUser()->setAttribute('tra_codigo', null);
          $this->getUser()->getAttributeHolder()->remove('tra_codigo');
          $this->form = new PacienteForm();
          $this->contact_form = new ContactoForm();
      }
  }

  public function executeMostrarInformacionPaciente(sfWebRequest $request)
  {
      //$this->forward404($paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('pac_codigo'))), 'El Paciente no existe');
      $this->paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('pac_codigo')));

      if(false == $this->paciente)
      {
          //$this->getUser()->setAttribute('pac_codigo', null);
          $this->getUser()->getAttributeHolder()->remove('pac_codigo');
          //$this->getUser()->setAttribute('pac_nombre', null);
          $this->getUser()->getAttributeHolder()->remove('pac_nombre');
          //$this->getUser()->setAttribute('tra_codigo', null);
          $this->getUser()->getAttributeHolder()->remove('tra_codigo');
          $this->forward('cliente', 'informacionPaciente');
      }

      $this->getUser()->setAttribute('pac_codigo', $this->paciente->pac_codigo);
      $this->getUser()->setAttribute('pac_nombre', $this->paciente->pac_nombre);
      if(sizeof($this->paciente->Tratamiento) > 0)
      {
          $this->getUser()->setAttribute('tra_codigo', $this->paciente->Tratamiento->getLast()->getTraCodigo());
      }
      else
      {
          $this->getUser()->getAttributeHolder()->remove('tra_codigo');
      }

      $this->form = new PacienteForm($this->paciente);
      $this->ids_contactos = array();
      if(sizeof($this->paciente->Contacto) > 0)
      {
          $primero = true;
          foreach($this->paciente->Contacto as $contacto)
          {
              if($primero)
              {
                  $this->contact_form = new ContactoForm();
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

  /**
   * Guarda temporalmente el contacto almacenado en un form invisible
   * @param sfWebRequest $request
   */
  public function executeAlmacenarContacto(sfWebRequest $request)
  {
      if($request->isXmlHttpRequest())
      {
          $contacto = new Contacto();
          if(0 != strcmp($request->getParameter('con_codigo'), ''))
          {
              $contacto = Doctrine_Core::getTable('Contacto')->find($request->getParameter('con_codigo'));
          }
          $contacto->set('con_nombre', $request->getParameter('con_nombre'));
          $contacto->set('con_telefono1', $request->getParameter('con_telefono1'));
          $contacto->set('con_telefono2', $request->getParameter('con_telefono2'));
          $contacto->set('con_email', $request->getParameter('con_email'));
          $contacto->set('con_direccion', $request->getParameter('con_direccion'));
          $this->form_contacto = new ContactoForm($contacto);
          $this->form_contacto->setHiddenForm($request->getParameter('contacto_id'));
      }
  }

  public function executeEliminarPaciente(sfWebRequest $request) {
      $paciente = Doctrine_Core::getTable('Paciente')->find($request->getParameter('pac_codigo'));
      if(0 < sizeof($paciente->Contacto))
      {
          $paciente->Contacto->delete();
      }
      $paciente->delete();
      //$this->forward('cliente', 'informacionPaciente');
      $this->redirect('cliente/informacionPaciente?nuevo_paciente=si');
  }

  public function executeGuardarPaciente(sfWebRequest $request)
  {
      // TODO Guardar el paciente en la base de datos
      $this->form = new PacienteForm();
      $datos_paciente = $request->getParameter($this->form->getName());

      if(!$this->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false))
          $datos_paciente['pac_agn_codigo'] = $this->getUser()->getAttribute('agn_codigo');

      $formas_contactos_nuevos = array();
      $this->contactos = array();

      for($i = 0; $i < $request->getParameter('cuenta_contactos'); $i ++)
      {
          $formas_contactos_nuevos[] = 'contacto_' . $i;
      }
      
      if(strcmp($datos_paciente['pac_codigo'], '') != 0)
      {
          $paciente = Doctrine_Core::getTable('Paciente')->find(array($datos_paciente['pac_codigo']));
          $this->form = new PacienteForm($paciente);
          $this->form->bind($datos_paciente);

          $this->contactos_form = array();
          
          if(isset($paciente->Contactos))
          {
              foreach($paciente->Contactos as $obj_contacto)
              {
                  $this->contactos_form[] = new ContactoForm($obj_contacto);
              }
          }
          if($this->form->isValid())
          {
              $this->paciente = $this->form->save();
              $this->getUser()->setFlash ('notificacion', 'El cliente ha sido guardado');
          }
          else
              $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));

          if(0 == strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
          {
              $tratamiento = new Tratamiento();
              $tratamiento->tra_pac_codigo = $this->paciente->pac_codigo;
              $tratamiento->save();
          }

          foreach($formas_contactos_nuevos as $nombre_forma)
          {
              $contacto_form = new ContactoForm();
              $contenido_contacto = $request->getParameter($nombre_forma);
              if(0 != strcmp($contenido_contacto['con_codigo'], ''))
              {
                  $contacto_actual = Doctrine_Core::getTable('Contacto')->find($contenido_contacto['con_codigo']);
                  $contacto_form = new ContactoForm($contacto_actual);
              }
              $contenido_contacto['con_pac_codigo'] = $this->paciente->pac_codigo;
              $contacto_form->bind($contenido_contacto);
              if($contacto_form->isValid())
                  $this->contactos[] = $contacto_form->save();
              else
                  $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
          }

          $this->enviarMail();
          $this->redirect('cliente/mostrarInformacionPaciente?pac_codigo=' . $this->getUser()->getAttribute('pac_codigo'));
          //return sfView::NONE;
      }
      else
      {
          $this->form->bind($datos_paciente);
          // TODO Guardar contactos
          if($this->form->isValid())
          {
              $this->paciente = $this->form->save();
              $this->getUser()->setFlash ('notificacion', 'El cliente ha sido guardado');
          }
          else
          {
              $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
              $this->redirect('cliente/mostrarInformacionPaciente?pac_codigo=' . $this->getUser()->getAttribute('pac_codigo'));
          }

          $tratamiento = new Tratamiento();
          $tratamiento->tra_pac_codigo = $this->paciente->pac_codigo;
          $tratamiento->save();
          foreach($formas_contactos_nuevos as $nombre_forma)
          {
              $contacto_form = new ContactoForm();
              $contenido_contacto = $request->getParameter($nombre_forma);
              $contenido_contacto['con_pac_codigo'] = $this->paciente->pac_codigo;
              $contacto_form->bind($contenido_contacto);
              if($contacto_form->isValid())
                  $this->contactos[] = $contacto_form->save();
              else
                  $this->getUser()->setFlash ('error', 'Uno o mas contactos no se han guardado. Por favor, intentelo nuevamente');
          }
          
          $this->getUser()->setAttribute('pac_codigo', $this->paciente->pac_codigo);
          $this->getUser()->setAttribute('pac_nombre', $this->paciente->pac_nombre);
          $this->enviarMail();
          $this->redirect('cliente/mostrarInformacionPaciente?pac_codigo=' . $this->getUser()->getAttribute('pac_codigo'));
      }
  }

  public function executeListarPacientes(sfWebRequest $request)
  {
      if(!$this->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false))
      {
          $datos_busqueda = array(
              'pac_agn_codigo' => $this->getUser()->getAttribute('agn_codigo')
          );
      }
      else
      {
          $datos_busqueda = null;
      }

      $this->pacientes = Doctrine_Core::getTable('Paciente')->obtenerPacientesActivos($datos_busqueda);
      $this->array_pacientes = array();
      foreach($this->pacientes as $paciente)
      {
          $this->array_pacientes[] = array($paciente->pac_codigo, $paciente->get('pac_nombre'), $paciente->get('pac_identificacion'));
      }
      
      $this->setLayout('popUp');
  }
  
  public function executeCargarContactoPaciente(sfWebRequest $request)
  {
      if(0 != strcmp($request->getParameter('con_codigo'), ''))
      {
          $this->contacto_paciente = Doctrine_Core::getTable('Contacto')->find($request->getParameter('con_codigo'));
          $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
          $json_info_contacto = array(
              'con_codigo' => $this->contacto_paciente->con_codigo,
              'con_nombre' => $this->contacto_paciente->con_nombre,
              'con_telefono1' => $this->contacto_paciente->con_telefono1,
              'con_telefono2' => $this->contacto_paciente->con_telefono2,
              'con_email' => $this->contacto_paciente->con_email,
              'con_direccion' => $this->contacto_paciente->con_direccion
          );
          $this->getResponse()->setContent(json_encode($json_info_contacto));
      }
      return sfView::NONE;
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
      if(0 == strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
      {
          //$this->getUser()->setFlash('error', 'El Paciente actual no ha sido valorado aún. Todavía no se le puede crear una reserva.');
          $this->form = new ReservahotelForm();
      }
      else
      {
          $reserva_hotel = Doctrine_Core::getTable('Reservahotel')->buscarPorTratamiento($this->getUser()->getAttribute('tra_codigo'))/*->getFirst()*/;
          if($reserva_hotel)
              $this->form = new ReservahotelForm($reserva_hotel);
          else
              $this->form = new ReservahotelForm();
      }
  }
  
  public function executeListarReserva(sfWebRequest $request)
  {
      // TODO Listar las reservas como se hace con el cliente
  }
  
  public function executeMostrarReserva(sfWebRequest $request)
  {
      // TODO Cargar la reserva
  }

  public function executeGuardarReserva(sfWebRequest $request)
  {
      $datos_reserva = $request->getParameter('reservahotel');
      $datos_reserva['reh_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
      $datos_reserva['reh_dias_estadia'] = Util::calcularDias($datos_reserva['reh_fecha_entrada'], $datos_reserva['reh_fecha_salida']);
      $nueva_reserva = null;
      if(!empty($datos_reserva['reh_tra_codigo']))
      {
          if(0 != strcmp($datos_reserva['reh_codigo'], ''))
          {
              $reserva_hotel = Doctrine_Core::getTable('Reservahotel')->find(array($datos_reserva['reh_codigo']));
              $form_reserva = new ReservahotelForm($reserva_hotel);
              $form_reserva->bind($datos_reserva);
              if($form_reserva->isValid())
              {
                  $this->getUser()->setFlash ('notificacion', 'La reserva ' . sfConfig::get('app_guardado_exitoso_f'));
                  $nueva_reserva = $form_reserva->save();
              }
              else
                  $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
          }
          else
          {
              $form_reserva = new ReservahotelForm();
              $form_reserva->bind($datos_reserva);
              if($form_reserva->isValid())
              {
                  $nueva_reserva = $form_reserva->save();
                  $this->getUser()->setFlash ('notificacion', 'La reserva ' . sfConfig::get('app_guardado_exitoso_f'));
              }
              else
                  $this->getUser()->setFlash ('error', 'Compruebe los datos obligatorios e intentelo nuevamente');
          }
          // TODO redireccionar a la reserva de hotel almacenada
          //$this->setTemplate('reserva');
          $this->enviarMail();
          $this->redirect('cliente/reserva');
      }
      else
      {
          $this->getUser()->setFlash ('error', sfConfig::get('app_error_paciente_seleccionado'));
          $this->redirect('cliente/reserva');
      }
  }
  
  public function executeEliminarReserva(sfWebRequest $request)
  {
      // TODO Eliminar la reserva
  }

  public function executeVuelo(sfWebRequest $request)
  {
      if(0 == strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
      {
          //$this->getUser()->setFlash('error', 'El Paciente actual no ha sido valorado aún. Todavía no se le puede crear una reserva.');
          $this->form = new ReservavueloForm();
      }
      else
      {
          $vuelo = Doctrine_Core::getTable('Reservavuelo')->buscarPorTratamiento($this->getUser()->getAttribute('tra_codigo'))/*->getFirst()*/;
          if($vuelo)
              $this->form = new ReservavueloForm($vuelo);
          else
              $this->form = new ReservavueloForm();
      }
  }

  public function executeMostrarVuelo(sfWebRequest $request)
  {
      // TODO Cargar la reserva del vuelo
  }

  public function executeGuardarVuelo(sfWebRequest $request)
  {
      $datos_vuelo = $request->getParameter('reservavuelo');
      $datos_vuelo['vue_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
      if(!empty($datos_vuelo['vue_tra_codigo']))
      {
          if(!empty($datos_vuelo['vue_codigo']))
          {
              $reserva_vuelo = Doctrine_Core::getTable('Reservavuelo')->find(array($datos_vuelo['vue_codigo']));
              $form_reserva = new ReservavueloForm($reserva_vuelo);
              $form_reserva->bind($datos_vuelo);
              if($form_reserva->isValid())
              {
                  $this->getUser()->setFlash ('notificacion', 'La reserva ' . sfConfig::get('app_guardado_exitoso_f'));
                  $nueva_reserva = $form_reserva->save();
              }
              else
                  $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
          }
          else
          {
              $form_reserva = new ReservavueloForm();
              $form_reserva->bind($datos_vuelo);
              if($form_reserva->isValid())
              {
                  $this->getUser()->setFlash ('notificacion', 'La reserva ' . sfConfig::get('app_guardado_exitoso_f'));
                  $nueva_reserva = $form_reserva->save();
              }
              else
                  $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
          }
          $this->enviarMail();
          $this->redirect('cliente/vuelo');
      }
      else
      {
          $paciente_seleccionado = $this->getUser()->getAttribute('pac_codigo');
          $mensaje_error = (empty($paciente_seleccionado) ? sfConfig::get('app_error_paciente_seleccionado') : sfConfig::get('app_error_paciente_no_valorado'));
          $this->getUser()->setFlash('error', $mensaje_error);
          $this->redirect('cliente/vuelo');
      }
  }

  public function executeEliminarVuelo(sfWebRequest $request)
  {
      // TODO Eliminar la reserva del vuelo
  }

  public function executePreferenciasTuristicas(sfWebRequest $request)
  {
      $this->form = new PreferenciaturisticaPacienteForm();
      if($this->getUser()->getAttribute('pac_codigo'))
      {
          $this->paciente = Doctrine_Core::getTable('Paciente')->find($this->getUser()->getAttribute('pac_codigo'));
          $this->form = new PreferenciaturisticaPacienteForm($this->paciente);
      }
  }

  public function executeGuardarPreferenciasTuristicas(sfWebRequest $request)
  {
      $datos_paciente = $request->getParameter('paciente');
      if(!empty($datos_paciente['pac_codigo']))
      {
          $this->paciente = Doctrine_Core::getTable('Paciente')->find($this->getUser()->getAttribute('pac_codigo'));
          $this->form = new PreferenciaturisticaPacienteForm($this->paciente);
          $this->form->bind($datos_paciente);
          if($this->form->isValid())
          {
              $paciente_actualizado = $this->form->save();
              $this->getUser()->setFlash ('notificacion', 'Las Preferencias Turisticas ' . sfConfig::get('app_guardado_exitoso_fs'));
          }
          else
          {
              $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
          }
      }
      $this->redirect('cliente/preferenciasTuristicas');
      //$this->setTemplate('preferenciasTuristicas');
  }

  public function executeEliminarContacto(sfWebRequest $request)
  {
      $contacto = Doctrine_Core::getTable('Contacto')->find($request->getParameter('con_codigo'));
      $contacto->delete();
      $this->forward('cliente', 'informacionPaciente');
  }

  protected function enviarMail()
  {
      $this->paciente = Doctrine_Core::getTable('Paciente')->find($this->getUser()->getAttribute('pac_codigo'));
      $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));
      if(0 < sizeof($this->tratamiento->Reservavuelo))
        $this->reserva_vuelo = $this->tratamiento->Reservavuelo->getLast();
      //$this->reserva_hotel = $reserva_hotel;
      if(0 < sizeof($this->tratamiento->Reservahotel))
        $this->reserva_hotel = $this->tratamiento->Reservahotel->getLast();
      $this->logistica = null;
      
      $usuario_actual = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));
      $this->usuario_ultima_modificacion = $usuario_actual->first_name . ' ' . $usuario_actual->last_name;

      $contenido = $this->getPartial('reportes/generarReporteLogisticaMail');
      $admin = Doctrine_Core::getTable('sfGuardUser')->find(1);
      
      $grupo_medico_admin = Doctrine_Core::getTable('sfGuardGroup')->find(6); // Grupo de Medicos administradores

      $email_destinatarios = array();
      $email_destinatarios[] = $admin->email_address;
      $email_destinatarios[] = $this->getUser()->getAttribute('user_email');
      foreach($grupo_medico_admin->Users as $users)
      {
          $email_destinatarios[] = $users->email_address;
      }

      $mensaje_correo = new Swift_Message('Novedades en el Paciente ' . $this->paciente->pac_nombre, $contenido, 'text/html', 'utf-8');
      $mensaje_correo->setFrom(sfConfig::get('app_correo_pite'))
          //->setCc(array(sfConfig::get('app_correo_medico_adm_1'), sfConfig::get('app_correo_medico_adm_2')))
          ->setTo($email_destinatarios);

      $this->getMailer()->send($mensaje_correo);
  }
}
