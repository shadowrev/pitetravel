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

    public function executeCargarContactoLogistica(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            // TODO cargar el formulario que corresponde al responsable o al guia
        }
    }

    public function executeCargarTransporte(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            // TODO cargar el formulario que corresponde al transportista
        }
    }

    public function executeTransporte(sfWebRequest $request)
    {
        $this->form_transporte = new TransporteForm();
        $this->form_logistica = new TransporteLogisticaForm();
    }
}
