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
class userForm extends sfGuardUserAdminForm {
    
    public function  configure() {
        parent::configure();
        $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'sfGuardGroup',
            'multiple' => true,
            'expanded' => true
        ));
        $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'sfGuardPermission',
            'multiple' => true,
            'expanded' => true
        ));
    }
}
