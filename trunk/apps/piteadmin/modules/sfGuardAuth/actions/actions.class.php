<?php

/**
 * login actions.
 *
 * @package    pitetravel
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class sfGuardAuthActions extends sfGuardAuthAct
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('sfGuardAuthActions', 'signin');
    }

    public function executeSignin($request) {
        $user = $this->getUser();
        if($user->isAuthenticated())
        {
            return $this->redirect('@homepage');
        }
        
        $this->form = new loginForm();

        if ($request->isMethod('post'))
        {
            $this->form->bind($request->getParameter('signin'));
            if ($this->form->isValid())
            {
                $values = $this->form->getValues();
                $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);
                $this->getUser()->setAttribute('user_id', $values['user']->getId());
                $this->getUser()->setAttribute('user_name', $values['user']->username);

                $medico = Doctrine_Core::getTable('Medico')->obtenerMedicoPorIdUsuario($values['user']->getId());
                $this->getUser()->setAttribute('med_codigo', ($medico != false) ? $medico->med_codigo : null);

                // always redirect to a URL set in app.yml
                // or to the referer
                // or to the homepage
                $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

                return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
            }
        }
        else
        {
            if ($request->isXmlHttpRequest())
            {
                $this->getResponse()->setHeaderOnly(true);
                $this->getResponse()->setStatusCode(401);

                return sfView::NONE;
            }

            // if we have been forwarded, then the referer is the current URL
            // if not, this is the referer of the current request
            $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

            $module = sfConfig::get('sf_login_module');
            if ($this->getModuleName() != $module)
            {
                return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
            }

            $this->getResponse()->setStatusCode(401);
        }
    }

    public function executeSignout($request)
    {
        $this->getUser()->getAttributeHolder()->remove('pac_codigo');
        $this->getUser()->getAttributeHolder()->remove('pac_nombre');
        $this->getUser()->getAttributeHolder()->remove('tra_codigo');
        $this->getUser()->getAttributeHolder()->remove('user_id');
        $this->getUser()->getAttributeHolder()->remove('user_name');
        $this->getUser()->getAttributeHolder()->remove('med_codigo');

        parent::executeSignout($request);
    }
}
