<?php

/**
 * Agencia form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AgenciaForm extends BaseAgenciaForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'agn_nombre' => '*Nombre de la Agencia:',
          'agn_descripcion' => 'Descripci&oacute;n:',
          'agn_telefono' => '*Tel&eacute;fono:'
      ));
  }
}
