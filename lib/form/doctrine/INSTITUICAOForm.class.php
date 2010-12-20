<?php

/**
 * INSTITUICAO form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class INSTITUICAOForm extends BaseINSTITUICAOForm
{
  public function configure()
  {
      $this->widgetSchema['sg_estado'] = new sfWidgetFormChoiceUFBR(array('add_empty'=>'Escolha UF'));
//      $this->validatorSchema['nu_cnpf'] =  new sfValidatorCpfCnpj(array("type"=>"cnpf",'formated' => true));
      $this->validatorSchema['sg_estado'] = new sfValidatorChoiceStates();
  }
}
