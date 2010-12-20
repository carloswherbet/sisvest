<fieldset>
    <legend>Destalhes da Instituição</legend>
    <dl>
    
    
    
      <dt>Instituicao:</dt>
      <dd><?php echo $instituicao->getNmInstituicao() ?></dd>
    
    
      <dt>Endereco:</dt>
      <dd><?php echo $instituicao->getTeEndereco() ?> Nº <?php echo $instituicao->getNuNumero() ?> <?php echo $instituicao->getTeComplemento() ?></dd>
    

    
      <dt>Bairro:</dt>
      <dd><?php echo $instituicao->getTeBairro() ?></dd>
    
    
      <dt>Cidade/UF:</dt>
      <dd><?php echo $instituicao->getTeCidade() ?> - <?php echo strtoupper($instituicao->getSgEstado()) ?> </dd>
    
   
      <dt>CNPJ:</dt>
      <dd><?php echo $instituicao->getNuCnpj() ?></dd>
    
    
      <dt>Fone:</dt>
      <dd><?php echo $instituicao->getNuFone() ?></dd>
</dl>
</fieldset>

<hr />
<div id="controles">
    <a href="<?php echo url_for('instituicao/edit?id_instituicao='.$instituicao->getIdInstituicao()) ?>">Editar</a>
</div>

