<?php

/**
 * VESTIBULARCURSO filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVESTIBULARCURSOFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vestibular'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULAR'), 'add_empty' => true)),
      'id_curso'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CURSO'), 'add_empty' => true)),
      'nu_concorrencia'     => new sfWidgetFormFilterInput(),
      'qt_vagas'            => new sfWidgetFormFilterInput(),
      'nu_pontuacao'        => new sfWidgetFormFilterInput(),
      'nu_inscritos'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_vestibular'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VESTIBULAR'), 'column' => 'id_vestibular')),
      'id_curso'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CURSO'), 'column' => 'id_curso')),
      'nu_concorrencia'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'qt_vagas'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nu_pontuacao'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nu_inscritos'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vestibularcurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VESTIBULARCURSO';
  }

  public function getFields()
  {
    return array(
      'id_vestibular_curso' => 'Number',
      'id_vestibular'       => 'ForeignKey',
      'id_curso'            => 'ForeignKey',
      'nu_concorrencia'     => 'Number',
      'qt_vagas'            => 'Number',
      'nu_pontuacao'        => 'Number',
      'nu_inscritos'        => 'Number',
    );
  }
}
