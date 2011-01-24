<?php

/**
 * Contactologistica form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ResponsableLogisticaForm extends LogisticaForm
{
    public function configure()
    {
        parent::configure();

        unset($this->widgetSchema['log_tra_codigo']);
        unset($this->widgetSchema['log_reh_codigo']);
        unset($this->widgetSchema['log_vue_codigo']);
        unset($this->widgetSchema['log_trans_codigo']);
        unset($this->widgetSchema['log_clo_codigo_responsable']);
        unset($this->widgetSchema['log_clo_codigo_guia']);
        unset($this->widgetSchema['log_observaciones_transporte']);

        unset($this->validatorSchema['log_tra_codigo']);
        unset($this->validatorSchema['log_reh_codigo']);
        unset($this->validatorSchema['log_vue_codigo']);
        unset($this->validatorSchema['log_trans_codigo']);
        unset($this->validatorSchema['log_clo_codigo_responsable']);
        unset($this->validatorSchema['log_clo_codigo_guia']);
        unset($this->validatorSchema['log_observaciones_transporte']);
    }
}
