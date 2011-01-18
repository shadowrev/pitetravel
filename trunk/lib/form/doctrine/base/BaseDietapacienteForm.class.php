<?php

/**
 * Dietapaciente form base class.
 *
 * @method Dietapaciente getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDietapacienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dtp_codigo'          => new sfWidgetFormInputHidden(),
      'dtp_tra_codigo'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'dtp_recomendaciones' => new sfWidgetFormTextarea(),
      'dtp_med_codigo'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => false)),
      'dtp_tipo_dieta'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'dtp_codigo'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('dtp_codigo')), 'empty_value' => $this->getObject()->get('dtp_codigo'), 'required' => false)),
      'dtp_tra_codigo'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'dtp_recomendaciones' => new sfValidatorString(),
      'dtp_med_codigo'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'))),
      'dtp_tipo_dieta'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dietapaciente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dietapaciente';
  }

}
