<?php

/**
 * Enfermera form base class.
 *
 * @method Enfermera getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEnfermeraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'enf_codigo'         => new sfWidgetFormInputHidden(),
      'enf_nombre'         => new sfWidgetFormInputText(),
      'enf_valor_servicio' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'enf_codigo'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('enf_codigo')), 'empty_value' => $this->getObject()->get('enf_codigo'), 'required' => false)),
      'enf_nombre'         => new sfValidatorString(array('max_length' => 50)),
      'enf_valor_servicio' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('enfermera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Enfermera';
  }

}
