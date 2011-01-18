<?php

/**
 * Contactologistica filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactologisticaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clo_nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clo_identificacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clo_telefono'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clo_email'          => new sfWidgetFormFilterInput(),
      'clo_direccion'      => new sfWidgetFormFilterInput(),
      'clo_caracteristica' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'clo_nombre'         => new sfValidatorPass(array('required' => false)),
      'clo_identificacion' => new sfValidatorPass(array('required' => false)),
      'clo_telefono'       => new sfValidatorPass(array('required' => false)),
      'clo_email'          => new sfValidatorPass(array('required' => false)),
      'clo_direccion'      => new sfValidatorPass(array('required' => false)),
      'clo_caracteristica' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contactologistica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contactologistica';
  }

  public function getFields()
  {
    return array(
      'clo_codigo'         => 'Number',
      'clo_nombre'         => 'Text',
      'clo_identificacion' => 'Text',
      'clo_telefono'       => 'Text',
      'clo_email'          => 'Text',
      'clo_direccion'      => 'Text',
      'clo_caracteristica' => 'Text',
    );
  }
}
