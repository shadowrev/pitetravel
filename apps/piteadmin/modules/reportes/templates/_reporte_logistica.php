<?php if($paciente): ?>
<fieldset>
    <legend>Datos del Cliente</legend>
    <div>
        <strong>Nombre: </strong><?php echo $paciente->pac_nombre ?>
    </div>
    <div>
        <strong>Documento de Identidad: </strong><?php echo $paciente->pac_identificacion ?>
    </div>
    <div>
        <strong>Fecha de Nacimiento: </strong><?php echo $paciente->pac_fecha_nacimiento ?>
    </div>
    <div>
        <strong>Tel&eacute;fono Fijo: </strong><?php echo $paciente->pac_telefono1 ?>
    </div>
    <div>
        <strong>Tel&eacute;fono M&oacute;vil: </strong><?php echo $paciente->pac_telefono2 ?>
    </div>
    <div>
        <strong>Correo Electr&oacute;nico: </strong><?php echo $paciente->pac_email ?>
    </div>
    <div>
        <strong>Direcci&oacute;n de Residencia: </strong><?php echo $paciente->pac_direccion ?>
    </div>
    <div>
        <strong>Ciudad: </strong><?php echo $paciente->pac_ciudad . ' - ' . $paciente->pac_estado ?>
    </div>
    <div>
        <strong>Pa&iacute;s de Origen: </strong><?php echo $paciente->pac_pais ?>
    </div>
</fieldset>
<fieldset>
    <legend>Reservas de Vuelo</legend>
    <div>
        Aqu&iacute; vienen los datos de la reserva de vuelo
    </div>
</fieldset>
<fieldset>
    <legend>Reservas de Hospedaje</legend>
    <div>
        Aqu&iacute; vienen los datos de la reserva de hospedaje
    </div>
</fieldset>
<fieldset>
    <legend>Contactos de log&iacute;stica</legend>
    <div>
        Aqu&iacute; vienen los datos de los contactos de logistica
    </div>
</fieldset>
<?php else: ?>
<div>Primero seleccione un Cliente</div>
<?php endif ?>