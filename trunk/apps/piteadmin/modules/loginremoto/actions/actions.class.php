<?php

/**
 * loginremoto actions.
 *
 * @package    pitetravel
 * @subpackage loginremoto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
//class loginremotoActions extends sfActions
class loginremotoActions extends sfGuardAuthAct
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        //$this->forward('default', 'module');
        // Dirige a una pagina de error si accede de forma distinta a POST
        $this->forward404If(!$request->isMethod('post'));
        
        $user = Doctrine_Core::getTable('sfGuardUser')->retrieveByUsername($request->getParameter('login'));
        
        // TODO realizar la comparacion con un token para asegurarse que la agencia que hace el login remoto pertenece a un touroperador
        // sha1 touroperadorfechadecreacion . '#' . md5 touroperadorfechadecreacion
        // Ejemplo: sha1('zafiro20111007') . '#' . md5('zafiro20111007')
        
        // Dirige a una pagina de error si la identificacion no corresponde
        $this->forward404If(!$user->checkPassword($request->getParameter('password')));        
        
        // Inicia la sesion y redirige al home del sistema
        $this->getUser()->signin($user);
        $this->getUser()->setAttribute('user_id', $user->getId());
        $this->getUser()->setAttribute('user_name', $user->username);
        $this->getUser()->setAttribute('user_email', $user->email_address);

        $medico = Doctrine_Core::getTable('Medico')->obtenerMedicoPorIdUsuario($user->getId());
        $this->getUser()->setAttribute('med_codigo', ($medico != false) ? $medico->med_codigo : null);

        $agencia = Doctrine_Core::getTable('Usuariosagencia')->obtenerAgenciaUsuario($user->getId());
        $this->getUser()->setAttribute('agn_codigo', ($agencia != false) ? $agencia->agn_codigo : null);
        $this->redirect('@homepage');
    }
}
