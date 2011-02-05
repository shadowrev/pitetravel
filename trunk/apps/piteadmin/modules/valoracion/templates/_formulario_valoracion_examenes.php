<form id="form1" name="form1" method="post" action="<?php echo url_for('valoracion/guardarValoracionPreoperatoria') ?>">
    <div class="formulario">
        <h2>Programaci&oacute;n de la Cita y Valoraci&oacute;n</h2>
        <div class="form">
            <?php echo $preoperatorio_form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $preoperatorio_form['preo_fecha_cita_ext']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_fecha_cita_ext']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_fecha_cita_ext']->render() ?></td>
                    <td><?php echo $preoperatorio_form['preo_hora_cita_ext']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_hora_cita_ext']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_hora_cita_ext']->render() ?></td>
                    <td><?php echo $preoperatorio_form['preo_cli_codigo']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_cli_codigo']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_cli_codigo']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $preoperatorio_form['preo_informe_especialista']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_informe_especialista']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_informe_especialista']->render() ?></td>
                </tr>
            </table>
            <div>
                <em>&Uacute;ltima valoraci&oacute;n realizada por: <strong>Nombre del m&eacute;dico</strong></em>
            </div>
        </div>
    </div>

    <div class="formulario">
        <h2>Informaci&oacute;n Adicional</h2>
        <div class="form">
            <?php echo $preoperatorio_form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $preoperatorio_form['preo_cli_codigo']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_cli_codigo']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_cli_codigo']->render() ?></td>
                    <!-- Contemplar la posibilidad de poner un boton para agregar en la marcha una enfermera y actualizar el select por AJAX -->
                    <td id="td_preoperatorio_preo_enf_codigo"><?php echo $preoperatorio_form['preo_enf_codigo']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_enf_codigo']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_enf_codigo']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $preoperatorio_form['preo_fecha_cirugia']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_fecha_cirugia']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_fecha_cirugia']->render() ?></td>
                    <td><?php echo $preoperatorio_form['preo_hora_cirugia']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_hora_cirugia']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_hora_cirugia']->render() ?></td>
                </tr>
                <tr>
                    <td><label for="correo_electronico_especialista">Correo Electr&oacute;nico Especialista: </label><br />
                    <input type="text" name="correo_electronico_especialista" id="correo_electronico_especialista" value="<?php echo 'Aqui viene el mail del especialista' ?>" readonly /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $preoperatorio_form['preo_observaciones']->renderError() ?>
                    <?php echo $preoperatorio_form['preo_observaciones']->renderLabel() ?><br />
                    <?php echo $preoperatorio_form['preo_observaciones']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="text-align: right"><button type="button">Guardar</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="formulario">
        <h2>Material Quirurgico Adicional</h2>
        <div class="lista" id="material_quirurgico_ad">
            <table>
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Cantidad</td>
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
                    <?php if(0 < sizeof($material_quirurgico)): ?>
                    <?php $par = false ?>
                    <?php foreach($material_quirurgico as $elemento): ?>
                    <tr class="<?php echo (true == $par) ? 'par' : 'impar' ?>">
                        <td><?php echo $elemento->Materialquirurgico->maq_nombre ?></td>
                        <td><?php echo $elemento->exi_cantidad ?></td>
                        <td><a href="javascript:void(0)">[modificar]</a></td>
                        <td><a href="javascript:void(0)">[eliminar]</a></td>
                    </tr>
                    <?php $par = !$par; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="material_hidden" style="display: none"></div>
            <input type="hidden" name="cuenta_material" value="0" />
            <script type="text/javascript">
                var actualizarFormaMaterialQuirurgico = function() {
                    var contador_material = document.getElementById('form1').cuenta_material.value;
                    agregarHiddensDinamicos('material_hidden', '<?php echo url_for('valoracion/almacenarMaterial') ?>', 'elementosxintervencion', contador_material);
                    var ultima_fila = $("#material_quirurgico_ad table tbody tr:last-child");

                    var fila_nueva = document.createElement("tr");
                    var celda_0 = document.createElement("td");
                    var celda_1 = document.createElement("td");
                    var celda_2 = document.createElement("td");
                    var celda_3 = document.createElement("td");

                    if("par" == ultima_fila.attr("class") || (0 == ultima_fila.size()))
                        fila_nueva.className = "impar";
                    else
                        fila_nueva.className = "par";

                    celda_0.textContent = $("#elementosxintervencion_exi_maq_codigo option:selected").text();
                    celda_1.textContent = $("#elementosxintervencion_exi_cantidad").val();
                    celda_2.textContent = "[modificar]";
                    celda_3.textContent = "[eliminar]";

                    fila_nueva.appendChild(celda_0);
                    fila_nueva.appendChild(celda_1);
                    fila_nueva.appendChild(celda_2);
                    fila_nueva.appendChild(celda_3);

                    if(0 == ultima_fila.size()) {
                        $("#material_quirurgico_ad table tbody").append(fila_nueva);
                    }
                    else
                        ultima_fila.after(fila_nueva);

                    document.getElementById('form1').cuenta_material.value ++;
                }
            </script>
        </div>
        <div class="form">
            <table>
                <tr>
                    <td><?php echo $elementosxinterv_form['exi_maq_codigo']->renderError() ?>
                    <?php echo $elementosxinterv_form['exi_maq_codigo']->renderLabel() ?><br />
                    <?php echo $elementosxinterv_form['exi_maq_codigo']->render() ?></td>
                    <td><?php echo $elementosxinterv_form['exi_cantidad']->renderError() ?>
                    <?php echo $elementosxinterv_form['exi_cantidad']->renderLabel() ?><br />
                    <?php echo $elementosxinterv_form['exi_cantidad']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="text-align: right">
                            <button type="button" onclick="actualizarFormaMaterialQuirurgico()">Agregar Material</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="formulario">
        <h2>Dieta</h2>
        <div class="lista" id="lst_menu_dieta">
            <table>
                <thead>
                    <tr>
                        <td>D&iacute;a</td>
                        <td>Desayuno</td>
                        <td>Almuerzo</td>
                        <td>Comida</td>
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
                    <?php if($dieta_paciente): ?>
                    <?php if(sizeof($dieta_paciente->Menu) > 0): ?>
                    <?php $par = false; $counter = 1; ?>
                    <?php foreach($dieta_paciente->Menu as $menu): ?>
                    <tr class="<?php echo (true == $par) ? 'par' : 'impar' ?>">
                        <td><?php echo $counter ?></td>
                        <td><?php echo $menu->men_desayuno ?></td>
                        <td><?php echo $menu->men_almuerzo ?></td>
                        <td><?php echo $menu->men_comida ?></td>
                        <td><a href="javascript:void(0)">[modificar]</a></td>
                        <td><a href="javascript:void(0)">[eliminar]</a></td>
                    </tr>
                    <?php $counter ++ ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="menu_dieta_hidden" style="display: none"></div>
            <input type="hidden" name="cuenta_menu" value="0" />
            <script type="text/javascript">
                var actualizarFormaMenu = function() {
                    var contador_menu = document.getElementById('form1').cuenta_menu.value;
                    agregarHiddensDinamicos("menu_dieta_hidden", "<?php echo url_for('valoracion/almacenarMenu') ?>", "menu", contador_menu);
                    var ultima_fila = $("#lst_menu_dieta table tbody tr:last-child");

                    var fila_nueva = document.createElement("tr");
                    var celda_0 = document.createElement("td");
                    var celda_1 = document.createElement("td");
                    var celda_2 = document.createElement("td");
                    var celda_3 = document.createElement("td");
                    var celda_4 = document.createElement("td");
                    var celda_5 = document.createElement("td");

                    if("par" == ultima_fila.attr("class") || (0 == ultima_fila.size()))
                        fila_nueva.className = "impar";
                    else
                        fila_nueva.className = "par";

                    celda_0.textContent = parseInt(contador_menu) + 1;
                    celda_1.textContent = $("#menu_men_desayuno").val();
                    celda_2.textContent = $("#menu_men_almuerzo").val();
                    celda_3.textContent = $("#menu_men_comida").val();
                    celda_4.textContent = "[modificar]";
                    celda_5.textContent = "[eliminar]";

                    fila_nueva.appendChild(celda_0);
                    fila_nueva.appendChild(celda_1);
                    fila_nueva.appendChild(celda_2);
                    fila_nueva.appendChild(celda_3);
                    fila_nueva.appendChild(celda_4);
                    fila_nueva.appendChild(celda_5);

                    if(0 == ultima_fila.size()) {
                        $("#lst_menu_dieta table tbody").append(fila_nueva);
                    }
                    else
                        ultima_fila.after(fila_nueva);

                    document.getElementById('form1').cuenta_menu.value ++;
                }
            </script>
        </div>
        <div class="form">
            <?php echo $dieta_form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $menu_form['men_desayuno']->renderError() ?>
                    <?php echo $menu_form['men_desayuno']->renderLabel() ?><br />
                    <?php echo $menu_form['men_desayuno']->render() ?></td>
                    <td><?php echo $menu_form['men_almuerzo']->renderError() ?>
                    <?php echo $menu_form['men_almuerzo']->renderLabel() ?><br />
                    <?php echo $menu_form['men_almuerzo']->render() ?></td>
                    <td><?php echo $menu_form['men_comida']->renderError() ?>
                    <?php echo $menu_form['men_comida']->renderLabel() ?><br />
                    <?php echo $menu_form['men_comida']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right">
                            <button type="button" onclick="actualizarFormaMenu()">Agregar Menu</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $dieta_form['dtp_tipo_dieta']->renderError() ?>
                    <?php echo $dieta_form['dtp_tipo_dieta']->renderLabel() ?><br />
                    <?php echo $dieta_form['dtp_tipo_dieta']->render() ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php echo $dieta_form['dtp_recomendaciones']->renderError() ?>
                        <?php echo $dieta_form['dtp_recomendaciones']->renderLabel() ?><br />
                        <?php echo $dieta_form['dtp_recomendaciones']->render() ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right">
                            <button type="button" disabled>Buscar Dieta</button>
                        </div>
                    </td>
                </tr>
            </table>
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