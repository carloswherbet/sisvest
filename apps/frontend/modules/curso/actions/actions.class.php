<?php

/**
 * curso actions.
 *
 * @package    ProjetoUnice
 * @subpackage curso
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cursoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->curs_os = Doctrine_Core::getTable('CURSO')->getCursosAtivos();
      
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->curso = Doctrine_Core::getTable('CURSO')->find(array($request->getParameter('id_curso')));
    $this->forward404Unless($this->curso);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CURSOForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CURSOForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($curso = Doctrine_Core::getTable('CURSO')->find(array($request->getParameter('id_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('id_curso')));
    $this->form = new CURSOForm($curso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($curso = Doctrine_Core::getTable('CURSO')->find(array($request->getParameter('id_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('id_curso')));
    $this->form = new CURSOForm($curso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();

//    $this->forward404Unless($curso = Doctrine_Core::getTable('CURSO')->find(array($request->getParameter('id_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('id_curso')));
//    $curso->delete();
     $qtd = Doctrine_Query::create()
            ->select('count(1) as vestibular')
            ->from('VESTIBULARCURSO a')
            ->leftJoin('a.VESTIBULAR b')
            ->where('a.id_curso = ?', $request->getParameter('id_curso'))
            ->addwhere('b.sg_situacao != ?', "R")
            ->fetchArray();

     if ($qtd[0]['vestibular'] > 0) {
         $this->getUser()->setFlash('error', 'Não foi possivel excluir. Este curso está sendo ofertado em um ou mais vestibulares no momento');
        
     } else {
        $curso =  Doctrine::getTable('CURSO')->find($request->getParameter('id_curso'));
        $curso->sg_flag = 'I';
        $curso->save();
         $this->getUser()->setFlash('notice', 'Curso Excluido com Sucesso');
        
        
     }
     $this->redirect('curso/index');

    

  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $curso = $form->save();
      $this->getUser()->setFlash('notice', 'Operação Realizada com Sucesso!');
      $this->redirect('curso/index');
    }
  }
}
