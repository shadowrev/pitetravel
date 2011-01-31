<?php echo form_tag_for($form, '@sf_guard_user') ?>
<div class="formulario">
    <h2><?php echo ($form->getObject()->isNew()) ? 'Nuevo ' : 'Actualizar' ?>Usuario</h2>
</div>
<?php echo '</form>' ?>