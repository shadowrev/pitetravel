<?php
/*
 * Este parcial recibe estos parametros:
 * $show: arreglo que describe que pestanhas estan habilitadas para el usuario actual
 * $current: Define que pestanha debe ser seleccionada
 */
?>
<ul>
    <!-- CSS Tabs -->
    <?php //$enlace_cli = $sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false) ? url_for('valoracion/examenesPreoperatorios') : '#' ?>
    <?php //$pestanha_cli = ($enlace_cli == "#") ? 'desactivada' : '' ?>
    <li class="<?php echo (strcmp($current, 'cliente') == 0) ? 'current' : '' ?>">
        <a href="<?php echo url_for('cliente/informacionPaciente') ?>"><span>Cliente</span></a>
    </li>
    <?php $enlace_val = $sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false) ? url_for('valoracion/examenesPreoperatorios') : '#' ?>
    <?php $pestanha_val = ($enlace_val == "#") ? 'desactivada' : '' ?>
    <li class="<?php echo ((strcmp($current, 'valoracion') == 0) ? 'current' : '') . $pestanha_val ?>">
        <a href="<?php echo $enlace_val ?>"><span>Valoraci&oacute;n</span></a>
    </li>
    <?php //$enlace_pos = $sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false) ? url_for('valoracion/examenesPreoperatorios') : '#' ?>
    <?php //$pestanha_pos = ($enlace_pos == "#") ? 'desactivada' : '' ?>
    <li class="<?php echo ((strcmp($current, 'postoperatorio') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('postoperatorio/infoPostOperatorio') ?>"><span>Post-Operatorio</span></a>
    </li>
    <?php //$enlace_log = $sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false) ? url_for('valoracion/examenesPreoperatorios') : '#' ?>
    <?php //$pestanha_log = ($enlace_log == "#") ? 'desactivada' : '' ?>
    <li class="<?php echo ((strcmp($current, 'logistica') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('logistica/logistica') ?>"><span>Log&iacute;stica</span></a>
    </li>
    <li class="<?php echo ((strcmp($current, 'reportes') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('reportes/generarReporteLogistica') ?>"><span>Reportes</span></a>
    </li>
    <?php $enlace_adm = $sf_context->getUser()->hasCredential('admin') ? url_for('@sf_guard_user') : '#' ?>
    <?php $pestanha_adm = ($enlace_adm == "#") ? 'desactivada' : '' ?>
    <li class="<?php echo ((strcmp($current, 'sfGuardUser') == 0) ? 'current' : '') . $pestanha_adm ?>">
        <a href="<?php echo $enlace_adm ?>"><span>Administraci&oacute;n de Usuarios</span></a>
    </li>
    <li class="logout"><a href="<?php echo url_for('@sf_guard_signout') ?>"><span>Logout</span></a></li>
</ul>