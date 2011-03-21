<?php $par = false ?>
<?php foreach($paciente->Contacto as $contacto_paciente): ?>
<tr class="<?php echo ($par == true) ? 'par' : 'impar' ?>" id="contacto_<?php echo $contacto_paciente->con_codigo ?>">
    <td><?php echo $contacto_paciente->con_nombre ?></td>
    <td><?php echo $contacto_paciente->con_telefono1 ?></td>
    <td><?php echo $contacto_paciente->con_email ?></td>
    <td><a href="javascript:cargarContacto('<?php echo $contacto_paciente->con_codigo ?>')">[modificar]</a></td>
    <!--<td><a href="javascript:eliminarContacto('<?php echo $contacto_paciente->con_codigo ?>')">[eliminar]</a></td>-->
    <td><?php echo link_to('[eliminar]', 'cliente/eliminarContacto?con_codigo=' . $contacto_paciente->con_codigo, array('confirm' => 'Está seguro?')) ?></td>
    <?php $par = !$par ?>
</tr>
<?php endforeach; ?>