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
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <?php if($pager->haveToPaginate()) : ?>
                            <div class="paginacion">
                                <a href="<?php echo url_for('@sf_guard_user') ?>?page=1">&laquo;</a>
                                <a href="<?php echo url_for('@sf_guard_user') ?>?page=<?php echo $pager->getPreviousPage() ?>">&lsaquo;</a>
                                <?php foreach ($pager->getLinks() as $page): ?>
                                    <?php if ($page == $pager->getPage()): ?>
                                        <?php echo $page ?>
                                    <?php else: ?>
                                        <a href="<?php echo url_for('@sf_guard_user') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <a href="<?php echo url_for('@sf_guard_user') ?>?page=<?php echo $pager->getNextPage() ?>">&rsaquo;</a>
                                <a href="<?php echo url_for('@sf_guard_user') ?>?page=<?php echo $pager->getLastPage() ?>">&raquo;</a>
                            </div>
                            <?php endif ?>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                <?php $par = false ?>
                <?php foreach($pager->getResults() as $sf_guard_user): ?>
                    <tr class="<?php echo $par ? 'par' : 'impar' ?>">
                        <td><?php echo $sf_guard_user->username ?></td>
                        <td><?php echo $sf_guard_user->first_name . ' ' . $sf_guard_user->last_name ?></td>
                        <td><?php echo link_to('[modificar]',  'sfGuardUser/edit?id=' . $sf_guard_user->id) ?></td>
                        <!--<td><?php echo link_to('[eliminar]', 'sfGuardUser/delete?id=' . $sf_guard_user->id, array('confirm' => 'Desea eliminar a ' . $sf_guard_user->username)) ?></td>-->
                        <td><a href="#">[eliminar]</a></td>
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