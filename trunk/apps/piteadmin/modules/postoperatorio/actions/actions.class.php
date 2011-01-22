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
        $this->forward('postoperatorio', 'altaPostOperatoria');
    }

    public function executeInfoPostOperatorio(sfWebRequest $request)
    {
        
    }

    public function executeAltaPostOperatoria(sfWebRequest $request)
    {
        // TODO Cargar el alta post-operatoria si esta existe
        $this->form = new AltapostoperatoriaForm();
        $this->links_forms_fotos = array();
        $this->forms_fotos = array();
        $this->postoperatorio = new Postoperatorio();
        
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

    public function executeGuardarAltaPostoperatoria(sfWebRequest $request)
    {
        $datos_postoperatorio = $request->getParameter('Altapostoperatoria');
    }
}
