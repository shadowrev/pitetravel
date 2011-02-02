<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userForm
 *
 * @author raulerne
 */
class userForm extends PluginsfGuardUserForm {
    
    public function  configure() {
        $this->widgetSchema['nombre_completo'] = new sfWidgetFormInputText();
    }
}
