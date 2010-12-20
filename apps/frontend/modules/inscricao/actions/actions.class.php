<?php

/**
 * inscricao actions.
 *
 * @package    ProjetoUnice
 * @subpackage inscricao
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inscricaoActions extends sfActions
{
	public function executeFormInscricoes(sfWebrequest $request) {
		$this->filters = new INSCRICAOFormFilter() ;
	}

	public function executeBuscarInscricao(sfWebrequest $request) {
		$this->inscricao = Doctrine_Core::getTable('INSCRICAO')->find($request->getParameter('id_inscricao'));
		$this->setTemplate('comprovante');

	}
    public function executeListarInscricoesPorVestibular(sfWebRequest $request) {
        $this->inscricoes = Doctrine_Core::getTable('INSCRICAO')->getInscritosVestibular($request->getParameter('id_vestibular'));

    }

    public function executeUpdateLancarPontuacao(sfWebRequest $request) {


        $inscricoes = $request->getParameter('nu_pontuacao');

        foreach ($inscricoes as $key => $value) {
            $inscricao = Doctrine::getTable('INSCRICAO')->find($key);
            $inscricao->setNuPontuacao($value);
            $inscricao->save();
            }
            $this->getUser()->setFlash('notice', 'Lançamento de Pontuação Realizada com Sucesso!');
            $this->redirect('/web/vestibulando/vestibular/'.$inscricao->VESTIBULARCURSO->getIdVestibular().'/list');



    }

    public function executeLancarPontuacao(sfWebRequest $request) {

      $inscricoes = Doctrine_Core::getTable('INSCRICAO')->getVestibularAberto($request->getParameter('id_vestibular_curso'));
//        $inscricoes = Doctrine_Core::getTable('INSCRICAO')->findAll($request->getParameter('id_vestibular_curso'));
      $this->vestibular = Doctrine_Core::getTable('VESTIBULARCURSO')->findOneByIdVestibularCurso(array($request->getParameter('id_vestibular_curso')));

      $this->vest = Doctrine_Core::getTable('VESTIBULAR')->find($this->vestibular->getIdVestibular());
            if ($this->vest->getSgSituacao() != "AR") {
                $this->getUser()->setFlash('error','Vestibular com pendências, impossível lançar pontuação.');
                $this->redirect('vestibular');
              }
//      $this->form = new INSCRICAOForm();
      $this->dyn_form = new BaseForm();


      foreach ($inscricoes as $inscricao) {
            $this->dyn_form->setWidget('nu_pontuacao['.$inscricao->getIdInscricao().']', new sfWidgetFormInput(array(),array('value' => $inscricao->getNuPontuacao())))  ;
        }
        $this->inscricoes = $inscricoes;



    }

    public function executeListVestibularCursos(sfWebRequest $request) {
        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular')));
            if ($this->vestibular->getSgSituacao() != "AR") {
                $this->getUser()->setFlash('error','Vestibular com pendências, impossível lançar pontuação.');
                $this->redirect('vestibular');
              }
        $this->cursos = Doctrine_Core::getTable('VESTIBULARCURSO')->getCursosDoVestibular($request->getParameter('id_vestibular'));

        $this->forward404Unless($this->vestibular);

    }
    public function executeListVestibulares(sfWebRequest $request) {

        $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')->getVestibularesAbertos();


    }
    public function executeComprovante(sfWebRequest $request) {
        $this->inscricao = Doctrine_Core::getTable('INSCRICAO')->find(array($request->getParameter('id_inscricao')));
    $this->forward404Unless($this->inscricao);

    }
    public function executeIndex(sfWebRequest $request)
  {
//    $this->inscrica_os = Doctrine_Core::getTable('INSCRICAO')
//      ->createQuery('a')
//      ->execute();

     $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')->getVestibularesAbertos();

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->inscricao = Doctrine_Core::getTable('INSCRICAO')->find(array($request->getParameter('id_inscricao')));
    $this->forward404Unless($this->inscricao);
  }

  public function executeNew(sfWebRequest $request)
  {

    $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('vestibular'));
    $inscrica = new INSCRICAO();
    $inscrica->VESTIBULARCURSO->setIdVestibular($request->getParameter('vestibular'));

    $this->id_vestibular = $inscrica;

    $this->form = new INSCRICAOForm($this->id_vestibular);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));


    //echo "<pre>"; var_dump( INSCRICAOTable::getInstance());exit; echo "</pre>";
    $parametros = $request->getParameterHolder()->getAll() 	;


    $inscrica = new INSCRICAO();
    $inscrica->setIdVestibularCurso($parametros['inscricao']['id_vestibular_curso']);
    $this->id_vestibular_curso = $inscrica;

    $this->form = new INSCRICAOForm($this->id_vestibular_curso);

    $Vestibular = Doctrine_Query::create()
                    ->select('v.id_vestibular')
                    ->from('VESTIBULARCURSO v')
                    ->where('v.id_vestibular_curso = ?', $parametros['inscricao']['id_vestibular_curso'] )
                    ->fetchArray();

    $vestibulando = Doctrine_Query::create()
                    ->select('count(1) as qtd')
                    ->from('INSCRICAO i')
                    ->leftJoin('i.VESTIBULARCURSO v')
                    ->where('i.nu_cpf = ?', $parametros['inscricao']['nu_cpf'])
                    ->addwhere('v.id_vestibular = ?', $Vestibular[0]['id_vestibular'] )
                    ->fetchArray();



    if ($vestibulando[0]['qtd'] > 0) {
        $this->getUser()->setFlash('error','Você ja realizou uma inscrição neste Vestibular!');
        $this->redirect('inscricao/index');
    } else {

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }


//    $this->executeIndex($request);

  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($inscricao = Doctrine_Core::getTable('INSCRICAO')->find(array($request->getParameter('id_inscricao'))), sprintf('Object inscricao does not exist (%s).', $request->getParameter('id_inscricao')));
    $this->form = new INSCRICAOPONTUACAOForm($inscricao);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($inscricao = Doctrine_Core::getTable('INSCRICAO')->find(array($request->getParameter('id_inscricao'))), sprintf('Object inscricao does not exist (%s).', $request->getParameter('id_inscricao')));
    $this->form = new INSCRICAOForm($inscricao);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($inscricao = Doctrine_Core::getTable('INSCRICAO')->find(array($request->getParameter('id_inscricao'))), sprintf('Object inscricao does not exist (%s).', $request->getParameter('id_inscricao')));
    $inscricao->delete();

    $this->redirect('inscricao/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $parametros = $request->getParameterHolder()->getAll() 	;
//
    if ($form->isValid())

    {
      $inscricao = $form->save();
      $this->getUser()->setFlash('notice','Inscrição realizada com Sucesso!');
      $this->redirect('inscricao/comprovante?id_inscricao='.$inscricao->getIdInscricao());
    } else {
                         $vestibular_ = Doctrine_Core::getTable('VESTIBULARCURSO')->find($parametros['inscricao']['id_vestibular_curso']);

                         $this->vestibular = $vestibular_->VESTIBULAR;
//                       echo "<pre>"; var_dump($this->vestibular);exit;echo  "/<pre>";
    }
  }


}
