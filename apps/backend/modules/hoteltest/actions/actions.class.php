<?php

/**
 * hoteltest actions.
 *
 * @package    pitetravel
 * @subpackage hoteltest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hoteltestActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->hotels = Doctrine_Core::getTable('Hotel')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new HotelForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new HotelForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($hotel = Doctrine_Core::getTable('Hotel')->find(array($request->getParameter('hot_codigo'))), sprintf('Object hotel does not exist (%s).', $request->getParameter('hot_codigo')));
    $this->form = new HotelForm($hotel);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($hotel = Doctrine_Core::getTable('Hotel')->find(array($request->getParameter('hot_codigo'))), sprintf('Object hotel does not exist (%s).', $request->getParameter('hot_codigo')));
    $this->form = new HotelForm($hotel);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($hotel = Doctrine_Core::getTable('Hotel')->find(array($request->getParameter('hot_codigo'))), sprintf('Object hotel does not exist (%s).', $request->getParameter('hot_codigo')));
    $hotel->delete();

    $this->redirect('hoteltest/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $hotel = $form->save();

      $this->redirect('hoteltest/edit?hot_codigo='.$hotel->getHotCodigo());
    }
  }
}
