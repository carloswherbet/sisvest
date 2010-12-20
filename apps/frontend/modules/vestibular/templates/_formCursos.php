<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('vestibular/'.($form->getObject()->isNew() ? 'create' : 'CursosUpdate').(!$form->getObject()->isNew() ? '?id_vestibular='.$form->getObject()->getIdVestibular() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="addVestibular">
  <?php echo  $form->renderGlobalErrors() ?>
<fieldset>
    <legend> Dados do Vestibular </legend>
  <dl>
      
      <dt><?php echo $form['te_periodo']->renderLabel() ?></dt>
         
          <dd> <?php echo $form['te_periodo']->renderError() ?><?php echo $form['te_periodo'] ?></dd>
          <dd><?php echo $form['te_periodo']->renderHelp() ?></dd>
                           
      <dt><?php echo $form['te_horario']->renderLabel() ?></dt>
       
          <dd> <?php echo $form['te_horario']->renderError() ?><?php echo $form['te_horario'] ?>  </dd>
          <dd><?php echo $form['te_horario']->renderHelp() ?></dd>
      <dt><?php echo $form['dt_vestibular']->renderLabel() ?></dt>
        
          <dd> <?php echo $form['dt_vestibular']->renderError() ?><?php echo $form['dt_vestibular'] ?> </dd>

      <dt><?php echo $form['sg_situacao']->renderLabel() ?></dt>
         
          <dd><?php echo $form['sg_situacao']->renderError() ?><?php echo $form['sg_situacao'] ?> </dd>

    </dl>
    <div id="addCursoVestibular">
    <fieldset>
        <legend> Adicionar Curso no Vestibular </legend>
        <dl>
            <?php echo $form['CursosDoVestibular'] ?>
       
            <fieldset>
                <legend> Cursos Adicionados </legend>
                <dl>
                    <?php include_partial('listControlCursosVestibular', array('cursos' => $cursos, 'form' => $form)) ?>
                </dl>
            </fieldset>
            
        </dl>
    </fieldset>
    </div>
    
</fieldset>
    
</div>



<div id="controles">
    <?php echo $form->renderHiddenFields(false) ?>
    <a href="<?php echo url_for('vestibular/index') ?>">Voltar</a>
    <?php if (!$form->getObject()->isNew()): ?>
    <?php //echo link_to('Delete', 'vestibular/delete?id_vestibular='.$form->getObject()->getIdVestibular(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
    <?php endif; ?>
    <input type="submit" value="Adicionar" />
</div>
</form>