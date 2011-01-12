<?php

/**
 * Reservahotel form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReservahotelForm extends BaseReservahotelForm
{
  public function configure()
  {
      $anhos = range(2000, date('Y'));
      $widget_date = new sfWidgetFormDate(array(
            'years' => array_combine($anhos, $anhos),
            'can_be_empty' => false
      ));

      $this->widgetSchema['reh_fecha_entrada'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
      ));

      $this->widgetSchema['reh_fecha_salida'] = new sfWidgetFormJQueryDate(array(
            'config' => '{changeMonth: true, changeYear: true}',
            'culture' => 'es',
            'date_widget' => $widget_date
      ));

      $this->widgetSchema->setLabels(array(
          'reh_hot_codigo' => 'Hotel:',
          'reh_fecha_entrada' => 'Fecha de Entrada:',
          'reh_fecha_salida' => 'Fecha de Salida:',
          'reh_hora_llegada' => 'Hora de Llegada:',
          'reh_hora_salida' => 'Hora de Salida:',
          'reh_localizador' => 'Localizador',
          'reh_dias_estadia' => 'Nro de D&iacute;as:',
          'reh_noches_estadia' => 'Nro de Noches:'
      ));
  }
}
