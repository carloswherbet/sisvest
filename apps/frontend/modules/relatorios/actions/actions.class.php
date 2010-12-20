<?php

/**
 * curso actions.
 *
 * @package    ProjetoUnice
 * @subpackage relatorios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class relatoriosActions extends sfActions
{
    public function executeVerRelatorios(sfWebRequest $request) {

        $this->vestibular =  Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
        if ($this->vestibular->getSgSituacao() != "R") {
            $this->getUser()->setFlash('error','Vestibular não finalizado/realizado.');
            $this->redirect('vestibular');
        }

        
    }

    public function executeVestibulandosXSalas(sfWebRequest $request) {
        $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
        if ($this->vestibular->getSgSituacao() == "A" ) {
            $this->getUser()->setFlash('error','Vestibular não finalizado/realizado.');
            $this->redirect('vestibular');
        }
        $this->inscricoes = Doctrine_Core::getTable('INSCRICAO')
                            ->createQuery('a')
                            ->leftJoin('a.VESTIBULARCURSO v')
                            ->leftJoin('a.SALA s')                            
                            ->where('v.id_vestibular = ?', $request->getParameter('id_vestibular'))
                            ->orderBy('s.nm_sala, a.nm_vestibulando')
                            ->execute();

        
          $this->setLayout('relatorio');
                       
        
    }

        public function executeResultadoVestibular(sfWebRequest $request) {
           $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
                if ($this->vestibular->getSgSituacao() != "R") {
                    $this->getUser()->setFlash('error','Vestibular não finalizado/realizado.');
                    $this->redirect('vestibular');
                }
            $this->inscricoes = Doctrine_Core::getTable('INSCRICAO')
                            ->createQuery('a')
                            ->leftJoin('a.VESTIBULARCURSO v')
                            ->where('v.id_vestibular = ?', $request->getParameter('id_vestibular'))
                            ->orderBy('v.id_curso, a.nu_pontuacao desc')
                            ->execute();

        
          $this->setLayout('relatorio');


    }

           public function executeVestibulandosInscritos(sfWebRequest $request) {

              $this->vestibular = Doctrine_Core::getTable('VESTIBULAR')->find($request->getParameter('id_vestibular'));
                    if ($this->vestibular->getSgSituacao() != "R") {
                        $this->getUser()->setFlash('error','Vestibular não finalizado/realizado.');
                        $this->redirect('vestibular');
                    }
               $this->inscricoes = Doctrine_Core::getTable('INSCRICAO')
                            ->createQuery('a')
                            ->leftJoin('a.VESTIBULARCURSO v')
                            ->where('v.id_vestibular = ?', $request->getParameter('id_vestibular'))
                            ->orderBy('a.dt_inscricao')
                            ->execute();

        
          $this->setLayout('relatorio');


    }


}


