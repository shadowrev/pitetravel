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
      
      $this->validatorSchema['exi_maq_codigo'] = new sfValidatorNumber(array('required' => true));
      $this->validatorSchema['exi_preo_codigo'] = new sfValidatorNumber(array('required' => true));
  }

  public function setHiddenForm($id_elemento)
  {
      $this->setWidget('exi_maq_codigo', new sfWidgetFormInputHidden());
      $this->setWidget('exi_cantidad', new sfWidgetFormInputHidden());
      $this->widgetSchema->setNameFormat($this->getName() . '_' . (empty($id_elemento) ? '0' : $id_elemento) . '[%s]');
  }
}
