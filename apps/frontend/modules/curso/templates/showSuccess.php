<fieldset>
    <legend>Detalhes do Curso</legend>
    <dl>
        <dt>Curso:</dt> <dd><?php echo $curso->getNmCurso() ?></dd>
        <dt>Carga Horária:</dt><dd><?php echo $curso->getTeCargahoraria() ?></dd>
      </dl>

</fieldset>
<div id="controles">
<a href="<?php echo url_for('curso/edit?id_curso='.$curso->getIdCurso()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('curso/index') ?>">Voltar</a>
</div>