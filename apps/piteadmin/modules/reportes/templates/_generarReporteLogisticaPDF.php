<html>
    <head>
        <style type="text/css">
/* Aplica a todo */
html {
    background-color: #FFF;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-style: normal;
    width: 800px;
	margin: 10px auto;
	padding: 0;
}

/* Aplica al contenido*/
#contenido {
	clear: both;
	padding-left: 10px;
}

/* Aplica al area de formularios */
#contenido-formulario {
    border: 1px solid #DF0D74;
}

.form table {
    width: 100%;
}

.form textarea {
	width: 95%;
	height: 6em;
}

.formulario {
    font-size: 11px;
}

.formulario h2 { /* También aplica a h2 de .formulario*/
    margin-top: 0;
    text-align: center;
}

/* Aplica al pie de pagina */
#pie {
    clear: both;
    color: #DF0C73;
    text-align: center;
}

.fieldset {
    width: 100%;
    margin-bottom: 10px;
    display: block;
}

.legend {
    width: 100%;
    font-weight: bold;
    display: block;
}
        </style>
    </head>
    <body>
        <img src="images/pite_logo_2.jpg" alt="PITE Logo" />
        <div id="contenido">
            <h2 align="center">Informe de Logistica</h2>
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
        <p>PITE Travel<br />
        &copy;2010 - Todos los derechos reservados</p>
    </body>
</html>


