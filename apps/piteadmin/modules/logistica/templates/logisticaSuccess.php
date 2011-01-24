<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'logistica')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_logistica', array(
    'form_contacto' => $form_contacto,
    'form_responsable' => $form_responsable,
    'form_logistica' => $form_logistica
)) ?>
</div>