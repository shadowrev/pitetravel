<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'logistica') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('reportes/generarReporteLogistica') ?>"><span>Reporte de Logistica</span></a>
        </li>
        <li<?php echo (strcmp($current, 'medico') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('reportes/generarReporteMedico') ?>"><span>Reporte M&eacute;dico</span></a>
        </li>
    </ul>
</div>