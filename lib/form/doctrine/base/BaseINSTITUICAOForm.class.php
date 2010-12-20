<?php

/**
 * INSTITUICAO form base class.
 *
 * @method INSTITUICAO getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseINSTITUICAOForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_instituicao' => new sfWidgetFormInputHidden(),
      'nm_instituicao' => new sfWidgetFormInputText(),
      'te_endereco'    => new sfWidgetFormInputText(),
      'nu_numero'      => new sfWidgetFormInputText(),
      'te_complemento' => new sfWidgetFormInputText(),
      'te_bairro'      => new sfWidgetFormInputText(),
      'te_cidade'      => new sfWidgetFormInputText(),
      'sg_estado'      => new sfWidgetFormInputText(),
      'nu_cnpj'        => new sfWidgetFormInputText(),
      'nu_fone'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_instituicao' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_instituicao')), 'empty_value' => $this->getObject()->get('id_instituicao'), 'required' => false)),
      'nm_instituicao' => new sfValidatorString(array('max_length' => 255)),
      'te_endereco'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nu_numero'      => new sfValidatorInteger(array('required' => false)),
      'te_complemento' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'te_bairro'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'te_cidade'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sg_estado'      => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'nu_cnpj'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nu_fone'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('instituicao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'INSTITUICAO';
  }

}
