<?php

/**
 * Preoperatorio form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PreoperatorioForm extends BasePreoperatorioForm
{
    public function configure()
    {
        $anhos = range(2000, date('Y'));
        $widget_date = new sfWidgetFormDate(array(
            'years' => array_combine($anhos, $anhos),
            'can_be_empty' => false
        ));

        $this->widgetSchema['preo_fecha_cirugia'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
        ));

        $this->widgetSchema['preo_fecha_cita_ext'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
        ));

        $this->widgetSchema['preo_vih'] = new sfWidgetFormChoice(array(
            'choices' => array(
                0 => 'NO',
                1 => 'SI'
            ),
            'expanded' => false
        ));

        $this->widgetSchema['preo_rx_torax'] = new sfWidgetFormTextarea();
        $this->widgetSchema['preo_electro'] = new sfWidgetFormTextarea();

        $this->widgetSchema->setLabels(array(
            'preo_glicemia' => '*Glicemia en Ayunas:',
            'preo_tiempo_coagulacion' => '*Tiempos de Coagulaci&oacute;n',
            'preo_tpt' => '*PT:',
            'preo_ptt' => '*PTT:',
            'preo_creatinina' => '*Creatinina:',
            'preo_nitrogeno_ureico' => '*Nitr&oacute;geno Ur&eacute;ico:',
            'preo_parcial_orina' => '*Parcial de Orina',
            'preo_electro' => '*Electrocardiograma (Lectura):',
            'preo_rx_torax' => '*Rx de T&oacute;rax:',
            'preo_pa_lateral' => '*PA y Lateral:', // Este no va
            'preo_prueba_esfuerzo' => '*Prueba de Esfuerzo:',
            'preo_hg_glicosilada' => '*Hb Glicosilada:',
            'preo_tsh' => '*TSH:',
            'preo_t3' => '*T3:',
            'preo_t4' => '*T4:',
            'preo_vih' => '*VIH',
            'preo_fecha_cirugia' => 'Fecha de la Cirug&iacute;a:',
            'preo_hora_cirugia' => 'Hora Cirug&iacute;a:',
            'preo_fecha_cita_ext' => 'Fecha de la Cita en Destino:',
            'preo_hora_cita_ext' => 'Hora Cita:',
            'preo_cli_codigo' => 'Cl&iacute;nica:',
            'preo_enf_codigo' => 'Enfermera:',
            'preo_informe_especialista' => 'Informe del Especialista:',
            'preo_observaciones' => 'Observaciones:',
            'preo_nombre_especialista' => 'Especialista:',
            'preo_correo_especialista' => 'Correo Electr&oacute;nico del Especialista:',
        ));
        
    }
}
