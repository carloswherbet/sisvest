<h1>Vestibular <?php echo $vestibular->VESTIBULAR->getTePeriodo() ?> em <?php echo format_date($vestibular->VESTIBULAR->getDtVestibular(),'D') ?>
</h1>




<?php
//echo "<pre>"; echo $dyn_form; exit; echo "</pre>";


 ?>

<?php   include_partial('lancarPontuacaoForm', array('dyn_form' => $dyn_form, 'inscricoes' => $inscricoes )) ?>

<div id="controles"> <?php echo link_to('Voltar','/web/vestibulando/vestibular/'.$vestibular->VESTIBULAR->getIdVestibular().'/list'); ?></div>


