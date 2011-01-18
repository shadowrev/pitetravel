<?php

/**
 * Postoperatorio filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePostoperatorioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pos_tra_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'pos_med_codigo_responsable' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => true)),
      'pos_hora_cita_col'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_valoracion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_recomendaciones'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_tipo_anestesia'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_hora_cirugia'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_enf_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'), 'add_empty' => true)),
      'pos_info_especialista'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pos_observaciones'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pos_tra_codigo'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'pos_med_codigo_responsable' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Medico'), 'column' => 'med_codigo')),
      'pos_hora_cita_col'          => new sfValidatorPass(array('required' => false)),
      'pos_valoracion'             => new sfValidatorPass(array('required' => false)),
      'pos_recomendaciones'        => new sfValidatorPass(array('required' => false)),
      'pos_tipo_anestesia'         => new sfValidatorPass(array('required' => false)),
      'pos_hora_cirugia'           => new sfValidatorPass(array('required' => false)),
      'pos_enf_codigo'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Enfermera'), 'column' => 'enf_codigo')),
      'pos_info_especialista'      => new sfValidatorPass(array('required' => false)),
      'pos_observaciones'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('postoperatorio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Postoperatorio';
  }

  public function getFields()
  {
    return array(
      'pos_codigo'                 => 'Number',
      'pos_tra_codigo'             => 'ForeignKey',
      'pos_med_codigo_responsable' => 'ForeignKey',
      'pos_hora_cita_col'          => 'Text',
      'pos_valoracion'             => 'Text',
      'pos_recomendaciones'        => 'Text',
      'pos_tipo_anestesia'         => 'Text',
      'pos_hora_cirugia'           => 'Text',
      'pos_enf_codigo'             => 'ForeignKey',
      'pos_info_especialista'      => 'Text',
      'pos_observaciones'          => 'Text',
    );
  }
}
