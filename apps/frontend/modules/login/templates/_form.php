<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('curso/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_curso='.$form->getObject()->getIdCurso() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('curso/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nm_curso']->renderLabel() ?></th>
        <td>
          <?php echo $form['nm_curso']->renderError() ?>
          <?php echo $form['nm_curso'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['te_cargahoraria']->renderLabel() ?></th>
        <td>
          <?php echo $form['te_cargahoraria']->renderError() ?>
          <?php echo $form['te_cargahoraria'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>


