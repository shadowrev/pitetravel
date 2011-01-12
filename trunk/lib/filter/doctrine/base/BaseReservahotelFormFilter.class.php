<?php

/**
 * Reservahotel filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReservahotelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'reh_hot_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'add_empty' => true)),
      'reh_tra_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'reh_fecha_entrada'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'reh_fecha_salida'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'reh_hora_llegada'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reh_hora_salida'    => new sfWidgetFormFilterInput(),
      'reh_localizador'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reh_dias_estadia'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reh_noches_estadia' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'reh_hot_codigo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hotel'), 'column' => 'hot_codigo')),
      'reh_tra_codigo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'reh_fecha_entrada'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'reh_fecha_salida'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'reh_hora_llegada'   => new sfValidatorPass(array('required' => false)),
      'reh_hora_salida'    => new sfValidatorPass(array('required' => false)),
      'reh_localizador'    => new sfValidatorPass(array('required' => false)),
      'reh_dias_estadia'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reh_noches_estadia' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('reservahotel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservahotel';
  }

  public function getFields()
  {
    return array(
      'reh_codigo'         => 'Number',
      'reh_hot_codigo'     => 'ForeignKey',
      'reh_tra_codigo'     => 'ForeignKey',
      'reh_fecha_entrada'  => 'Date',
      'reh_fecha_salida'   => 'Date',
      'reh_hora_llegada'   => 'Text',
      'reh_hora_salida'    => 'Text',
      'reh_localizador'    => 'Text',
      'reh_dias_estadia'   => 'Number',
      'reh_noches_estadia' => 'Number',
    );
  }
}
