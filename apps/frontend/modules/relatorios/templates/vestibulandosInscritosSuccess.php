
<h2>Inscrições no Vestibular</h2>
<?php echo "<b>Vestibular: ".$vestibular->getTePeriodo()." em ".format_date($vestibular->getDtVestibular(), 'D')."</b>"; ?>
<table id="relatorio">
    <thead>
        <tr>
            <th>Nº</th>
            <th>Vestibulando</th>
            <th>Nº de <br/>Inscrição</th>
            <th>CPF</th>
            <th>Curso</th>
            <th>Data da <br/>Inscrição</th>
            
        </tr>
    </thead>
    <tfoot>

    </tfoot>
    <tbody>
<?php   $i = 0;
        foreach ($inscricoes as $inscricao) {
        $i = $i +1
        ?>
        <tr>
            <td class="tdnum"><?php echo $i ?></td>
            <td><?php echo ucwords(strtolower($inscricao->getNmVestibulando())) ?></td>
            <td class="tdnuminscricao"><?php echo $inscricao->getIdInscricao() ?></td>
            <td class="tdcpf"><?php echo $inscricao->getNuCpf() ?></td>
            <td class="tdcurso"><?php echo $inscricao->getVESTIBULARCURSO() ?></td>
            <td class="tdcurso"><?php echo format_date($inscricao->getDtInscricao(),'dd/MM/yyyy') ?></td>
            
 
        </tr>
<?php } ?>
    </tbody>
</table>
