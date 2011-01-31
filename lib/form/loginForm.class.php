<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Parametriza el formulario de login del plugin sfGuardPlugin
 * @author Raul Ernesto Villamarin
 */
class loginForm extends sfGuardFormSignin
{
    public function configure()
    {
        unset($this['remember']);

        $this->widgetSchema->setLabels(array(
            'username' => 'Login',
            'password' => 'Contrase&ntilde;a'
        ));
    }
}
?>
