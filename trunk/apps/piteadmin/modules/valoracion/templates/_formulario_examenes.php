<form id="form1" name="form1" method="post" action="<?php echo url_for('valoracion/guardarPreoperatorio') ?>">
    <div class="formulario">
        <h2>Ex&aacute;menes Pre-Operatorios</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form['preo_glicemia']->renderError() ?>
                    <?php echo $form['preo_glicemia']->renderLabel() ?><br />
                    <?php echo $form['preo_glicemia']->render() ?></td>
                    <td><?php echo $form['preo_tiempo_coagulacion']->renderError() ?>
                    <?php echo $form['preo_tiempo_coagulacion']->renderLabel() ?><br />
                    <?php echo $form['preo_tiempo_coagulacion']->render() ?></td>
                    <td><?php echo $form['preo_hg_glicosilada']->renderError() ?>
                    <?php echo $form['preo_hg_glicosilada']->renderLabel() ?><br />
                    <?php echo $form['preo_hg_glicosilada']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_tpt']->renderError() ?>
                    <?php echo $form['preo_tpt']->renderLabel() ?><br />
                    <?php echo $form['preo_tpt']->render() ?></td>
                    <td><?php echo $form['preo_ptt']->renderError() ?>
                    <?php echo $form['preo_ptt']->renderLabel() ?><br />
                    <?php echo $form['preo_ptt']->render() ?></td>
                    <td><?php echo $form['preo_prueba_esfuerzo']->renderError() ?>
                    <?php echo $form['preo_prueba_esfuerzo']->renderLabel() ?><br />
                    <?php echo $form['preo_prueba_esfuerzo']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_creatinina']->renderError() ?>
                    <?php echo $form['preo_creatinina']->renderLabel() ?><br />
                    <?php echo $form['preo_creatinina']->render() ?></td>
                    <td><?php echo $form['preo_nitrogeno_ureico']->renderError() ?>
                    <?php echo $form['preo_nitrogeno_ureico']->renderLabel() ?><br />
                    <?php echo $form['preo_nitrogeno_ureico']->render() ?></td>
                    <td><?php echo $form['preo_parcial_orina']->renderError() ?>
                    <?php echo $form['preo_parcial_orina']->renderLabel() ?><br />
                    <?php echo $form['preo_parcial_orina']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_tsh']->renderError() ?>
                    <?php echo $form['preo_tsh']->renderLabel() ?><br />
                    <?php echo $form['preo_tsh']->render() ?></td>
                    <td><?php echo $form['preo_t3']->renderError() ?>
                    <?php echo $form['preo_t3']->renderLabel() ?><br />
                    <?php echo $form['preo_t3']->render() ?></td>
                    <td><?php echo $form['preo_t4']->renderError() ?>
                    <?php echo $form['preo_t4']->renderLabel() ?><br />
                    <?php echo $form['preo_t4']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['preo_vih']->renderError() ?>
                    <?php echo $form['preo_vih']->renderLabel() ?><br />
                    <?php echo $form['preo_vih']->render() ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['preo_rx_torax']->renderError() ?>
                    <?php echo $form['preo_rx_torax']->renderLabel() ?><br />
                    <?php echo $form['preo_rx_torax']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['preo_electro']->renderError() ?>
                    <?php echo $form['preo_electro']->renderLabel() ?><br />
                    <?php echo $form['preo_electro']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right"><button type="button">Buscar</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
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
                    <?php if(!isset($ids_procedimientos)) $ids_procedimientos = array() ?>
                    <?php if(sizeof($ids_procedimientos) > 0): ?>
                        <?php $par = false ?>
                        <?php //foreach($paciente->Contacto as $procedimiento): ?>
                        <tr class="<?php echo (true == $par) ? 'par' : 'impar' ?>">
                            <td><?php //echo $procedimiento->con_nombre ?></td>
                            <td><?php //echo $procedimiento->con_telefono1 ?></td>
                            <td><?php //echo $procedimiento->con_email ?></td>
                            <td><?php //echo '[modificar]' ?></td>
                            <td><?php //echo '[eliminar]' ?></td><?php $par = !$par ?>
                        </tr>
                        <?php //endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div id="procedimientos_hidden" style="display: none"></div>
            </div>
            <script type="text/javascript">
                var actualizarFormaTratamientos = function() {
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
                }
            </script>
            <div class="form">
                <input type="hidden" name="cuenta_procedimientos" value="0" />
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
                                <button type="button" onclick="">Nuevo Tratamiento</button>
                                <button type="button" onclick="actualizarFormaTratamientos()">Agregar Tratamiento</button>
                            </div>
                        </td>
                    </tr>
                </table>
                <script type="text/javascript">
                    var select_tratamiento = document.getElementById("procedimiento_pro_tit_codigo");
                    filtrarTratamientos("<?php echo url_for('valoracion/cargarTipoTratamiento') ?>", select_tratamiento.value);
                </script>
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