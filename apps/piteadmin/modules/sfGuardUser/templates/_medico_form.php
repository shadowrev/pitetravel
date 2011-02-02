<?php echo $medico_form->renderHiddenFields() ?>
<div class="form">
    <table>
        <tr>
            <td><?php echo $medico_form['med_direccion']->renderError() ?>
                <?php echo $medico_form['med_direccion']->renderLabel() ?><br />
                <?php echo $medico_form['med_direccion']->render() ?></td>
            <td><?php echo $medico_form['med_telefono1']->renderError() ?>
                <?php echo $medico_form['med_telefono1']->renderLabel() ?><br />
                <?php echo $medico_form['med_telefono1']->render() ?></td>
            <td><?php echo $medico_form['med_telefono2']->renderError() ?>
                <?php echo $medico_form['med_telefono2']->renderLabel() ?><br />
                <?php echo $medico_form['med_telefono2']->render() ?></td>
        </tr>
        <tr>
            <td><?php echo $medico_form['med_especialidad']->renderError() ?>
                <?php echo $medico_form['med_especialidad']->renderLabel() ?><br />
                <?php echo $medico_form['med_especialidad']->render() ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>