<?php if(strcmp($sf_context->getUser()->getAttribute('pac_nombre'), '') != 0): ?>
<h2>Cliente actual:<em><?php echo $sf_context->getUser()->getAttribute('pac_nombre'); ?></em></h2>
<?php endif; ?>
<?php include_partial('submenu', array('current' => 'turismo')) ?>
<div id="contenido-formulario">
    <form id="form1" name="form1" method="post" action="<?php echo url_for('cliente/guardarPreferenciasTuristicas') ?>">
        <div class="formulario">
            <h2>Preferencias Turisticas</h2>
            <div class="form">
                <?php echo $form->renderHiddenFields() ?>
                <table>
                    <tr>
                        <td>
                            <?php echo $form['destinoturistico_list'] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="submit">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>