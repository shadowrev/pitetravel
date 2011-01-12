<?php

/**
 * Altapostoperatoria form base class.
 *
 * @method Altapostoperatoria getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAltapostoperatoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'apo_codigo'            => new sfWidgetFormInputHidden(),
      'apo_tra_codigo'        => new sfWidgetFormInputText(),
      'apo_med_codigo'        => new sfWidgetFormInputText(),
      'apo_cli_codigo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'), 'add_empty' => false)),
      'apo_exploracion'       => new sfWidgetFormTextarea(),
      'apo_info_especialista' => new sfWidgetFormTextarea(),
      'apo_tratamiento'       => new sfWidgetFormTextarea(),
      'apo_observaciones'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'apo_codigo'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('apo_codigo')), 'empty_value' => $this->getObject()->get('apo_codigo'), 'required' => false)),
      'apo_tra_codigo'        => new sfValidatorInteger(),
      'apo_med_codigo'        => new sfValidatorInteger(),
      'apo_cli_codigo'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'))),
      'apo_exploracion'       => new sfValidatorString(),
      'apo_info_especialista' => new sfValidatorString(),
      'apo_tratamiento'       => new sfValidatorString(),
      'apo_observaciones'     => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('altapostoperatoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Altapostoperatoria';
  }

}
