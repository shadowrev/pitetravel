<?php

/**
 * Transporte form base class.
 *
 * @method Transporte getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTransporteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'trans_codigo'             => new sfWidgetFormInputHidden(),
      'trans_nombre'             => new sfWidgetFormInputText(),
      'trans_identificacion'     => new sfWidgetFormInputText(),
      'trans_telefono1'          => new sfWidgetFormInputText(),
      'trans_telefono2'          => new sfWidgetFormInputText(),
      'trans_direccion'          => new sfWidgetFormInputText(),
      'trans_placa_vehiculo'     => new sfWidgetFormInputText(),
      'trans_tipo_vehiculo'      => new sfWidgetFormInputText(),
      'trans_nombre_companhia'   => new sfWidgetFormInputText(),
      'trans_numero_companhia'   => new sfWidgetFormInputText(),
      'trans_telefono_companhia' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'trans_codigo'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('trans_codigo')), 'empty_value' => $this->getObject()->get('trans_codigo'), 'required' => false)),
      'trans_nombre'             => new sfValidatorString(array('max_length' => 50)),
      'trans_identificacion'     => new sfValidatorString(array('max_length' => 50)),
      'trans_telefono1'          => new sfValidatorString(array('max_length' => 15)),
      'trans_telefono2'          => new sfValidatorString(array('max_length' => 15)),
      'trans_direccion'          => new sfValidatorString(array('max_length' => 150)),
      'trans_placa_vehiculo'     => new sfValidatorString(array('max_length' => 15)),
      'trans_tipo_vehiculo'      => new sfValidatorString(array('max_length' => 150)),
      'trans_nombre_companhia'   => new sfValidatorString(array('max_length' => 50)),
      'trans_numero_companhia'   => new sfValidatorString(array('max_length' => 15)),
      'trans_telefono_companhia' => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('transporte[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transporte';
  }

}
