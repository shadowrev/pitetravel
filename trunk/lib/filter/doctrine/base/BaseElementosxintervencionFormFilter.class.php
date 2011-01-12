<?php

/**
 * Elementosxintervencion filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseElementosxintervencionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'exi_cantidad'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'exi_cantidad'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('elementosxintervencion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Elementosxintervencion';
  }

  public function getFields()
  {
    return array(
      'exi_preo_codigo' => 'Number',
      'exi_maq_codigo'  => 'Number',
      'exi_cantidad'    => 'Number',
    );
  }
}
