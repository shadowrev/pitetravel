<?php echo $form->renderHiddenFields() ?>
<div class="form">
    <!--<?php echo $form ?>-->
    <table>
        <tr>
            <td><?php echo $form['first_name']->renderError() ?>
                <?php echo $form['first_name']->renderLabel('Nombres:') ?><br />
                <?php echo $form['first_name']->render() ?></td>
            <td><?php echo $form['last_name']->renderError() ?>
                <?php echo $form['last_name']->renderLabel('Apellidos:') ?><br />
                <?php echo $form['last_name']->render() ?></td>
            <td><?php echo $form['email_address']->renderError() ?>
                <?php echo $form['email_address']->renderLabel('Correo Electr&oacute;nico:') ?><br />
                <?php echo $form['email_address']->render() ?></td>
        </tr>
        <tr>
            <td><?php echo $form['username']->renderError() ?>
                <?php echo $form['username']->renderLabel('Nombre de Usuario:') ?><br />
                <?php echo $form['username']->render() ?></td>
            <td><?php echo $form['password']->renderError() ?>
                <?php echo $form['password']->renderLabel('Contrase&ntilde;a:') ?><br />
                <?php echo $form['password']->render() ?></td>
            <td><?php echo $form['password_again']->renderError() ?>
                <?php echo $form['password_again']->renderLabel('Confirmar Contrase&ntilde;a:') ?><br />
                <?php echo $form['password_again']->render() ?></td>
        </tr>
    </table>
</div>