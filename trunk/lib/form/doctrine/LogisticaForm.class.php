<?php

/**
 * Logistica form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LogisticaForm extends BaseLogisticaForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'log_reh_codigo' => 'Reserva del Hotel:',
            'log_vue_codigo' => 'Reserva del Vuelo',
            'log_trans_codigo' => 'Transporte:',
            'log_clo_codigo_responsable' => 'Contacto:',
            'log_clo_codigo_guia' => 'Gu&iacute;a Tur&iacute;stico:',
            'log_observaciones' => 'Observaciones:',
            'log_observaciones_transporte' => 'Observaciones:'
        ));
    }
}
