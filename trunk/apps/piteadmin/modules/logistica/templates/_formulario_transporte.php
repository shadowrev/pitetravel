<form id="form1" name="form1" method="post" action="">
    <div class="formulario">
        <h2>Transporte</h2>
        <div class="form">
            <?php include_partial('form_transporte', array(
                'form_transporte' => $form_transporte
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