<?php include_partial('submenu', array('current' => 'usuarios')) ?>
<div id="contenido-formulario">
    <?php echo form_tag_for($form, '@sf_guard_user') ?>
    <div class="formulario">
        <h2><?php echo ($form->getObject()->isNew()) ? 'Nuevo ' : 'Actualizar' ?>Usuario</h2>
        <?php include_partial('user_form', array(
            'form' => $form
        )) ?>
    </div>
    <?php echo '</form>' ?>
</div>