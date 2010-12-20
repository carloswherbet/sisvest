<h1>Lista de Inscritos</h1>
<div id="controles">  <a href="<?php echo url_for('vestibular') ?>">Voltar</a></div>
<table>
  <thead>
    <tr>
      <th>Nº</th>
      
      <th>Vestibulando</th>
      <th>Nº de Inscrição</th>
      <th>CPF</th>
      <th>Curso Escolhido</th>
      <th>Telefone</th>
      <th>Cidade / UF</th>
      
      
      
      
      <th>Dt inscricao</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($inscricoes as $inscricao):
      $i = $i + 1;
        ?>
    <tr>
      <td><?php echo $i ?></td>
     <td><?php echo $inscricao->getNmVestibulando() ?></td>
      <td><a href="<?php echo url_for('inscricao/show?id_inscricao='.$inscricao->getIdInscricao()) ?>"><?php echo $inscricao->getIdInscricao() ?></a></td>
      <td><?php echo $inscricao->getNuCpf() ?></td>
      <td><?php echo $inscricao->getVESTIBULARCURSO() ?></td>
      <td><?php echo $inscricao->getNuFone() ?></td>
      <td><?php //echo $inscricao->getTeEndereco().' ' ?>
          <?php // echo $inscricao->getNuNumero().', ' ?>
          <?php //echo $inscricao->getTeComplemento().'  ' ?>
          <?php //echo $inscricao->getTeBairro().' ' ?>
          <?php echo '***'.strtoupper($inscricao->getTeCidade()).' - ' ?>
          <?php echo $inscricao->getSgEstado() ?>
      
      <td><?php echo format_date($inscricao->getDtInscricao(),'dd/MM/yyyy') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="controles">  <a href="<?php echo url_for('vestibular') ?>">Voltar</a></div>