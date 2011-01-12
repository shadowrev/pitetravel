<?php

/**
 * Elementosxintervencion form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ElementosxintervencionForm extends BaseElementosxintervencionForm
{
  public function configure()
  {
      $this->widgetSchema['exi_maq_codigo'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materialquirurgico'), 'add_empty' => false));

      $this->widgetSchema->setLabels(array(
          'exi_maq_codigo' => 'Elemento:',
          'exi_cantidad' => 'Cantidad:'
      ));
  }
}
