<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarPaciente') ?>">
    <div class="formulario">
        <h2>Datos del Paciente</h2>
        <?php echo $form->renderHiddenFields(false) ?>
        <div class="form">
            <table>
                <tr>
                    <td><?php echo $form['pac_nombre']->renderError() ?>
                        <?php echo $form['pac_nombre']->renderLabel() ?><br />
                        <?php echo $form['pac_nombre']->render() ?></td>
                    <td><?php echo $form['pac_identificacion']->renderError() ?>
                        <?php echo $form['pac_identificacion']->renderLabel() ?><br />
                        <?php echo $form['pac_identificacion']->render() ?></td>
                    <td><?php echo $form['pac_fecha_nacimiento']->renderError() ?>
                        <?php echo $form['pac_fecha_nacimiento']->renderLabel() ?><br />
                        <?php echo $form['pac_fecha_nacimiento']->render() ?></td>
                </tr>
                <tr>
                    <td><!--<label>Edad:</label><br />
                    <span id="paciente_pac_edad"></span>--></td>
                    <td><?php echo $form['pac_telefono1']->renderError() ?>
                        <?php echo $form['pac_telefono1']->renderLabel() ?><br />
                        <?php echo $form['pac_telefono1']->render() ?></td>
                    <td><?php echo $form['pac_telefono2']->renderError() ?>
                        <?php echo $form['pac_telefono2']->renderLabel() ?><br />
                        <?php echo $form['pac_telefono2']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['pac_email']->renderError() ?>
                        <?php echo $form['pac_email']->renderLabel() ?><br />
                        <?php echo $form['pac_email']->render() ?></td>
                    <td><?php echo $form['pac_direccion']->renderError() ?>
                        <?php echo $form['pac_direccion']->renderLabel() ?><br />
                        <?php echo $form['pac_direccion']->render() ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><?php echo $form['pac_pais']->renderError() ?>
                        <?php echo $form['pac_pais']->renderLabel() ?><br />
                        <?php echo $form['pac_pais']->render() ?></td>
                    <td><?php echo $form['pac_estado']->renderError() ?>
                        <?php echo $form['pac_estado']->renderLabel() ?><br />
                        <?php echo $form['pac_estado']->render() ?></td>
                    <td><?php echo $form['pac_ciudad']->renderError() ?>
                        <?php echo $form['pac_ciudad']->renderLabel() ?><br />
                        <?php echo $form['pac_ciudad']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['pac_cod_postal']->renderError() ?>
                        <?php echo $form['pac_cod_postal']->renderLabel() ?><br />
                        <?php echo $form['pac_cod_postal']->render() ?></td>
                    <td>
                        <?php if($sf_user->hasCredential(array('medicos_locales', 'medicos_internacionales'), false)) : ?>
                        <?php echo $form['pac_agn_codigo']->renderError() ?>
                        <?php echo $form['pac_agn_codigo']->renderLabel() ?>
                        <?php echo $form['pac_agn_codigo']->render() ?>
                        <?php else : ?>
                        &nbsp;
                        <?php endif ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $form['pac_intervencion_deseada']->renderError() ?>
                        <?php echo $form['pac_intervencion_deseada']->renderLabel() ?><br />
                        <?php echo $form['pac_intervencion_deseada']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right">
                            <script type="text/javascript">
                                var formulario = document.getElementById('form1');
                                var finder = /paciente/gi;
                                var elementos = [];
                                for(var i = 0; i < formulario.length; i ++) {
                                    var nombre_variable = formulario.elements[i].name;
                                    //alert(nombre_variable);
                                    if(nombre_variable.search(finder) >= 0) {
                                        elementos.push(formulario.elements[i]);
                                    }
                                }
                            </script>
                            <button type="button" onclick="desplegarListaWincombo('<?php echo url_for('cliente/listarPacientes') ?>', elementos)">Buscar Paciente</button>
                            <!--<?php echo button_to('Buscar Paciente', 'cliente/listarPacientes', array(
                                'popup' => true
                            )) ?>-->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="formulario">
        <h2>Contactos del Paciente</h2>
        <div class="lista" id="lst_contactos_paciente">
            <table id="lista_contactos">
                <thead>
                    <tr class="encabezado">
                        <td>Nombre del Contacto</td>
                        <td>Tel&eacute;fono Fijo</td>
                        <td>Correo Electr&oacute;nico</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="pie">
                        <td colspan="4">&nbsp;</td>
                    </tr>
                </tfoot>
                <tbody>
                <?php if(!isset($ids_contactos)) $ids_contactos = array() ?>
                <?php if(sizeof($ids_contactos) > 0): ?>
                <?php include_partial('lista_contactos', array(
                    'paciente' => $paciente
                )) ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div style="display: none" id="hidden_contacto_forms"></div>
        <div class="form">
            <script type="text/javascript">
                var actualizarFormaContacto = function() {
                    if("none" != document.getElementById('form1').elemento_edicion.value) {
                        $("#contacto_" + document.getElementById('form1').elemento_edicion.value).remove();
                        document.getElementById('form1').elemento_edicion.value = "none";
                    }
                    var contador_contactos = document.getElementById('form1').cuenta_contactos.value;

                    agregarHiddensDinamicos('hidden_contacto_forms', '<?php echo url_for('cliente/almacenarContacto') ?>', 'contacto', contador_contactos);
                    var ultima_fila = $("#lst_contactos_paciente table#lista_contactos tbody tr:last-child");

                    var fila_nueva = document.createElement("tr");
                    var celda_0 = document.createElement("td");
                    var celda_1 = document.createElement("td");
                    var celda_2 = document.createElement("td");
                    var celda_3 = document.createElement("td");
                    var celda_4 = document.createElement("td");

                    if("par" == ultima_fila.attr("class") || (0 == ultima_fila.size()))
                        fila_nueva.className = "impar";
                    else
                        fila_nueva.className = "par";

                    celda_0.textContent = $("#contacto_con_nombre").val();
                    celda_1.textContent = $("#contacto_con_telefono1").val();
                    celda_2.textContent = $("#contacto_con_email").val();
                    celda_3.textContent = "[modificar]";
                    celda_4.textContent = "[eliminar]";

                    fila_nueva.appendChild(celda_0);
                    fila_nueva.appendChild(celda_1);
                    fila_nueva.appendChild(celda_2);
                    fila_nueva.appendChild(celda_3);
                    fila_nueva.appendChild(celda_4);
                    
                    if(0 == ultima_fila.size()) {
                        $("#lst_contactos_paciente table#lista_contactos tbody").append(fila_nueva);
                    }
                    else
                        ultima_fila.after(fila_nueva);

                    document.getElementById('form1').cuenta_contactos.value ++;
                };
                
                var cargarContacto = function(id_contacto) {
                    document.getElementById('form1').elemento_edicion.value = id_contacto;
                    $.ajax({
                        url: "<?php echo url_for('cliente/cargarContactoPaciente') ?>",
                        data: "con_codigo=" + id_contacto,
                        dataType: "json",
                        success: function(respuesta) {
                            document.getElementById("contacto_con_codigo").value = respuesta.con_codigo;
                            document.getElementById("contacto_con_nombre").value = respuesta.con_nombre;
                            document.getElementById("contacto_con_telefono1").value = respuesta.con_telefono1;
                            document.getElementById("contacto_con_telefono2").value = respuesta.con_telefono2;
                            document.getElementById("contacto_con_email").value = respuesta.con_email;
                            document.getElementById("contacto_con_direccion").value = respuesta.con_direccion;
                        }
                    });
                };
                
                var eliminarContacto = function(id_contacto) {
                    $.ajax({
                        url: "<?php //echo url_for('cliente/cargarContactoPaciente') ?>",
                        data: "con_codigo=" + id_contacto,
                        dataType: "json",
                        success: function(respuesta) {
                            if(0 != respuesta) {
                                alert("Parece que hubo un error al intentar eliminar el contacto. Intentelo mas tarde");
                            }
                        }
                    });
                };
            </script>
            <?php echo $contact_form->renderHiddenFields() ?>
            <input type="hidden" name="cuenta_contactos" value="0" />
            <input type="hidden" name="elemento_edicion" value="none" />
            <table>
                <tr>
                    <td><?php echo $contact_form['con_nombre']->renderError() ?>
                        <?php echo $contact_form['con_nombre']->renderLabel() ?><br />
                        <?php echo $contact_form['con_nombre']->render() ?></td>
                    <td><?php echo $contact_form['con_telefono1']->renderError() ?>
                        <?php echo $contact_form['con_telefono1']->renderLabel() ?><br />
                        <?php echo $contact_form['con_telefono1']->render() ?></td>
                    <td><?php echo $contact_form['con_telefono2']->renderError() ?>
                        <?php echo $contact_form['con_telefono2']->renderLabel() ?><br />
                        <?php echo $contact_form['con_telefono2']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $contact_form['con_direccion']->renderError() ?>
                        <?php echo $contact_form['con_direccion']->renderLabel() ?><br />
                        <?php echo $contact_form['con_direccion']->render() ?></td>
                    <td><?php echo $contact_form['con_email']->renderError() ?>
                        <?php echo $contact_form['con_email']->renderLabel() ?><br />
                        <?php echo $contact_form['con_email']->render() ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right">
                            <button type="button" onclick="limpiarFormulario('<?php echo $contact_form->getName() ?>')">Limpiar Campos</button>
                            <!--<button type="button" onclick="agregarHiddensDinamicos('hidden_contacto_forms', '<?php echo url_for('cliente/almacenarContacto') ?>', 'contacto', document.form1.cuenta_contactos.value); document.form1.cuenta_contactos.value ++">Agregar Contacto</button>-->
                            <button type="button" onclick="actualizarFormaContacto()">Agregar Contacto</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button" onclick="location.href='<?php echo url_for('cliente/informacionPaciente?nuevo_paciente=si') ?>'">Nuevo Paciente</button>
    </div>
</form>