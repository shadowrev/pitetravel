<?php $arr_solo_lectura = $solo_lectura ? array('disabled' => true) : array() ?>
<h2>Transporte</h2>
<div class="form">
    <?php echo $form_transporte->renderHiddenFields() ?>
    <table>
        <tr>
            <td colspan="3"><div class="informacion">Los campos marcados con * son obligatorios</div></td>
        </tr>
        <tr>
            <td><?php echo $form_transporte['trans_nombre']->renderError() ?>
            <?php echo $form_transporte['trans_nombre']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_nombre']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_telefono1']->renderError() ?>
            <?php echo $form_transporte['trans_telefono1']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_telefono1']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_telefono2']->renderError() ?>
                <?php echo $form_transporte['trans_telefono2']->renderLabel() ?><br />
                <?php echo $form_transporte['trans_telefono2']->render($arr_solo_lectura) ?></td>
        </tr>
        <tr>
            <td><?php echo $form_transporte['trans_identificacion']->renderError() ?>
            <?php echo $form_transporte['trans_identificacion']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_identificacion']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_direccion']->renderError() ?>
            <?php echo $form_transporte['trans_direccion']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_direccion']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_placa_vehiculo']->renderError() ?>
                <?php echo $form_transporte['trans_placa_vehiculo']->renderLabel() ?><br />
                <?php echo $form_transporte['trans_placa_vehiculo']->render($arr_solo_lectura) ?></td>
        </tr>
        <tr>
            <td><?php echo $form_transporte['trans_tipo_vehiculo']->renderError() ?>
            <?php echo $form_transporte['trans_tipo_vehiculo']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_tipo_vehiculo']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_numero_companhia']->renderError() ?>
            <?php echo $form_transporte['trans_numero_companhia']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_numero_companhia']->render($arr_solo_lectura) ?></td>
            <td><?php echo $form_transporte['trans_nombre_companhia']->renderError() ?>
                <?php echo $form_transporte['trans_nombre_companhia']->renderLabel() ?><br />
                <?php echo $form_transporte['trans_nombre_companhia']->render($arr_solo_lectura) ?></td>
        </tr>
        <tr>
            <td><?php echo $form_transporte['trans_telefono_companhia']->renderError() ?>
            <?php echo $form_transporte['trans_telefono_companhia']->renderLabel() ?><br />
            <?php echo $form_transporte['trans_telefono_companhia']->render($arr_solo_lectura) ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="text-align: right">
                    <button type="button" onclick="desplegarListaWincombo('<?php echo url_for('logistica/listarTransporte?funcion=actualizarTransporte') ?>')"<?php echo $solo_lectura ? ' disabled' : '' ?>>Buscar</button>
                </div>
            </td>
        </tr>
    </table>
</div>