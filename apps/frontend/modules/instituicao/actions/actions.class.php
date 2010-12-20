<?php

/**
 * instituicao actions.
 *
 * @package    ProjetoUnice
 * @subpackage instituicao
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class instituicaoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->instituica_os = Doctrine_Core::getTable('INSTITUICAO')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(array($request->getParameter('id_instituicao')));
    $this->forward404Unless($this->instituicao);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new INSTITUICAOForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new INSTITUICAOForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(array($request->getParameter('id_instituicao'))), sprintf('Object instituicao does not exist (%s).', $request->getParameter('id_instituicao')));
    $this->form = new INSTITUICAOForm($instituicao);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(array($request->getParameter('id_instituicao'))), sprintf('Object instituicao does not exist (%s).', $request->getParameter('id_instituicao')));
    $this->form = new INSTITUICAOForm($instituicao);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(array($request->getParameter('id_instituicao'))), sprintf('Object instituicao does not exist (%s).', $request->getParameter('id_instituicao')));
    $instituicao->delete();

    $this->redirect('instituicao/1');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $instituicao = $form->save();

      $this->redirect('instituicao/'.$instituicao->getIdInstituicao());
    }
  }
}
