<script type="text/javascript">
       $(document).ready(function() {
          $('#comprovante').prepend('<a id="print" href="#">Clique aqui para imprimir</a>');
          $('a#print').click(function() {
                window.print();
           return false;
                });
            });

</script>

<fieldset id="comprovante">
	<legend>Comprovante de Inscrição Nº - <?php echo $inscricao->getIdInscricao() ?></legend>

	<fieldset>
		<legend>Vestibular - <?php  echo $inscricao->VESTIBULARCURSO->VESTIBULAR->getTePeriodo() ?></legend>
		<dl>
			<dt>Data:</dt>
				<dd><?php echo format_date($inscricao->VESTIBULARCURSO->VESTIBULAR->getDtVestibular(),'D') ?></dd>
			<dt>Curso:</dt>
				<dd><?php echo $inscricao->getVESTIBULARCURSO() ?> </dd>
		</dl>
	</fieldset>

	<dl>
		<dt>Nome:</dt>
			<dd><?php echo ucwords(strtolower ($inscricao->getNmVestibulando())) ?></dd>
		<dt>Endereço:</dt>
			<dd><?php echo ucwords(strtolower ($inscricao->getTeEndereco())) ?> , <?php echo $inscricao->getNuNumero() ?>  <?php echo $inscricao->getTeComplemento() ?></dd>
		<dt>CPF</dt>
			<dd><?php echo $inscricao->getNuCpf() ?></dd>
		<dt>Bairro:</dt>
			<dd><?php echo ucwords(strtolower ($inscricao->getTeBairro())) ?> </dd>
		<dt>Cidade/Estado</dt>
			<dd><?php echo ucwords(strtolower ($inscricao->getTeCidade())) ?> / <?php echo $inscricao->getSgEstado() ?> </dd>
		<dt>Fone</dt>
			<dd><?php echo $inscricao->getNuFone() ?></dd>
		<dt>Data da Inscrição:</dt>
			<dd><?php echo format_date($inscricao->getDtInscricao(),'D') ?></dd>
	</dl>
</fieldset>

<div id="controles">
	<a href="<?php echo url_for('inscricao/index') ?>">Voltar</a>
</div>