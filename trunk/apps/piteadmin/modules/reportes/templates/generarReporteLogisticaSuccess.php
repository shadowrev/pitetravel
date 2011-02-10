<?php include_partial('submenu', array('current' => 'logistica')) ?>
<div id="contenido-formulario">
    <div class="formulario">
        <h2>Informe de Logistica</h2>
        <div class="form">
            <?php include_partial('reporte_logistica', array(
                'paciente' => $paciente,
                'tratamiento' => $tratamiento
            )) ?>
            <?php if($paciente): ?>
            <div class="submit">
                <button type="button">Guardar PDF</button>
                <button type="button">Enviar por E-Mail</button>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>