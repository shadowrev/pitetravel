<?php $editable = array('disabled' => !$sf_context->getUser()->hasCredential(array('touroperador', 'logistica'), false),
        'class' => 'required') ?>
<?php $editable_no_obligatorio = array('disabled' => !$sf_context->getUser()->hasCredential(array('touroperador', 'logistica'), false)) ?>
<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarReserva') ?>">
    <div class="formulario">
        <h2>Reserva del Hospedaje</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td colspan="3"><div class="informacion">Los campos marcados con * son obligatorios</div></td>
                </tr>
                <tr>
                    <td><?php echo $form['reh_hot_codigo']->renderError() ?>
                    <?php echo $form['reh_hot_codigo']->renderLabel() ?><br />
                    <?php echo $form['reh_hot_codigo']->render(array(
                        'onchange' => 'actualizarInfoHotel(&quot;' . url_for('cliente/cargarHotel') . '&quot;, this.value)',
                        'class' => 'required'
                    )) ?></td>
                    <td><label for="reserva_direccion">Direcci&oacute;n:</label><br />
                    <input type="text" name="direccion_hotel" id="reserva_direccion" readonly /></td>
                    <td><label for="reserva_telefono">Tel&eacute;fono: </label><br />
                    <input type="text" name="telefono_hotel" id="reserva_telefono" readonly /></td>
                </tr>
                <tr>
                    <td><label for="reserva_web">P&aacute;gina web: </label><br />
                    <input type="text" name="web_hotel" id="reserva_web" readonly /></td>
                    <td><label for="reserva_correo">Correo Electr&oacute;nico:</label><br />
                    <input type="text" name="correo_hotel" id="reserva_correo" readonly /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div>
                            <table>
                                <tr>
                                    <td><?php echo $form['reh_fecha_entrada']->renderError() ?>
                                    <?php echo $form['reh_fecha_entrada']->renderLabel() ?><br />
                                    <?php echo $form['reh_fecha_entrada']->render($editable) ?></td>
                                    <td><?php echo $form['reh_fecha_salida']->renderError() ?>
                                    <?php echo $form['reh_fecha_salida']->renderLabel() ?><br />
                                    <?php echo $form['reh_fecha_salida']->render($editable) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $form['reh_hora_llegada']->renderError() ?>
                                    <?php echo $form['reh_hora_llegada']->renderLabel() ?><br />
                                    <?php echo $form['reh_hora_llegada']->render($editable) ?></td>
                                    <td><?php echo $form['reh_hora_salida']->renderError() ?>
                                    <?php echo $form['reh_hora_salida']->renderLabel() ?><br />
                                    <?php echo $form['reh_hora_salida']->render($editable) ?></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form['reh_localizador']->renderError() ?>
                    <?php echo $form['reh_localizador']->renderLabel() ?><br />
                    <?php echo $form['reh_localizador']->render($editable_no_obligatorio) ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <script type="text/javascript">
                actualizarInfoHotel("<?php echo url_for('cliente/cargarHotel') ?>", document.getElementById("reservahotel_reh_hot_codigo").value);
            </script>
        </div>
    </div>
    <div class="submit">
        <button type="submit"<?php echo $editable['disabled'] ? ' disabled' : '' ?>>Guardar</button>
    </div> 
</form>