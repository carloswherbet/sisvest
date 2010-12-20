<?php

/**
 * INSTITUICAO filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseINSTITUICAOFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nm_instituicao' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'te_endereco'    => new sfWidgetFormFilterInput(),
      'nu_numero'      => new sfWidgetFormFilterInput(),
      'te_complemento' => new sfWidgetFormFilterInput(),
      'te_bairro'      => new sfWidgetFormFilterInput(),
      'te_cidade'      => new sfWidgetFormFilterInput(),
      'sg_estado'      => new sfWidgetFormFilterInput(),
      'nu_cnpj'        => new sfWidgetFormFilterInput(),
      'nu_fone'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nm_instituicao' => new sfValidatorPass(array('required' => false)),
      'te_endereco'    => new sfValidatorPass(array('required' => false)),
      'nu_numero'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'te_complemento' => new sfValidatorPass(array('required' => false)),
      'te_bairro'      => new sfValidatorPass(array('required' => false)),
      'te_cidade'      => new sfValidatorPass(array('required' => false)),
      'sg_estado'      => new sfValidatorPass(array('required' => false)),
      'nu_cnpj'        => new sfValidatorPass(array('required' => false)),
      'nu_fone'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('instituicao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'INSTITUICAO';
  }

  public function getFields()
  {
    return array(
      'id_instituicao' => 'Number',
      'nm_instituicao' => 'Text',
      'te_endereco'    => 'Text',
      'nu_numero'      => 'Number',
      'te_complemento' => 'Text',
      'te_bairro'      => 'Text',
      'te_cidade'      => 'Text',
      'sg_estado'      => 'Text',
      'nu_cnpj'        => 'Text',
      'nu_fone'        => 'Text',
    );
  }
}
