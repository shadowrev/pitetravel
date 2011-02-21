<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'info')) ?>
<div id="contenido-formulario">
<?php $array_elementos = array('form' => $form);
if(isset($altapostoperatoria)) $array_elementos['altapostoperatoria'] = $altapostoperatoria;
include_partial('alta', $array_elementos) ?>
</div>