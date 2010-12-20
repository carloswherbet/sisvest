<?php

/**
 * INSCRICAO form base class.
 *
 * @method INSCRICAO getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseINSCRICAOForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_inscricao'        => new sfWidgetFormInputHidden(),
      'id_vestibular_curso' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULARCURSO'), 'add_empty' => true)),
      'id_sala'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SALA'), 'add_empty' => true)),
      'nm_vestibulando'     => new sfWidgetFormInputText(array(), array('size' => 50,'maxlength' => 150)),
      'te_endereco'         => new sfWidgetFormInputText(array(), array('size' => 50, 'maxlength' => 200)),
      'nu_numero'           => new sfWidgetFormInputText(array(), array('size' => 11,'maxlength' => 11)),
      'te_complemento'      => new sfWidgetFormInputText(array(), array('maxlength' => 255)),
      'nu_cpf'              => new sfWidgetFormInputText(array(), array('size' => 11,'maxlength' => 11)),
      'te_bairro'           => new sfWidgetFormInputText(),
      'sg_estado'           => new sfWidgetFormInputText(array(), array('maxlength' => 100)),
      'te_cidade'           => new sfWidgetFormInputText(array(), array('maxlength' => 100)),
      'nu_fone'             => new sfWidgetFormInputText(array(), array('size' => 12,'maxlength' => 12)),
      'te_resultado'        => new sfWidgetFormInputText(),
      'nu_pontuacao'        => new sfWidgetFormInputText(),
      'dt_inscricao'        => new sfWidgetFormInputHidden(array(),array('value' => date('c'))),
    ));

    $this->setValidators(array(
      'id_inscricao'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_inscricao')), 'empty_value' => $this->getObject()->get('id_inscricao'), 'required' => false)),
      'id_vestibular_curso' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULARCURSO'), 'required' => false)),
      'id_sala'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SALA'), 'required' => false)),
      'nm_vestibulando'     => new sfValidatorString(array('max_length' => 150)),
      'te_endereco'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'nu_numero'           => new sfValidatorInteger(array('required' => false)),
      'nu_cpf'              => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'te_complemento'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'te_bairro'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sg_estado'           => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'te_cidade'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'nu_fone'             => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'te_resultado'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'nu_pontuacao'        => new sfValidatorNumber(array('required' => false)),
      'dt_inscricao'        => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inscricao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'INSCRICAO';
  }

}
