<form id="form1" name="form1" method="post" action="">
    <div class="formulario">
        <h2>Ex&aacute;menes Pre-Operatorios</h2>
        <div class="form">
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
            <div class="lista">
                <?php if(!isset($ids_procedimientos)) $ids_procedimientos = array() ?>
                <?php if(sizeof($ids_procedimientos) > 0): ?>
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
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
            <div class="form">
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
                        <td colspan="3"><div style="text-align: right"><button type="button">Agregar Tratamiento</button></div></td>
                    </tr>
                    <!--<tr>
                        <td><label for="label2">*Fecha de Partida:</label><br />
                        <input type="text" name="nombre" id="label" /></td>
                        <td><label for="label2">*Fecha de Regreso:</label><br />
                        <input type="text" name="nombre" id="label" /></td>
                        <td><label for="label2">Tiempo de Estad&iacute;a:</label><br />
                        <input type="text" name="nombre" id="label" /></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="text-align: right">
                                <button type="button">Guardar Tratamiento</button>
                                <button type="button">Buscar Tratamiento</button>
                            </div>
                        </td>
                    </tr>-->
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