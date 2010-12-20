<?php

/**
 * CURSO filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCURSOFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nm_curso'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'te_cargahoraria' => new sfWidgetFormFilterInput(),
      'sg_flag'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nm_curso'        => new sfValidatorPass(array('required' => false)),
      'te_cargahoraria' => new sfValidatorPass(array('required' => false)),
      'sg_flag'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('curso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CURSO';
  }

  public function getFields()
  {
    return array(
      'id_curso'        => 'Number',
      'nm_curso'        => 'Text',
      'te_cargahoraria' => 'Text',
      'sg_flag'         => 'Text',
    );
  }
}
