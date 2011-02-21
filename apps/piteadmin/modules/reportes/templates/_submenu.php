<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'logistica') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('reportes/generarReporteLogistica') ?>"><span>Reporte Cliente</span></a>
        </li>
        <?php if($sf_context->getUser()->hasCredential(array('medicos_locales', 'medicos_internacionales'), false)): ?>
        <li<?php echo (strcmp($current, 'medico') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('reportes/generarReporteMedico') ?>"><span>Reporte M&eacute;dico</span></a>
        </li>
        <?php endif ?>
    </ul>
</div>