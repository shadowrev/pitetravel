<?php

/**
 * logistica actions.
 *
 * @package    pitetravel
 * @subpackage logistica
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class logisticaActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('logistica', 'logistica');
    }

    public function executeLogistica(sfWebRequest $request)
    {
        $this->form_contacto = new ContactologisticaForm();
        $this->form_contacto->cambiarNombreFormulario($this->form_contacto->getName() . '_contacto');
        $this->form_responsable = new ContactologisticaForm();
        $this->form_responsable->cambiarNombreFormulario($this->form_responsable->getName() . '_responsable');
        $this->form_logistica = new ResponsableLogisticaForm();

        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->logistica = Doctrine_Core::getTable('Logistica')->obtenerLogisticaTratamiento($this->getUser()->getAttribute('tra_codigo'));

            if($this->logistica)
            {
                $this->form_contacto = new ContactologisticaForm($this->logistica->Contactologistica_3);
                $this->form_contacto->cambiarNombreFormulario($this->form_contacto->getName() . '_contacto');
                $this->form_responsable = new ContactologisticaForm($this->logistica->Contactologistica);
                $this->form_responsable->cambiarNombreFormulario($this->form_responsable->getName() . '_responsable');
                $this->form_logistica = new ResponsableLogisticaForm($this->logistica);
            }
        }
        else
        {
            //$this->getUser()->setFlash('error', 'El Paciente actual no ha sido valorado aún. Todavía no se le puede programar la logistica.');
        }
    }

    public function executeGuardarLogistica(sfWebRequest $request)
    {
        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $datos_responsable = $request->getParameter('contactologistica_responsable');
            $datos_guia = $request->getParameter('contactologistica_contacto');
            $datos_logistica = $request->getParameter('logistica');

            $this->form_contacto = $this->guardarContacto($datos_guia);
            $this->form_responsable = $this->guardarContacto($datos_responsable);
            $this->form_logistica = new ResponsableLogisticaForm();

            if(!empty($datos_logistica['log_codigo']))
            {
                $this->logistica = Doctrine_Core::getTable('Logistica')->find(array($datos_logistica['log_codigo']));
                $this->form_logistica = new ResponsableLogisticaForm($this->logistica);
            }

            $datos_logistica['log_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
            $datos_logistica['log_clo_codigo_responsable'] = $this->form_responsable->getObject()->get('clo_codigo');
            $datos_logistica['log_clo_codigo_guia'] = $this->form_contacto->getObject()->get('clo_codigo');

            $this->form_logistica->bind($datos_logistica);
            if($this->form_logistica->isValid())
            {
                $this->logistica_nuevo = $this->form_logistica->save();
                $this->getUser()->setFlash ('notificacion', 'La informacion de Logistica ' . sfConfig::get('app_guardado_exitoso_f'));
                $this->redirect('logistica/logistica');
            }
            else
            {
                $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
//                $this->setTemplate('logistica');
            }
        }
        else
        {
            $this->getUser()->setFlash ('error', sfConfig::get('app_error_paciente_seleccionado'));
        }
        $this->redirect('logistica/logistica');
    }

    public function executeListarContactos(sfWebRequest $request)
    {
        // TODO Lista los contactos
        $this->contactos = Doctrine_Core::getTable('Contactologistica')->obtenerContactosLogisticaActivos();
        $this->lista_contactos = array();
        $i = 0;
        if($this->contactos)
        {
            foreach($this->contactos as $contactologistica)
            {
                $this->lista_contactos[$i] = array($contactologistica->clo_codigo, $contactologistica->clo_nombre, $contactologistica->clo_identificacion);
                $i ++;
            }
        }

        $this->tipo_contacto = $request->getParameter('tipo_contacto');
        $this->setLayout('popUp');
    }

    public function executeCargarContactoLogistica(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $this->cargar_contacto_logistica = $request->getParameter('tipo_formulario');
            $contacto_logistica = Doctrine_Core::getTable('Contactologistica')->find(array($request->getParameter('clo_codigo')));
            $this->form_contacto = new ContactologisticaForm($contacto_logistica);
            $this->form_contacto->cambiarNombreFormulario($this->form_contacto->getName() . '_contacto');
            $this->form_responsable = new ContactologisticaForm($contacto_logistica);
            $this->form_responsable->cambiarNombreFormulario($this->form_responsable->getName() . '_responsable');
        }
    }

    public function guardarContacto($datos_contacto)
    {
        $contacto_form = new ContactologisticaForm();
        if(!empty($datos_contacto['clo_codigo']))
        {
            $contacto = Doctrine_Core::getTable('Contactologistica')->find(array($datos_contacto['clo_codigo']));
            $contacto_form = new ContactologisticaForm($contacto);
        }
        $contacto_form->bind($datos_contacto);
        if($contacto_form->isValid())
        {
            $contacto_actualizado = $contacto_form->save();
        }
        else
        {
            $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
        }
        return $contacto_form;
    }

    public function executeTransporte(sfWebRequest $request)
    {
        // TODO Cargar los datos mas recientes del tratamiento
        $this->form_transporte = new TransporteForm();
        $this->form_logistica = new TransporteLogisticaForm();
        
        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->logistica = Doctrine_Core::getTable('Logistica')->obtenerLogisticaTratamiento($this->getUser()->getAttribute('tra_codigo'));
            
            if($this->logistica)
            {
                $this->form_transporte = new TransporteForm($this->logistica->Transporte);
                $this->form_logistica = new TransporteLogisticaForm($this->logistica);
            }
        }
        else
        {
            //$this->getUser()->setFlash('error', 'El Paciente actual no ha sido valorado aún. Todavía no se le puede programar la logistica.');
        }
    }
    
    public function executeGuardarTransporte(sfWebRequest $request)
    {
        $datos_transporte = $request->getParameter('transporte');
        $datos_logistica = $request->getParameter('logistica');
        $this->form_transporte = $this->guardarTransporte($datos_transporte);
        $this->form_logistica = new TransporteLogisticaForm();

        if(!empty($datos_logistica['log_codigo']))
        {
            $this->logistica = Doctrine_Core::getTable('Logistica')->find(array($datos_logistica['log_codigo']));
            $this->form_logistica = new TransporteLogisticaForm($this->logistica);
        }
        
        $datos_logistica['log_trans_codigo'] = $this->form_transporte->getObject()->get('trans_codigo');
        $datos_logistica['log_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
        $this->form_logistica->bind($datos_logistica);

        if($this->form_logistica->isValid())
        {
            $this->logistica_nuevo = $this->form_logistica->save();
            $this->getUser()->setFlash ('notificacion', 'La informacion de Transporte ' . sfConfig::get('app_guardado_exitoso_f'));
        }
        else
            $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
        //$this->setTemplate('transporte');
        $this->redirect('logistica/transporte');
    }

    public function executeListarTransporte(sfWebRequest $request)
    {
        // TODO lista los transportes
        $this->transportadores = Doctrine_Core::getTable('Transporte')->obtenerTransportesActivos();
        $this->lista_transportes = array();
        $this->funcion_ajax = $request->getParameter('funcion');
        $i = 0;
        if($this->transportadores)
        {
            foreach($this->transportadores as $transportador)
            {
                $this->lista_transportes[] = array($transportador->trans_codigo, $transportador->trans_nombre, $transportador->trans_identificacion, $transportador->trans_tipo_vehiculo);
                $i ++;
            }
        }
        $this->setLayout('popUp');
    }

    public function executeCargarTransporte(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $transporte = Doctrine_Core::getTable('Transporte')->find(array($request->getParameter('trans_codigo')));
            $this->form_transporte = new TransporteForm($transporte);
        }
    }

    public function guardarTransporte($datos_transporte)
    {
        $transporte_form = new TransporteForm();
        if(!empty($datos_transporte['trans_codigo']))
        {
            $transporte = Doctrine_Core::getTable('Transporte')->find(array($datos_transporte['trans_codigo']));
            $transporte_form = new TransporteForm($transporte);
        }
        $transporte_form->bind($datos_transporte);
        if($transporte_form->isValid())
        {
            $contacto_actualizado = $transporte_form->save();
        }
        return $transporte_form;
    }
}
