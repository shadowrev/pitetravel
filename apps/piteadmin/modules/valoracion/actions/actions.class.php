<?php

/**
 * valoracion actions.
 *
 * @package    pitetravel
 * @subpackage valoracion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class valoracionActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('default', 'module');
    }

    /**
     * 
     * @param sfWebRequest $request 
     * @todo Cargar el tratamiento mas reciente del cliente/paciente
     */
    public function executeExamenesPreoperatorios(sfWebRequest $request)
    {
        $this->form = new PreoperatorioForm();
        $this->procedimiento_form = new ProcedimientoForm();
        // TODO Formulario para los examenes preoperatorios
    }

    public function executeCargarExamenPreoperatorio(sfWebRequest $request)
    {
        // TODO Cargar el formulario con la informacion del examen preoperatorio
        //$this->getUser()->setAttribute('preo_codigo', $this->preoperatorio->preo_codigo);
    }

    /**
     * Carga un select via AJAX
     * @param sfWebRequest $request
     */
    public function executeCargarTipoTratamiento(sfWebRequest $request)
    {
        $this->procedimiento_form = new ProcedimientoForm();
        if(strcmp($request->getParameter('dtr_tit_codigo'), '') != 0)
        {
            $query_desc_tipo_tratamiento = Doctrine_Core::getTable('Descripciontratamiento')->getQueryListaDescripciones($request->getParameter('dtr_tit_codigo'));
            $this->procedimiento_form->getWidget('pro_dtr_codigo')->setOption('query', $query_desc_tipo_tratamiento);

        }
    }

    public function executeValoracionPreoperatoria(sfWebRequest $request)
    {
        // TODO Carga el tratamiento actual y la valoracion que le corresponde
//        $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($this->getUser()->getAttribute('preo_codigo')));
        $this->preoperatorio_form = new PreoperatorioForm();
    }

    public function executeComplementos(sfWebRequest $request)
    {
        // TODO Carga el tratamiento actual y la informacion del tratamiento correspondiente
        $this->preoperatorio_form = new PreoperatorioForm();
        $this->elementosxinterv_form = new ElementosxintervencionForm();
        $this->dieta_form = new DietapacienteForm();
        $this->menu_form = new MenuForm();
    }
}
