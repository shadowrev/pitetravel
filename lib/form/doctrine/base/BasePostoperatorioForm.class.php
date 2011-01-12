<?php

/**
 * Postoperatorio form base class.
 *
 * @method Postoperatorio getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostoperatorioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pos_codigo'                 => new sfWidgetFormInputHidden(),
      'pos_tra_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'pos_med_codigo_responsable' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => false)),
      'pos_hora_cita_col'          => new sfWidgetFormTime(),
      'pos_valoracion'             => new sfWidgetFormTextarea(),
      'pos_recomendaciones'        => new sfWidgetFormTextarea(),
      'pos_tipo_anestesia'         => new sfWidgetFormInputText(),
      'pos_hora_cirugia'           => new sfWidgetFormTime(),
      'pos_enf_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'), 'add_empty' => false)),
      'pos_info_especialista'      => new sfWidgetFormTextarea(),
      'pos_observaciones'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'pos_codigo'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pos_codigo')), 'empty_value' => $this->getObject()->get('pos_codigo'), 'required' => false)),
      'pos_tra_codigo'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'pos_med_codigo_responsable' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'))),
      'pos_hora_cita_col'          => new sfValidatorTime(),
      'pos_valoracion'             => new sfValidatorString(),
      'pos_recomendaciones'        => new sfValidatorString(),
      'pos_tipo_anestesia'         => new sfValidatorString(array('max_length' => 20)),
      'pos_hora_cirugia'           => new sfValidatorTime(),
      'pos_enf_codigo'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'))),
      'pos_info_especialista'      => new sfValidatorString(),
      'pos_observaciones'          => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('postoperatorio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Postoperatorio';
  }

}
