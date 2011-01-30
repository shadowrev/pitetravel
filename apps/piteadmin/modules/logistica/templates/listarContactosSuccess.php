<div class="lista">
<?php
$utilidades = new Util();
echo $utilidades->generarLista($lista_contactos, array(
    'cabecera' => array('Nombre', 'Identificaci&oacute;n'),
    'options' => array(
        'modificar' => 'cliente/mostrarInformacionPaciente',
        'eliminar' => 'cliente/eliminarPaciente'
    ),
    'parametros' => array(
        'funcion_ajax' => $tipo_contacto
    )
), true);
?>
</div>