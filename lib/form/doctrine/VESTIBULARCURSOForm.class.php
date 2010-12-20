<?php

/**
 * VESTIBULARCURSO form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VESTIBULARCURSOForm extends BaseVESTIBULARCURSOForm
{
  public function configure()
  {
        $cursos = Doctrine_Query::create()
                     ->from   ('CURSO c')
                     ->where  ('c.sg_flag = "A" or c.sg_flag = ""')
                     ;
        

      $this->useFields(array('id_curso', 'qt_vagas'));




      $this->widgetSchema['id_curso'] = new sfWidgetFormDoctrineChoice(array(
           'model' => 'CURSO',
           'key_method' => 'getIdCurso',
           'query' => $cursos,
           'add_empty' => false));

            //$this->widgetSchema->setLabel('id_vestibular_curso', 'Curso *');

      $this->widgetSchema->setLabels(array(
          'id_curso' => 'Curso *',
          'qt_vagas' => 'Vagas *'
          ));






      

  }
}

