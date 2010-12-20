Curso:<?php echo $curso->getNmCurso() ?><br>
Carga Horária: <?php echo $curso->getTeCargahoraria() ?><br>
      
<hr />

<a href="<?php echo url_for('curso/edit?id_curso='.$curso->getIdCurso()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('curso/index') ?>">List</a>
