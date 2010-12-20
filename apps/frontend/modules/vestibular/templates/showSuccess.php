<div id="addCursoVestibular">
<fieldset>
    <legend>Detalhes do Vestibular</legend>
    <dl>

    
    
      <dt>Período:</dt>
      <dd><?php echo $vestibular->getTePeriodo() ?></dd>
    
    
      <dt>Horário:</dt>
      <dd><?php echo $vestibular->getTeHorario() ?></dd>
    
    
      <dt>Data do vestibular:</dt>
      <dd><?php echo format_date($vestibular->getDtVestibular(),'D') ?></dd>
    
    
      <dt>Situacao:</dt>
      <dd><?php echo $vestibular->getSituacao() ?></dd>
    </dl>
    <fieldset>
        <legend>Cursos Ofertados</legend>
        <dl>
              <?php include_partial('listCursosVestibular', array('cursos' => $cursos)) ?>
        </dl>
    </fieldset>
</fieldset>
</div>
<div id="controles">
<a href="<?php echo url_for('vestibular/edit?id_vestibular='.$vestibular->getIdVestibular()."&curso=") ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('vestibular/index') ?>">Voltar</a>
</div>