<?php include_partial('submenu', array('current' => 'info')) ?>
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
                        <td>[modificar]</td>
                        <td>[eliminar]</td>
                    </tr>
                <?php $par = !$par ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>