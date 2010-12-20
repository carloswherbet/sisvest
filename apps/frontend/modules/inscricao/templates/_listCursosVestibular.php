<div id="listCursosVestibular">
    <table>
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
                 <?php   echo link_to('listar Vestibulandos', '/web/vestibulando/vestibular/curso/'.$curso->getIdVestibularCurso().'/lancarpontuacao') ; ?>
           </td>
       </tr>

    <?php  endforeach; ?>
        </tbody>
    </table>
</div>


