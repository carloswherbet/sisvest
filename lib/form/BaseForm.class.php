<?php

/**
 * Base project form.
 * 
 * @package    ProjetoUnice
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{


  static public $sgSituacao = array(
            'A' => 'Aberto para Inscrição',
            'E' => 'Inscrição Encerradas',
            'AR' => 'Aguardando Resultado',
            'R' => 'Realizado',

  );

  static public $sgEstado = array(
                'AC' => 'AC',
                'AL' => 'AL',
                'AP' => 'AP',
                'AM' => 'AM',
                'BA' => 'BA',
                'CE' => 'CE',
                'DF' => 'DF',
                'ES' => 'ES',
                'GO' => 'GO',
                'MA' => 'MA',
                'MG' => 'MG',
                'MS' => 'MS',
                'MT' => 'MT',
                'PA' => 'PA',
                'PB' => 'PB',
                'PR' => 'PR',
                'PE' => 'PE',
                'PI' => 'PI',
                'RJ' => 'RJ',
                'RN' => 'RN',
                'RS' => 'RS',
                'RO' => 'RO',
                'RR' => 'RR',
                'SP' => 'SP',
                'SC' => 'SC',
                'SE' => 'SE',
                'TO' => 'TO'

  );
  
  

  
  
}
