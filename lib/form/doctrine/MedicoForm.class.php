<?php

/**
 * Medico form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MedicoForm extends BaseMedicoForm
{
    public function configure()
    {
        $especialidades = sfConfig::get('app_especialidades');
        $this->widgetSchema['med_especialidad'] = new sfWidgetFormChoice(array(
            'multiple' => false,
            'expanded' => false,
            'choices' => array_combine($especialidades, $especialidades)
            //'choices' => array()
        ));

        $this->widgetSchema->setLabels(array(
            'med_direccion' => '*Direcci&oacute;n de Residencia:',
            'med_telefono1' => '*Tel&eacute;fono Fijo:',
            'med_telefono2' => '*Tel&eacute;fono M&oacute;vil:',
            'med_especialidad' => '*Especialidad:'
        ));
    }
}
