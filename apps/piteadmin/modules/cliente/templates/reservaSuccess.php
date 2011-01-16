<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre'); ?></em></h2>

<?php if($sf_context->getUser()->getFlash('mensaje_advertencia')): ?>
<div class="mensaje"><?php echo $sf_context->getUser()->getFlash('mensaje_advertencia'); ?></div>
<?php endif; ?>
<?php endif; ?>

<?php include_partial('submenu', array('current' => 'hospedaje')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_hotel', array('form' => $form)) ?>
</div>