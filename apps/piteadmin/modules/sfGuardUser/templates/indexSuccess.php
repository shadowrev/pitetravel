<?php include_partial('submenu', array('current' => 'usuarios')) ?>
<div id="contenido-formulario">
    <div class="formulario">
        <h2>Lista de Usuarios</h2>
        <div class="lista">
            <table>
                <thead>
                    <tr>
                        <td>Login</td>
                        <td>Nombre Completo</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                <?php $par = false ?>
                <?php foreach($pager->getResults() as $sf_guard_user): ?>
                    <tr class="<?php echo $par ? 'par' : 'impar' ?>">
                        <td><?php echo $sf_guard_user->username ?></td>
                        <td><?php echo $sf_guard_user->first_name . ' ' . $sf_guard_user->last_name ?></td>
                        <td><?php echo link_to('[modificar]',  'sfGuardUser/edit?id=' . $sf_guard_user->id) ?></td>
                        <td>[eliminar]</td>
                    </tr>
                <?php $par = !$par ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="button" onclick="location.href = '<?php echo url_for('sfGuardUser/new') ?>'">Nuevo Usuario</button>
    </div>
</div>