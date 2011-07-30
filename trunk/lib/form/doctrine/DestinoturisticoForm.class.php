<?php

/**
 * Destinoturistico form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DestinoturisticoForm extends BaseDestinoturisticoForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'dst_destino' => 'Destino Tur&iacute;stico'
      ));
  }
}
