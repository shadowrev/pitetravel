<?php include_partial('submenu', array('current' => 'medico')) ?>
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
            <?php if($paciente): ?>
            <div class="submit">
                <button type="button" onclick="nuevoPopUp('<?php echo url_for('reportes/generarReporteMedicoPDF') ?>', 'reporte_medico')">Guardar PDF</button>
                <button type="button" onclick="nuevoPopUp('<?php echo url_for('reportes/generarReporteMedicoMail') ?>', 'reporte_medico')">Enviar por E-Mail</button>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>