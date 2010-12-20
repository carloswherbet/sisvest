<?php if (isset($vestibular)) {?>
<h1>Inscrição no Vestibular </h1>
<?php } else { ?>
<h1>Inscrição no Vestibular </h1>
<?php } ?>
<br/>


        <dt><b>Vestibular <?php echo $vestibular->getTePeriodo()  ?></b></dt>
        <dt>Data de Realização da Prova: <?php echo format_date($vestibular->getDtVestibular(), 'D');?> </dt>




<?php include_partial('formnew', array('form' => $form)) ?>
