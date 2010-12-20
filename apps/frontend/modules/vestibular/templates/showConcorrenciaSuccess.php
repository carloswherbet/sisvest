<h1>Concorrência do Vestibular de <?php echo $vestibular->getTePeriodo() ?> realizado em <?php echo format_date($vestibular->getDtVestibular(),'D') ?></h1>
<table>
  <tbody>
    <tr>
      <th>Vestibular:</th>
      <td><?php echo $vestibular->getTePeriodo() ?></td>
    </tr>
    <tr>
      <th>Horário:</th>
      <td><?php echo $vestibular->getTeHorario() ?></td>
    </tr>
    <tr>
      <th>Data do Vestibular:</th>
      <td><?php echo format_date($vestibular->getDtVestibular(),'dd/MM/yyyy') ?></td>
    </tr>
    <tr>
      <th>Situação do Vestibular:</th>
      <td><?php echo $vestibular->getSituacao() ?></td>
    </tr>
  </tbody>
</table>

<?php include_partial('listCursosVestibularConcorrencia', array('cursos' => $cursos)) ?>
<div id="controles">
            <a href="<?php echo url_for('vestibular/concorrencia') ?>">Voltar</a>
</div>