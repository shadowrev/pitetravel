<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreferenciaturisticaPacienteForm
 *
 * @author raulerne
 */
class PreferenciaturisticaPacienteForm extends PacienteForm 
{
    public function  configure() 
    {
        parent::configure();

        unset($this->widgetSchema['pac_nombre']);
        unset($this->widgetSchema['pac_identificacion']);
        unset($this->widgetSchema['pac_fecha_nacimiento']);
        unset($this->widgetSchema['pac_telefono1']);
        unset($this->widgetSchema['pac_telefono2']);
        unset($this->widgetSchema['pac_email']);
        unset($this->widgetSchema['pac_direccion']);
        unset($this->widgetSchema['pac_ciudad']);
        unset($this->widgetSchema['pac_estado']);
        unset($this->widgetSchema['pac_pais']);
        unset($this->widgetSchema['pac_cod_postal']);
        unset($this->widgetSchema['pac_agn_codigo']);

        unset($this->validatorSchema['pac_nombre']);
        unset($this->validatorSchema['pac_identificacion']);
        unset($this->validatorSchema['pac_fecha_nacimiento']);
        unset($this->validatorSchema['pac_telefono1']);
        unset($this->validatorSchema['pac_telefono2']);
        unset($this->validatorSchema['pac_email']);
        unset($this->validatorSchema['pac_direccion']);
        unset($this->validatorSchema['pac_ciudad']);
        unset($this->validatorSchema['pac_estado']);
        unset($this->validatorSchema['pac_pais']);
        unset($this->validatorSchema['pac_cod_postal']);
        unset($this->validatorSchema['pac_agn_codigo']);
    }
}
?>
