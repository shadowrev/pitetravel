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
<?php $reserva_vuelo = empty($reserva_vuelo) ? false : $reserva_vuelo ?>
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
<?php $reserva_hotel = empty($reserva_hotel) ? false : $reserva_hotel ?>
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
        <tr>
            <td>
                <strong>D&iacute;as de Estad&iacute;a: </strong><?php echo $reserva_hotel->reh_dias_estadia ?>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</fieldset>
<?php endif ?>
<?php $logistica = empty($logistica) ? false : $logistica ?>
<?php if($logistica): ?>
<fieldset>
    <legend>Contactos de log&iacute;stica</legend>
    <table>
        <tr>
            <td>
                <strong>Nombre del Responsable: </strong><?php echo $logistica->Contactologistica->clo_nombre ?>
            </td>
            <td>
                <strong>Identificaci&oacute;n: </strong><?php echo $logistica->Contactologistica->clo_identificacion ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Correo Electr&oacute;nico: </strong><?php echo $logistica->Contactologistica->clo_email ?>
            </td>
            <td>
                <strong>Tel&eacute;fono: </strong><?php echo $logistica->Contactologistica->clo_telefono ?>
            </td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>
                <strong>Nombre del Gu&iacute;a: </strong><?php echo $logistica->Contactologistica_3->clo_nombre ?>
            </td>
            <td>
                <strong>Identificaci&oacute;n: </strong><?php echo $logistica->Contactologistica_3->clo_identificacion ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Correo Electr&oacute;nico: </strong><?php echo $logistica->Contactologistica_3->clo_email ?>
            </td>
            <td>
                <strong>Tel&eacute;fono: </strong><?php echo $logistica->Contactologistica_3->clo_telefono ?>
            </td>
        </tr>
        <?php if($logistica->Transporte->trans_codigo): ?>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>
                <strong>Nombre del Transportista: </strong><?php echo $logistica->Transporte->trans_nombre ?>
            </td>
            <td>
                <strong>Identificaci&oacute;n: </strong><?php echo $logistica->Transporte->trans_identificacion ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tel&eacute;fono Fijo: </strong><?php echo $logistica->Transporte->trans_telefono1 ?>
            </td>
            <td>
                <strong>Tel&eacute;fono M&oacute;vil: </strong><?php echo $logistica->Transporte->trans_telefono2 ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Direcci&oacute;n: </strong><?php echo $logistica->Transporte->trans_direccion ?>
            </td>
            <td>
                <strong>Tipo de Veh&iacute;culo: </strong><?php echo $logistica->Transporte->trans_tipo_vehiculo ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Placas del Veh&iacute;culo: </strong><?php echo $logistica->Transporte->trans_placa_vehiculo ?>
            </td>
            <td>
                <strong>Compa&ntilde;&iacute;a: </strong><?php echo $logistica->Transporte->trans_nombre_companhia ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>NIT: </strong><?php echo $logistica->Transporte->trans_numero_companhia ?>
            </td>
            <td>
                <strong>Tel&eacute;fono: </strong><?php echo $logistica->Transporte->trans_telefono_companhia ?>
            </td>
        </tr>
        <?php endif; ?>
    </table>
</fieldset>
<?php endif ?>
<?php else: ?>
<div>Primero seleccione un Cliente</div>
<?php endif ?>