<?php echo $form_foto->renderHiddenFields() ?>
<table>
    <tr>
        <td>
            <?php echo $form_foto['fot_nombre']->renderError() ?>
            <?php echo $form_foto['fot_nombre']->renderLabel() ?><br />
            <?php echo $form_foto['fot_nombre']->render() ?>
        </td>
        <td>
            <?php echo $form_foto['fot_uri_imagen']->renderError() ?>
            <?php echo $form_foto['fot_uri_imagen']->renderLabel() ?><br />
            <?php echo $form_foto['fot_uri_imagen']->render() ?>
        </td>
        <td>
            <button type="button" onclick="">X</button>
        </td>
    </tr>
</table>