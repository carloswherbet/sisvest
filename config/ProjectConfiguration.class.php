<?php

require_once '/usr/share/php/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('brFormExtraPlugin');
    sfValidatorBase::setDefaultMessage('required', 'Campo obrigatório');
    sfValidatorBase::setDefaultMessage('invalid', 'Campo inválido');
    sfValidatorBase::setDefaultMessage('integer', 'Campo inválido');
    $this->enablePlugins('sfJQueryUIPlugin');
  }
}
