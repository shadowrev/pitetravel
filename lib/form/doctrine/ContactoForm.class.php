<?php

/**
 * Contacto form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactoForm extends BaseContactoForm
{
    public function configure()
    {
      $this->widgetSchema->setLabels(array(
          'con_nombre' => 'Nombres y Apellidos:',
          'con_telefono1' => 'Tel&eacute;fono Fijo:',
          'con_telefono2' => 'Tel&eacute;fono M&oacute;vil:',
          'con_email' => 'Correo Electr&oacute;nico:',
          'con_direccion' => 'Direcci&oacute;n:'
      ));
    }

    public function setHiddenForm($id_contacto)
    {
        $this->setWidget('con_nombre', new sfWidgetFormInputHidden());
        $this->setWidget('con_telefono1', new sfWidgetFormInputHidden());
        $this->setWidget('con_telefono2', new sfWidgetFormInputHidden());
        $this->setWidget('con_email', new sfWidgetFormInputHidden());
        $this->setWidget('con_direccion', new sfWidgetFormInputHidden());
        $this->widgetSchema->setNameFormat($this->getName() . '_' . trim($id_contacto) . '[%s]');
    }
}
