<?php

/**
 * Menu form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuForm extends BaseMenuForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'men_desayuno' => 'Desayuno:',
          'men_almuerzo' => 'Almuerzo:',
          'men_comida' => 'Comida:'
      ));
  }
}