<?php

/**
 * SALA form base class.
 *
 * @method SALA getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSALAForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sala'          => new sfWidgetFormInputHidden(),
      'nm_sala'          => new sfWidgetFormInputText(),
      'qt_max_suportada' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_sala'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_sala')), 'empty_value' => $this->getObject()->get('id_sala'), 'required' => false)),
      'nm_sala'          => new sfValidatorString(array('max_length' => 100)),
      'qt_max_suportada' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('sala[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SALA';
  }

}
