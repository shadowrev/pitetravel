<div class="form">
    <table>
        <tr>
            <td><?php echo $form['groups_list']->renderError() ?>
                <?php echo $form['groups_list']->renderLabel('Grupos a los que pertenece:') ?><br />
                <?php echo $form['groups_list']->render() ?></td>
            <td><?php echo $form['permissions_list']->renderError() ?>
                <?php echo $form['permissions_list']->renderLabel('Permisos:') ?><br />
                <?php echo $form['permissions_list']->render() ?></td>
        </tr>
    </table>
</div>