<h1>Vestibular <?php echo $vestibular->getTePeriodo() ?> em <?php echo format_date($vestibular->getDtVestibular(),'D') ?>   
</h1>



      







<?php  include_partial('listCursosVestibular', array('cursos' => $cursos,)) ?>

<div id="controles">  <a href="<?php echo url_for('vestibular') ?>">Voltar</a></div>


