<?php

/**
 * Transporte filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTransporteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'trans_nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_identificacion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_telefono1'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_telefono2'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_direccion'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_placa_vehiculo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_tipo_vehiculo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_nombre_companhia'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_numero_companhia'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_telefono_companhia' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'trans_nombre'             => new sfValidatorPass(array('required' => false)),
      'trans_identificacion'     => new sfValidatorPass(array('required' => false)),
      'trans_telefono1'          => new sfValidatorPass(array('required' => false)),
      'trans_telefono2'          => new sfValidatorPass(array('required' => false)),
      'trans_direccion'          => new sfValidatorPass(array('required' => false)),
      'trans_placa_vehiculo'     => new sfValidatorPass(array('required' => false)),
      'trans_tipo_vehiculo'      => new sfValidatorPass(array('required' => false)),
      'trans_nombre_companhia'   => new sfValidatorPass(array('required' => false)),
      'trans_numero_companhia'   => new sfValidatorPass(array('required' => false)),
      'trans_telefono_companhia' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('transporte_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transporte';
  }

  public function getFields()
  {
    return array(
      'trans_codigo'             => 'Number',
      'trans_nombre'             => 'Text',
      'trans_identificacion'     => 'Text',
      'trans_telefono1'          => 'Text',
      'trans_telefono2'          => 'Text',
      'trans_direccion'          => 'Text',
      'trans_placa_vehiculo'     => 'Text',
      'trans_tipo_vehiculo'      => 'Text',
      'trans_nombre_companhia'   => 'Text',
      'trans_numero_companhia'   => 'Text',
      'trans_telefono_companhia' => 'Text',
    );
  }
}
