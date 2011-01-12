<?php

/**
 * Tratamiento form base class.
 *
 * @method Tratamiento getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTratamientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tra_codigo'         => new sfWidgetFormInputHidden(),
      'tra_pac_codigo'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => false)),
      'tra_fecha_partida'  => new sfWidgetFormDate(),
      'tra_tiempo_estadia' => new sfWidgetFormInputText(),
      'tra_apto_operacion' => new sfWidgetFormInputText(),
      'tra_costo_basico'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'tra_codigo'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tra_codigo')), 'empty_value' => $this->getObject()->get('tra_codigo'), 'required' => false)),
      'tra_pac_codigo'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'))),
      'tra_fecha_partida'  => new sfValidatorDate(array('required' => false)),
      'tra_tiempo_estadia' => new sfValidatorInteger(array('required' => false)),
      'tra_apto_operacion' => new sfValidatorInteger(array('required' => false)),
      'tra_costo_basico'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tratamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tratamiento';
  }

}
