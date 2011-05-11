<?php use_helper('JavascriptBase') ?>
<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php if($sf_context->getUser()->getFlash('mensaje_advertencia')): ?>
<div class="mensaje"><?php echo $sf_context->getUser()->getFlash('mensaje_advertencia') ?></div>
<?php endif; ?>
<?php endif; ?>
<?php echo javascript_tag('$().ready(function() {
        $("#form1").validate();
    });') ?>
<?php include_partial('submenu', array('current' => 'vuelo')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_vuelo', array('form' => $form)) ?>
</div>