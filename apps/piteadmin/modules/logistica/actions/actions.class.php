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

    }

    public function executeTransporte(sfWebRequest $request)
    {

    }
}
