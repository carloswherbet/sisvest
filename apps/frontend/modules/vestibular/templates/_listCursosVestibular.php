<div id="listControlCursosVestibular">
    <table id="table-list-cursos">
        <thead>
            <tr>
                <th>
                    Curso
                </th>
                <th>
                    Vagas
                </th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
    <?php foreach ($cursos as $curso): ?>
        <tr>
           <td>
               <?php  echo $curso->CURSO->getNmCurso() ; ?>
           </td>
            <td>
                <?php  echo $curso->getQtVagas() ; ?>
           </td>
           <td>
                <?php  // echo link_to('Retirar', 'vestibular/retirarcurso?curso='.$curso->getIdVestibularCurso(), array('confirm' => 'Deseja retirar o curso '.$curso->CURSO->getNmCurso().' deste Vestibular?'), '') ; ?>
           </td>
       </tr>

    <?php  endforeach; ?>
        </tbody>
    </table>
</div>
