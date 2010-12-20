<?php

/**
 * CURSO form base class.
 *
 * @method CURSO getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCURSOForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_curso'         => new sfWidgetFormInputHidden(),
      'nm_curso'         => new sfWidgetFormInputText(),
      'te_cargahoraria' => new sfWidgetFormInputText(),
      'sg_flag'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_curso'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_curso')), 'empty_value' => $this->getObject()->get('id_curso'), 'required' => false)),
      'nm_curso'         => new sfValidatorString(array('max_length' => 255)),
      'te_cargahoraria' => new sfValidatorString(array('max_length' => 10, 'required' => true)),
      'sg_flag' => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('curso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CURSO';
  }

}
