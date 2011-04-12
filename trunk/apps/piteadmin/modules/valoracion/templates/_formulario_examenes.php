<?php //$campo_desactivado = $sf_context->getUser()->hasCredential('medicos_locales') ? array() : array('disabled' => true) ?>
<?php $campo_desactivado = array() ?>
<form id="form1" name="form1" method="post" action="<?php echo url_for('valoracion/guardarPreoperatorio') ?>" enctype="multipart/form-data">
    <div class="formulario">
        <h2>Tratamiento</h2>
        <div class="lista" id="lst_procedimientos">
            <table>
                <thead>
                    <tr>
                        <td>Tipo de Tratamiento</td>
                        <td>Descripci&oacute;n</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                </tfoot>
                <tbody>
                <?php //if(!isset($ids_procedimientos)) $ids_procedimientos = array() ?>
                <?php if(sizeof($ids_procedimientos) > 0): ?>
                    <?php $par = false ?>
                    <?php foreach($tratamiento->Procedimiento as $procedimiento): ?>
                    <?php $descripcion = in_array($procedimiento->pro_dtr_codigo, array(11, 21, 30, 40)) ? $procedimiento->pro_otro : $procedimiento->Descripciontratamiento->dtr_descripcion ?>
                    <tr class="<?php echo (true == $par) ? 'par' : 'impar' ?>" id="procedimiento_<?php echo $procedimiento->pro_codigo ?>">
                        <td><?php echo $procedimiento->Tipotratamiento->tit_nombre ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><a href="javascript:cargarProcedimiento(<?php echo $procedimiento->pro_codigo ?>)">[modificar]</a></td>
                        <td><a href="<?php echo '#' ?>">[eliminar]</a></td><?php $par = !$par ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="procedimientos_hidden" style="display: none"></div>
        </div>
        <script type="text/javascript">
            var actualizarFormaTratamientos = function() {
                if("none" != document.getElementById('form1').elemento_edicion.value) {
                    $("#procedimiento_" + document.getElementById('form1').elemento_edicion.value).remove();
                    document.getElementById('form1').elemento_edicion.value = "none";
                }
                var contador_contactos = document.getElementById('form1').cuenta_procedimientos.value;
                agregarHiddensDinamicos('procedimientos_hidden', '<?php echo url_for('valoracion/almacenarProcedimiento') ?>', 'procedimiento', contador_contactos);
                var ultima_fila = $("#lst_procedimientos table tbody tr:last-child");

                var fila_nueva = document.createElement("tr");
                var celda_0 = document.createElement("td");
                var celda_1 = document.createElement("td");
                var celda_2 = document.createElement("td");
                var celda_3 = document.createElement("td");

                if("par" == ultima_fila.attr("class") || (0 == ultima_fila.size()))
                    fila_nueva.className = "impar";
                else
                    fila_nueva.className = "par";

                celda_0.textContent = $("#procedimiento_pro_tit_codigo option:selected").text();
                celda_1.textContent = $("#procedimiento_pro_dtr_codigo option:selected").text();
                celda_2.textContent = "[modificar]";
                celda_3.textContent = "[eliminar]";

                fila_nueva.appendChild(celda_0);
                fila_nueva.appendChild(celda_1);
                fila_nueva.appendChild(celda_2);
                fila_nueva.appendChild(celda_3);

                if(0 == ultima_fila.size()) {
                    $("#lst_procedimientos table tbody").append(fila_nueva);
                }
                else
                    ultima_fila.after(fila_nueva);

                document.getElementById('form1').cuenta_procedimientos.value ++;
            };

            var cargarProcedimiento = function(id_procedimiento) {
                document.getElementById('form1').elemento_edicion.value = id_procedimiento;
                $.ajax({
                    url: "<?php echo url_for('valoracion/cargarProcedimiento') ?>",
                    data: "pro_codigo=" + id_procedimiento,
                    dataType: "json",
                    success: function(respuesta) {
                        // Ver la forma de cargar nuevamente el formulario con el tipo de tratamiento; como esta ahora solo
                        // selecciona los items que corresponden a procedimiento_pro_tit_codigo = corporal
                        //filtrarTratamientos("<?php url_for('valoracion/cargarTipoTratamiento') ?>", respuesta.pro_tit_codigo);
                        document.getElementById("procedimiento_pro_codigo").value = respuesta.pro_codigo;
                        document.getElementById("procedimiento_pro_tit_codigo").value = respuesta.pro_tit_codigo;
                        document.getElementById("procedimiento_pro_dtr_codigo").value = respuesta.pro_dtr_codigo;
                        document.getElementById("procedimiento_pro_otro").value = respuesta.pro_otro;
                    }
                });
            };

            var limpiarFormaProcedimiento = function() {
                document.getElementById("procedimiento_pro_codigo").value = null;
                document.getElementById("procedimiento_pro_otro").value = null;
            }
        </script>
        <div class="form">
            <input type="hidden" name="cuenta_procedimientos" value="0" />
            <input type="hidden" name="elemento_edicion" value="none" />
            <?php echo $procedimiento_form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $procedimiento_form['pro_tit_codigo']->renderError() ?>
                    <?php echo $procedimiento_form['pro_tit_codigo']->renderLabel() ?><br />
                    <?php echo $procedimiento_form['pro_tit_codigo']->render(array(
                        'onchange' => 'filtrarTratamientos(&quot;' . url_for('valoracion/cargarTipoTratamiento') . '&quot;, this.value)'
                    )) ?></td>
                    <td id="td_procedimiento_pro_drt_codigo"><?php echo $procedimiento_form['pro_dtr_codigo']->renderError() ?>
                    <?php echo $procedimiento_form['pro_dtr_codigo']->renderLabel() ?><br />
                    <?php echo $procedimiento_form['pro_dtr_codigo']->render(array(
                        'onchange' => 'activarCampoProcedimientoOtro(this.options[this.selectedIndex].text, &quot;Otro?&quot;)'
                    )) ?></td>
                    <td><?php echo $procedimiento_form['pro_otro']->renderError() ?>
                    <?php echo $procedimiento_form['pro_otro']->renderLabel() ?><br />
                    <?php echo $procedimiento_form['pro_otro']->render(array(
                        'disabled' => 'disabled'
                    )) ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right">
                            <button type="button" onclick="limpiarFormaProcedimiento()">Limpiar Campos</button>
                            <button type="button" onclick="actualizarFormaTratamientos()">Agregar Tratamiento</button>
                        </div>
                    </td>
                </tr>
            </table>
            <script type="text/javascript">
                var select_tratamiento = document.getElementById("procedimiento_pro_tit_codigo");
                filtrarTratamientos("<?php echo url_for('valoracion/cargarTipoTratamiento') ?>", select_tratamiento.value);
            </script>
        </div>
    </div>
    <?php if($sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales', 'admin'), false)): ?>
    <div class="formulario">
        <h2>Ex&aacute;menes Pre-Operatorios</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form['preo_glicemia']->renderError() ?>
                    <?php echo $form['preo_glicemia']->renderLabel() ?><br />
                    <?php echo $form['preo_glicemia']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_tiempo_coagulacion']->renderError() ?>
                    <?php echo $form['preo_tiempo_coagulacion']->renderLabel() ?><br />
                    <?php echo $form['preo_tiempo_coagulacion']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_hg_glicosilada']->renderError() ?>
                    <?php echo $form['preo_hg_glicosilada']->renderLabel() ?><br />
                    <?php echo $form['preo_hg_glicosilada']->render($campo_desactivado) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_tpt']->renderError() ?>
                    <?php echo $form['preo_tpt']->renderLabel() ?><br />
                    <?php echo $form['preo_tpt']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_ptt']->renderError() ?>
                    <?php echo $form['preo_ptt']->renderLabel() ?><br />
                    <?php echo $form['preo_ptt']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_prueba_esfuerzo']->renderError() ?>
                    <?php echo $form['preo_prueba_esfuerzo']->renderLabel() ?><br />
                    <?php echo $form['preo_prueba_esfuerzo']->render($campo_desactivado) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_creatinina']->renderError() ?>
                    <?php echo $form['preo_creatinina']->renderLabel() ?><br />
                    <?php echo $form['preo_creatinina']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_nitrogeno_ureico']->renderError() ?>
                    <?php echo $form['preo_nitrogeno_ureico']->renderLabel() ?><br />
                    <?php echo $form['preo_nitrogeno_ureico']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_parcial_orina']->renderError() ?>
                    <?php echo $form['preo_parcial_orina']->renderLabel() ?><br />
                    <?php echo $form['preo_parcial_orina']->render($campo_desactivado) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_tsh']->renderError() ?>
                    <?php echo $form['preo_tsh']->renderLabel() ?><br />
                    <?php echo $form['preo_tsh']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_t3']->renderError() ?>
                    <?php echo $form['preo_t3']->renderLabel() ?><br />
                    <?php echo $form['preo_t3']->render($campo_desactivado) ?></td>
                    <td><?php echo $form['preo_t4']->renderError() ?>
                    <?php echo $form['preo_t4']->renderLabel() ?><br />
                    <?php echo $form['preo_t4']->render($campo_desactivado) ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_vih']->renderError() ?>
                    <?php echo $form['preo_vih']->renderLabel() ?><br />
                    <?php echo $form['preo_vih']->render($campo_desactivado) ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['preo_rx_torax']->renderError() ?>
                    <?php echo $form['preo_rx_torax']->renderLabel() ?><br />
                    <?php echo $form['preo_rx_torax']->render($campo_desactivado) ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['preo_electro']->renderError() ?>
                    <?php echo $form['preo_electro']->renderLabel() ?><br />
                    <?php echo $form['preo_electro']->render($campo_desactivado) ?></td>
                </tr>
                <!--<tr>
                    <td><?php echo $form['preo_nombre_especialista']->renderError() ?>
                    <?php echo $form['preo_nombre_especialista']->renderLabel() ?><br />
                    <?php echo $form['preo_nombre_especialista']->render() ?></td>
                    <td><?php echo $form['preo_correo_especialista']->renderError() ?>
                    <?php echo $form['preo_correo_especialista']->renderLabel() ?><br />
                    <?php echo $form['preo_correo_especialista']->render() ?></td>
                    <td>&nbsp;</td>
                </tr>-->
                <!--<tr>
                    <td colspan="3">
                        <div style="text-align: right"><button type="button">Buscar</button></div>
                    </td>
                </tr>-->
            </table>
        </div>
    </div>
    <div class="formulario">
        <h2>Fotos Preoperatorias</h2>
        <div class="form" id="form_fotos">
            <script type="text/javascript">
                var agregarFoto = function() {
                    document.getElementById("form1").cuenta_fotos.value ++;
                    $.ajax({
                        url: "<?php echo url_for('valoracion/agregarFoto') ?>",
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
                            <?php if(sizeof($links_forms_fotos) > 0): ?>
                            <a href="<?php echo public_path('') . 'uploads/fotos_pacientes/' . $links_forms_fotos[$i] ?>" target="_blank">
                                <img src="<?php echo public_path('') ?>images/icono_jpg.jpg" alt="Ver imagen actual" title="Ver imagen actual" />
                            </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->renderError() ?>
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->renderLabel() ?><br />
                            <?php echo $forms_fotos[$i]['fot_uri_imagen']->render() ?><br />
                        </td>
                        <!--<td>
                            <button type="button" onclick="">X</button>
                        </td>-->
                    </tr>
                </table>
            </div>
            <?php endfor; ?>
            <div style="text-align: right">
                <button type="button" onclick="agregarFoto()">Adicionar Nueva Foto</button>
            </div>
            <?php if($preoperatorio->Medico->med_codigo): ?>
            <div>
                <em>&Uacute;ltima valoraci&oacute;n realizada por: <strong><?php echo $preoperatorio->Medico->med_nombre ?> (<a href="<?php echo 'mailto:' . $preoperatorio->Medico->med_email ?>"><?php echo $preoperatorio->Medico->med_email ?></a>)</strong></em>
            </div>
            <?php endif ?>
        </div>
    </div>
    <?php endif ?>
        <div class="submit">
            <button type="submit">Guardar</button>
            <button type="button" onclick="location.href='<?php echo url_for('valoracion/examenesPreoperatorios?nueva_valoracion=yes') ?>'">Nuevo</button>
        </div>
    </form>