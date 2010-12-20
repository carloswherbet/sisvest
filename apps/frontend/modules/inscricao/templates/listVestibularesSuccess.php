
<h1>Vestibulares</h1>

<table>
  <thead>
    <tr>      
      <th>Vestibular</th>
      <th>Horário</th>
      <th>Data do Vestibular</th>
      <th>Situação</th>
      <th >Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vestibula_rs as $vestibular): ?>
    <tr>
      <td><?php echo $vestibular->getTePeriodo() ?></td>
      <td><?php echo $vestibular->getTeHorario() ?></td>
      <td><?php echo  format_date($vestibular->getDtVestibular(),'D') ?></td>
      <td><?php echo $vestibular->getSituacao() ?></td>
      <td><a href="<?php  echo  url_for('/web/vestibulando/vestibular/'.$vestibular->getIdVestibular()).'/list' ?>">Listar Cursos</a>

      </td>
          
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="controles">  <a href="<?php echo url_for('vestibular') ?>">Voltar</a></div>





