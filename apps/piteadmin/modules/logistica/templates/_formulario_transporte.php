<?php $solo_lectura = !$sf_context->getUser()->hasCredential(array('touroperador', 'logistica'), false) ?>
<form id="form1" name="form1" method="post" action="<?php echo url_for('logistica/guardarTransporte') ?>">
    <script type="text/javascript">
        var actualizarTransporte = function(id_transporte) {
            $.ajax({
                url: "<?php echo url_for('logistica/cargarTransporte') ?>",
                data: "trans_codigo=" + id_transporte,
                success: function(respuesta) {
                    document.getElementById("frm_transporte").innerHTML = respuesta;
                }
            });
        }
    </script>
    <?php echo $form_logistica->renderHiddenFields() ?>
    <div class="formulario" id="frm_transporte">
        <?php include_partial('form_transporte', array(
            'form_transporte' => $form_transporte,
            'solo_lectura' => $solo_lectura
        )) ?>
    </div>
    <div class="formulario">
        <h2>Observaciones</h2>
        <div class="form">
            <table>
                <tr>
                    <td><?php echo $form_logistica['log_observaciones_transporte']->renderError() ?>
                    <?php echo $form_logistica['log_observaciones_transporte']->renderLabel() ?>
                    <?php echo $form_logistica['log_observaciones_transporte']->render(array('disabled' => $solo_lectura)) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="submit">
        <button type="submit"<?php echo empty($solo_lectura) ? '' : ' disabled' ?>>Guardar</button>
    </div>
</form>