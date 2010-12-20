<table>
  <tbody>
    
    <tr>
      <th>Descrição da Sala</th>
      <td><?php echo $sala->getNmSala() ?></td>
    </tr>
    <tr>
      <th>Quantidade max. suportada:</th>
      <td><?php echo $sala->getQtMaxSuportada() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sala/edit?id_sala='.$sala->getIdSala()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('sala/index') ?>">Voltar</a>
