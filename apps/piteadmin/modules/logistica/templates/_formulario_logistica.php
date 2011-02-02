<form id="form1" name="form1" method="post" action="<?php echo url_for('logistica/guardarLogistica') ?>">
    <script type="text/javascript">
        var actualizarResponsable = function(id_contacto) {
            $.ajax({
                url: "<?php echo url_for('logistica/cargarContactoLogistica') ?>",
                data: "clo_codigo=" + id_contacto + "&tipo_formulario=responsable",
                success: function(respuesta) {
                    document.getElementById("frm_responsable_logistica").innerHTML = respuesta;
                }
            });
        }

        var actualizarGuia = function(id_contacto) {
            $.ajax({
                url: "<?php echo url_for('logistica/cargarContactoLogistica') ?>",
                data: "clo_codigo=" + id_contacto + "&tipo_formulario=guia",
                success: function(respuesta) {
                    document.getElementById("frm_guia").innerHTML = respuesta;
                }
            });
        }
    </script>
    <div class="formulario" id="frm_responsable_logistica">
        <?php include_partial('form_responsable', array(
            'form_responsable' => $form_responsable
        )) ?>
    </div>
    <div class="formulario" id="frm_guia">
        <?php include_partial('form_guia', array(
            'form_contacto' => $form_contacto
        )) ?>
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