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
                    Inscritos
                </th>
                <th>
                    Concorrencia
                </th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
    <?php

   // echo "<pre>"; var_dump($cursos); exit; echo "</pre>";
    foreach ($cursos as $curso): ?>
        <tr>
           <td>
               <?php  echo $curso['CURSO']['nm_curso'] ; ?>
           </td>
            <td>
                <?php  echo $curso['qt_vagas'] ; ?>
           </td>
           <td>
                <?php  echo $curso['inscritos'] ; ?>
           </td>
            <td>
                <?php  echo number_format($curso['inscritos']/$curso['qt_vagas'],2,',','').'%' ; ?>
           </td>
       </tr>

    <?php  endforeach; ?>
        </tbody>
    </table>
</div>
