<?php

/**
 * Altapostoperatoria form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AltapostoperatoriaForm extends BaseAltapostoperatoriaForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'apo_cli_codigo' => 'Cl&iacute;nica:',
            'apo_exploracion' => 'Exploraci&oacute;n',
            'apo_info_especialista' => 'Informe del Especialista:',
            'apo_tratamiento' => 'Tratamiento',
            'apo_observaciones' => 'Observaciones'
        ));
    }
}
