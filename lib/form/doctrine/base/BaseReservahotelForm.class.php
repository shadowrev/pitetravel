<?php

/**
 * Reservahotel form base class.
 *
 * @method Reservahotel getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReservahotelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'reh_codigo'         => new sfWidgetFormInputHidden(),
      'reh_hot_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'add_empty' => true)),
      'reh_tra_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'reh_fecha_entrada'  => new sfWidgetFormDate(),
      'reh_fecha_salida'   => new sfWidgetFormDate(),
      'reh_hora_llegada'   => new sfWidgetFormTime(),
      'reh_hora_salida'    => new sfWidgetFormTime(),
      'reh_localizador'    => new sfWidgetFormInputText(),
      'reh_dias_estadia'   => new sfWidgetFormInputText(),
      'reh_noches_estadia' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'reh_codigo'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('reh_codigo')), 'empty_value' => $this->getObject()->get('reh_codigo'), 'required' => false)),
      'reh_hot_codigo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'required' => false)),
      'reh_tra_codigo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'required' => false)),
      'reh_fecha_entrada'  => new sfValidatorDate(),
      'reh_fecha_salida'   => new sfValidatorDate(),
      'reh_hora_llegada'   => new sfValidatorTime(),
      'reh_hora_salida'    => new sfValidatorTime(array('required' => false)),
      'reh_localizador'    => new sfValidatorString(array('max_length' => 80)),
      'reh_dias_estadia'   => new sfValidatorInteger(),
      'reh_noches_estadia' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('reservahotel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservahotel';
  }

}
