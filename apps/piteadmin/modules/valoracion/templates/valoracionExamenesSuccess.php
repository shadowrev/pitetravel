<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'destino')) ?>
<div id="contenido-formulario">
<?php include_partial('formulario_valoracion_examenes', array(
    'preoperatorio_form' => $preoperatorio_form,
    'elementosxinterv_form' => $elementosxinterv_form,
    'dieta_form' => $dieta_form,
    'menu_form' => $menu_form,
    'material_quirurgico' => $material_quirurgico,
    'dieta_paciente' => $dieta_paciente,
    'preoperatorio' => $preoperatorio
)) ?>
</div>