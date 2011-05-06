<?php

/**
 * Postoperatorio form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostoperatorioForm extends BasePostoperatorioForm
{
    public function configure()
    {
        $this->widgetSchema->setLabels(array(
            'pos_hora_cita_col' => 'Hora Cita M&eacute;dica en el Exterior:',
            'pos_valoracion' => '*Descripci&oacute;n del Procedimiento:',
            'pos_recomendaciones' => '*Recomendaciones:',
            'pos_tipo_anestesia' => '*Tipo de Anestesia:',
            'pos_hora_cirugia' => 'Hora de la Cirug&iacute;a:',
            'pos_enf_codigo' => 'Enfermera:',
            'pos_info_especialista' => '*Informe del Especialista:',
            'pos_observaciones' => '*Observaciones:'
        ));
    }
}
