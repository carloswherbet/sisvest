<?php

/**
 * INSCRICAO form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class INSCRICAOForm extends BaseINSCRICAOForm
{
  public function configure()
  {

//      unset ($this['dt_inscricao']);
      

//        echo "<pre>";var_dump($this->getObject()->VESTIBULARCURSO->getIdVestibular());exit;echo "</pre>";

 
                  $query = Doctrine_Query::create()
                     ->from   ('VESTIBULARCURSO a')
                     ->leftJoin('a.VESTIBULAR v')
                     ->where  ('v.sg_situacao = "A"')
                     ->addwhere  ('v.id_vestibular = ?', $this->getObject()->VESTIBULARCURSO->getIdVestibular()  )
                     ;

              
      
      $this->widgetSchema['id_vestibular_curso'] = new sfWidgetFormDoctrineChoice(array(
                          'model' => 'VESTIBULARCURSO',
                          'key_method' => 'getIdVestibularCurso',
                          'query' => $query,
                          'add_empty' => false));
      



       $this->widgetSchema->setHelps(array(
            'nu_cpf' => 'CPF sem ponto e traço.'            

            )) ;

 
     
      $this->widgetSchema['id_sala'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['nu_pontuacao'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['te_resultado'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['id_sala'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['id_sala'] = new sfWidgetFormInputHidden();
//      $this->widgetSchema['sg_estado'] = new sfWidgetFormChoiceUFBR(array('add_empty'=>'Escolha UF'));

       $this->widgetSchema['sg_estado'] = new sfWidgetFormChoice(array(
          'choices' => BaseForm::$sgEstado,
          
           
           
      ));
      $this->validatorSchema['nu_cpf'] =  new sfValidatorCpfCnpj(array("type"=>"cpf"));
      //$this->validatorSchema['sg_estado'] = new sfValidatorChoiceStates();
      $this->validatorSchema['nm_vestibulando'] = new sfValidatorString(array('required' => true));
      
      $this->widgetSchema->setLabels(array(
         'id_sala' => ' ',
          'nm_vestibulando' => 'Nome:',
          'dt_inscricao' => 'Data de Inscrição:',
          'te_endereco' => 'Endereço:',
          'nu_numero' => 'Numero:',
          'te_complemento' => 'Complemento:',
          'te_resultado' => ' ',
          'nu_pontuacao' => ' ',
          'dt_inscricao' => ' ',
          'nu_fone' => 'Fone:',
          'dt_inscricao' => ' ',
          'te_bairro' => 'Bairro: ',
          'te_cidade' => 'Cidade: ',
          'sg_estado' => 'Estado: ',
          'nu_cpf' => 'CPF: ',
          'id_vestibular_curso' => 'Curso: ',
      ));


      

      

          
  }
}
