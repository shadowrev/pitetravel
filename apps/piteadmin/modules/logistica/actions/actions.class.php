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
    }

    public function executeGuardarLogistica(sfWebRequest $request)
    {
        // TODO guardar la información de la logistica
    }

    public function executeListarContactos(sfWebRequest $request)
    {
        // TODO Lista los contactos
    }

    public function executeCargarContactoLogistica(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            // TODO cargar el formulario que corresponde al responsable o al guia
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
        return $contacto_form;
    }

    public function executeTransporte(sfWebRequest $request)
    {
        // TODO Cargar los datos mas recientes del tratamiento
        $this->form_transporte = new TransporteForm();
        $this->form_logistica = new TransporteLogisticaForm();
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

        $this->form_logistica->bind($datos_logistica);

        if($this->form_logistica->isValid())
        {
            $this->logistica_nuevo = $this->form_logistica->save();
            $this->redirect('logistica/transporte');
        }
        $this->setTemplate('transporte');
    }

    public function executeListarTransporte(sfWebRequest $request)
    {
        // TODO lista los transportes
    }

    public function executeCargarTransporte(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            // TODO cargar el formulario que corresponde al transportista
        }
    }

    public function guardarTransporte($datos_transporte)
    {
        $transporte_form = new ContactologisticaForm();
        if(!empty($datos_transporte['trans_codigo']))
        {
            $transporte = Doctrine_Core::getTable('Transporte')->find(array($datos_transporte['trans_codigo']));
            $transporte_form = new ContactologisticaForm($transporte);
        }
        $transporte_form->bind($datos_transporte);
        if($transporte_form->isValid())
        {
            $contacto_actualizado = $transporte_form->save();
        }
        return $transporte_form;
    }
}
