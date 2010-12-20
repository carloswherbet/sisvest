<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('instituicao/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_instituicao='.$form->getObject()->getIdInstituicao() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('instituicao/1') ?>">Voltar</a>
          <?php if (!$form->getObject()->isNew()): ?>
            
          <?php endif; ?>
          <input type="submit" value="Salvar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nm_instituicao']->renderLabel() ?></th>
        <td>
          <?php echo $form['nm_instituicao']->renderError() ?>
          <?php echo $form['nm_instituicao'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['te_endereco']->renderLabel() ?></th>
        <td>
          <?php echo $form['te_endereco']->renderError() ?>
          <?php echo $form['te_endereco'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nu_numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['nu_numero']->renderError() ?>
          <?php echo $form['nu_numero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['te_complemento']->renderLabel() ?></th>
        <td>
          <?php echo $form['te_complemento']->renderError() ?>
          <?php echo $form['te_complemento'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['te_bairro']->renderLabel() ?></th>
        <td>
          <?php echo $form['te_bairro']->renderError() ?>
          <?php echo $form['te_bairro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['te_cidade']->renderLabel() ?></th>
        <td>
          <?php echo $form['te_cidade']->renderError() ?>
          <?php echo $form['te_cidade'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sg_estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['sg_estado']->renderError() ?>
          <?php echo $form['sg_estado'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nu_cnpj']->renderLabel() ?></th>
        <td>
          <?php echo $form['nu_cnpj']->renderError() ?>
          <?php echo $form['nu_cnpj'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nu_fone']->renderLabel() ?></th>
        <td>
          <?php echo $form['nu_fone']->renderError() ?>
          <?php echo $form['nu_fone'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
