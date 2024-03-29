<?php

/**
 * postoperatorio actions.
 *
 * @package    pitetravel
 * @subpackage postoperatorio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postoperatorioActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('postoperatorio', 'infoPostOperatorio');
    }

    public function executeInfoPostOperatorio(sfWebRequest $request)
    {
        $this->form = new PostoperatorioForm();
        $this->links_forms_fotos = array();
        $this->forms_fotos = array();
        $this->postoperatorio = new Postoperatorio();
        
        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->postoperatorio = Doctrine_Core::getTable('Postoperatorio')->obtenerPorTratamiento($this->getUser()->getAttribute('tra_codigo'));
            if($this->postoperatorio)
            {
                $this->form = new PostoperatorioForm($this->postoperatorio);
            }
            else
            {
                $this->postoperatorio = new Postoperatorio();
            }
        }
        if(sizeof($this->postoperatorio->Foto) > 0)
        {
            $count = 0;
            foreach($this->postoperatorio->Foto as $foto)
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
    }

    public function executeGuardarInfoPostOperatorio(sfWebRequest $request)
    {
        if((0 != strcmp($this->getUser()->getAttribute('tra_codigo'), '')))
        {
            $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));
            $datos_postoperatorio = $request->getParameter('postoperatorio');
            $this->form = new PostoperatorioForm();
            if(!empty($datos_postoperatorio['pos_codigo']))
            {
                $this->postoperatorio_actual = Doctrine_Core::getTable('Postoperatorio')->find(array($datos_postoperatorio['pos_codigo']));
                $this->form = new PostoperatorioForm($this->postoperatorio_actual);
            }
            $datos_postoperatorio['pos_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
            $datos_postoperatorio['pos_med_codigo_responsable'] = $this->getUser()->getAttribute('med_codigo');
            $this->form->bind($datos_postoperatorio);

            if($this->form->isValid())
            {
                $this->getUser()->setFlash ('notificacion', 'La valoracion Post-Operatoria ' . sfConfig::get('app_guardado_exitoso_f'));
                $this->postoperatorio_nuevo = $this->form->save();
                //$this->enviarMail('Se ha efectuado un cambio en el Post-Operatorio de ' . $this->tratamiento->Paciente->pac_nombre);
            }
            else
                $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));

            $forms_fotos = array();
            for($i = 0; $i <= $request->getParameter('cuenta_fotos'); $i ++)
            {
                $datos_foto = $request->getParameter('foto_' . $i);
                $datos_foto['fot_preoperatoria'] = 0;
                $datos_foto['fot_pos_codigo'] = $this->postoperatorio_nuevo->pos_codigo;
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
                        if($forma_foto->isValid())
                            $foto_nueva = $forma_foto->save();
                        else
                            $this->getUser()->setFlash ('error', 'Una o mas fotos no se han guardado. Por favor, intentelo nuevamente');
                    }
                }
                //elseif(!empty($datos_foto['fot_uri_imagen']) && !empty($datos_foto['fot_nombre']))
                else
                {
                    $forma_foto->bind($datos_foto, $request->getFiles('foto_' . $i));
                    if($forma_foto->isValid())
                        $foto_nueva = $forma_foto->save();
                    else
                        $this->getUser()->setFlash ('error', 'Una o mas fotos no se han guardado. Por favor, intentelo nuevamente');
                }
            }
        }
        else
            $this->getUser()->setFlash ('error', sfConfig::get('app_error_paciente_seleccionado'));
        $this->redirect('postoperatorio/infoPostOperatorio');
        //$this->setTemplate('postoperatorio/infoPostOperatorio');
    }

    public function executeAltaPostOperatoria(sfWebRequest $request)
    {
        // TODO Cargar el alta post-operatoria si esta existe
        $this->form = new AltapostoperatoriaForm();
        if(0 != strcmp($this->getUser()->getAttribute('tra_codigo'), ''))
        {
            $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));
            // Ver que pasa si en vez de buscar el alta por el codigo del tratamiento, se obtiene con el tratamiento que tenemos
            //   aquí encima.
            $this->altapostoperatoria = Doctrine_Core::getTable('Altapostoperatoria')->buscarPorTratamiento($this->getUser()->getAttribute('tra_codigo'));
            if($this->altapostoperatoria)
            {
                $this->form = new AltapostoperatoriaForm($this->altapostoperatoria);
            }
        }
    }

    public function executeGuardarAltaPostoperatoria(sfWebRequest $request)
    {
        $this->tratamiento = Doctrine_Core::getTable('Tratamiento')->find($this->getUser()->getAttribute('tra_codigo'));
        $datos_postoperatorio = $request->getParameter('altapostoperatoria');
        $this->form = new AltapostoperatoriaForm();
        if(!empty($datos_postoperatorio['apo_codigo']))
        {
            $this->postoperatorio_actual = Doctrine_Core::getTable('Altapostoperatoria')->find(array($datos_postoperatorio['apo_codigo']));
            $this->form = new AltapostoperatoriaForm($this->postoperatorio_actual);
        }
        $datos_postoperatorio['apo_tra_codigo'] = $this->getUser()->getAttribute('tra_codigo');
        $datos_postoperatorio['apo_med_codigo'] = $this->getUser()->getAttribute('med_codigo');
        $this->form->bind($datos_postoperatorio);
        if($this->form->isValid())
        {
            $this->postoperatorio_nuevo = $this->form->save();
            $this->getUser()->setFlash ('notificacion', 'El Informe ' . sfConfig::get('app_guardado_exitoso_m'));
            //$this->enviarMail('Se ha efectuado un cambio en el Post-Operatorio de ' . $this->tratamiento->Paciente->pac_nombre);
            $this->redirect('postoperatorio/altaPostOperatoria');
        }
        else
        {
            $this->getUser()->setFlash ('error', sfConfig::get('app_error_validacion'));
//            $this->setTemplate('altaPostOperatoria');
        }
        $this->redirect('postoperatorio/altaPostOperatoria');
    }

    public function executeAgregarFoto(sfWebRequest $request)
    {
        if($request->isXmlHttpRequest())
        {
            $this->form_foto = new FotoForm();
            $this->form_foto->cambiarGrupo('foto_' . $request->getParameter('cuenta_fotos'));
        }
    }

    protected function enviarMail($asunto)
    {
        $this->paciente = $this->tratamiento->Paciente;
        $this->preoperatorio = $this->tratamiento->Preoperatorio->getLast();
        $this->postoperatorio = $this->tratamiento->Postoperatorio->getLast();

        $usuario_actual = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getAttribute('user_id'));
        $this->usuario_ultima_modificacion = $usuario_actual->first_name . ' ' . $usuario_actual->last_name;

        $contenido = $this->getPartial('reportes/generarReporteMedicoMail');

        $grupo_medico_admin = Doctrine_Core::getTable('sfGuardGroup')->find(6); // Grupo de Medicos administradores

        $email_medicos = array();
        $email_medicos[] = $this->getUser()->getAttribute('user_email');
        foreach($grupo_medico_admin->Users as $users)
        {
            $email_medicos[] = $users->email_address;
        }

        $mensaje_correo = new Swift_Message($asunto, $contenido, 'text/html', 'utf-8');
        $mensaje_correo->setFrom(sfConfig::get('app_correo_pite'))
          ->setTo($email_medicos);

        $this->getMailer()->send($mensaje_correo);
    }
}
