<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('inscricao/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_inscricao='.$form->getObject()->getIdInscricao() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $form->renderHiddenFields(false) ?>
 <?php echo $form->renderGlobalErrors() ?>
<fieldset>
    <legend>Deatallhes da Inscrição</legend>
    <dl>
        <dt><?php echo $form['id_vestibular_curso']->renderLabel() ?></dt>
        <dd>
             <?php echo $form['id_vestibular_curso']->renderError() ?>
            <?php echo $form['id_vestibular_curso'] ?>
        </dd>

        <dt><?php echo $form['nm_vestibulando']->renderLabel() ?></dt>
        <dd>
              <?php echo $form['nm_vestibulando']->renderError() ?>
              <?php echo $form['nm_vestibulando'] ?>
        </dd>

        <dt><?php echo $form['te_endereco']->renderLabel() ?></dt>
        <dd>
               <?php echo $form['te_endereco']->renderError() ?>
              <?php echo $form['te_endereco'] ?>
        </dd>

        <dt><?php echo $form['nu_numero']->renderLabel() ?></dt>
        <dd>
             <?php echo $form['nu_numero']->renderError() ?>
              <?php echo $form['nu_numero'] ?>
        </dd>

        <dt><?php echo $form['te_complemento']->renderLabel() ?></dt>
        <dd>
             <?php echo $form['te_complemento']->renderError() ?>
            <?php echo $form['te_complemento'] ?>

        </dd>

        <dt><?php echo $form['nu_cpf']->renderLabel() ?></dt>
        <dd>
              <?php echo $form['nu_cpf']->renderError() ?>
              <?php echo $form['nu_cpf'] ?>
              <?php echo $form['nu_cpf']->renderHelp() ?>
        </dd>

        <dt><?php echo $form['te_bairro']->renderLabel() ?></dt>
        <dd>
          <?php echo $form['te_bairro']->renderError() ?>
          <?php echo $form['te_bairro'] ?>
        </dd>

        <dt><?php echo $form['sg_estado']->renderLabel() ?></dt>
        <dd>
          <?php echo $form['sg_estado']->renderError() ?>
          <?php echo $form['sg_estado'] ?>
        </dd>

        <dt><?php echo $form['te_cidade']->renderLabel() ?></dt>
        <dd>
          <?php echo $form['te_cidade']->renderError() ?>
          <?php echo $form['te_cidade'] ?>
        </dd>

        <dt><?php echo $form['nu_fone']->renderLabel() ?></dt>
        <dd>
          <?php echo $form['nu_fone']->renderError() ?>
          <?php echo $form['nu_fone'] ?>
        </dd>




    </dl>




</fieldset>



<div id="controles">
             <a href="<?php echo url_for('inscricao/index') ?>">Voltar</a>
             <?php if (!$form->getObject()->isNew()): ?>
               <?php // echo link_to('Delete', 'inscricao/delete?id_inscricao='.$form->getObject()->getIdInscricao(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
             <?php endif; ?>
          <input type="submit" value="Salvar" />
</div>
</form>