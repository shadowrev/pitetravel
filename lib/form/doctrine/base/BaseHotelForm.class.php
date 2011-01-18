<?php

/**
 * Hotel form base class.
 *
 * @method Hotel getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHotelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hot_codigo'      => new sfWidgetFormInputHidden(),
      'hot_nombre'      => new sfWidgetFormInputText(),
      'hot_direccion'   => new sfWidgetFormInputText(),
      'hot_telefono'    => new sfWidgetFormInputText(),
      'hot_web'         => new sfWidgetFormInputText(),
      'hot_email'       => new sfWidgetFormInputText(),
      'hot_valor_noche' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'hot_codigo'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('hot_codigo')), 'empty_value' => $this->getObject()->get('hot_codigo'), 'required' => false)),
      'hot_nombre'      => new sfValidatorString(array('max_length' => 100)),
      'hot_direccion'   => new sfValidatorString(array('max_length' => 100)),
      'hot_telefono'    => new sfValidatorString(array('max_length' => 15)),
      'hot_web'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'hot_email'       => new sfValidatorString(array('max_length' => 150)),
      'hot_valor_noche' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('hotel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hotel';
  }

}
