<?php

/**
 * INSCRICAO filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseINSCRICAOFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vestibular_curso' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULARCURSO'), 'add_empty' => true)),
      'id_sala'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SALA'), 'add_empty' => true)),
      'nm_vestibulando'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'te_endereco'         => new sfWidgetFormFilterInput(),
      'nu_numero'           => new sfWidgetFormFilterInput(),
      'nu_cpf'              => new sfWidgetFormFilterInput(),
      'te_complemento'      => new sfWidgetFormFilterInput(),
      'te_bairro'           => new sfWidgetFormFilterInput(),
      'sg_estado'           => new sfWidgetFormFilterInput(),
      'te_cidade'           => new sfWidgetFormFilterInput(),
      'nu_fone'             => new sfWidgetFormFilterInput(),
      'te_resultado'        => new sfWidgetFormFilterInput(),
      'nu_pontuacao'        => new sfWidgetFormFilterInput(),
      'dt_inscricao'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_vestibular_curso' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VESTIBULARCURSO'), 'column' => 'id_vestibular_curso')),
      'id_sala'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SALA'), 'column' => 'id_sala')),
      'nm_vestibulando'     => new sfValidatorPass(array('required' => false)),
      'te_endereco'         => new sfValidatorPass(array('required' => false)),
      'nu_numero'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nu_cpf'              => new sfValidatorPass(array('required' => false)),
      'te_complemento'      => new sfValidatorPass(array('required' => false)),
      'te_bairro'           => new sfValidatorPass(array('required' => false)),
      'sg_estado'           => new sfValidatorPass(array('required' => false)),
      'te_cidade'           => new sfValidatorPass(array('required' => false)),
      'nu_fone'             => new sfValidatorPass(array('required' => false)),
      'te_resultado'        => new sfValidatorPass(array('required' => false)),
      'nu_pontuacao'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dt_inscricao'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('inscricao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'INSCRICAO';
  }

  public function getFields()
  {
    return array(
      'id_inscricao'        => 'Number',
      'id_vestibular_curso' => 'ForeignKey',
      'id_sala'             => 'ForeignKey',
      'nm_vestibulando'     => 'Text',
      'te_endereco'         => 'Text',
      'nu_numero'           => 'Number',
      'nu_cpf'              => 'Text',
      'te_complemento'      => 'Text',
      'te_bairro'           => 'Text',
      'sg_estado'           => 'Text',
      'te_cidade'           => 'Text',
      'nu_fone'             => 'Text',
      'te_resultado'        => 'Text',
      'nu_pontuacao'        => 'Number',
      'dt_inscricao'        => 'Date',
    );
  }
}
