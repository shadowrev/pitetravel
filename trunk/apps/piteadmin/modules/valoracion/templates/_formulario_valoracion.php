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
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button">Cancelar</button>
    </div>
</form>