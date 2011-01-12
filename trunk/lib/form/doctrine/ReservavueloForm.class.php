<?php

/**
 * Reservavuelo form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReservavueloForm extends BaseReservavueloForm
{
  public function configure()
  {
      $anhos = range(2000, date('Y'));
      $widget_date = new sfWidgetFormDate(array(
            'years' => array_combine($anhos, $anhos),
            'can_be_empty' => false
      ));

      $this->widgetSchema['vue_fecha_ida'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
      ));

      $this->widgetSchema['vue_fecha_regreso'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
      ));

      $this->widgetSchema->setLabels(array(
          'vue_origen' => 'Origen:',
          'vue_destino' => 'Destino:',
          'vue_fecha_ida' => 'Fecha de Partida:',
          'vue_fecha_regreso' => 'Fecha de Llegada al Origen:',
          'vue_nro_vuelo_ida' => 'Localizador/C&oacute;digo de Vuelo:',
          'vue_nro_vuelo_regreso' => 'Localizador/C&oacute;digo de Vuelo:',
          'vue_hora_salida_ida' => 'Hora de Salida (Vuelo de Partida):',
          'vue_hora_llegada_ida' => 'Hora de Llegada (Vuelo de Partida):',
          'vue_hora_salida_vuelta' => 'Hora de Salida (Vuelo de Regreso):',
          'vue_hora_llegada_vuelta' => 'Hora de Llegada (Vuelo de Regreso):'
      ));
  }
}
