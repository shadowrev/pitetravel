<?php

/**
 * Menu filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenuFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'men_desayuno'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'men_almuerzo'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'men_comida'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'men_dtp_codigo' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dietapaciente'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'men_desayuno'   => new sfValidatorPass(array('required' => false)),
      'men_almuerzo'   => new sfValidatorPass(array('required' => false)),
      'men_comida'     => new sfValidatorPass(array('required' => false)),
      'men_dtp_codigo' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Dietapaciente'), 'column' => 'dtp_codigo')),
    ));

    $this->widgetSchema->setNameFormat('menu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Menu';
  }

  public function getFields()
  {
    return array(
      'men_codigo'     => 'Number',
      'men_desayuno'   => 'Text',
      'men_almuerzo'   => 'Text',
      'men_comida'     => 'Text',
      'men_dtp_codigo' => 'ForeignKey',
    );
  }
}
