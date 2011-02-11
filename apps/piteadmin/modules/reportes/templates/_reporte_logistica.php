<?php if($paciente): ?>
<fieldset>
    <legend>Datos del Cliente</legend>
    <table>
        <tr>
            <td>
                <strong>Nombre: </strong><?php echo $paciente->pac_nombre ?>
            </td>
            <td>
                <strong>Documento de Identidad: </strong><?php echo $paciente->pac_identificacion ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Nacimiento: </strong><?php echo $paciente->pac_fecha_nacimiento ?>
            </td>
            <td>
                <strong>Tel&eacute;fono Fijo: </strong><?php echo $paciente->pac_telefono1 ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tel&eacute;fono M&oacute;vil: </strong><?php echo $paciente->pac_telefono2 ?>
            </td>
            <td>
                <strong>Correo Electr&oacute;nico: </strong><?php echo $paciente->pac_email ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Direcci&oacute;n de Residencia: </strong><?php echo $paciente->pac_direccion ?>
            </td>
            <td>
                <strong>Ciudad: </strong><?php echo $paciente->pac_ciudad . ' - ' . $paciente->pac_estado ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Pa&iacute;s de Origen: </strong><?php echo $paciente->pac_pais ?>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</fieldset>
<?php if(0 < sizeof($paciente->Contacto)): ?>
<fieldset>
    <legend>Contactos:</legend>
    <table>
        <?php foreach($paciente->Contacto as $contacto): ?>
        <tr>
            <td>
                <strong>Nombre: </strong><?php echo $contacto->con_nombre ?>
            </td>
            <td>
                <strong>Tel&eacute;fono Fijo: </strong><?php echo $contacto->con_telefono1 ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tel&eacute;fono M&oacute;vil: </strong><?php echo $contacto->con_telefono2 ?>
            </td>
            <td>
                <strong>Correo Electr&oacute;nico: </strong><?php echo $contacto->con_email ?>
            </td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <?php endforeach; ?>
    </table>
</fieldset>
<?php endif ?>
<?php if($reserva_vuelo): ?>
<fieldset>
    <legend>Reservas de Vuelo</legend>
    <table>
        <tr>
            <td>
                <strong>Origen: </strong><?php echo $reserva_vuelo->vue_origen ?>
            </td>
            <td>
                <strong>Destino: </strong><?php echo $reserva_vuelo->vue_destino ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Partida: </strong><?php echo $reserva_vuelo->vue_fecha_ida ?>
            </td>
            <td>
                <strong>Localizador/C&oacute;digo del Vuelo: </strong><?php echo $reserva_vuelo->vue_nro_vuelo_ida ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Hora de Salida Estimada: </strong><?php echo $reserva_vuelo->vue_hora_salida_ida ?>
            </td>
            <td>
                <strong>Hora de Llegada Estimada: </strong><?php echo $reserva_vuelo->vue_hora_llegada_ida ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Regreso: </strong><?php echo $reserva_vuelo->vue_fecha_regreso ?>
            </td>
            <td>
                <strong>Localizador/C&oacute;digo del Vuelo: </strong><?php echo $reserva_vuelo->vue_nro_vuelo_regreso ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Hora de Salida Estimada: </strong><?php echo $reserva_vuelo->vue_hora_salida_vuelta ?>
            </td>
            <td>
                <strong>Hora de Llegada Estimada: </strong><?php echo $reserva_vuelo->vue_hora_llegada_vuelta ?>
            </td>
        </tr>
    </table>
</fieldset>
<?php endif ?>
<?php if($reserva_hotel): ?>
<fieldset>
    <legend>Reservas de Hospedaje</legend>
    <table>
        <tr>
            <td>
                <strong>Nombre del Hotel/Hospedaje: </strong><?php echo $reserva_hotel->Hotel->hot_nombre ?>
            </td>
            <td>
                <strong>Direcci&oacute;n: </strong><?php echo $reserva_hotel->Hotel->hot_direccion ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tel&eacute;fono: </strong><?php echo $reserva_hotel->Hotel->hot_telefono ?>
            </td>
            <td>
                <strong>Correo Electr&oacute;nico: </strong><?php echo $reserva_hotel->Hotel->hot_email ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Entrada: </strong><?php echo $reserva_hotel->reh_fecha_entrada ?>
            </td>
            <td>
                <strong>Hora de Entrada: </strong><?php echo $reserva_hotel->reh_hora_llegada ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Salida: </strong><?php echo $reserva_hotel->reh_fecha_salida ?>
            </td>
            <td>
                <strong>Hora de Salida: </strong><?php echo $reserva_hotel->reh_hora_salida ?>
            </td>
        </tr>
    </table>
</fieldset>
<?php endif ?>
<fieldset>
    <legend>Contactos de log&iacute;stica</legend>
    <div>
        Aqu&iacute; vienen los datos de los contactos de logistica
    </div>
</fieldset>
<?php else: ?>
<div>Primero seleccione un Cliente</div>
<?php endif ?>