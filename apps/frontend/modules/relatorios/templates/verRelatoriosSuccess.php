<h1>Relatórios</h1>

<fieldset>
    <legend> Dados do Vestibular</legend>
    <dt>Vestibular: <?php echo $vestibular->getTePeriodo();?> - <i><?php echo $vestibular->getSituacao();?></i> </dt>
    <dt>em <?php echo format_date($vestibular->getDtVestibular(),'D');?> </dt>
    <dt></dt>
    

</fieldset>

<fieldset id="ver_relatorios">
    <legend>Relatórios</legend>
    <dl>
        <dt><?php echo link_to(image_tag('../images/relatorio2-hover.png').' Inscrições no Vestibular', '/web/relatorio/inscricoes/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio')); ?></dt>
            <dd>Relatórios com todos os Vestibulandos Inscritos neste vestibular</dd>
        <dt><?php echo link_to(image_tag('../images/relatorio2-hover.png').' Vestibulandos em Sala', '/web/relatorio/vestibulandosxsalas/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio')); ?></dt>
            <dd> Relatório com todos os inscritos no vestibular alocados em sala de aula.</dd>
        <dt><?php echo link_to(image_tag('../images/relatorio2-hover.png').' Resultado do Vestibular', '/web/relatorio/resultadovestibular/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio')); ?></dt>
            <dd> Relatório do Resultado do Vestibular. Exibe os vestibulandos aprovados e reprovados neste vestibular</dd>


    </dl>


    
</fieldset>

<div id="controles">  <a href="<?php echo url_for('vestibular') ?>">Voltar</a></div>
