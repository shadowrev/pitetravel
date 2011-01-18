<?php

/**
 * Foto form base class.
 *
 * @method Foto getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fot_codigo'        => new sfWidgetFormInputHidden(),
      'fot_nombre'        => new sfWidgetFormInputText(),
      'fot_uri_imagen'    => new sfWidgetFormInputText(),
      'fot_preoperatoria' => new sfWidgetFormInputText(),
      'fot_preo_codigo'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Preoperatorio'), 'add_empty' => true)),
      'fot_pos_codigo'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Postoperatorio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fot_codigo'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('fot_codigo')), 'empty_value' => $this->getObject()->get('fot_codigo'), 'required' => false)),
      'fot_nombre'        => new sfValidatorString(array('max_length' => 100)),
      'fot_uri_imagen'    => new sfValidatorString(array('max_length' => 150)),
      'fot_preoperatoria' => new sfValidatorInteger(array('required' => false)),
      'fot_preo_codigo'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Preoperatorio'), 'required' => false)),
      'fot_pos_codigo'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Postoperatorio'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('foto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Foto';
  }

}
