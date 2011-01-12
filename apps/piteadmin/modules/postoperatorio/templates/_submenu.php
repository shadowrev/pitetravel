<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'info') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('postoperatorio/altaPostOperatoria') ?>"><span>Informe de Alta</span></a>
        </li>
        <li><a href="#"><span>Generar Imprimible</span></a></li>
    </ul>
</div>