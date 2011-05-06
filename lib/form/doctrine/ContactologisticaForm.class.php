<?php

/**
 * Contactologistica form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactologisticaForm extends BaseContactologisticaForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'clo_nombre' => '*Nombre del Contacto:',
            'clo_identificacion' => '*Identificaci&oacute;n:',
            'clo_telefono' => '*Tel&eacute;fono:',
            'clo_email' => 'Correo Electr&oacute;nico:',
            'clo_direccion' => 'Direcci&oacute;n:',
            'clo_caracteristica' => 'Informaci&oacute;n Adicional:'
        ));
    }

    public function cambiarNombreFormulario($nombre_alternativo)
    {
        $this->widgetSchema->setNameFormat($nombre_alternativo . '[%s]');
    }
}
