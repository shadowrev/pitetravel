<?php

/**
 * Procedimiento form base class.
 *
 * @method Procedimiento getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProcedimientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_codigo'     => new sfWidgetFormInputHidden(),
      'pro_tra_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'pro_tit_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'), 'add_empty' => false)),
      'pro_dtr_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Descripciontratamiento'), 'add_empty' => false)),
      'pro_otro'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'pro_codigo'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pro_codigo')), 'empty_value' => $this->getObject()->get('pro_codigo'), 'required' => false)),
      'pro_tra_codigo' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'pro_tit_codigo' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'))),
      'pro_dtr_codigo' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Descripciontratamiento'))),
      'pro_otro'       => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('procedimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Procedimiento';
  }

}
