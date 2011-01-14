<table>
    <thead>
        <tr>
            <td>Nombre del Contacto</td>
            <td>Tel&eacute;fono Fijo</td>
            <td>Correo Electr&oacute;nico</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
    </tfoot>
    <tbody>
        <?php $par = false ?>
        <?php foreach($paciente->Contacto as $contacto_paciente): ?>
        <tr class="<?php echo ($par == true) ? 'par' : 'impar' ?>" id="contacto_<?php echo $contacto_paciente->con_codigo ?>">
            <td><?php echo $contacto_paciente->con_nombre ?></td>
            <td><?php echo $contacto_paciente->con_telefono1 ?></td>
            <td><?php echo $contacto_paciente->con_email ?></td>
            <td><?php echo '[modificar]' ?></td>
            <td><?php echo '[eliminar]' ?></td><?php $par = !$par ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>