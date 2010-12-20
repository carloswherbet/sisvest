<h1>Lista de Inscritos</h1>

<table>
  <thead>
    <tr>
      <th>Id inscricao</th>
      <th>Id vestibular curso</th>
      <th>Id sala</th>
      <th>Nm vestibulando</th>
      <th>Te endereco</th>
      <th>Nu numero</th>
      <th>Nu cpf</th>
      <th>Te complemento</th>
      <th>Te bairro</th>
      <th>Sg estado</th>
      <th>Te cidade</th>
      <th>Nu fone</th>
      <th>Te resultado</th>
      <th>Nu pontuacao</th>
      <th>Dt inscricao</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($inscrica_os as $inscricao): ?>
    <tr>
      <td><a href="<?php echo url_for('inscricao/show?id_inscricao='.$inscricao->getIdInscricao()) ?>"><?php echo $inscricao->getIdInscricao() ?></a></td>
      <td><?php echo $inscricao->getVESTIBULARCURSO() ?></td>
      <td><?php echo $inscricao->getIdSala() ?></td>
      <td><?php echo $inscricao->getNmVestibulando() ?></td>
      <td><?php echo $inscricao->getTeEndereco() ?></td>
      <td><?php echo $inscricao->getNuNumero() ?></td>
      <td><?php echo $inscricao->getNuCpf() ?></td>
      <td><?php echo $inscricao->getTeComplemento() ?></td>
      <td><?php echo $inscricao->getTeBairro() ?></td>
      <td><?php echo $inscricao->getSgEstado() ?></td>
      <td><?php echo $inscricao->getTeCidade() ?></td>
      <td><?php echo $inscricao->getNuFone() ?></td>
      <td><?php echo $inscricao->getTeResultado() ?></td>
      <td><?php echo $inscricao->getNuPontuacao() ?></td>
      <td><?php echo $inscricao->getDtInscricao() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('inscricao/new') ?>">Novo</a>
