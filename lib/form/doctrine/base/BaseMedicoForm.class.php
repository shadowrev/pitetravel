<?php

/**
 * Medico form base class.
 *
 * @method Medico getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMedicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'med_codigo'       => new sfWidgetFormInputHidden(),
      'med_sfg_id'       => new sfWidgetFormInputText(),
      'med_nombre'       => new sfWidgetFormInputText(),
      'med_direccion'    => new sfWidgetFormInputText(),
      'med_telefono1'    => new sfWidgetFormInputText(),
      'med_telefono2'    => new sfWidgetFormInputText(),
      'med_email'        => new sfWidgetFormInputText(),
      'med_especialidad' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'med_codigo'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('med_codigo')), 'empty_value' => $this->getObject()->get('med_codigo'), 'required' => false)),
      'med_sfg_id'       => new sfValidatorInteger(),
      'med_nombre'       => new sfValidatorString(array('max_length' => 50)),
      'med_direccion'    => new sfValidatorString(array('max_length' => 50)),
      'med_telefono1'    => new sfValidatorString(array('max_length' => 15)),
      'med_telefono2'    => new sfValidatorString(array('max_length' => 15)),
      'med_email'        => new sfValidatorString(array('max_length' => 100)),
      'med_especialidad' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('medico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medico';
  }

}
