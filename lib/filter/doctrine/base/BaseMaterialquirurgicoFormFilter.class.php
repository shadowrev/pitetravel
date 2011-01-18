<?php

/**
 * Materialquirurgico filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMaterialquirurgicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'maq_nombre' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maq_valor'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'maq_nombre' => new sfValidatorPass(array('required' => false)),
      'maq_valor'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('materialquirurgico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materialquirurgico';
  }

  public function getFields()
  {
    return array(
      'maq_codigo' => 'Number',
      'maq_nombre' => 'Text',
      'maq_valor'  => 'Number',
    );
  }
}
