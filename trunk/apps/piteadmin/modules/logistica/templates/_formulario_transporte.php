<form id="form1" name="form1" method="post" action="">
    <div class="formulario">
        <h2>Responsable de la log&iacute;stica</h2>
        <div class="form">
            <?php include_partial('form_responsable', array(
                'form_responsable' => $form_responsable
            )) ?>
        </div>
    </div>
    <div class="formulario">
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
            <table>
                <tr>
                    <td><label for="label2">Observaciones y Recomendaciones:</label><br />
                    <textarea></textarea></td>
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