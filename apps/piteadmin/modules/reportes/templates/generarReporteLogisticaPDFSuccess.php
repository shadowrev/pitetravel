<div id="contenido-formulario">
    <div class="formulario">
        <h2>Informe de Logistica</h2>
        <div class="form">
            <?php $variables = array(
                'paciente' => $paciente,
                'tratamiento' => $tratamiento
            );
            if(isset($reserva_vuelo)) $variables['reserva_vuelo'] = $reserva_vuelo;
            if(isset($reserva_hotel)) $variables['reserva_hotel'] = $reserva_hotel;
            if(isset($logistica)) $variables['logistica'] = $logistica; ?>
            <?php include_partial('reporte_logistica', $variables) ?>
        </div>
    </div>
</div>