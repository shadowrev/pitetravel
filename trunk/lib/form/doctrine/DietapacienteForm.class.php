<?php

/**
 * Dietapaciente form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DietapacienteForm extends BaseDietapacienteForm
{
  public function configure()
  {
      $this->widgetSchema['dtp_tipo_dieta'] = new sfWidgetFormChoice(array(
          'choices' => array(
              'PREOPERATORIA' => 'PREOPERATORIA',
              'POSTOPERATORIA' => 'POSTOPERATORIA'
          )
      ));

      $this->widgetSchema->setLabels(array(
          'dtp_tipo_dieta' => 'Tipo de Dieta:',
          'dtp_recomendaciones' => 'Recomendaciones:'
      ));
  }
}
