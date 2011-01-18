<?php

/**
 * Elementosxintervencion form base class.
 *
 * @method Elementosxintervencion getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseElementosxintervencionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'exi_preo_codigo' => new sfWidgetFormInputHidden(),
      'exi_maq_codigo'  => new sfWidgetFormInputHidden(),
      'exi_cantidad'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'exi_preo_codigo' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('exi_preo_codigo')), 'empty_value' => $this->getObject()->get('exi_preo_codigo'), 'required' => false)),
      'exi_maq_codigo'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('exi_maq_codigo')), 'empty_value' => $this->getObject()->get('exi_maq_codigo'), 'required' => false)),
      'exi_cantidad'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('elementosxintervencion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Elementosxintervencion';
  }

}
