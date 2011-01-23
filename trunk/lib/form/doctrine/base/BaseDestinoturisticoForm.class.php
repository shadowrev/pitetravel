<?php

/**
 * Destinoturistico form base class.
 *
 * @method Destinoturistico getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDestinoturisticoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dst_codigo'  => new sfWidgetFormInputHidden(),
      'dst_destino' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'dst_codigo'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('dst_codigo')), 'empty_value' => $this->getObject()->get('dst_codigo'), 'required' => false)),
      'dst_destino' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('destinoturistico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Destinoturistico';
  }

}
