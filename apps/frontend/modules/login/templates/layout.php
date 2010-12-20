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


 if ( ! sfContext::getInstance()->getUser()->getAttribute('instituicao', false) )
{
$instituicao = Doctrine_Core::getTable('INSTITUICAO')->find(1);
sfContext::getInstance()->getUser()->setAttribute('instituicao', $instituicao->getNmInstituicao());
}



?>


      <div id="pagina">
          <div id="topo">
              <div id="logo"></div>
              <div id="titulo">SISVEST - Sistema de Controle de Vestibulares<br/>
                   <div id="instituicao"><?php echo $sf_user->getAttribute('instituicao'); ?></div>
              </div>

              <div>

              <?php if (!$sf_user->isAuthenticated()) { ?>

                  <div id="menuadmin">

                        <ul class="dropdown">
                            <li><?php echo link_to(image_tag('../images/instituicao.png').' Instituição', '/web/instituicao/1') ?>
                                <ul class="sub_menu">
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Dados da Instituição', '/web/instituicao/1') ?></li>
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Cursos', '@curso') ?></li>
                                    <li><?php echo link_to(image_tag('../images/seta.png').' Salas', '@sala') ?></li>
                                </ul>
                            </li>

                            <li><?php echo link_to(image_tag('../images/vestibular.png').' Vestibulares', '@homepage') ?>
                                <ul class="sub_menu">


                                    <li><?php echo link_to(image_tag('../images/seta.png').' Manter Vestibulares', '@homepage') ?></li>
                                </ul>
                            </li>

                            <li><?php echo link_to(image_tag('../images/relatorio.png','absolute=true').' Relatórios', '/sala') ?>
                                <ul class="sub_menu">
                                     <li><?php echo link_to(image_tag('../images/seta.png').' Alunos por Sala', '/vestibular') ?></li>
                                     <li><?php echo link_to(image_tag('../images/seta.png').' Resultado do Vestibular', '/vestibular') ?></li>
                                </ul>
                            </li>

                       </ul>


                  </div>
                  <?php } ?>
                   <div id="menu">
                      <li><?php echo link_to('Realizar Inscrição', '@inscricao') ?></li>
                      <li><?php echo link_to('Concorrencias Anteriores', '@concorrencia_vestibular') ?></li>

                  </div>
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
