<?php

/**
 * Enfermera form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EnfermeraForm extends BaseEnfermeraForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'enf_nombre' => 'Nombre:',
          'enf_valor_servicio' => 'Costo del Servicio:'
      ));
  }
}
