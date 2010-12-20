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
    <link href="/web/css/relatorio.css" media="screen" type="text/css" rel="stylesheet">
    
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
       $(document).ready(function() {
          $('body').prepend('<a id="print" href="#">Clique aqui para imprimir</a>');
          $('a#print').click(function() {
                window.print();
           return false;
                });
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

     
        <div id="topo">
            <div id="logo">
                <?php echo image_tag('../images/logo-PB.png')?>
            </div>
            <div id="relatorio-title"> Relatório</div>
            

        </div>
                 
          <div id="content">
            <?php echo $sf_content ?>
          </div>

      

  
</body>
</html>
