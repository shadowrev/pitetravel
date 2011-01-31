<?php

/**
 * Contactologistica form base class.
 *
 * @method Contactologistica getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactologisticaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clo_codigo'         => new sfWidgetFormInputHidden(),
      'clo_nombre'         => new sfWidgetFormInputText(),
      'clo_identificacion' => new sfWidgetFormInputText(),
      'clo_telefono'       => new sfWidgetFormInputText(),
      'clo_email'          => new sfWidgetFormInputText(),
      'clo_direccion'      => new sfWidgetFormInputText(),
      'clo_caracteristica' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'clo_codigo'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('clo_codigo')), 'empty_value' => $this->getObject()->get('clo_codigo'), 'required' => false)),
      'clo_nombre'         => new sfValidatorString(array('max_length' => 50)),
      'clo_identificacion' => new sfValidatorString(array('max_length' => 30)),
      'clo_telefono'       => new sfValidatorString(array('max_length' => 15)),
      'clo_email'          => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'clo_direccion'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'clo_caracteristica' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contactologistica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contactologistica';
  }

}
