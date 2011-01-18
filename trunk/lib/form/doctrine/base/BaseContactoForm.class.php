<?php

/**
 * Contacto form base class.
 *
 * @method Contacto getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'con_codigo'     => new sfWidgetFormInputHidden(),
      'con_pac_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => false)),
      'con_nombre'     => new sfWidgetFormInputText(),
      'con_telefono1'  => new sfWidgetFormInputText(),
      'con_telefono2'  => new sfWidgetFormInputText(),
      'con_email'      => new sfWidgetFormInputText(),
      'con_direccion'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'con_codigo'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('con_codigo')), 'empty_value' => $this->getObject()->get('con_codigo'), 'required' => false)),
      'con_pac_codigo' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'))),
      'con_nombre'     => new sfValidatorString(array('max_length' => 150)),
      'con_telefono1'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'con_telefono2'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'con_email'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'con_direccion'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contacto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacto';
  }

}
