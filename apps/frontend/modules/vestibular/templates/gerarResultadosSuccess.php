
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<h1>Gerar Resultados</h1><?php echo $form["id_vestibular"]->render();?>
<b>Vestibular:</b> <?php echo  $vestibular->getTePeriodo().' em '.format_date($vestibular->getDtVestibular(), 'D'); ?><br/><br/>
<form action="/web/vestibular/gerarresultados/process" method="post" >
	<?php echo $form["id_vestibular"]->render();?>

	<b>Informe a pontuação Mínima para gerar o resultado:</b> <?php echo $form["pontuacao_min"]->render();?>

	<input type="submit" value="Gerar Resultados" />
</form>


