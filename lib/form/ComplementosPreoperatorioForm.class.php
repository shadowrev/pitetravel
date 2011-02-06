<?php

/**
 * Preoperatorio form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComplementosPreoperatorioForm extends PreoperatorioForm
{
    public function configure()
    {
        parent::configure();
        
        unset($this->widgetSchema['preo_tra_codigo']);
        unset($this->widgetSchema['preo_glicemia']);
        unset($this->widgetSchema['preo_tiempo_coagulacion']);
        unset($this->widgetSchema['preo_tpt']);
        unset($this->widgetSchema['preo_ptt']);
        unset($this->widgetSchema['preo_creatinina']);
        unset($this->widgetSchema['preo_nitrogeno_ureico']);
        unset($this->widgetSchema['preo_parcial_orina']);
        unset($this->widgetSchema['preo_electro']);
        unset($this->widgetSchema['preo_rx_torax']);
        unset($this->widgetSchema['preo_pa_lateral']);
        unset($this->widgetSchema['preo_prueba_esfuerzo']);
        unset($this->widgetSchema['preo_hg_glicosilada']);
        unset($this->widgetSchema['preo_tsh']);
        unset($this->widgetSchema['preo_t3']);
        unset($this->widgetSchema['preo_t4']);
        unset($this->widgetSchema['preo_vih']);
        unset($this->widgetSchema['preo_nombre_especialista']);
        unset($this->widgetSchema['preo_correo_especialista']);

        unset($this->validatorSchema['preo_tra_codigo']);
        unset($this->validatorSchema['preo_glicemia']);
        unset($this->validatorSchema['preo_tiempo_coagulacion']);
        unset($this->validatorSchema['preo_tpt']);
        unset($this->validatorSchema['preo_ptt']);
        unset($this->validatorSchema['preo_creatinina']);
        unset($this->validatorSchema['preo_nitrogeno_ureico']);
        unset($this->validatorSchema['preo_parcial_orina']);
        unset($this->validatorSchema['preo_electro']);
        unset($this->validatorSchema['preo_rx_torax']);
        unset($this->validatorSchema['preo_pa_lateral']);
        unset($this->validatorSchema['preo_prueba_esfuerzo']);
        unset($this->validatorSchema['preo_hg_glicosilada']);
        unset($this->validatorSchema['preo_tsh']);
        unset($this->validatorSchema['preo_t3']);
        unset($this->validatorSchema['preo_t4']);
        unset($this->validatorSchema['preo_vih']);
        unset($this->validatorSchema['preo_nombre_especialista']);
        unset($this->validatorSchema['preo_correo_especialista']);


    }
}
