<h1>Lista de Salas</h1>

<table>
  <thead>
    <tr>
      
      <th>Descrição da Sala</th>      
      <th colspan="2">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sal_as as $sala): ?>
    <tr>
      
      <td><?php echo $sala->getNmSala() ?></td>
      <td> <?php echo link_to('Excluir', 'sala/delete?id_sala='.$sala->getIdSala(), array('method' => 'delete', 'confirm' => 'Deseja realmente excluir esta Sala')) ?></td>
      <td><a href="<?php echo url_for('sala/show?id_sala='.$sala->getIdSala()) ?>">Detalhar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="controles">
  <a href="<?php echo url_for('sala/new') ?>">Novo</a>
</div>