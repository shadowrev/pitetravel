<?php

/**
 * Logistica form base class.
 *
 * @method Logistica getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogisticaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'log_codigo'                 => new sfWidgetFormInputHidden(),
      'log_tra_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'log_reh_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Reservahotel'), 'add_empty' => false)),
      'log_vue_codigo'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Reservavuelo'), 'add_empty' => false)),
      'log_trans_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Transporte'), 'add_empty' => false)),
      'log_clo_codigo_responsable' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica'), 'add_empty' => false)),
      'log_clo_codigo_guia'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica_3'), 'add_empty' => false)),
      'log_observaciones'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'log_codigo'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('log_codigo')), 'empty_value' => $this->getObject()->get('log_codigo'), 'required' => false)),
      'log_tra_codigo'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'log_reh_codigo'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Reservahotel'))),
      'log_vue_codigo'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Reservavuelo'))),
      'log_trans_codigo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Transporte'))),
      'log_clo_codigo_responsable' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica'))),
      'log_clo_codigo_guia'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Contactologistica_3'))),
      'log_observaciones'          => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('logistica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Logistica';
  }

}
