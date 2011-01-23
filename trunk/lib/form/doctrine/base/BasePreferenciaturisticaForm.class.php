<?php

/**
 * Preferenciaturistica form base class.
 *
 * @method Preferenciaturistica getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePreferenciaturisticaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prt_pac_codigo' => new sfWidgetFormInputHidden(),
      'prt_dst_codigo' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'prt_pac_codigo' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('prt_pac_codigo')), 'empty_value' => $this->getObject()->get('prt_pac_codigo'), 'required' => false)),
      'prt_dst_codigo' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('prt_dst_codigo')), 'empty_value' => $this->getObject()->get('prt_dst_codigo'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preferenciaturistica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preferenciaturistica';
  }

}
