<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'datos') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('cliente/informacionPaciente') ?>"><span>Datos del Cliente</span></a>
        </li>
        <li<?php echo (strcmp($current, 'vuelo') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('cliente/vuelo') ?>"><span>Informaci&oacute;n del Vuelo</span></a>
        </li>
        <li><a href="#"><span>Generar Imprimible</span></a></li>
    </ul>
</div>