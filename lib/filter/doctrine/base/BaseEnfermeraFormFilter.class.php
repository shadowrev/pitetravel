<?php

/**
 * Enfermera filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEnfermeraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'enf_nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'enf_valor_servicio' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'enf_nombre'         => new sfValidatorPass(array('required' => false)),
      'enf_valor_servicio' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('enfermera_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Enfermera';
  }

  public function getFields()
  {
    return array(
      'enf_codigo'         => 'Number',
      'enf_nombre'         => 'Text',
      'enf_valor_servicio' => 'Number',
    );
  }
}
