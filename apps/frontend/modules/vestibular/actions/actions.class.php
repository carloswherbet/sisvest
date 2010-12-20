<?php

/**
 * vestibular actions.
 *
 * @package    ProjetoUnice
 * @subpackage vestibular
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vestibularActions extends sfActions
{

    

	public function executeGerarResultados(sfWebRequest $request) {
            $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
            if ($this->vestibular->getSgSituacao() != "AR") {
                $this->getUser()->setFlash('error','Vestibular com pendências, impossível gerar resultados.');
                $this->redirect('vestibular');
               }
	    $this->form = new BaseForm();
		$this->form->setWidget('pontuacao_min', new sfWidgetFormInput(array(),array('value' => '100')))  ;
		$this->form->setWidget('id_vestibular', new sfWidgetFormInputHidden(array(),array('value' => $request->getParameter('id_vestibular'))))  ;
		


	}

	public function executeProcessGerarResultados(sfWebRequest $request) {
           $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
            if ($this->vestibular->getSgSituacao() != "AR") {
                $this->getUser()->setFlash('error','Vestibular com pendências, impossível gerar resultados.');
                $this->redirect('vestibular');
               }

		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$pontuacao = $request->getParameter('pontuacao_min');
		$id_vestibular = $request->getParameter('id_vestibular');

		$vestibulandos = Doctrine_Core::getTable('INSCRICAO')
						->createQuery('a')
						->leftJoin('a.VESTIBULARCURSO v')
						->where('v.id_vestibular = ?', $id_vestibular)
						->execute();

		foreach ($vestibulandos as $vestibulando) {
			$inscricao = Doctrine::getTable('INSCRICAO')->find($vestibulando->getIdInscricao());
                        //var_dump($vestibulando->getNuPontuacao());exit;
			if ($vestibulando->getNuPontuacao() > $pontuacao ) {;
                                $inscricao->setTeResultado('A');
                                $inscricao->save();
			} else {
				$inscricao->setTeResultado('R');
                                $inscricao->save();
			}
		}
	            
                    $this->setTemplate('gerarResultados');
                    $this->getUser()->setFlash('notice', 'Resultado do Vestibular Gerado com sucesso!');
                    $this->redirect('/web/vestibular');

	}


    private function getQtdInscritosCursoVestibular($id_vestibular,$id_curso) {
        $q = Doctrine_Query::create()
            ->select('count(1) as inscritos')
            ->from('INSCRICAO i')
            ->leftJoin('i.VESTIBULARCURSO v')
            ->where('v.id_vestibular = ?', $id_vestibular)
            ->addwhere('v.id_curso = ?', $id_curso);

         return $q->fetchArray();
    }


    public function executeConcorrencia(sfWebRequest $request) {
         $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')
            ->createQuery('a')
            ->where('sg_situacao = "R"')
            ->execute();
    }

    public function executeShowConcorrencia(sfWebRequest $request) {

        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular')));
        //$this->cursos = Doctrine_Core::getTable('VESTIBULARCURSO')->getCursosDoVestibular($request->getParameter('id_vestibular'));

        $this->cursos = Doctrine_Query::create()
            ->select('vc.*,  c.*, i.*, COUNT(id_inscricao) as inscritos')
            ->from('VESTIBULARCURSO vc')
            ->leftJoin('vc.CURSO c')
            ->leftJoin('vc.INSCRICAO i')
            ->where('i.id_vestibular_curso = vc.id_vestibular_curso')
            ->andWhere('c.id_curso = vc.id_curso')
            ->andWhere('vc.id_vestibular= ?', $request->getParameter('id_vestibular'))
            ->groupBy('vc.id_curso')->fetchArray();

        $this->forward404Unless($this->vestibular);
    }

    public function getConcorrencia(sfWebRequest $request) {
        $this->concorrencia = Doctrine_Core::getTable('VESTIBULARCURSO')->getConcorrenciaVestibular();

    }


    public function executeRetireCursoDoVestibular(sfWebRequest $request) {
        //$request->checkCSRFProtection();

        $this->forward404Unless($vestibularcurso = Doctrine_Core::getTable('VESTIBULARCURSO')->findOneByIdVestibularCurso(array($request->getParameter('curso'))));

        $vestibularcurso->delete();
        $this->getUser()->setFlash('notice', 'Operação realizada com Sucesso!');
        $this->redirect('vestibular/edit?id_vestibular='.$vestibularcurso->getIdVestibular().'&curso=');

    }


    public function executeIndex(sfWebRequest $request)
  {
        if($request->isMethod(sfRequest::POST)) {
            $parametros = $request->getParameterHolder()->getAll();
        } else {
            $parametros = 0;
        }
        

        if ($parametros['vestibular_filters']['te_periodo'] and $parametros != 0 and $parametros['vestibular_filters']['te_periodo'] !=  "") {
            $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')
              ->createQuery('a')
              ->orderBy('a.te_periodo desc')
              ->where('a.id_vestibular = ?', $parametros['vestibular_filters']['te_periodo'])
              ->execute();

        } else {
            
            $this->vestibula_rs = Doctrine_Core::getTable('VESTIBULAR')
              ->createQuery('a')
              ->orderBy('a.te_periodo desc')
              ->execute();

        }
        $this->filtro = new VESTIBULARFormFilter();
        

//        $this->instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(1);
//        $this->getUser()->setAttribute('instituicao', $this->instituicao->getNmInstituicao());



  }

  public function executeShow(sfWebRequest $request)
  {
        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular')));

        $this->cursos = Doctrine_Core::getTable('VESTIBULARCURSO')->getCursosDoVestibular($request->getParameter('id_vestibular'));

        $this->forward404Unless($this->vestibular);
  }

  public function executeNew(sfWebRequest $request)
  {
        $this->form = new CursosVestibularForm();

  }

  public function executeCreate(sfWebRequest $request)
  {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CursosVestibularForm();

        $this->processCursosForm($request, $this->form);

        $this->setTemplate('new');
  }




  public function executeEdit(sfWebRequest $request)
  {
        $this->forward404Unless($vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular'))), sprintf('Object vestibular does not exist (%s).', $request->getParameter('id_vestibular')));

        $this->form = new VESTIBULARForm($vestibular);

  }

  public function executeCursosEdit(sfWebRequest $request)
  {
        $this->forward404Unless($vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular'))), sprintf('Object vestibular does not exist (%s).', $request->getParameter('id_vestibular')));

        $this->cursos = Doctrine_Core::getTable('VESTIBULARCURSO')->getCursosDoVestibular($request->getParameter('id_vestibular'));

        $this->form = new CursosVestibularForm($vestibular);

        $this->vestibular = $vestibular;


  }


    public function executeUpdate(sfWebRequest $request)
  {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));

        $this->forward404Unless($vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular'))), sprintf('Object vestibular does not exist (%s).', $request->getParameter('id_vestibular')));

        $this->form = new VESTIBULARForm($vestibular);

        $this->processForm($request,$this->form);

        $this->setTemplate('edit');
  }

   public function executeCursosUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));

    $this->forward404Unless($vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular'))), sprintf('Object vestibular does not exist (%s).', $request->getParameter('id_vestibular')));

    $this->form = new CursosVestibularForm($vestibular);

    $this->cursos = Doctrine_Core::getTable('VESTIBULARCURSO')->getCursosDoVestibular($request->getParameter('id_vestibular'));

    $this->processCursosForm($request,$this->form);

    $this->setTemplate('cursosEdit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vestibular = Doctrine_Core::getTable('VESTIBULAR')->find(array($request->getParameter('id_vestibular'))), sprintf('Object vestibular does not exist (%s).', $request->getParameter('id_vestibular')));

    $vestibular->delete();

    $this->redirect('vestibular/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	  $this->getUser()->setFlash('notice', 'Operação realizada com Sucesso!');
      $vestibular = $form->save();
	  $this->redirect('vestibular');
    }
  }

    protected function processCursosForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vestibular = $form->save();

      $this->redirect('vestibular/edit?id_vestibular='.$vestibular->getIdVestibular().'&curso=');
    }
  }
}

