<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre') ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'examenes')) ?>
<div id="contenido-formulario">
    <?php
        $variables_incluir = array('form' => $form, 'procedimiento_form' => $procedimiento_form, 'foto_form' => $foto_form);
        if(isset($ids_procedimientos))
            $variables_incluir['ids_procedimientos'] = $ids_procedimientos;
        else
            $variables_incluir['ids_procedimientos'] = array();
        if(isset($tratamiento))
            $variables_incluir['tratamiento'] = $tratamiento;

    ?>
    <?php include_partial('formulario_examenes', $variables_incluir) ?>
</div>