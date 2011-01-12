<?php

/**
 * Clinica form base class.
 *
 * @method Clinica getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClinicaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cli_codigo'    => new sfWidgetFormInputHidden(),
      'cli_nombre'    => new sfWidgetFormInputText(),
      'cli_direccion' => new sfWidgetFormInputText(),
      'cli_telefono'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cli_codigo'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cli_codigo')), 'empty_value' => $this->getObject()->get('cli_codigo'), 'required' => false)),
      'cli_nombre'    => new sfValidatorString(array('max_length' => 50)),
      'cli_direccion' => new sfValidatorString(array('max_length' => 50)),
      'cli_telefono'  => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('clinica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clinica';
  }

}
