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

    public function executeAltaPostOperatoria(sfWebRequest $request)
    {
        // TODO Cargar el alta post-operatoria si esta existe
        $this->form = new AltapostoperatoriaForm();
    }
}
