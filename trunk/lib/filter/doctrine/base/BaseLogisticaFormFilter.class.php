<?php

/**
 * Logistica filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogisticaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'log_tra_codigo'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'log_reh_codigo'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Reservahotel'), 'add_empty' => true)),
      'log_vue_codigo'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Reservavuelo'), 'add_empty' => true)),
      'log_trans_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Transporte'), 'add_empty' => true)),
      'log_clo_codigo_responsable'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica'), 'add_empty' => true)),
      'log_clo_codigo_guia'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica_3'), 'add_empty' => true)),
      'log_observaciones'            => new sfWidgetFormFilterInput(),
      'log_observaciones_transporte' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'log_tra_codigo'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'log_reh_codigo'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Reservahotel'), 'column' => 'reh_codigo')),
      'log_vue_codigo'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Reservavuelo'), 'column' => 'vue_codigo')),
      'log_trans_codigo'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Transporte'), 'column' => 'trans_codigo')),
      'log_clo_codigo_responsable'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Contactologistica'), 'column' => 'clo_codigo')),
      'log_clo_codigo_guia'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Contactologistica_3'), 'column' => 'clo_codigo')),
      'log_observaciones'            => new sfValidatorPass(array('required' => false)),
      'log_observaciones_transporte' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('logistica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Logistica';
  }

  public function getFields()
  {
    return array(
      'log_codigo'                   => 'Number',
      'log_tra_codigo'               => 'ForeignKey',
      'log_reh_codigo'               => 'ForeignKey',
      'log_vue_codigo'               => 'ForeignKey',
      'log_trans_codigo'             => 'ForeignKey',
      'log_clo_codigo_responsable'   => 'ForeignKey',
      'log_clo_codigo_guia'          => 'ForeignKey',
      'log_observaciones'            => 'Text',
      'log_observaciones_transporte' => 'Text',
    );
  }
}
