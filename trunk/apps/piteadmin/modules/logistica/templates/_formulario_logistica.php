<form id="form1" name="form1" method="post" action="<?php echo url_for('logistica/guardarLogistica') ?>">
    <div class="formulario" id="frm_responsable_logistica">
        <h2>Responsable de la log&iacute;stica</h2>
        <div class="form">
            <?php include_partial('form_responsable', array(
                'form_responsable' => $form_responsable
            )) ?>
        </div>
    </div>
    <div class="formulario" id="frm_guia">
        <h2>Informaci&oacute;n del Gu&iacute;a</h2>
        <div class="form">
            <?php include_partial('form_guia', array(
                'form_contacto' => $form_contacto
            )) ?>
        </div>
    </div>
    <div class="formulario">
        <h2>Observaciones</h2>
        <div class="form">
            <?php echo $form_logistica->renderHiddenFields() ?>
            <table>
                <tr>
                    <td><?php echo $form_logistica['log_observaciones']->renderError() ?>
                    <?php echo $form_logistica['log_observaciones']->renderLabel() ?><br />
                    <?php echo $form_logistica['log_observaciones']->render() ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="submit">Guardar</button>
        <button type="button">Cancelar</button>
        <button type="button">Generar Imprimible</button>
    </div>
</form>