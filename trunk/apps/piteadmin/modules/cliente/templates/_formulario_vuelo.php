<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarVuelo') ?>">
    <div class="formulario">
        <h2>Reserva del Vuelo</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    
                    <td><?php echo $form['vue_origen']->renderError() ?>
                    <?php echo $form['vue_origen']->renderLabel() ?><br />
                    <?php echo $form['vue_origen']->render() ?></td>
                    <td><?php echo $form['vue_destino']->renderError() ?>
                    <?php echo $form['vue_destino']->renderLabel() ?><br />
                    <?php echo $form['vue_destino']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_fecha_ida']->renderError() ?>
                    <?php echo $form['vue_fecha_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_fecha_ida']->render() ?></td>
                    <td><?php echo $form['vue_nro_vuelo_ida']->renderError() ?>
                    <?php echo $form['vue_nro_vuelo_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_nro_vuelo_ida']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_hora_salida_ida']->renderError() ?>
                    <?php echo $form['vue_hora_salida_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_salida_ida']->render() ?></td>
                    <td><?php echo $form['vue_hora_llegada_ida']->renderError() ?>
                    <?php echo $form['vue_hora_llegada_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_llegada_ida']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_fecha_regreso']->renderError() ?>
                    <?php echo $form['vue_fecha_regreso']->renderLabel() ?><br />
                    <?php echo $form['vue_fecha_regreso']->render() ?></td>
                    <td><?php echo $form['vue_nro_vuelo_regreso']->renderError() ?>
                    <?php echo $form['vue_nro_vuelo_regreso']->renderLabel() ?><br />
                    <?php echo $form['vue_nro_vuelo_regreso']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_hora_salida_vuelta']->renderError() ?>
                    <?php echo $form['vue_hora_salida_vuelta']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_salida_vuelta']->render() ?></td>
                    <td><?php echo $form['vue_hora_llegada_vuelta']->renderError() ?>
                    <?php echo $form['vue_hora_llegada_vuelta']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_llegada_vuelta']->render() ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="text-align: right"><button type="button">Buscar Reserva</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="button">Nueva Reserva</button>
        <button type="submit">Guardar</button>
        <button type="button">Generar Imprimible</button>
    </div> 
</form>