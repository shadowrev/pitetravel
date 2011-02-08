<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'logistica') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('logistica/logistica') ?>"><span>Log&iacute;stica</span></a>
        </li>
        <li<?php echo (strcmp($current, 'transporte') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('logistica/transporte') ?>"><span>Transporte</span></a>
        </li>
    </ul>
</div>