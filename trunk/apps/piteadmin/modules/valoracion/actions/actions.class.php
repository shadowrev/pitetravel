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
        $this->preoperatorio = $this->form->getObject();
        $this->procedimiento_form = new ProcedimientoForm();
        $this->links_forms_fotos = array();
        $this->forms_fotos = array(new FotoForm());
        $this->forms_fotos[0]->cambiarGrupo('foto_0');

        $this->medico_actual = Doctrine_Core::getTable('Medico')->find($this->getUser()->getAttribute('med_codigo'));
        
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
                    if($preoperatorio)
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
        if(0 != strcmp($this->getUser()->getAttribute('pac_codigo'), ''))
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
            $contenido_preoperatorio['preo_med_codigo'] = $this->getUser()->getAttribute('med_codigo');
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
        else
        {
            $this->redirect('valoracion/examenesPreoperatorios');
        }
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

    public function executeAlmacenarMaterial(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $elementosxintervencion = new Elementosxintervencion();
            $elementosxintervencion->set('exi_maq_codigo', $request->getParameter('exi_maq_codigo'));
            $elementosxintervencion->set('exi_cantidad', $request->getParameter('exi_cantidad'));
            $this->form_material = new ElementosxintervencionForm($elementosxintervencion);
            $this->form_material->setHiddenForm($request->getParameter('elementosxintervencion_id'));
        }
    }

    public function executeAlmacenarMenu(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $menu = new Menu();
            $menu->set('men_desayuno', $request->getParameter('men_desayuno'));
            $menu->set('men_almuerzo', $request->getParameter('men_almuerzo'));
            $menu->set('men_comida', $request->getParameter('men_comida'));
            $this->form_menu = new MenuForm($menu);
            $this->form_menu->setHiddenForms($request->getParameter('menu_id'));
        }
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

    public function executeValoracionExamenes(sfWebRequest $request)
    {
        $this->preoperatorio_form = new ComplementosPreoperatorioForm();
        $this->elementosxinterv_form = new ElementosxintervencionForm();
        $this->dieta_form = new DietapacienteForm();
        $this->menu_form = new MenuForm();

        $tratamiento_id = $this->getUser()->getAttribute('tra_codigo');
        $this->material_quirurgico = null;
        $this->dieta_paciente = $this->dieta_form->getObject();
//        $this->dieta_paciente = new Dietapaciente();
        
        if(!empty($tratamiento_id))
        {
            $this->tratamiento_actual = Doctrine_Core::getTable('Tratamiento')->find(array($tratamiento_id));

            // Obtiene la informacion del preoperatorio
            $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->obtenerTratamientos($tratamiento_id)->getLast();
            $this->preoperatorio_form = new ComplementosPreoperatorioForm($this->preoperatorio);

            // Obtiene el material quirurgico que se va a emplear
            $this->material_quirurgico = $this->preoperatorio->Elementosxintervencion;

            // Prepara el formulario elementosxinterv_form
            $exi = new Elementosxintervencion();
            $this->elementosxinterv_form = new ElementosxintervencionForm($exi->set('exi_preo_codigo', $this->preoperatorio->preo_codigo));

            // Obtiene la dieta
            $this->dieta_paciente = $this->tratamiento_actual->Dietapaciente->getFirst();
            if(false != $this->dieta_paciente)
            {
                $this->dieta_form = new DietapacienteForm($this->dieta_paciente);
            }
        }
    }

    public function executeGuardarValoracionExamenes(sfWebRequest $request)
    {
        $datos_preoperatorio = $request->getParameter('preoperatorio');

        // Recupera el registro del examen preoperatorio y lo actualiza
        $this->preoperatorio = Doctrine_Core::getTable('Preoperatorio')->find(array($datos_preoperatorio['preo_codigo']));
        if(false != $this->preoperatorio)
        {
            $this->preoperatorio_form = new ComplementosPreoperatorioForm($this->preoperatorio);
            $this->preoperatorio_form->bind($datos_preoperatorio);
            if($this->preoperatorio_form->isValid())
            {
                $this->preoperatorio_actualizado = $this->preoperatorio_form->save();

                // Guarda el material quirurgico
                $this->exi_guardados = array();
                for($i = 0; $i < $request->getParameter('cuenta_material'); $i ++)
                {
                    $datos_exi = $request->getParameter('elementosxintervencion_' . $i);
                    $exi_form = new ElementosxintervencionForm();
                    if(!empty($datos_exi['exi_preo_codigo']) && !empty($datos_exi['exi_maq_codigo']))
                    {
                        $elementosxintervencion_obj = Doctrine_Core::getTable('Elementosxintervencion')->find(array($datos_exi['exi_preo_codigo'], $datos_exi['exi_maq_codigo']));
                        $exi_form = new ElementosxintervencionForm($elementosxintervencion_obj);
                    }

                    $datos_exi['exi_preo_codigo'] = $this->preoperatorio_actualizado->preo_codigo;

                    $exi_form->bind($datos_exi);
                    if($exi_form->isValid())
                    {
                        $this->exi_guardados[] = $exi_form->save();
                    }
                }

                // Guarda el menu
                $datos_dieta = $request->getParameter('dietapaciente');
                $form_dieta = new DietapacienteForm();
                if(!empty($datos_dieta['dtp_codigo']))
                {
                    $obj_dieta = Doctrine_Core::getTable('Dietapaciente')->find(array($datos_dieta['dtp_codigo']));
                    $form_dieta = new DietapacienteForm($obj_dieta);
                }
                $datos_dieta['dtp_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
                $form_dieta->bind($datos_dieta);
                if($form_dieta->isValid())
                    $this->dietapaciente_actualizada = $form_dieta->save();

                $this->menu_dieta = array();
                for($i = 0; $i < $request->getParameter('cuenta_menu'); $i ++)
                {
                    $datos_menu = $request->getParameter('menu_' . $i);
                    $form_menu = new MenuForm();
                    if(!empty($datos_menu['men_codigo']))
                    {
                        $menu = Doctrine_Core::getTable('Menu')->find(array($datos_menu['men_codigo']));
                        $form_menu = new MenuForm($menu);
                    }
                    $datos_menu['men_dtp_codigo'] = $this->dietapaciente_actualizada->dtp_codigo;
                    $form_menu->bind($datos_menu);
                    if($form_menu->isValid())
                        $this->menu_dieta[] = $form_menu->save();
                }
            }
        }
        else
        {
            // TODO Enviar mensaje "Aun no se guarda un examen preoperatorio"
        }
        $this->redirect('valoracion/valoracionExamenes');
    }
}
