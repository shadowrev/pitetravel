<?php

/**
 * Tipotratamiento filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipotratamientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tit_nombre' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tit_nombre' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipotratamiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipotratamiento';
  }

  public function getFields()
  {
    return array(
      'tit_codigo' => 'Number',
      'tit_nombre' => 'Text',
    );
  }
}
