<?php use_helper('JavascriptBase') ?>
<?php include_partial('submenu', array('current' => 'datos')) ?>
<?php echo javascript_tag('$().ready(function() {
        $("#form1").validate();
    });') ?>
<div id="contenido-formulario">
<?php include_partial('formulario_cliente', array('form' => $form, 'contact_form' => $contact_form)) ?>
</div>