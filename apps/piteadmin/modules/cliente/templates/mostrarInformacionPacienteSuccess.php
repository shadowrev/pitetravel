<?php use_helper('JavascriptBase') ?>
<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php echo javascript_tag('$().ready(function() {
        $("#form1").validate();
    });') ?>
<?php include_partial('submenu', array('current' => 'datos')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_cliente', array(
            'form' => $form,
            'paciente' => $paciente,
            'contact_form' => $contact_form,
            'ids_contactos' => $ids_contactos
        )) ?>
</div>