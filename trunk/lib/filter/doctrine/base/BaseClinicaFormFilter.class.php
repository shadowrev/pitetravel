<?php

/**
 * Clinica filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClinicaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cli_nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cli_direccion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cli_telefono'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cli_nombre'    => new sfValidatorPass(array('required' => false)),
      'cli_direccion' => new sfValidatorPass(array('required' => false)),
      'cli_telefono'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('clinica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clinica';
  }

  public function getFields()
  {
    return array(
      'cli_codigo'    => 'Number',
      'cli_nombre'    => 'Text',
      'cli_direccion' => 'Text',
      'cli_telefono'  => 'Text',
    );
  }
}
