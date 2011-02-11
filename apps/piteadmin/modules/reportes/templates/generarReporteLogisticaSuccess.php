<?php include_partial('submenu', array('current' => 'logistica')) ?>
<div id="contenido-formulario">
    <div class="formulario">
        <h2>Informe de Logistica</h2>
        <div class="form">
            <?php $variables = array(
                'paciente' => $paciente,
                'tratamiento' => $tratamiento
            );

            if(isset($reserva_vuelo)) $variables['reserva_vuelo'] = $reserva_vuelo;
            if(isset($reserva_hotel))
            {
                $variables['reserva_hotel'] = $reserva_hotel;
                //var_dump($dias);
            } ?>
            <?php include_partial('reporte_logistica', $variables) ?>
            <?php if($paciente): ?>
            <div class="submit">
                <button type="button">Guardar PDF</button>
                <button type="button">Enviar por E-Mail</button>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>