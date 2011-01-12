<?php

/**
 * Contacto filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'con_pac_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => true)),
      'con_nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'con_telefono1'  => new sfWidgetFormFilterInput(),
      'con_telefono2'  => new sfWidgetFormFilterInput(),
      'con_email'      => new sfWidgetFormFilterInput(),
      'con_direccion'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'con_pac_codigo' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paciente'), 'column' => 'pac_codigo')),
      'con_nombre'     => new sfValidatorPass(array('required' => false)),
      'con_telefono1'  => new sfValidatorPass(array('required' => false)),
      'con_telefono2'  => new sfValidatorPass(array('required' => false)),
      'con_email'      => new sfValidatorPass(array('required' => false)),
      'con_direccion'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contacto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacto';
  }

  public function getFields()
  {
    return array(
      'con_codigo'     => 'Number',
      'con_pac_codigo' => 'ForeignKey',
      'con_nombre'     => 'Text',
      'con_telefono1'  => 'Text',
      'con_telefono2'  => 'Text',
      'con_email'      => 'Text',
      'con_direccion'  => 'Text',
    );
  }
}
