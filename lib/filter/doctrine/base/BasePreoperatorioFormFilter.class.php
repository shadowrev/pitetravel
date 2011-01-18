<?php

/**
 * Preoperatorio filter form base class.
 *
 * @package    pitetravel
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePreoperatorioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'preo_tra_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tratamiento'), 'add_empty' => true)),
      'preo_glicemia'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_tiempo_coagulacion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_tpt'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_ptt'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_creatinina'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_nitrogeno_ureico'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_parcial_orina'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_electro'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_rx_torax'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_pa_lateral'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_prueba_esfuerzo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_hg_glicosilada'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_tsh'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_t3'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_t4'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_vih'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preo_fecha_cita_ext'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'preo_hora_cita_ext'        => new sfWidgetFormFilterInput(),
      'preo_fecha_cirugia'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'preo_hora_cirugia'         => new sfWidgetFormFilterInput(),
      'preo_cli_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Clinica'), 'add_empty' => true)),
      'preo_enf_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Enfermera'), 'add_empty' => true)),
      'preo_informe_especialista' => new sfWidgetFormFilterInput(),
      'preo_observaciones'        => new sfWidgetFormFilterInput(),
      'preo_med_codigo'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => true)),
      'preo_nombre_especialista'  => new sfWidgetFormFilterInput(),
      'preo_correo_especialista'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'preo_tra_codigo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tratamiento'), 'column' => 'tra_codigo')),
      'preo_glicemia'             => new sfValidatorPass(array('required' => false)),
      'preo_tiempo_coagulacion'   => new sfValidatorPass(array('required' => false)),
      'preo_tpt'                  => new sfValidatorPass(array('required' => false)),
      'preo_ptt'                  => new sfValidatorPass(array('required' => false)),
      'preo_creatinina'           => new sfValidatorPass(array('required' => false)),
      'preo_nitrogeno_ureico'     => new sfValidatorPass(array('required' => false)),
      'preo_parcial_orina'        => new sfValidatorPass(array('required' => false)),
      'preo_electro'              => new sfValidatorPass(array('required' => false)),
      'preo_rx_torax'             => new sfValidatorPass(array('required' => false)),
      'preo_pa_lateral'           => new sfValidatorPass(array('required' => false)),
      'preo_prueba_esfuerzo'      => new sfValidatorPass(array('required' => false)),
      'preo_hg_glicosilada'       => new sfValidatorPass(array('required' => false)),
      'preo_tsh'                  => new sfValidatorPass(array('required' => false)),
      'preo_t3'                   => new sfValidatorPass(array('required' => false)),
      'preo_t4'                   => new sfValidatorPass(array('required' => false)),
      'preo_vih'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'preo_fecha_cita_ext'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'preo_hora_cita_ext'        => new sfValidatorPass(array('required' => false)),
      'preo_fecha_cirugia'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'preo_hora_cirugia'         => new sfValidatorPass(array('required' => false)),
      'preo_cli_codigo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Clinica'), 'column' => 'cli_codigo')),
      'preo_enf_codigo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Enfermera'), 'column' => 'enf_codigo')),
      'preo_informe_especialista' => new sfValidatorPass(array('required' => false)),
      'preo_observaciones'        => new sfValidatorPass(array('required' => false)),
      'preo_med_codigo'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Medico'), 'column' => 'med_codigo')),
      'preo_nombre_especialista'  => new sfValidatorPass(array('required' => false)),
      'preo_correo_especialista'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preoperatorio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preoperatorio';
  }

  public function getFields()
  {
    return array(
      'preo_codigo'               => 'Number',
      'preo_tra_codigo'           => 'ForeignKey',
      'preo_glicemia'             => 'Text',
      'preo_tiempo_coagulacion'   => 'Text',
      'preo_tpt'                  => 'Text',
      'preo_ptt'                  => 'Text',
      'preo_creatinina'           => 'Text',
      'preo_nitrogeno_ureico'     => 'Text',
      'preo_parcial_orina'        => 'Text',
      'preo_electro'              => 'Text',
      'preo_rx_torax'             => 'Text',
      'preo_pa_lateral'           => 'Text',
      'preo_prueba_esfuerzo'      => 'Text',
      'preo_hg_glicosilada'       => 'Text',
      'preo_tsh'                  => 'Text',
      'preo_t3'                   => 'Text',
      'preo_t4'                   => 'Text',
      'preo_vih'                  => 'Number',
      'preo_fecha_cita_ext'       => 'Date',
      'preo_hora_cita_ext'        => 'Text',
      'preo_fecha_cirugia'        => 'Date',
      'preo_hora_cirugia'         => 'Text',
      'preo_cli_codigo'           => 'ForeignKey',
      'preo_enf_codigo'           => 'ForeignKey',
      'preo_informe_especialista' => 'Text',
      'preo_observaciones'        => 'Text',
      'preo_med_codigo'           => 'ForeignKey',
      'preo_nombre_especialista'  => 'Text',
      'preo_correo_especialista'  => 'Text',
    );
  }
}
