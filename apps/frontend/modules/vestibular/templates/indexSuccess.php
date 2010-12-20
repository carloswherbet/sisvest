<h1>Vestibulares </h1>
<form action="/web/vestibular"   method="post">
<fieldset id="buscar">
    <legend> Buscar </legend>
    <dl>
        <?php echo $filtro['te_periodo']->render(); ?>  <input type="submit" value="localizar" >
    </dl>
</fieldset>
</form>


<?php foreach ($vestibula_rs as $vestibular): ?>
<div id="list-vestibular">
    <div class="dados-vestibular">
        <b>Vestibular  <?php echo $vestibular->getTePeriodo() ?> <br/>
        em <?php echo  format_date($vestibular->getDtVestibular(),'D') ?>.</b>
         <div class="acao-vestibular">
            <li><?php echo image_tag('../images/seta.png')?><a href="<?php echo url_for('vestibular/show?id_vestibular='.$vestibular->getIdVestibular()) ?>">Detalhar</a></li>
            <li><?php echo image_tag('../images/seta.png')?><a href="<?php echo url_for('vestibular/edit?id_vestibular='.$vestibular->getIdVestibular()) ?>">Editar</a></li>
            <li><?php echo image_tag('../images/seta.png')?><a href="<?php echo url_for('vestibular/edit?id_vestibular='.$vestibular->getIdVestibular().'&curso=') ?>">Alterar Cursos</a></li>
            <li><?php echo image_tag('../images/seta.png').link_to('Excluir', 'vestibular/delete?id_vestibular='.$vestibular->getIdVestibular(), array('method' => 'delete', 'confirm' => 'Deseja Apagar?' )) ?></li>
        </div>


        <div class="situacao">
            Situação: <b><?php echo $vestibular->getSituacao() ?></b>
        </div>

    </div>
    <div class="cursos-vestibular">
        <b>Cursos do Vestibular</b> <br/>

        <?php
        $cursos = $vestibular->getCursosDoVestibular($vestibular->getIdVestibular());
        foreach ($cursos as $curso) {
            echo "<div class='curso'>". $curso['CURSO']['nm_curso']." - Vagas: ".$curso['qt_vagas']." </div>";

        }
        ?>
    </div>

    <div class="acoes">
        <b>Operações</b>
        <li><?php
        // Contagem dos Vestibulandos Inscritos e Vestilando em salas
                  $countinsc = $vestibular->getConteVestibulandosInscritos($vestibular->getIdVestibular());
                  $countinscsalas = $vestibular->getConteVestibulandosAlocados($vestibular->getIdVestibular());

				 if($vestibular->getSgSituacao() != "R") {
	                  echo link_to(image_tag('../images/bola-verde.png').'  Listar Vestibulandos Inscritos', '/web/vestibular/'.$vestibular->getIdVestibular().'/inscricoes');
	                  echo " <i>(".$countinsc.")</i>";
                          

                  } else {
                  	  echo image_tag('../images/bola-cinza.png')." Listar Vestibulandos Inscritos";
	                  echo " <i>(".$countinsc.")</i>";
                          echo link_to(image_tag('../images/relatorio2-hover.png'), '/web/relatorio/inscricoes/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio'));
                  }

          ?></li>


        <li><?php

              if($vestibular->getSgSituacao()== "E") {
                    echo link_to(image_tag('../images/bola-verde.png').'  Alocar Vestibulandos', '/web/alocarvestibulandos/vestibular/'.$vestibular->getIdVestibular(), array('confirm' => 'Deseja Realizar a Alocação Automática dos Vestibulandos em Sala de Aula?' ));
                    if ($countinsc ==  $countinscsalas) {
                      echo " <i>(Alocados ".$countinscsalas."/".$countinsc.")</i> ".
                       link_to(image_tag('../images/relatorio2-hover.png'), '/web/relatorio/vestibulandosxsalas/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio'));
                    }

                }
            elseif ($vestibular->getSgSituacao()== "AR" or $vestibular->getSgSituacao()== "R")
                {
                    echo image_tag('../images/bola-cinza.png')." Alocar Vestibulandos";
                     if ($countinsc ==  $countinscsalas) {
                      echo " <i>(Alocados ".$countinscsalas."/".$countinsc.")</i> ".
                      link_to(image_tag('../images/relatorio2-hover.png'), '/web/relatorio/vestibulandosxsalas/'.$vestibular->getIdVestibular().'', Array('popup' => Array('Relatório Vestibulandos Alocados em Sala','width=780,height=600,left=320,top=0,scrollbars=yes,toolbar=no,location=0'),  'target' => '_relatorio'));

                    }

                } else {
                       echo image_tag('../images/bola-cinza.png')." Alocar Vestibulandos (<i>pendências</i>)";
                        }
            ?>

        </li>
        <li><?php

              if($vestibular->getSgSituacao()== "AR"  ) {
                    echo link_to(image_tag('../images/bola-verde.png').'  Lançar Pontuação', '/web/vestibulando/vestibular/'. $vestibular->getIdVestibular().'/list');
                }
              elseif ($vestibular->getSgSituacao()== "R" )
                {
                    echo image_tag('../images/bola-cinza.png')." Lançar Pontuação (<i>Concluído</i>)";

                } else {

                         echo image_tag('../images/bola-cinza.png')." Lançar Pontuação (<i>pendências</i>)";
                        }

                ?>
        </li>
        <li> <?php

              if($vestibular->getSgSituacao()== "AR") {
                    echo link_to(image_tag('../images/bola-verde.png').'  Gerar Resultado do Vestibular', '/web/vestibular/'.$vestibular->getIdVestibular().'/gerarresultados');
                }
                elseif ($vestibular->getSgSituacao() == "R")
                {
                    echo image_tag('../images/bola-cinza.png')." Gerar Resultados (<i>concluído</i>)";

                } else {
                        echo image_tag('../images/bola-cinza.png')." Gerar Resultados (<i>pendências</i>)";
                        }
                ?>
        </li>
                <li> <?php

              if($vestibular->getSgSituacao()== "R") {
                    echo link_to(image_tag('../images/bola-verde.png').'  Relatórios', '/web/relatorios/'.$vestibular->getIdVestibular());
                }
                elseif ($vestibular->getSgSituacao() == "AR")
                {
                    echo image_tag('../images/bola-cinza.png')." Relatórios (<i>Ventibular não finalizado</i>)";

                } else {
                        echo image_tag('../images/bola-cinza.png')." Relatórios (<i>Ventibular não finalizado</i>)";
                        }
                ?>
        </li>


    </div>

</div>
<?php endforeach; ?>


<div id="controles">  <a href="<?php echo url_for('vestibular/new') ?>">Novo</a></div>
