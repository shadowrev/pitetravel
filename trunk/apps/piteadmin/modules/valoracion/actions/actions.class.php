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
        
        if(0 != strcmp($this->getUser()->getAttribute('pac_codigo'), ''))
        {
            $this->paciente = Doctrine_Core::getTable('Paciente')->find(array($this->getUser()->getAttribute('pac_codigo')));
            if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
            {
                if(sizeof($this->paciente->Tratamiento) > 0)
                {
                    $tratamiento = $this->paciente->Tratamiento->getLast();
                    $preoperatorios = Doctrine_Core::getTable('Preoperatorio')->obtenerTratamientos($tratamiento->tra_codigo);
                    $this->form = new PreoperatorioForm($preoperatorios->getLast());
                }
            }
            
        }        
    }

    public function executeCargarExamenPreoperatorio(sfWebRequest $request)
    {
        // TODO Cargar el formulario con la informacion del examen preoperatorio
        //$this->getUser()->setAttribute('preo_codigo', $this->preoperatorio->preo_codigo);
    }

    public function executeGuardarPreoperatorio(sfWebRequest $request)
    {
        if(0 == strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->tratamiento = new Tratamiento();
            $this->tratamiento->tra_pac_codigo = $this->getUser()->getAttribute('pac_codigo');
            $this->tratamiento->save();
            $this->getUser()->setAttribute('tra_codigo', $this->tratamiento->tra_codigo);
        }

        $contenido_preoperatorio = $request->getParameter('preoperatorio');
        $contenido_preoperatorio['preo_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');

        if(!empty($contenido_preoperatorio['preo_codigo']))
        {
            $preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($contenido_preoperatorio['preo_codigo']));
            $this->form_preoperatorio = new PreoperatorioForm($preoperatorio);
            $this->form_preoperatorio->bind($contenido_preoperatorio);
            //if($this->form_preoperatorio->isValid())
            //{
                $preoperatorio_actual = $this->form_preoperatorio->save();
            //}
        }
        else
        {
            $this->form_preoperatorio = new PreoperatorioForm();
            $this->form_preoperatorio->bind($contenido_preoperatorio);
            //if($this->form_preoperatorio->isValid())
            //{
                $preoperatorio = $this->form_preoperatorio->save();
            //}
        }
        $this->redirect('valoracion/examenesPreoperatorios');
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

    public function executeAlmacenarProcedimiento(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $procedimiento = new Procedimiento();
            $procedimiento->set('pro_tra_codigo', $request->getParameter('pro_tra_codigo'));
            $procedimiento->set('pro_tit_codigo', $request->getParameter('pro_tit_codigo'));
            $procedimiento->set('pro_dtr_codigo', $request->getParameter('pro_dtr_codigo'));
            $procedimiento->set('pro_otro', $request->getParameter('pro_otro'));
            $this->form_procedimiento = new ProcedimientoForm($procedimiento);
            $this->form_procedimiento->setHiddenForm($request->getParameter('procedimiento_id'));
        }
    }

    public function executeCleanData()
    {
        $this->getUser()->setAttribute('tra_codigo', '');
        $this->forward('valoracion', 'examenesPreoperatorios');
    }
}
