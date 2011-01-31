<div id="submenu">
    <ul>
        <li<?php echo (strcmp($current, 'usuarios') == 0) ? ' class="current"' : '' ?>>
            <a href="<?php echo url_for('@sf_guard_user') ?>"><span>Usuarios</span></a>
        </li>
        <li<?php echo (strcmp($current, 'grupos') == 0) ? ' class="current"' : '' ?>>
            <a href="#"><span>Grupos</span></a>
        </li>
    </ul>
</div>