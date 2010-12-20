<?php

/**
 * SALA filter form base class.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSALAFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nm_sala'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'qt_max_suportada' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nm_sala'          => new sfValidatorPass(array('required' => false)),
      'qt_max_suportada' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sala_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SALA';
  }

  public function getFields()
  {
    return array(
      'id_sala'          => 'Number',
      'nm_sala'          => 'Text',
      'qt_max_suportada' => 'Number',
    );
  }
}
