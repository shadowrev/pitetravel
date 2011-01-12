<?php

/**
 * Paciente filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePacienteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pac_nombre'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_identificacion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'pac_telefono1'        => new sfWidgetFormFilterInput(),
      'pac_telefono2'        => new sfWidgetFormFilterInput(),
      'pac_email'            => new sfWidgetFormFilterInput(),
      'pac_direccion'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_ciudad'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_estado'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_pais'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pac_cod_postal'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pac_nombre'           => new sfValidatorPass(array('required' => false)),
      'pac_identificacion'   => new sfValidatorPass(array('required' => false)),
      'pac_fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'pac_telefono1'        => new sfValidatorPass(array('required' => false)),
      'pac_telefono2'        => new sfValidatorPass(array('required' => false)),
      'pac_email'            => new sfValidatorPass(array('required' => false)),
      'pac_direccion'        => new sfValidatorPass(array('required' => false)),
      'pac_ciudad'           => new sfValidatorPass(array('required' => false)),
      'pac_estado'           => new sfValidatorPass(array('required' => false)),
      'pac_pais'             => new sfValidatorPass(array('required' => false)),
      'pac_cod_postal'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('paciente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

  public function getFields()
  {
    return array(
      'pac_codigo'           => 'Number',
      'pac_nombre'           => 'Text',
      'pac_identificacion'   => 'Text',
      'pac_fecha_nacimiento' => 'Date',
      'pac_telefono1'        => 'Text',
      'pac_telefono2'        => 'Text',
      'pac_email'            => 'Text',
      'pac_direccion'        => 'Text',
      'pac_ciudad'           => 'Text',
      'pac_estado'           => 'Text',
      'pac_pais'             => 'Text',
      'pac_cod_postal'       => 'Number',
    );
  }
}
