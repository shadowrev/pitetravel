<?php

/**
 * Procedimiento form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProcedimientoForm extends BaseProcedimientoForm
{
    public function configure()
    {
        $this->widgetSchema['pro_otro'] = new sfWidgetFormInputText();
        
        $this->widgetSchema->setLabels(array(
            'pro_tit_codigo' => 'Tipo de Tratamiento:',
            'pro_dtr_codigo' => 'Tratamiento:',
            'pro_otro' => 'Cual (Otro):'
        ));
    }
}
