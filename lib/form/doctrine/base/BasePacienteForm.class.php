<?php

/**
 * Paciente form base class.
 *
 * @method Paciente getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pac_codigo'           => new sfWidgetFormInputHidden(),
      'pac_nombre'           => new sfWidgetFormInputText(),
      'pac_identificacion'   => new sfWidgetFormInputText(),
      'pac_fecha_nacimiento' => new sfWidgetFormDate(),
      'pac_telefono1'        => new sfWidgetFormInputText(),
      'pac_telefono2'        => new sfWidgetFormInputText(),
      'pac_email'            => new sfWidgetFormInputText(),
      'pac_direccion'        => new sfWidgetFormInputText(),
      'pac_ciudad'           => new sfWidgetFormInputText(),
      'pac_estado'           => new sfWidgetFormInputText(),
      'pac_pais'             => new sfWidgetFormInputText(),
      'pac_cod_postal'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'pac_codigo'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pac_codigo')), 'empty_value' => $this->getObject()->get('pac_codigo'), 'required' => false)),
      'pac_nombre'           => new sfValidatorString(array('max_length' => 150)),
      'pac_identificacion'   => new sfValidatorString(array('max_length' => 30)),
      'pac_fecha_nacimiento' => new sfValidatorDate(),
      'pac_telefono1'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'pac_telefono2'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'pac_email'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pac_direccion'        => new sfValidatorString(array('max_length' => 150)),
      'pac_ciudad'           => new sfValidatorString(array('max_length' => 50)),
      'pac_estado'           => new sfValidatorString(array('max_length' => 50)),
      'pac_pais'             => new sfValidatorString(array('max_length' => 50)),
      'pac_cod_postal'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('paciente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

}
