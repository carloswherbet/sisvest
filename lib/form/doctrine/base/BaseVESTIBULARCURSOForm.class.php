<?php

/**
 * VESTIBULARCURSO form base class.
 *
 * @method VESTIBULARCURSO getObject() Returns the current form's model object
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVESTIBULARCURSOForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vestibular_curso' => new sfWidgetFormInputHidden(),
      'id_vestibular'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULAR'), 'add_empty' => false)),
      'id_curso'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CURSO'), 'add_empty' => 'Escolha um Curso')),
      'nu_concorrencia'     => new sfWidgetFormInputText(),
      'qt_vagas'            => new sfWidgetFormInputText(),
      'nu_pontuacao'        => new sfWidgetFormInputText(),
      'nu_inscritos'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_vestibular_curso' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_vestibular_curso')), 'empty_value' => $this->getObject()->get('id_vestibular_curso'), 'required' => false)),
      'id_vestibular'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VESTIBULAR'))),
      'id_curso'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CURSO'))),
      'nu_concorrencia'     => new sfValidatorNumber(array('required' => false)),
      'qt_vagas'            => new sfValidatorInteger(array('required' =>true )),
      'nu_pontuacao'        => new sfValidatorNumber(array('required' => false)),
      'nu_inscritos'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vestibularcurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VESTIBULARCURSO';
  }

}
