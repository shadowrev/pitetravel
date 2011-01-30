<div class="lista">
<?php
$utilidades = new Util();
echo $utilidades->generarLista($lista_transportes, array(
    'cabecera' => array('Nombre', 'Identificaci&oacute;n', 'Tipo de Vehiculo'),
    'options' => array(
        'modificar' => '',
        'eliminar' => ''
    ),
    'parametros' => array(
        'funcion_ajax' => $funcion_ajax
    )
), true);
?>
</div>