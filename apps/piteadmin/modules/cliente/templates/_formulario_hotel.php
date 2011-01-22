<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarReserva') ?>">
    <div class="formulario">
        <h2>Reserva del Hotel</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form['reh_hot_codigo']->renderError() ?>
                    <?php echo $form['reh_hot_codigo']->renderLabel() ?><br />
                    <?php echo $form['reh_hot_codigo']->render(array(
                        'onchange' => 'actualizarInfoHotel(&quot;' . url_for('cliente/cargarHotel') . '&quot;, this.value)'
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
                                    <?php echo $form['reh_fecha_entrada']->render() ?></td>
                                    <td><?php echo $form['reh_fecha_salida']->renderError() ?>
                                    <?php echo $form['reh_fecha_salida']->renderLabel() ?><br />
                                    <?php echo $form['reh_fecha_salida']->render() ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $form['reh_hora_llegada']->renderError() ?>
                                    <?php echo $form['reh_hora_llegada']->renderLabel() ?><br />
                                    <?php echo $form['reh_hora_llegada']->render() ?></td>
                                    <td><?php echo $form['reh_hora_salida']->renderError() ?>
                                    <?php echo $form['reh_hora_salida']->renderLabel() ?><br />
                                    <?php echo $form['reh_hora_salida']->render() ?></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form['reh_dias_estadia']->renderError() ?>
                    <?php echo $form['reh_dias_estadia']->renderLabel() ?><br />
                    <?php echo $form['reh_dias_estadia']->render() ?></td>
                    <td><?php echo $form['reh_noches_estadia']->renderError() ?>
                    <?php echo $form['reh_noches_estadia']->renderLabel() ?><br />
                    <?php echo $form['reh_noches_estadia']->render() ?></td>
                    <td><?php echo $form['reh_localizador']->renderError() ?>
                    <?php echo $form['reh_localizador']->renderLabel() ?><br />
                    <?php echo $form['reh_localizador']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        
                        <div style="text-align: right">
                            <!--<button type="button">Buscar Reserva</button>-->
                            <button type="button" onclick="desplegarListaWincombo('<?php echo url_for('cliente/listarPacientes') ?>', elementos)">Buscar Reserva</button>
                        </div>
                    </td>
                </tr>
            </table>
            <script type="text/javascript">
                actualizarInfoHotel("<?php echo url_for('cliente/cargarHotel') ?>", document.getElementById("reservahotel_reh_hot_codigo").value);
            </script>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button">Generar Imprimible</button>
    </div> 
</form>