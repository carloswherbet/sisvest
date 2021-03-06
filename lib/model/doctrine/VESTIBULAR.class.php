<?php

/**
 * VESTIBULAR
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ProjetoUnice
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class VESTIBULAR extends BaseVESTIBULAR
{
    public function  __toString() {
         $vestibular = $this->getTePeriodo()." - ".$this->getSituacao();
         

        return $vestibular;
    }

    public function  getSituacao() {
           $situacao= $this->getSgSituacao();

           switch ($situacao) {
               case 'A':
                   $situacao = 'Aberto para Inscrições';
                   break;
               case 'E':
                   $situacao = 'Inscrições Encerradas';
                   break;
               case 'AR':
                   $situacao = 'Aguardando Resultado';
                   break;
               case 'R':
                   $situacao = 'Realizado';
                   break;

               default:
                   break;
           }
           return $situacao;
    }

     public function getCursosDoVestibular($id_vestibular) {
          $q = Doctrine_Query::create()
            ->from('VESTIBULAR v')
            ->leftJoin('v.VESTIBULARCURSO a')
            ->leftJoin('a.CURSO c')
            ->where('v.id_vestibular = ?', $id_vestibular)
            ->fetchArray();
            //echo "<pre>";var_dump($q[0]['VESTIBULARCURSO']);exit;


    return $q[0]['VESTIBULARCURSO'];
  }

      public function getConteVestibulandosInscritos($id_vestibular) {

           $q = Doctrine_Core::getTable('INSCRICAO')->getCountVestibulandosInscritos($id_vestibular);
             return $q;
         }

      public function getConteVestibulandosAlocados($id_vestibular) {

           $q = Doctrine_Core::getTable('INSCRICAO')->getCountVestibulandosAlocados($id_vestibular);
             return $q;
         }
 
}
