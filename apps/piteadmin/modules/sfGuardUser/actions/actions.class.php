<?php

/**
 * sfGuardUsers actions.
 *
 * @package    pitetravel
 * @subpackage sfGuardUsers
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserActions extends autoSfGuardUserActions
{
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new userForm();
        $this->medico_form = new MedicoForm();
        $this->sf_guard_user = $this->form->getObject();
        $this->medico = $this->medico_form->getObject();
    }

    public function executeCreate(sfWebRequest $request)
    {
//        parent::executeCreate($request);
        $this->form = new userForm();
        //$this->sf_guard_user = $this->form->getObject();
        $this->sf_guard_user = $this->guardarForma($this->form, $request->getParameter($this->form->getName()));
        if($this->sf_guard_user)
        {
            $this->medico_form = new MedicoForm();
            $datos_medico = $request->getParameter($this->medico_form->getName());
            $datos_medico['med_sfg_id'] = $this->sf_guard_user->id;
            $datos_medico['med_nombre'] = $this->sf_guard_user->first_name . ' ' . $this->sf_guard_user->last_name;
            $datos_medico['med_email'] = $this->sf_guard_user->email_address;

            $this->medico = $this->guardarForma($this->medico_form, $datos_medico);
        }
        $this->redirect('@sf_guard_user');
        //$this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->sf_guard_user = $this->getRoute()->getObject();
        $this->form = new userForm($this->sf_guard_user);
        $this->medico = Doctrine_Core::getTable('Medico')->obtenerMedicoPorIdUsuario($this->sf_guard_user->id);
        $this->medico_form = new MedicoForm($this->medico);
        $this->setTemplate('new');
    }
    
    protected function guardarForma($form, $datos)
    {
        $form->bind($datos);
        if($form->isValid())
        {
            $object = $form->save();
            return $object;
        }
        return false;
    }
}
