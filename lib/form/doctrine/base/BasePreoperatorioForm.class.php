<?php

/**
 * Preoperatorio form base class.
 *
 * @method Preoperatorio getObject() Returns the current form's model object
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePreoperatorioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'preo_codigo'               => new sfWidgetFormInputHidden(),
      'preo_tra_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => false)),
      'preo_glicemia'             => new sfWidgetFormInputText(),
      'preo_tiempo_coagulacion'   => new sfWidgetFormInputText(),
      'preo_tpt'                  => new sfWidgetFormInputText(),
      'preo_ptt'                  => new sfWidgetFormInputText(),
      'preo_creatinina'           => new sfWidgetFormInputText(),
      'preo_nitrogeno_ureico'     => new sfWidgetFormInputText(),
      'preo_parcial_orina'        => new sfWidgetFormInputText(),
      'preo_electro'              => new sfWidgetFormInputText(),
      'preo_rx_torax'             => new sfWidgetFormInputText(),
      'preo_pa_lateral'           => new sfWidgetFormInputText(),
      'preo_prueba_esfuerzo'      => new sfWidgetFormInputText(),
      'preo_hg_glicosilada'       => new sfWidgetFormInputText(),
      'preo_tsh'                  => new sfWidgetFormInputText(),
      'preo_t3'                   => new sfWidgetFormInputText(),
      'preo_t4'                   => new sfWidgetFormInputText(),
      'preo_vih'                  => new sfWidgetFormInputText(),
      'preo_fecha_cita_ext'       => new sfWidgetFormDate(),
      'preo_hora_cita_ext'        => new sfWidgetFormTime(),
      'preo_fecha_cirugia'        => new sfWidgetFormDate(),
      'preo_hora_cirugia'         => new sfWidgetFormTime(),
      'preo_cli_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'), 'add_empty' => true)),
      'preo_enf_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'), 'add_empty' => true)),
      'preo_informe_especialista' => new sfWidgetFormTextarea(),
      'preo_observaciones'        => new sfWidgetFormTextarea(),
      'preo_med_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => true)),
      'preo_nombre_especialista'  => new sfWidgetFormInputText(),
      'preo_correo_especialista'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'preo_codigo'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('preo_codigo')), 'empty_value' => $this->getObject()->get('preo_codigo'), 'required' => false)),
      'preo_tra_codigo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'))),
      'preo_glicemia'             => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_tiempo_coagulacion'   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_tpt'                  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_ptt'                  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_creatinina'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_nitrogeno_ureico'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_parcial_orina'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_electro'              => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_rx_torax'             => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_pa_lateral'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_prueba_esfuerzo'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_hg_glicosilada'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_tsh'                  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_t3'                   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_t4'                   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'preo_vih'                  => new sfValidatorInteger(),
      'preo_fecha_cita_ext'       => new sfValidatorDate(array('required' => false)),
      'preo_hora_cita_ext'        => new sfValidatorTime(array('required' => false)),
      'preo_fecha_cirugia'        => new sfValidatorDate(array('required' => false)),
      'preo_hora_cirugia'         => new sfValidatorTime(array('required' => false)),
      'preo_cli_codigo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'), 'required' => false)),
      'preo_enf_codigo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'), 'required' => false)),
      'preo_informe_especialista' => new sfValidatorString(array('required' => false)),
      'preo_observaciones'        => new sfValidatorString(array('required' => false)),
      'preo_med_codigo'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'required' => false)),
      'preo_nombre_especialista'  => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'preo_correo_especialista'  => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preoperatorio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preoperatorio';
  }

}
