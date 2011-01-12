<?php

/**
 * Reservavuelo filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReservavueloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'vue_tra_codigo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'vue_origen'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_destino'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_fecha_ida'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'vue_fecha_regreso'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'vue_nro_vuelo_ida'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_nro_vuelo_regreso'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_hora_salida_ida'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_hora_llegada_ida'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_hora_salida_vuelta'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_hora_llegada_vuelta' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vue_valor'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'vue_tra_codigo'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'vue_origen'              => new sfValidatorPass(array('required' => false)),
      'vue_destino'             => new sfValidatorPass(array('required' => false)),
      'vue_fecha_ida'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'vue_fecha_regreso'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'vue_nro_vuelo_ida'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vue_nro_vuelo_regreso'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vue_hora_salida_ida'     => new sfValidatorPass(array('required' => false)),
      'vue_hora_llegada_ida'    => new sfValidatorPass(array('required' => false)),
      'vue_hora_salida_vuelta'  => new sfValidatorPass(array('required' => false)),
      'vue_hora_llegada_vuelta' => new sfValidatorPass(array('required' => false)),
      'vue_valor'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('reservavuelo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservavuelo';
  }

  public function getFields()
  {
    return array(
      'vue_codigo'              => 'Number',
      'vue_tra_codigo'          => 'ForeignKey',
      'vue_origen'              => 'Text',
      'vue_destino'             => 'Text',
      'vue_fecha_ida'           => 'Date',
      'vue_fecha_regreso'       => 'Date',
      'vue_nro_vuelo_ida'       => 'Number',
      'vue_nro_vuelo_regreso'   => 'Number',
      'vue_hora_salida_ida'     => 'Text',
      'vue_hora_llegada_ida'    => 'Text',
      'vue_hora_salida_vuelta'  => 'Text',
      'vue_hora_llegada_vuelta' => 'Text',
      'vue_valor'               => 'Number',
    );
  }
}
