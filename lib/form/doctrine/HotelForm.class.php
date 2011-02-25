<?php

/**
 * Hotel form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HotelForm extends BaseHotelForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'hot_nombre' => 'Nombre del Hotel:',
            'hot_direccion' => 'Direcci&oacute;n:',
            'hot_telefono' => 'Tel&eacute;fono:',
            'hot_web' => 'P&aacute;gina Web:',
            'hot_email' => 'Correo Electr&oacute;nico:',
            'hot_valor_noche' => 'Costo x Noche:'
        ));
    }
}
