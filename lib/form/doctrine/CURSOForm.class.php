<?php

/**
 * CURSO form.
 *
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CURSOForm extends BaseCURSOForm
{
  public function configure()
  {
    unset ($this['sg_flag']);

           $this->widgetSchema->setLabels(array(
          'nm_curso' => 'Curso *',
          'te_cargahoraria' => 'Carga Horária *'
          ));
  }


}
