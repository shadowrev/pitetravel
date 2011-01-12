<div class="lista">
<?php
$utilidades = new Util();
echo $utilidades->generarLista($array_pacientes, array(
    'cabecera' => array('Nombre', 'Identificaci&oacute;n'),
    'options' => array(
        'modificar' => 'cliente/mostrarInformacionPaciente',
        'eliminar' => 'cliente/eliminarPaciente'
    )
));
?>
</div>