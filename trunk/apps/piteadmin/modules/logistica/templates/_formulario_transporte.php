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
            'form_transporte' => $form_transporte
        )) ?>
    </div>
    <div class="formulario">
        <h2>Observaciones</h2>
        <div class="form">
            <table>
                <tr>
                    <td><?php echo $form_logistica['log_observaciones_transporte']->renderError() ?>
                    <?php echo $form_logistica['log_observaciones_transporte']->renderLabel() ?>
                    <?php echo $form_logistica['log_observaciones_transporte']->render() ?></td>
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