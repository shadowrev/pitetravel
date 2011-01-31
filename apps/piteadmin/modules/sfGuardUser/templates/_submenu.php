<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'logistica') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('logistica/logistica') ?>"><span>Usuarios</span></a>
        </li>
        <li<?php echo (strcmp($current, 'transporte') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('logistica/transporte') ?>"><span>Grupos</span></a>
        </li>
    </ul>
</div>