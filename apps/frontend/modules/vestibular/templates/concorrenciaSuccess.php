<h1>Concorrência Vestibulares Anteriores</h1>

<table>
  <thead>
    <tr>      
      <th>Vestibular</th>
      <th>Horário</th>
      <th>Data do Vestibular</th>
      <th>Situação</th>
      <th>Ações</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vestibula_rs as $vestibular): ?>
    <tr>
      <td><?php echo $vestibular->getTePeriodo() ?></td>
      <td><?php echo $vestibular->getTeHorario() ?></td>
      <td><?php echo format_date($vestibular->getDtVestibular(),'dd/MM/yyyy') ?></td>
      <td><?php echo $vestibular->getSituacao() ?></td>
      <td><a href="<?php echo url_for('vestibular/show?id_vestibular='.$vestibular->getIdVestibular().'&concorrencia=') ?>"><?php echo image_tag('../images/edit.png') ?> Detalhar Concorrencia</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="controles">  <a href="<?php echo url_for('vestibular/new') ?>">Novo</a></div>
