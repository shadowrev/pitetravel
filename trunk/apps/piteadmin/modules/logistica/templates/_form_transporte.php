<table>
    <tr>
        <td><?php echo $form_transporte['trans_nombre']->renderError() ?>
        <?php echo $form_transporte['trans_nombre']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_nombre']->render() ?></td>
        <td><?php echo $form_transporte['trans_telefono1']->renderError() ?>
        <?php echo $form_transporte['trans_telefono1']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_telefono1']->render() ?></td>
        <td><?php echo $form_transporte['trans_telefono2']->renderError() ?>
            <?php echo $form_transporte['trans_telefono2']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_telefono2']->render() ?></td>
    </tr>
    <tr>
        <td><?php echo $form_transporte['trans_identificacion']->renderError() ?>
        <?php echo $form_transporte['trans_identificacion']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_identificacion']->render() ?></td>
        <td><?php echo $form_transporte['trans_direccion']->renderError() ?>
        <?php echo $form_transporte['trans_direccion']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_direccion']->render() ?></td>
        <td><?php echo $form_transporte['trans_placa_vehiculo']->renderError() ?>
            <?php echo $form_transporte['trans_placa_vehiculo']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_placa_vehiculo']->render() ?></td>
    </tr>
    <tr>
        <td><?php echo $form_transporte['trans_tipo_vehiculo']->renderError() ?>
        <?php echo $form_transporte['trans_tipo_vehiculo']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_tipo_vehiculo']->render() ?></td>
        <td><?php echo $form_transporte['trans_numero_companhia']->renderError() ?>
        <?php echo $form_transporte['trans_numero_companhia']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_numero_companhia']->render() ?></td>
        <td><?php echo $form_transporte['trans_nombre_companhia']->renderError() ?>
            <?php echo $form_transporte['trans_nombre_companhia']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_nombre_companhia']->render() ?></td>
    </tr>
    <tr>
        <td><?php echo $form_transporte['trans_telefono_companhia']->renderError() ?>
        <?php echo $form_transporte['trans_telefono_companhia']->renderLabel() ?><br />
        <?php echo $form_transporte['trans_telefono_companhia']->render() ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align: right"><button type="button">Buscar</button></div>
        </td>
    </tr>
</table>
