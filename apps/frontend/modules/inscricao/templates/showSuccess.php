<table>
  <tbody>
    <tr>
      <th>Nome:</th>
      <td><?php echo $inscricao->getNmVestibulando() ?></td>
    </tr>
    <tr>
      <th>Enreço:</th>
      <td><?php echo $inscricao->getTeEndereco() ?></td>
    </tr>
    <tr>
      <th>Numero:</th>
      <td><?php echo $inscricao->getNuNumero() ?></td>
    </tr>
    <tr>
      <th>cpf:</th>
      <td><?php echo $inscricao->getNuCpf() ?></td>
    </tr>
    <tr>
      <th>Complemento:</th>
      <td><?php echo $inscricao->getTeComplemento() ?></td>
    </tr>
    <tr>
      <th>Bairro:</th>
      <td><?php echo $inscricao->getTeBairro() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $inscricao->getSgEstado() ?></td>
    </tr>
    <tr>
      <th>Cidade:</th>
      <td><?php echo $inscricao->getTeCidade() ?></td>
    </tr>
    <tr>
      <th>Fone:</th>
      <td><?php echo $inscricao->getNuFone() ?></td>
    </tr>
      <tr>
      <th>Data da Inscrição:</th>
      <td><?php echo format_date($inscricao->getDtInscricao(),'dd/MM/yyyy') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('inscricao/edit?id_inscricao='.$inscricao->getIdInscricao()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('inscricao/index') ?>">Voltar</a>
