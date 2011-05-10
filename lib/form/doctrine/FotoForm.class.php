<?php

/**
 * Foto form.
 *
 * @package    pitetravel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FotoForm extends BaseFotoForm
{
    public function configure()
    {
      $this->widgetSchema['fot_uri_imagen'] = new sfWidgetFormInputFile();
      $this->widgetSchema['fot_preoperatoria'] = new sfWidgetFormChoice(array(
          'choices' => array(
              0 => 'NO',
              1 => 'SI'
          )
      ));

      $this->widgetSchema->setLabels(array(
          'fot_nombre' => 'Nombre de la Foto:',
          'fot_uri_imagen' => 'Subir Foto',
          'fot_preoperatoria' => 'Preoperatoria?:'
      ));

      $this->validatorSchema['fot_uri_imagen'] = new sfValidatorFile(array(
          'required' => true,
          'path' => sfConfig::get('sf_upload_dir') . '/fotos_pacientes'
      ));
    }

    public function cambiarGrupo($nombre_grupo)
    {
        $this->widgetSchema->setNameFormat($nombre_grupo . '[%s]');
    }

    public function quitarCampoFoto()
    {
        unset($this->widgetSchema['fot_uri_imagen']);
        //unset($this->validatorSchema['fot_uri_imagen']);
    }
}
