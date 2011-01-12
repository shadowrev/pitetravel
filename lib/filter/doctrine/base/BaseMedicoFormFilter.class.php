<?php

/**
 * Medico filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMedicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'med_sfg_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_direccion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_telefono1'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_telefono2'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_email'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med_especialidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'med_sfg_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'med_nombre'       => new sfValidatorPass(array('required' => false)),
      'med_direccion'    => new sfValidatorPass(array('required' => false)),
      'med_telefono1'    => new sfValidatorPass(array('required' => false)),
      'med_telefono2'    => new sfValidatorPass(array('required' => false)),
      'med_email'        => new sfValidatorPass(array('required' => false)),
      'med_especialidad' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('medico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medico';
  }

  public function getFields()
  {
    return array(
      'med_codigo'       => 'Number',
      'med_sfg_id'       => 'Number',
      'med_nombre'       => 'Text',
      'med_direccion'    => 'Text',
      'med_telefono1'    => 'Text',
      'med_telefono2'    => 'Text',
      'med_email'        => 'Text',
      'med_especialidad' => 'Text',
    );
  }
}
