<h1>Lista de Cursos</h1>

<table>
  <thead>
    <tr>
      <th>Curso</th>
      
      <th colspan="3">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($curs_os as $curso): ?>
    <tr>
      
      <td><?php echo $curso->getNmCurso() ?></td>
      
      <td><a href="<?php echo url_for('curso/show?id_curso='.$curso->getIdCurso()) ?>">Detalhar</a></td>
      <td><a href="<?php echo url_for('curso/edit?id_curso='.$curso->getIdCurso()) ?>">Editar</a></td>
      <td><?php echo link_to('Delete', 'curso/delete?id_curso='.$curso->getIdCurso(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="controles">
  <a href="<?php echo url_for('curso/new') ?>">Novo</a>
</div>