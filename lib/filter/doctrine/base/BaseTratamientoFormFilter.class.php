<?php

/**
 * Tratamiento filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTratamientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tra_pac_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => true)),
      'tra_fecha_partida'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tra_tiempo_estadia' => new sfWidgetFormFilterInput(),
      'tra_apto_operacion' => new sfWidgetFormFilterInput(),
      'tra_costo_basico'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tra_pac_codigo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paciente'), 'column' => 'pac_codigo')),
      'tra_fecha_partida'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'tra_tiempo_estadia' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tra_apto_operacion' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tra_costo_basico'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tratamiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tratamiento';
  }

  public function getFields()
  {
    return array(
      'tra_codigo'         => 'Number',
      'tra_pac_codigo'     => 'ForeignKey',
      'tra_fecha_partida'  => 'Date',
      'tra_tiempo_estadia' => 'Number',
      'tra_apto_operacion' => 'Number',
      'tra_costo_basico'   => 'Number',
    );
  }
}
