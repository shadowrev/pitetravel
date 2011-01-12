<?php

/**
 * Descripciontratamiento filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDescripciontratamientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dtr_tit_codigo'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipotratamiento'), 'add_empty' => true)),
      'dtr_descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'dtr_tit_codigo'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tipotratamiento'), 'column' => 'tit_codigo')),
      'dtr_descripcion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('descripciontratamiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Descripciontratamiento';
  }

  public function getFields()
  {
    return array(
      'dtr_codigo'      => 'Number',
      'dtr_tit_codigo'  => 'ForeignKey',
      'dtr_descripcion' => 'Text',
    );
  }
}
