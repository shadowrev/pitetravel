<form id="form1" name="form1" method="post" action="<?php echo url_for('postoperatorio/guardarInfoPostOperatorio') ?>">
    <div class="formulario">
        <h2>Informe Post-Operatorio</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form['pos_hora_cita_col']->renderError() ?>
                    <?php echo $form['pos_hora_cita_col']->renderLabel() ?><br />
                    <?php echo $form['pos_hora_cita_col']->render() ?></td>
                    <td><?php echo $form['pos_hora_cirugia']->renderError() ?>
                    <?php echo $form['pos_hora_cirugia']->renderLabel() ?><br />
                    <?php echo $form['pos_hora_cirugia']->render() ?></td>
                    <td><?php echo $form['pos_enf_codigo']->renderError() ?>
                    <?php echo $form['pos_enf_codigo']->renderLabel() ?><br />
                    <?php echo $form['pos_enf_codigo']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['pos_tipo_anestesia']->renderError() ?>
                    <?php echo $form['pos_tipo_anestesia']->renderLabel() ?><br />
                    <?php echo $form['pos_tipo_anestesia']->render() ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['pos_valoracion']->renderError() ?>
                    <?php echo $form['pos_valoracion']->renderLabel() ?><br />
                    <?php echo $form['pos_valoracion']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['pos_recomendaciones']->renderError() ?>
                    <?php echo $form['pos_recomendaciones']->renderLabel() ?><br />
                    <?php echo $form['pos_recomendaciones']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['pos_info_especialista']->renderError() ?>
                    <?php echo $form['pos_info_especialista']->renderLabel() ?><br />
                    <?php echo $form['pos_info_especialista']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['pos_observaciones']->renderError() ?>
                    <?php echo $form['pos_observaciones']->renderLabel() ?><br />
                    <?php echo $form['pos_observaciones']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right"><button type="button">Buscar Informe</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="formulario">
        <h2>Fotos Postperatorias</h2>
        <div class="form" id="form_fotos">
            <script type="text/javascript">
                var agregarFoto = function() {
                    document.getElementById("form1").cuenta_fotos.value ++;
                    $.ajax({
                        url: "<?php echo url_for('postoperatorio/agregarFoto') ?>",
                        data: "cuenta_fotos=" + document.getElementById("form1").cuenta_fotos.value,
                        success: function(respuesta) {
                            var contador = document.getElementById("form1").cuenta_fotos.value;
                            var contenedor_formulario_ant = $("#form_fotos #foto_" + (contador - 1));
                            var nuevo_div = document.createElement('div');

                            nuevo_div.setAttribute("id", "foto_" + contador);
                            nuevo_div.innerHTML = respuesta;
                            contenedor_formulario_ant.after(nuevo_div);
                        }
                    });
                }
            </script>
            <input type="hidden" name="cuenta_fotos" value="<?php echo (sizeof($forms_fotos) - 1) ?>" />
            <?php for($i = 0; $i < sizeof($forms_fotos); $i ++): ?>
            <div id="foto_<?php echo $i ?>">
                <?php echo $forms_fotos[$i]->renderHiddenFields() ?>
                <table>
                    <tr>
                        <td>
                            <?php echo $forms_fotos[$i]['fot_nombre']->renderError() ?>
                            <?php echo $forms_fotos[$i]['fot_nombre']->renderLabel() ?><br />
                            <?php echo $forms_fotos[$i]['fot_nombre']->render() ?>
                        </td>
                        <td>
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->renderError() ?>
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->renderLabel() ?><br />
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->render() ?><br />
                            <?php if(sizeof($links_forms_fotos) > 0): ?>
                            <a href="<?php echo public_path('') . 'uploads/fotos_pacientes/' . $links_forms_fotos[$i] ?>" target="_blank">Imagen Actual</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" onclick="">X</button>
                        </td>
                    </tr>
                </table>
            </div>
            <?php endfor; ?>
            <div style="text-align: right">
                <button type="button" onclick="agregarFoto()">Agregar Foto</button>
            </div>
            <div>
                <em>&Uacute;ltima valoraci&oacute;n realizada por: <strong>Nombre del m&eacute;dico</strong></em>
            </div>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button">Cancelar</button>
    </div>
</form>