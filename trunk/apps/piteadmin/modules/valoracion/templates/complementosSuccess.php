<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'otros')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_complemento', array(
    'preoperatorio_form' => $preoperatorio_form,
    'elementosxinterv_form' => $elementosxinterv_form,
    'menu_form' => $menu_form,
    'dieta_form' => $dieta_form,
    'dieta_paciente' => $dieta_paciente,
    'material_quirurgico' => $material_quirurgico)); ?>
</div>