<?php

/**
 * Materialquirurgico form base class.
 *
 * @method Materialquirurgico getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMaterialquirurgicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'maq_codigo' => new sfWidgetFormInputHidden(),
      'maq_nombre' => new sfWidgetFormInputText(),
      'maq_valor'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'maq_codigo' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('maq_codigo')), 'empty_value' => $this->getObject()->get('maq_codigo'), 'required' => false)),
      'maq_nombre' => new sfValidatorString(array('max_length' => 50)),
      'maq_valor'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('materialquirurgico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materialquirurgico';
  }

}
