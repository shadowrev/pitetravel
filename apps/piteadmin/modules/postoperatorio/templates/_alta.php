<form id="form1" name="form1" method="post" action="<?php echo url_for('postoperatorio/guardarAltaPostoperatoria') ?>">
    <div class="formulario">
        <h2>Informe del Alta Post-Operatoria</h2>
        <div class="form">
            <?php echo $form->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form['apo_cli_codigo']->renderError() ?>
                    <?php echo $form['apo_cli_codigo']->renderLabel() ?><br />
                    <?php echo $form['apo_cli_codigo']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['apo_exploracion']->renderError() ?>
                    <?php echo $form['apo_exploracion']->renderLabel() ?><br />
                    <?php echo $form['apo_exploracion']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['apo_info_especialista']->renderError() ?>
                    <?php echo $form['apo_info_especialista']->renderLabel() ?><br />
                    <?php echo $form['apo_info_especialista']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['apo_tratamiento']->renderError() ?>
                    <?php echo $form['apo_tratamiento']->renderLabel() ?><br />
                    <?php echo $form['apo_tratamiento']->render() ?></td>
                </tr>
                <tr>
                    <td><?php echo $form['apo_observaciones']->renderError() ?>
                    <?php echo $form['apo_observaciones']->renderLabel() ?><br />
                    <?php echo $form['apo_observaciones']->render() ?></td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align: right"><button type="button">Buscar Informe</button></div>
                    </td>
                </tr>
            </table>
            <?php if(!empty($altapostoperatoria)): ?>
            <div>
                <em>&Uacute;ltima valoraci&oacute;n realizada por: <strong><?php echo $altapostoperatoria->Medico->med_nombre ?> (<a href="<?php echo 'mailto:' . $altapostoperatoria->Medico->med_email ?>"><?php echo $altapostoperatoria->Medico->med_email ?></a>)</strong></em>
            </div>
            <?php endif ?>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
    </div>
</form>