
<?php use_stylesheets_for_form($dyn_form) ?>
<?php use_javascripts_for_form($dyn_form) ?>

<form action="/web/vestibulando/vestibular/lancarpontuacao" method="post" >



<table>
    <thead>
        <th>Vestibulando</th>
        <th>CPF</th>
        <th>Pontuação</th>
    </thead>
    <tfoot>
         <tr>
             <td>
             <input type="submit" value="Salvar" />
             </td>
        </tr>
    </tfoot>

    <tbody>
        <?php foreach ($inscricoes as $inscricao) { ?>
        <tr>
            <td><?php echo $inscricao->getNmVestibulando(); ?></td>
            <td><?php echo $inscricao->getNuCpf(); ?></td>
            <td><?php echo $dyn_form["nu_pontuacao[".$inscricao->getIdInscricao()."]"]->render(); ?></td>
        </tr>
           <?php }?>
        </tbody>
</table>
</form>


