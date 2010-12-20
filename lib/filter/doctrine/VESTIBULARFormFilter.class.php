<?php

/**
 * VESTIBULAR filter form.
 *
 * @package    ProjetoUnice
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VESTIBULARFormFilter extends BaseVESTIBULARFormFilter
{
  public function configure()
  {
        $orderby   = Doctrine_Query::create()
                     ->from   ('VESTIBULAR v')
                     ->orderBy  ('v.te_periodo desc')
                     ;

        $this->widgetSchema['te_periodo'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'VESTIBULAR',
            'add_empty' => '-- Todos --',
            'key_method' => 'getIdVestibular',
            'query' => $orderby,
            ));
          }

}
