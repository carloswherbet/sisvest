<?php use_helper('jQuery')?>
<h1>Vestibulares disponíveis para inscrição</h1>

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
      <td><?php echo  format_date($vestibular->getDtVestibular(),'dd/MM/yyyy') ?></td>
      <td><?php echo $vestibular->getSituacao() ?></td>
      <td><a href="<?php  echo  url_for('inscricao/new?vestibular='.$vestibular->getIdVestibular()) ?>">Inscrever</a>
                <?php // echo jq_link_to_remote('Teste', array('update' => array('success' => 'asdsa'),'url' => 'inscricao/new?vestibular='.$vestibular->getIdVestibular()));?>
      </td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>







