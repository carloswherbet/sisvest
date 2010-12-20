<?php

/**
 * VESTIBULAR form base class.
 *
 * @method VESTIBULAR getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVESTIBULARForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vestibular' => new sfWidgetFormInputHidden(),
      'te_periodo'    => new sfWidgetFormInputText(),
      'te_horario'    => new sfWidgetFormInputText(),
      'dt_vestibular' => new sfWidgetFormDate(),
      'sg_situacao'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_vestibular' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_vestibular')), 'empty_value' => $this->getObject()->get('id_vestibular'), 'required' => false)),
      'te_periodo'    => new sfValidatorString(array('max_length' => 10)),
      'te_horario'    => new sfValidatorString(array('max_length' => 10)),
      'dt_vestibular' => new sfValidatorDate(),
      'sg_situacao'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vestibular[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VESTIBULAR';
  }

}
