<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

#contenido.borde {
    border: 1px solid #DF0D74;
    -moz-border-radius: 0 0 15px 15px;
    -webkit-border-radius: 0 0 15px 15px;
}

/* Aplica al area de formularios */
#contenido-formulario {
	float: left;
}

.form table {
    width: 100%;
}

.form textarea {
	width: 95%;
	height: 6em;
}

/* Aplica al resto de formularios */
.formulario {
    width: 600px;
    margin: 20px auto;
    min-height: 150px;
    border: 1px solid #DF0C73;
}

.formulario h2 { /* También aplica a h2 de .formulario*/
    margin-top: 0;
    background-color: #DF0C73;
    text-align: center;
    color: #FFF;
}

/* Aplica a las listas */
.lista table {
    width: 100%;
    border-collapse: collapse;
}

.lista thead {
    font-weight: bold;
    background-color: #E7F1F8;
}

.lista tbody .par {
    background-color: #E7F1F8;
}
.lista tbody .impar {
}

.lista tbody tr:hover {
    background-color: #DF6BA3;
}

/* Aplica al pie de pagina */
#pie {
    clear: both;
    color: #DF0C73;
    text-align: center;
}

fieldset {
    margin-bottom: 10px;
}

legend {
    font-weight: bold;
}
        </style>
    </head>
    <body>
        <div id="encabezado">
            <img src="<?php echo public_path('') ?>images/pite_logo_2.jpg" alt="PITE Logo" />
        </div>
        <div id="contenido">
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
        </div>
        <div id="pie">
            <p>PITE Travel<br />
            &copy;2010 - Todos los derechos reservados</p>
        </div>
    </body>
</html>

