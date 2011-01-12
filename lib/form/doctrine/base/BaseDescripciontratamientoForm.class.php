<?php

/**
 * Descripciontratamiento form base class.
 *
 * @method Descripciontratamiento getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDescripciontratamientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dtr_codigo'      => new sfWidgetFormInputHidden(),
      'dtr_tit_codigo'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'), 'add_empty' => true)),
      'dtr_descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'dtr_codigo'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('dtr_codigo')), 'empty_value' => $this->getObject()->get('dtr_codigo'), 'required' => false)),
      'dtr_tit_codigo'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'), 'required' => false)),
      'dtr_descripcion' => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->widgetSchema->setNameFormat('descripciontratamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Descripciontratamiento';
  }

}
