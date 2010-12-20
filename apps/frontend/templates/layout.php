<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php use_helper('Date') ?>
    <?php // use_helper('Javascript')?>
    <?php use_helper('jQuery')?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>


<script type="text/javascript">
    $(function(){
        $('tbody tr:odd').addClass('odd');
        $('tbody tr')
            .mouseover(function(){
                $(this).addClass('over');
            })
            .mouseout(function(){
                $(this).removeClass('over');
            });
    });

     jQuery(function($){

       $("#inscricao_nu_fone").mask("99-9999.9999");
       $("#tin").mask("99-9999999");
       $("#ssn").mask("999-99-9999");
       $("#te_horario").mask("99:99");
    });


</script>




  </head>
  <body>
<?php
if ($sf_user->isAuthenticated()) {

		 if ( ! sfContext::getInstance()->getUser()->getAttribute('instituicao', false) ) {
			$instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(1);
			sfContext::getInstance()->getUser()->setAttribute('instituicao', $instituicao->getNmInstituicao());
		}

} else {
	sfContext::getInstance()->getUser()->setAttribute('instituicao', '') ;

}

?>


      <div id="pagina">
          <div id="topo">
              <div id="logo"><?php echo link_to('logo', '@homepage',array('class' => 'logo'))?></div>
              <div id="titulo<?php if(!$sf_user->isAuthenticated()) { echo "logout";} ?>">SISVEST - Sistema de Controle de Vestibulares<br/>
                   <div id="instituicao"><?php echo $sf_user->getAttribute('instituicao'); ?></div>
              </div>

              <div>


                <?php if ($sf_user->isAuthenticated()) { ?>
              
                  <div id="menuadmin">
                    <?php if ($sf_user->getAttribute('permissao') == 'admin' ) { ?>
                        <ul class="dropdown">
                            <li><?php echo link_to(image_tag('../images/instituicao.png').' Instituição', '/web/instituicao/1') ?>
                                <ul class="sub_menu">
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Dados da Instituição', '/web/instituicao/1') ?></li>
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Cursos', '@curso') ?></li>
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Salas', '@sala') ?></li>
                                </ul>
                            </li>

                            <li><?php echo link_to(image_tag('../images/vestibular.png').' Vestibulares', '/web/vestibular') ?>
                                <ul class="sub_menu">


                                    <li><?php echo link_to(image_tag('../images/seta.png').' Manter Vestibulares', '/web/vestibular') ?></li>
                                </ul>
                            </li>

<!--                            <li><?php echo link_to(image_tag('../images/relatorio.png','absolute=true').' Relatórios', '/sala') ?>
                                <ul class="sub_menu">
                                     <li><?php echo link_to(image_tag('../images/seta.png').' Alunos por Sala', '/vestibular') ?></li>
                                     <li><?php echo link_to(image_tag('../images/seta.png').' Resultado do Vestibular', '/vestibular') ?></li>
                                </ul>
                            </li>-->
                    
                   
                    
                   <?php } ?>
                   <?php if ($sf_user->getAttribute('permissao') == 'user') { ?>
                        <ul class="dropdown">
                                        <li>
                                            <?php echo link_to(image_tag('../images/seta.png').' Realizar Inscrição', '@inscricao') ?>
                                        </li>
                                        <li>
                                            <?php echo link_to(image_tag('../images/seta.png').' Concorrencias Anteriores', '@concorrencia_vestibular') ?>
                                        </li>
                        </ul>
                  <?php } elseif($sf_user->getAttribute('permissao') == 'admin' ) { ?>
                                      <li><?php echo link_to(image_tag('../images/people.png') . ' Inscrições', '@inscricao') ?>
                                          <ul class="sub_menu">
                                              <li><?php echo link_to(image_tag('../images/seta.png') . ' Realizar Inscrição', '@inscricao') ?></li>
                                              <li><?php echo link_to(image_tag('../images/seta.png') . ' Localizar Inscrição', '@inscricao') ?></li>
                                            
                                          </ul>
                                      </li>
                                      
                                      <li>
                                          <?php echo link_to(image_tag('../images/seta.png') . ' Concorrencias Anteriores', '@concorrencia_vestibular') ?>
                                      </li>
                               </ul>
                      <?php }  ?>
                  </div>


		 
		                  <div id="sair"><?php echo link_to(' . ', '/web/login/sair')?> </div>

                  <?php } ?>
              </div>
          </div>
          <div id="content">
              <?php //echo date('c'); ?>
            <?php if ($sf_user->hasFlash('notice')): ?>
              <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
            <?php endif ?>

            <?php if ($sf_user->hasFlash('error')): ?>
              <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
            <?php endif ?>
            <?php echo $sf_content ?>
          </div>

      </div>
      <div id="footer">
			Desenvolvido por CW Soluções ©Todos os direitos reservados.
      </div>
  </body>

</html>
