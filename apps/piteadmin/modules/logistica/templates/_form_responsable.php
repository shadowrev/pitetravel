<h2>Responsable de la log&iacute;stica</h2>
<div class="form">
    <?php echo $form_responsable->renderHiddenFields() ?>
    <table>
        <tr>
            <td><?php echo $form_responsable['clo_nombre']->renderError() ?>
            <?php echo $form_responsable['clo_nombre']->renderLabel() ?><br />
            <?php echo $form_responsable['clo_nombre']->render() ?></td>
            <td><?php echo $form_responsable['clo_identificacion']->renderError() ?>
            <?php echo $form_responsable['clo_identificacion']->renderLabel() ?><br />
            <?php echo $form_responsable['clo_identificacion']->render() ?></td>
            <td><?php echo $form_responsable['clo_telefono']->renderError() ?>
                <?php echo $form_responsable['clo_telefono']->renderLabel() ?><br />
                <?php echo $form_responsable['clo_telefono']->render() ?></td>
        </tr>
        <tr>
            <td><?php echo $form_responsable['clo_email']->renderError() ?>
                <?php echo $form_responsable['clo_email']->renderLabel() ?><br />
                <?php echo $form_responsable['clo_email']->render() ?></td>
            <td><?php echo $form_responsable['clo_direccion']->renderError() ?>
                <?php echo $form_responsable['clo_direccion']->renderLabel() ?><br />
                <?php echo $form_responsable['clo_direccion']->render() ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="text-align: right">
                    <button type="button" onclick="desplegarListaWincombo('<?php echo url_for('logistica/listarContactos?tipo_contacto=actualizarResponsable') ?>')">Buscar</button>
                </div>
            </td>
        </tr>
    </table>
</div>