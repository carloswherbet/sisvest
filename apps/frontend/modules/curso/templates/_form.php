<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<fieldset>
  <legend>Detalhes Curso</legend>
<form action="<?php echo url_for('curso/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_curso='.$form->getObject()->getIdCurso() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>        
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;
          <?php endif; ?>
          <?php echo $form->renderHiddenFields(false) ?>
          <?php echo $form->renderGlobalErrors() ?>

              <dl>
                  <dt><?php echo $form['nm_curso']->renderLabel() ?></dt>
                  <dd>
                       <?php echo $form['nm_curso']->renderError() ?>
                       <?php echo $form['nm_curso'] ?>
                  </dd>
                  <dt><?php echo $form['te_cargahoraria']->renderLabel() ?></dt>
                  <dd>
                      <?php echo $form['te_cargahoraria']->renderError() ?>
                      <?php echo $form['te_cargahoraria'] ?>
                  </dd>
                       <input type="submit" value="Salvar" />
              </dl>

         
      

</form>
 </fieldset>
<div id="controles">
         &nbsp;<a href="<?php echo url_for('curso/index') ?>">Voltar</a>    
</div>