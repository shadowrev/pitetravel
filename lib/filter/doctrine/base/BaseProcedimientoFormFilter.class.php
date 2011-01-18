<?php

/**
 * Procedimiento filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProcedimientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_tra_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'pro_tit_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'), 'add_empty' => true)),
      'pro_dtr_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Descripciontratamiento'), 'add_empty' => true)),
      'pro_otro'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'pro_tra_codigo' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'pro_tit_codigo' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tipotratamiento'), 'column' => 'tit_codigo')),
      'pro_dtr_codigo' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Descripciontratamiento'), 'column' => 'dtr_codigo')),
      'pro_otro'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('procedimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Procedimiento';
  }

  public function getFields()
  {
    return array(
      'pro_codigo'     => 'Number',
      'pro_tra_codigo' => 'ForeignKey',
      'pro_tit_codigo' => 'ForeignKey',
      'pro_dtr_codigo' => 'ForeignKey',
      'pro_otro'       => 'Text',
    );
  }
}
