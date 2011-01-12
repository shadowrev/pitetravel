<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'examenes') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('valoracion/examenesPreoperatorios') ?>"><span>Ex&aacute;menes Pre-Operatorios</span></a>
        </li>
        <li<?php echo (strcmp($current, 'destino') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('valoracion/valoracionPreoperatoria') ?>"><span>Valoraci&oacute;n en Destino</span></a>
        </li>
        <li<?php echo (strcmp($current, 'otros') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('valoracion/complementos') ?>"><span>Complementos</span></a>
        </li>
        <li><a href="#"><span>Generar Imprimible</span></a></li>
    </ul>
</div>