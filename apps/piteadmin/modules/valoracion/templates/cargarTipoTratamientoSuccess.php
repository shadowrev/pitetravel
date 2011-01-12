<?php echo $procedimiento_form['pro_dtr_codigo']->renderError() ?>
<?php echo $procedimiento_form['pro_dtr_codigo']->renderLabel() ?><br />
<?php echo $procedimiento_form['pro_dtr_codigo']->render(array(
    'onchange' => 'activarCampoProcedimientoOtro(this.options[this.selectedIndex].text, &quot;Otro?&quot;)'
)) ?>