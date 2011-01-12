<?php

/**
 * Materialquirurgico form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MaterialquirurgicoForm extends BaseMaterialquirurgicoForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'maq_nombre' => 'Elemento:',
          'maq_valor' => 'Valor:'
      ));
  }
}
