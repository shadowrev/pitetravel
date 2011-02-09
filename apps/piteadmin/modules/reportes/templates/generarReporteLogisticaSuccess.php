<?php include_partial('submenu', array('current' => 'datos')) ?>
<div id="contenido-formulario">
    <div class="formulario">
        <h2>Informe de Logistica</h2>
        <div class="form">
            <?php include_partial('reporte_logistica', array()) ?>
            <div class="submit">
                <button type="button">Guardar PDF</button>
                <button type="button">Enviar por E-Mail</button>
            </div>
        </div>
    </div>
</div>