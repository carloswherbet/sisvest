<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2010/12/04 16:04:57
sfConfig::add(array(
  'app_br_cep_local_search' => false,
  'app_br_cep_client_ips' => false,
  'app_br_cep_format' => 'ceplivre',
  'app_br_cep_remote_url' => 'http://ceplivre.pc2consultoria.com/index.php',
  'app_br_cep_remote_query' => 'module=cep&formato=xml&cep=',
  'app_br_cep_remote_fields' => array (
  'resultado' => 'sucesso',
  'tipo_logradouro' => 'tipo_logradouro',
  'logradouro' => 'logradouro',
  'uf' => 'estado_sigla',
  'uf_descricao' => 'estado',
  'cidade' => 'cidade',
  'bairro' => 'bairro',
  'cep' => 'cep',
  'codigo_ibge' => 'codigo_ibge',
),
  'app_br_cep_form_fields' => array (
  'logradouro' => 'logradouro',
  'estado_sigla' => 'uf',
  'cidade' => 'cidade',
  'bairro' => 'bairro',
  'cep' => 'cep',
  'codigo_ibge' => 'codibge',
),
));
