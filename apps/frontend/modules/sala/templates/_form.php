<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('sala/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_sala='.$form->getObject()->getIdSala() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php echo $form->renderHiddenFields(false) ?>
<?php echo $form->renderGlobalErrors() ?>
<fieldset>
    <legend>Detalhes da Sala</legend>

    <dl>
        <dt>Nome da Sala</dt>
        <dd>
            <?php echo $form['nm_sala']->renderError() ?>
            <?php echo $form['nm_sala'] ?>
        </dd>
        <dt>Quantidade max. suportada</dt>
        <dd>
             <?php echo $form['qt_max_suportada']->renderError() ?>
             <?php echo $form['qt_max_suportada'] ?>
        </dd>
    </dl>

</fieldset>



<div id="controles">
        &nbsp;<a href="<?php echo url_for('sala/index') ?>">Voltar</a>
          
           
          
        <input type="submit" value="Salvar" />
</div>
</form>