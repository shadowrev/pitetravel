<?php

/**
 * Altapostoperatoria filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAltapostoperatoriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'apo_tra_codigo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apo_med_codigo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apo_cli_codigo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'), 'add_empty' => true)),
      'apo_exploracion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apo_info_especialista' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apo_tratamiento'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apo_observaciones'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'apo_tra_codigo'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'apo_med_codigo'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'apo_cli_codigo'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Clinica'), 'column' => 'cli_codigo')),
      'apo_exploracion'       => new sfValidatorPass(array('required' => false)),
      'apo_info_especialista' => new sfValidatorPass(array('required' => false)),
      'apo_tratamiento'       => new sfValidatorPass(array('required' => false)),
      'apo_observaciones'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('altapostoperatoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Altapostoperatoria';
  }

  public function getFields()
  {
    return array(
      'apo_codigo'            => 'Number',
      'apo_tra_codigo'        => 'Number',
      'apo_med_codigo'        => 'Number',
      'apo_cli_codigo'        => 'ForeignKey',
      'apo_exploracion'       => 'Text',
      'apo_info_especialista' => 'Text',
      'apo_tratamiento'       => 'Text',
      'apo_observaciones'     => 'Text',
    );
  }
}
