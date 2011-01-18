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
        $this->links_forms_fotos = array();
        $this->forms_fotos = array(new FotoForm());
        $this->forms_fotos[0]->cambiarGrupo('foto_0');
        
        if(0 != strcmp($this->getUser()->getAttribute('pac_codigo'), ''))
        {
            $this->paciente = Doctrine_Core::getTable('Paciente')->find(array($this->getUser()->getAttribute('pac_codigo')));
            if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
            {
                if(sizeof($this->paciente->Tratamiento) > 0)
                {
                    $tratamiento = $this->paciente->Tratamiento->getLast();
                    $preoperatorio = Doctrine_Core::getTable('Preoperatorio')->obtenerTratamientos($tratamiento->tra_codigo)->getLast();
                    //$this->form = new PreoperatorioForm($preoperatorios->getLast());
                    $this->redirect('valoracion/cargarExamenPreoperatorio?preo_codigo=' . $preoperatorio->preo_codigo);
                }
            }            
        }        
    }

    public function executeCargarExamenPreoperatorio(sfWebRequest $request)
    {
        if((0 != strcmp($request->getParameter('preo_codigo'), '')) && (0 != strcmp($this->getUser()->getAttribute('tra_codigo'), '')))
        {
            $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($request->getParameter('preo_codigo')));
            $this->form = new PreoperatorioForm($this->preoperatorio);
            // TODO cargar los procedimientos que se van a realizar en el tratamiento
            $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find(array($this->getUser()->getAttribute('tra_codigo')));
            $this->ids_procedimientos = array();
            foreach($this->tratamiento->Procedimiento as $procedimiento)
            {
                $this->ids_procedimientos[] = $procedimiento->pro_codigo;
            }

            $this->procedimiento_form = new ProcedimientoForm();
            $this->forms_fotos = array();
            $this->links_forms_fotos = array();
            
            if(sizeof($this->preoperatorio->Foto) > 0)
            {
                $count = 0;
                foreach($this->preoperatorio->Foto as $foto)
                {
                    $this->forms_fotos[$count] = new FotoForm($foto);
                    $this->forms_fotos[$count]->cambiarGrupo('foto_' . $count);
                    $this->links_forms_fotos[$count] = $foto->fot_uri_imagen;
                    $count ++;
                }
            }
            else
            {
                $this->forms_fotos[0] = new FotoForm();
                $this->forms_fotos[0]->cambiarGrupo('foto_0');
            }
            
            $this->setTemplate('examenesPreoperatorios');
        }
        else
        {
            $this->forward('valoracion', 'examenesPreoperatorios');
        }
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

        for($i = 0; $i < $request->getParameter('cuenta_procedimientos'); $i ++)
        {
            //$forms_procedimientos[] = 'procedimiento_' . $i;
            $datos_nuevo_procedimiento = $request->getParameter('procedimiento_' . $i);
            
            if(empty($datos_nuevo_procedimiento['pro_codigo']))
            {
                $nuevo_procedimiento = new Procedimiento();
                $nuevo_procedimiento->set('pro_tra_codigo', $this->getUser()->getAttribute('tra_codigo'));
                $nuevo_procedimiento->set('pro_tit_codigo', $datos_nuevo_procedimiento['pro_tit_codigo']);
                $nuevo_procedimiento->set('pro_dtr_codigo', $datos_nuevo_procedimiento['pro_dtr_codigo']);
                $nuevo_procedimiento->set('pro_otro', $datos_nuevo_procedimiento['pro_otro']);
                $nuevo_procedimiento->save();
            }
        }

        $contenido_preoperatorio = $request->getParameter('preoperatorio');
        $contenido_preoperatorio['preo_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');

        if(!empty($contenido_preoperatorio['preo_codigo']))
        {
            $preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($contenido_preoperatorio['preo_codigo']));
            $this->form_preoperatorio = new PreoperatorioForm($preoperatorio);
            $this->form_preoperatorio->bind($contenido_preoperatorio);
            if($this->form_preoperatorio->isValid())
            {
                $this->preoperatorio_actual = $this->form_preoperatorio->save();
            }
        }
        else
        {
            $this->form_preoperatorio = new PreoperatorioForm();
            $this->form_preoperatorio->bind($contenido_preoperatorio);
            if($this->form_preoperatorio->isValid())
            {
                $this->preoperatorio_actual = $this->form_preoperatorio->save();
            }
        }

        $forms_fotos = array();
        for($i = 0; $i <= $request->getParameter('cuenta_fotos'); $i ++)
        {
            $datos_foto = $request->getParameter('foto_' . $i);
            $datos_foto['fot_preoperatoria'] = 1;
            $datos_foto['fot_preo_codigo'] = $this->preoperatorio_actual->preo_codigo;
            $forma_foto = new FotoForm();
            if(!empty($datos_foto['fot_codigo']))
            {
                $foto = Doctrine_Core::getTable('Foto')->find(array($datos_foto['fot_codigo']));
                $forma_foto = new FotoForm($foto);
                if(empty($datos_foto['fot_uri_imagen']))
                {
                    $foto->setFotNombre($datos_foto['fot_nombre']);
                    $foto->save();
                }
                else
                {
                    $forma_foto->bind($datos_foto, $request->getFiles('foto_' . $i));
                    $foto_nueva = $forma_foto->save();
                }
            }
            else
            {
                $forma_foto->bind($datos_foto, $request->getFiles('foto_' . $i));
                if($forma_foto->isValid())
                    $foto_nueva = $forma_foto->save();
            }
        }

        $this->redirect('valoracion/cargarExamenPreoperatorio?preo_codigo=' . $preoperatorio->preo_codigo);
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
        $this->preoperatorio_form = new PreoperatorioForm();
        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->obtenerTratamientos($this->getUser()->getAttribute('tra_codigo'))->getLast();
            $this->preoperatorio_form = new PreoperatorioForm($this->preoperatorio);
        }
    }

    public function executeGuardarValoracionPreoperatoria(sfWebRequest $request)
    {
        $datos_preoperatorio = $request->getParameter('preoperatorio');
        if(!empty($datos_preoperatorio['preo_codigo']))
        {
            $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($datos_preoperatorio['preo_codigo']));
            $fecha_cita_ext = $datos_preoperatorio['preo_fecha_cita_ext']['year'] . '-' . $datos_preoperatorio['preo_fecha_cita_ext']['month'] . '-' . $datos_preoperatorio['preo_fecha_cita_ext']['day'];
            $hora_cita_ext = $datos_preoperatorio['preo_hora_cita_ext']['hour'] . ':' . $datos_preoperatorio['preo_hora_cita_ext']['minute'];
            $this->preoperatorio->set('preo_fecha_cita_ext', $fecha_cita_ext);
            $this->preoperatorio->set('preo_hora_cita_ext', $hora_cita_ext);
            $this->preoperatorio->set('preo_cli_codigo', $datos_preoperatorio['preo_cli_codigo']);
            $this->preoperatorio->set('preo_informe_especialista', $datos_preoperatorio['preo_informe_especialista']);
            $this->preoperatorio->save();
        }
        else
        {
            // TODO mensaje indicando que no se ha hecho una evaluacion previa
        }
        $this->forward('valoracion', 'valoracionPreoperatoria');
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

    public function executeAgregarFoto(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $this->form_foto = new FotoForm();
            $this->form_foto->cambiarGrupo('foto_' . $request->getParameter('cuenta_fotos'));
        }
    }

    public function executeCleanData()
    {
        $this->getUser()->setAttribute('tra_codigo', '');
        $this->forward('valoracion', 'examenesPreoperatorios');
    }
}
