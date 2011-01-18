<?php

/**
 * Tipotratamiento form base class.
 *
 * @method Tipotratamiento getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipotratamientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tit_codigo' => new sfWidgetFormInputHidden(),
      'tit_nombre' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'tit_codigo' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tit_codigo')), 'empty_value' => $this->getObject()->get('tit_codigo'), 'required' => false)),
      'tit_nombre' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipotratamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipotratamiento';
  }

}
