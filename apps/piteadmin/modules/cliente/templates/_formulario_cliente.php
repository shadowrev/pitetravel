<form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarPaciente') ?>">
    <div class="formulario">
        <h2>Datos del Paciente</h2>
        <?php echo $form->renderHiddenFields() ?>
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
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
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
        <div class="lista">
            <?php if(!isset($ids_contactos)) $ids_contactos = array() ?>
            <?php if(sizeof($ids_contactos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <td>Nombre del Contacto</td>
                        <td>Tel&eacute;fono Fijo</td>
                        <td>Correo Electr&oacute;nico</td>
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
                    <?php $par = false ?>
                    <?php foreach($paciente->Contacto as $contacto_paciente): ?>
                    <tr class="<?php echo ($par == true) ? 'par' : 'impar' ?>" id="contacto_<?php echo $contacto_paciente->con_codigo ?>">
                        <td><?php echo $contacto_paciente->con_nombre ?></td>
                        <td><?php echo $contacto_paciente->con_telefono1 ?></td>
                        <td><?php echo $contacto_paciente->con_email ?></td>
                        <td><?php echo '[modificar]' ?></td>
                        <td><?php echo '[eliminar]' ?></td><?php $par = !$par ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
            <div style="display: none" id="hidden_contacto_forms"></div>
        </div>
        <div class="form">
            <script type="text/javascript">
                var actualizarFormaContacto = function() {
                    var contador_contactos = document.getElementById('form1').cuenta_contactos.value;
                    agregarHiddensDinamicos('hidden_contacto_forms', '<?php echo url_for('cliente/almacenarContacto') ?>', 'contacto', contador_contactos);
                    
                    document.getElementById('form1').cuenta_contactos.value ++;
                }
            </script>
            <?php echo $contact_form->renderHiddenFields() ?>
            <input type="hidden" name="cuenta_contactos" value="0" />
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
                            <button type="button" onclick="limpiarFormulario('<?php echo $contact_form->getName() ?>')">Nuevo Contacto</button>
                            <button type="button" onclick="agregarHiddensDinamicos('hidden_contacto_forms', '<?php echo url_for('cliente/almacenarContacto') ?>', 'contacto', document.form1.cuenta_contactos.value); document.form1.cuenta_contactos.value ++">Agregar Contacto</button>
                            <button type="button" onclick="actualizarFormaContacto()">Agregar Contacto</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button" onclick="location.href='<?php echo url_for('cliente/informacionPaciente?nuevo_paciente=si') ?>'">Cancelar</button>
    </div>
</form>