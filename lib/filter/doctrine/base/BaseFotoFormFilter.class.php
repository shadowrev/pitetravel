<?php

/**
 * Foto filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fot_nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fot_uri_imagen'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fot_preoperatoria' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fot_preo_codigo'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Preoperatorio'), 'add_empty' => true)),
      'pos_codigo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Postoperatorio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fot_nombre'        => new sfValidatorPass(array('required' => false)),
      'fot_uri_imagen'    => new sfValidatorPass(array('required' => false)),
      'fot_preoperatoria' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fot_preo_codigo'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Preoperatorio'), 'column' => 'preo_codigo')),
      'pos_codigo'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Postoperatorio'), 'column' => 'pos_codigo')),
    ));

    $this->widgetSchema->setNameFormat('foto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Foto';
  }

  public function getFields()
  {
    return array(
      'fot_codigo'        => 'Number',
      'fot_nombre'        => 'Text',
      'fot_uri_imagen'    => 'Text',
      'fot_preoperatoria' => 'Number',
      'fot_preo_codigo'   => 'ForeignKey',
      'pos_codigo'        => 'ForeignKey',
    );
  }
}
