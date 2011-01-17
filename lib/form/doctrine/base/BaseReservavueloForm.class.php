<?php

/**
 * Reservavuelo form base class.
 *
 * @method Reservavuelo getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReservavueloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'vue_codigo'              => new sfWidgetFormInputHidden(),
      'vue_tra_codigo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'vue_origen'              => new sfWidgetFormInputText(),
      'vue_destino'             => new sfWidgetFormInputText(),
      'vue_fecha_ida'           => new sfWidgetFormDate(),
      'vue_fecha_regreso'       => new sfWidgetFormDate(),
      'vue_nro_vuelo_ida'       => new sfWidgetFormInputText(),
      'vue_nro_vuelo_regreso'   => new sfWidgetFormInputText(),
      'vue_hora_salida_ida'     => new sfWidgetFormTime(),
      'vue_hora_llegada_ida'    => new sfWidgetFormTime(),
      'vue_hora_salida_vuelta'  => new sfWidgetFormTime(),
      'vue_hora_llegada_vuelta' => new sfWidgetFormTime(),
      'vue_valor'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'vue_codigo'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('vue_codigo')), 'empty_value' => $this->getObject()->get('vue_codigo'), 'required' => false)),
      'vue_tra_codigo'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'vue_origen'              => new sfValidatorString(array('max_length' => 100)),
      'vue_destino'             => new sfValidatorString(array('max_length' => 100)),
      'vue_fecha_ida'           => new sfValidatorDate(),
      'vue_fecha_regreso'       => new sfValidatorDate(),
      'vue_nro_vuelo_ida'       => new sfValidatorInteger(),
      'vue_nro_vuelo_regreso'   => new sfValidatorInteger(),
      'vue_hora_salida_ida'     => new sfValidatorTime(),
      'vue_hora_llegada_ida'    => new sfValidatorTime(),
      'vue_hora_salida_vuelta'  => new sfValidatorTime(),
      'vue_hora_llegada_vuelta' => new sfValidatorTime(),
      'vue_valor'               => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reservavuelo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservavuelo';
  }

}
