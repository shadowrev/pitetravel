<?php

/**
 * Clinica form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClinicaForm extends BaseClinicaForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'cli_nombre' => '*Nombre de la Cl&iacute;nica:',
          'cli_direccion' => 'Direcci&oacute;n:',
          'cli_telefono' => 'Tel&eacute;fono:'
      ));
  }
}
