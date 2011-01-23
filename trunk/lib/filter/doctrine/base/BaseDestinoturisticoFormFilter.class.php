<?php

/**
 * Destinoturistico filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDestinoturisticoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dst_destino' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'dst_destino' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('destinoturistico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Destinoturistico';
  }

  public function getFields()
  {
    return array(
      'dst_codigo'  => 'Number',
      'dst_destino' => 'Text',
    );
  }
}
