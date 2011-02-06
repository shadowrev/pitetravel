<?php

/**
 * Paciente form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PacienteForm extends BasePacienteForm
{
    public function configure()
    {
        $anhos = range(1950, date('Y'));
        $widget_date = new sfWidgetFormDate(array(
            'years' => array_combine($anhos, $anhos),
            'can_be_empty' => false
        ));

        $this->widgetSchema['pac_fecha_nacimiento'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
        ));

        $this->widgetSchema['destinoturistico_list'] = new sfWidgetFormDoctrineChoice(array(
            'multiple' => true,
            'expanded' => true,
            'model' => 'Destinoturistico'
        ));

        $this->widgetSchema->setLabels(array(
            'pac_nombre' => 'Nombres y Apellidos:',
            'pac_identificacion' => 'Documento de Identidad:',
            'pac_fecha_nacimiento' => 'Fecha de Nacimiento:',
            'pac_telefono1' => 'Tel&eacute;fono Fijo:',
            'pac_telefono2' => 'Tel&eacute;fono M&oacute;vil:',
            'pac_email' => 'Correo Electr&oacute;nico:',
            'pac_direccion' => 'Direcci&oacute;n:',
            'pac_ciudad' => 'Localidad/Ciudad:',
            'pac_estado' => 'Provincia/Estado:',
            'pac_pais' => 'Pa&iacute;s:',
            'pac_cod_postal' => 'C&oacute;digo Postal:'
        ));

        //$this->setValidators();
    }
}
