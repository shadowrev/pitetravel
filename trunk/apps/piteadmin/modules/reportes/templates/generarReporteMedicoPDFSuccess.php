<div id="contenido-formulario">
    <div class="formulario">
        <h2>Informe de Logistica</h2>
        <div class="form">
            <?php $variables = array(
                'paciente' => $paciente,
                'tratamiento' => $tratamiento
            );

            if(isset($preoperatorio)) $variables['preoperatorio'] = $preoperatorio;
            if(isset($postoperatorio)) $variables['postoperatorio'] = $postoperatorio; ?>
            <?php include_partial('reporte_medico', $variables) ?>
        </div>
    </div>
</div>