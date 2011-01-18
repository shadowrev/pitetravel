<?php

/**
 * Menu form base class.
 *
 * @method Menu getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'men_codigo'     => new sfWidgetFormInputHidden(),
      'men_desayuno'   => new sfWidgetFormInputText(),
      'men_almuerzo'   => new sfWidgetFormInputText(),
      'men_comida'     => new sfWidgetFormInputText(),
      'men_dtp_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dietapaciente'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'men_codigo'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('men_codigo')), 'empty_value' => $this->getObject()->get('men_codigo'), 'required' => false)),
      'men_desayuno'   => new sfValidatorString(array('max_length' => 100)),
      'men_almuerzo'   => new sfValidatorString(array('max_length' => 100)),
      'men_comida'     => new sfValidatorString(array('max_length' => 100)),
      'men_dtp_codigo' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dietapaciente'))),
    ));

    $this->widgetSchema->setNameFormat('menu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Menu';
  }

}
