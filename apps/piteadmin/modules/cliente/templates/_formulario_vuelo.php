<?php $editable = array('disabled' => !$sf_context->getUser()->hasCredential(array('touroperador', 'logistica'), false)) ?>
<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarVuelo') ?>">
    <div class="formulario">
        <h2>Reserva del Vuelo</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    
                    <td><?php echo $form['vue_origen']->renderError() ?>
                    <?php echo $form['vue_origen']->renderLabel() ?><br />
                    <?php echo $form['vue_origen']->render($editable) ?></td>
                    <td><?php echo $form['vue_destino']->renderError() ?>
                    <?php echo $form['vue_destino']->renderLabel() ?><br />
                    <?php echo $form['vue_destino']->render($editable) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_fecha_ida']->renderError() ?>
                    <?php echo $form['vue_fecha_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_fecha_ida']->render($editable) ?></td>
                    <td><?php echo $form['vue_nro_vuelo_ida']->renderError() ?>
                    <?php echo $form['vue_nro_vuelo_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_nro_vuelo_ida']->render($editable) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_hora_salida_ida']->renderError() ?>
                    <?php echo $form['vue_hora_salida_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_salida_ida']->render($editable) ?></td>
                    <td><?php echo $form['vue_hora_llegada_ida']->renderError() ?>
                    <?php echo $form['vue_hora_llegada_ida']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_llegada_ida']->render($editable) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_fecha_regreso']->renderError() ?>
                    <?php echo $form['vue_fecha_regreso']->renderLabel() ?><br />
                    <?php echo $form['vue_fecha_regreso']->render($editable) ?></td>
                    <td><?php echo $form['vue_nro_vuelo_regreso']->renderError() ?>
                    <?php echo $form['vue_nro_vuelo_regreso']->renderLabel() ?><br />
                    <?php echo $form['vue_nro_vuelo_regreso']->render($editable) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['vue_hora_salida_vuelta']->renderError() ?>
                    <?php echo $form['vue_hora_salida_vuelta']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_salida_vuelta']->render($editable) ?></td>
                    <td><?php echo $form['vue_hora_llegada_vuelta']->renderError() ?>
                    <?php echo $form['vue_hora_llegada_vuelta']->renderLabel() ?><br />
                    <?php echo $form['vue_hora_llegada_vuelta']->render($editable) ?></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="submit"<?php echo $editable['disabled'] ? ' disabled' : '' ?>>Guardar</button>
    </div> 
</form>