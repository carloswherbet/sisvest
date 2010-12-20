<?php

/**
 * VESTIBULAR filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVESTIBULARFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'te_periodo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'te_horario'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dt_vestibular' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sg_situacao'   => new sfWidgetFormFilterInput(),
      'sg_flag'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'te_periodo'    => new sfValidatorPass(array('required' => false)),
      'te_horario'    => new sfValidatorPass(array('required' => false)),
      'dt_vestibular' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sg_situacao'   => new sfValidatorPass(array('required' => false)),
      'sg_flag'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vestibular_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VESTIBULAR';
  }

  public function getFields()
  {
    return array(
      'id_vestibular' => 'Number',
      'te_periodo'    => 'Text',
      'te_horario'    => 'Text',
      'dt_vestibular' => 'Date',
      'sg_situacao'   => 'Text',
      'sg_flag'       => 'Text',
    );
  }
}
