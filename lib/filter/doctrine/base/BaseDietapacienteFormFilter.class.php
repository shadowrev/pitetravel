<?php

/**
 * Dietapaciente filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDietapacienteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dtp_tra_codigo'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'dtp_recomendaciones' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dtp_med_codigo'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => true)),
      'dtp_tipo_dieta'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'dtp_tra_codigo'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'dtp_recomendaciones' => new sfValidatorPass(array('required' => false)),
      'dtp_med_codigo'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Medico'), 'column' => 'med_codigo')),
      'dtp_tipo_dieta'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dietapaciente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dietapaciente';
  }

  public function getFields()
  {
    return array(
      'dtp_codigo'          => 'Number',
      'dtp_tra_codigo'      => 'ForeignKey',
      'dtp_recomendaciones' => 'Text',
      'dtp_med_codigo'      => 'ForeignKey',
      'dtp_tipo_dieta'      => 'Text',
    );
  }
}
