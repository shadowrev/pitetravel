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
<?php if(0 < sizeof($tratamiento->Procedimiento)): ?>
<fieldset>
    <legend>Tratamientos a realizar</legend>
    <table>
        <?php foreach($tratamiento->Procedimiento as $procedimiento): ?>
        <?php $descripcion = in_array($procedimiento->pro_dtr_codigo, array(11, 21, 30, 40)) ? $procedimiento->pro_otro : $procedimiento->Descripciontratamiento->dtr_descripcion ?>
        <tr>
            <td>
                <strong>Tipo de Tratamiento: </strong><?php echo $procedimiento->Tipotratamiento->tit_nombre ?>
            </td>
            <td>
                <strong>Tratamiento: </strong><?php echo $descripcion ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>
<?php endif ?>
<?php if($preoperatorio): ?>
<fieldset>
    <legend>Resultado de Ex&aacute;menes</legend>
    <table>
        <tr>
            <td>
                <strong>Glicemia en Ayunas: </strong><?php echo $preoperatorio->preo_glicemia ?>
            </td>
            <td>
                <strong>Tiempos de Coagulaci&oacute;n: </strong><?php echo $preoperatorio->preo_tiempo_coagulacion ?>
            </td>
            <td>
                <strong>HB Glicosilada: </strong><?php echo $preoperatorio->preo_hg_glicosilada ?>
            </td>
            <td>
                <strong>PT: </strong><?php echo $preoperatorio->preo_tpt ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>PTT: </strong><?php echo $preoperatorio->preo_ptt ?>
            </td>
            <td>
                <strong>Prueba de Esfuerzo: </strong><?php echo $preoperatorio->preo_prueba_esfuerzo ?>
            </td>
            <td>
                <strong>Creatinina: </strong><?php echo $preoperatorio->preo_creatinina ?>
            </td>
            <td>
                <strong>Nitr&oacute;geno Ureico: </strong><?php echo $preoperatorio->preo_nitrogeno_ureico ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Parcial de Orina: </strong><?php echo $preoperatorio->preo_parcial_orina ?>
            </td>
            <td>
                <strong>TSH: </strong><?php echo $preoperatorio->preo_tsh ?>
            </td>
            <td>
                <strong>T3: </strong><?php echo $preoperatorio->preo_t3 ?>
            </td>
            <td>
                <strong>T4: </strong><?php echo $preoperatorio->preo_t4 ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <strong>VIH: </strong><?php echo ($preoperatorio->preo_vih == 1) ? 'Si' : 'No' ?>
            </td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
            <td colspan="2">
                <strong>Rx de T&oacute;rax: </strong><?php echo $preoperatorio->preo_rx_torax ?>
            </td>
            <td colspan="2">
                <strong>Electrocardiograma: </strong><?php echo $preoperatorio->preo_electro ?>
            </td>
        </tr>
        <?php if(!empty($preoperatorio->preo_informe_especialista)): ?>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
            <td colspan="4">
                <strong>Valoraci&oacute;n del Especialista</strong><br />
                <?php echo $preoperatorio->preo_informe_especialista ?>
            </td>
        </tr>
        <?php endif ?>
    </table>
</fieldset>
<?php if(!empty($preoperatorio->preo_fecha_cirugia)) ?>
<fieldset>
    <legend>Cita de la Cirug&iacute;a</legend>
    <table>
        <tr>
            <td>
                <strong>Fecha de la Cita Pre-Quirurgica: </strong><?php echo $preoperatorio->preo_fecha_cita_ext ?>
            </td>
            <td>
                <strong>Hora de la Cita Pre-Quirurgica: </strong><?php echo $preoperatorio->preo_hora_cita_ext ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de la Cirug&iacute;a: </strong><?php echo $preoperatorio->preo_fecha_cirugia ?>
            </td>
            <td>
                <strong>Hora de la Cirug&iacute;a: </strong><?php echo $preoperatorio->preo_hora_cirugia ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Enfermera: </strong><?php echo $preoperatorio->Enfermera ?>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Observaciones:</strong><br />
                <?php echo $preoperatorio->preo_observaciones ?>
            </td>
        </tr>
    </table>
</fieldset>
<?php if(0 < sizeof($preoperatorio->Elementosxintervencion)): ?>
<fieldset>
    <legend>Material Quirurgico Adicional</legend>
    <table>
        <?php foreach($preoperatorio->Elementosxintervencion as $exi): ?>
        <tr>
            <td>
                <strong>Elemento: </strong><?php echo $exi->Materialquirurgico->maq_nombre ?>
            </td>
            <td>
                <strong>Cantidad: </strong><?php echo $exi->exi_cantidad ?>
            </td>
            <td>
                <strong>Valor: </strong><?php echo ($exi->exi_cantidad * $exi->Materialquirurgico->maq_valor) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>
<?php endif ?>
<?php endif ?>
<?php else: ?>
<div>Primero seleccione un Cliente</div>
<?php endif ?>