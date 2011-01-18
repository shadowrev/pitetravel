<?php

/**
 * Hotel filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHotelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hot_nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hot_direccion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hot_telefono'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hot_web'         => new sfWidgetFormFilterInput(),
      'hot_email'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hot_valor_noche' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'hot_nombre'      => new sfValidatorPass(array('required' => false)),
      'hot_direccion'   => new sfValidatorPass(array('required' => false)),
      'hot_telefono'    => new sfValidatorPass(array('required' => false)),
      'hot_web'         => new sfValidatorPass(array('required' => false)),
      'hot_email'       => new sfValidatorPass(array('required' => false)),
      'hot_valor_noche' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('hotel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hotel';
  }

  public function getFields()
  {
    return array(
      'hot_codigo'      => 'Number',
      'hot_nombre'      => 'Text',
      'hot_direccion'   => 'Text',
      'hot_telefono'    => 'Text',
      'hot_web'         => 'Text',
      'hot_email'       => 'Text',
      'hot_valor_noche' => 'Number',
    );
  }
}
