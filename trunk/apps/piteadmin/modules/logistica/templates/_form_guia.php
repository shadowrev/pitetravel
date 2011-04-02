<?php $arr_solo_lectura = $solo_lectura ? array('disabled' => true) : array() ?>
<h2>Informaci&oacute;n del Gu&iacute;a</h2>
<div class="form">
    <?php echo $form_contacto->renderHiddenFields() ?>
    <table>
        <tr>
            <td><?php echo $form_contacto['clo_nombre']->renderError() ?>
            <?php echo $form_contacto['clo_nombre']->renderLabel() ?><br />
            <?php echo $form_contacto['clo_nombre']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_contacto['clo_identificacion']->renderError() ?>
            <?php echo $form_contacto['clo_identificacion']->renderLabel() ?><br />
            <?php echo $form_contacto['clo_identificacion']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_contacto['clo_telefono']->renderError() ?>
                <?php echo $form_contacto['clo_telefono']->renderLabel() ?><br />
                <?php echo $form_contacto['clo_telefono']->render($arr_solo_lectura) ?></td>
        </tr>
        <tr>
            <td><?php echo $form_contacto['clo_email']->renderError() ?>
                <?php echo $form_contacto['clo_email']->renderLabel() ?><br />
                <?php echo $form_contacto['clo_email']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_contacto['clo_direccion']->renderError() ?>
                <?php echo $form_contacto['clo_direccion']->renderLabel() ?><br />
                <?php echo $form_contacto['clo_direccion']->render($arr_solo_lectura) ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="text-align: right">
                    <button type="button" onclick="desplegarListaWincombo('<?php echo url_for('logistica/listarContactos?tipo_contacto=actualizarGuia') ?>')"<?php echo $solo_lectura ? ' disabled' : '' ?>>Buscar</button>
                </div>
            </td>
        </tr>
    </table>
</div>
