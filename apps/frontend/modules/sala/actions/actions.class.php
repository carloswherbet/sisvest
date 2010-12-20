<?php

/**
 * sala actions.
 *
 * @package    ProjetoUnice
 * @subpackage sala
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class salaActions extends sfActions
{

    public function executeListVestibulandosPorSala() {



    }
    public function executeListVestibulares() {
        $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')->getVestibularesAbertos();

    }


    public function executeAlocarVestibulandos(sfWebRequest $request) {
        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular')));
            if ($this->vestibular->getSgSituacao() != "E") {
                $this->getUser()->setFlash('error','Vestibular com pendências, impossível alocar vestibulandos.');
                $this->redirect('vestibular');
          }

        $this->getUser()->setFlash('notice','Alocação dos vestibulandos em Salas realizada com sucesso!');
        Doctrine_Core::getTable('SALA')->alocarVestibulandos($request->getParameter('id_vestibular'));
        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
        $this->redirect('vestibular/index');


    }
    public function executeIndex(sfWebRequest $request)
  {
    $this->sal_as = Doctrine_Core::getTable('SALA')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sala = Doctrine_Core::getTable('SALA')->find(array($request->getParameter('id_sala')));
    $this->forward404Unless($this->sala);

  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SALAForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SALAForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sala = Doctrine_Core::getTable('SALA')->find(array($request->getParameter('id_sala'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id_sala')));
    $this->form = new SALAForm($sala);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sala = Doctrine_Core::getTable('SALA')->find(array($request->getParameter('id_sala'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id_sala')));
    $this->form = new SALAForm($sala);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sala = Doctrine_Core::getTable('SALA')->find(array($request->getParameter('id_sala'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id_sala')));
    $sala->delete();

    $this->redirect('sala/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sala = $form->save();
       $this->getUser()->setFlash('notice', 'Operação Realizada com Sucesso!');
       $this->redirect('sala/index');
    }
  }
}
