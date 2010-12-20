<?php

/**
 * VESTIBULAR form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VESTIBULARForm extends BaseVESTIBULARForm
{
  public function configure()
  {
// range de Data no Campo Date do Formulário
      $years = range(1999, 2020);
      $this->widgetSchema['dt_vestibular'] = new sfWidgetFormDate(array(
       'years' => array_combine($years, $years),
       'format' => '%day% / %month% / %year%',
       'default' => date('d/m/Y')
       ));

//     $this->widgetSchema['dt_vestibular'] = new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true,"show_button_panel" => true, 'culture' => 'pt-BR'));

      $this->widgetSchema['sg_situacao'] = new sfWidgetFormChoice(array(
          'choices' => BaseForm::$sgSituacao
      ));
      

      $this->widgetSchema->setLabels(array(
          'te_periodo'    => 'Período',
          'dt_vestibular'   => 'Data do Vestibular',
          'sg_situacao' => 'Situação',
          'te_horario' => 'Horário:',
          'CursosDoVestibular' => ' ',
          'Edit Vestibular' => ' ',
    ));

    


  }
}
