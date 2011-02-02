<?php include_partial('submenu', array('current' => 'usuarios')) ?>
<div id="contenido-formulario">
    <?php echo form_tag_for($form, '@sf_guard_user') ?>
    <div class="formulario">
        <h2><?php echo ($form->getObject()->isNew()) ? 'Nuevo ' : 'Actualizar ' ?>Usuario</h2>
        <?php include_partial('user_form', array(
            'form' => $form
        )) ?>
    </div>
    <div class="formulario">
        <h2>Informaci&oacute;n Adicional del M&eacute;dico</h2>
        <?php include_partial('medico_form', array(
            'medico_form' => $medico_form
        )) ?>
    </div>
    <div class="formulario">
        <h2>Grupos de Usuarios</h2>
        <?php include_partial('user_group_form', array(
            'form' => $form
        )) ?>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button" onclick="location.href = '<?php echo url_for('@sf_guard_user') ?>'">Volver</button>
    </div>
    <?php echo '</form>' ?>
</div>