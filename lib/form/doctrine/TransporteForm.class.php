<?php

/**
 * Transporte form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TransporteForm extends BaseTransporteForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'trans_nombre' => 'Nombre del Transportador:',
            'trans_identificacion' => 'Identificaci&oacute;n:',
            'trans_telefono1' => 'Tel&eacute;fono Fijo:',
            'trans_telefono2' => 'Tel&eacute;fono M&oacute;vil:',
            'trans_direccion' => 'Direcci&oacute;n:',
            'trans_placa_vehiculo' => 'Placa del Veh&iacute;culo:',
            'trans_tipo_vehiculo' => 'Tipo de Vehiculo:',
            'trans_nombre_companhia' => 'Compa&ntilde;&iacute;a Transportadora:',
            'trans_numero_companhia' => 'NIT Compa&ntilde;&iacute;a',
            'trans_telefono_companhia' => 'Tel&eacute;fono:',
        ));
    }
}
