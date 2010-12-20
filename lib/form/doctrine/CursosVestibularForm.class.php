<?php

/**
 * VESTIBULAR form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CursosVestibularForm extends BaseVESTIBULARForm
{
  public function configure()
  {
   
// range de Data no Campo Date do Formulário
      $years = range(1999, 2020);
// fazer o import de formulario, passando objeto como parametro.
      $vestibularcurso =  new VESTIBULARCURSO();

      $vestibularcurso->VESTIBULAR = $this->getObject();

      $form =  new VESTIBULARCURSOForm($vestibularcurso);

      $this->embedForm('CursosDoVestibular',$form);

//      $this->widgetSchema['dt_vestibular'] = new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true,"show_button_panel" => false, 'culture' => 'pt-BR'));
      $this->widgetSchema['dt_vestibular'] = new sfWidgetFormDate(array(
           'years' => array_combine($years, $years),
           'format' => '%day% / %month% / %year%'  ));
//      $this->validatorSchema['dt_vestibular'] = new sfValidatorDate(array('required' => true, 'date_output' => 'd/m/Y'));
      

      $this->widgetSchema['sg_situacao'] = new sfWidgetFormChoice(array(
          'choices' => BaseForm::$sgSituacao
      ));

        $this->widgetSchema->setHelps(array(
            'te_periodo' => 'Exemplo: 2012.1',
            'te_horario' => 'Exemplo: 08:00'            
            
            ), array('class' => 'help'));
       
       $this->widgetSchema->setLabels(array(
          'te_periodo'    => 'Período *',
          'dt_vestibular'   => 'Data do Vestibular *',
          'sg_situacao' => 'Situação *',
          'te_horario' => 'Horário *',
          'CursosDoVestibular' => ' ',
          'Edit Vestibular' => ' ',
    ));

       

      

       





      

  }
}
