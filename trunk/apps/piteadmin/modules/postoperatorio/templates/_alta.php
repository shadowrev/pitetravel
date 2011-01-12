<form id="form1" name="form1" method="post" action="">
    <div class="formulario">
        <h2>Informe del Alta Post-Operatoria</h2>
        <div class="form">
            <table>
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