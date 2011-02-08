<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'postoperatorio') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('postoperatorio/infoPostOperatorio') ?>"><span>Informe Post-Operatorio</span></a>
        </li>
        <li<?php echo (strcmp($current, 'info') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('postoperatorio/altaPostOperatoria') ?>"><span>Informe de Alta</span></a>
        </li>
    </ul>
</div>