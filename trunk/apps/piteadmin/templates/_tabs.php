<?php
/*
 * Este parcial recibe estos parametros:
 * $show: arreglo que describe que pestanhas estan habilitadas para el usuario actual
 * $current: Define que pestanha debe ser seleccionada
 */
?>
<ul>
    <!-- CSS Tabs -->
    <?php //if(in_array('cliente', $show)) : ?>
    <li<?php echo (strcmp($current, 'cliente') == 0) ? ' class="current"' : '' ?>>
        <a href="<?php echo url_for('cliente/informacionPaciente') ?>"><span>Cliente</span></a>
    </li>
    <?php //endif; ?>
    <?php //if(in_array('valoracion', $show)) : ?>
    <li<?php echo (strcmp($current, 'valoracion') == 0) ? ' class="current"' : '' ?>>
        <a href="<?php echo url_for('valoracion/examenesPreoperatorios') ?>"><span>Valoraci&oacute;n</span></a>
    </li>
    <?php //endif; ?>
    <?php //if(in_array('alta', $show)) : ?>
    <li<?php echo (strcmp($current, 'postoperatorio') == 0) ? ' class="current"' : '' ?>>
        <a href="<?php echo url_for('postoperatorio/altaPostOperatoria') ?>"><span>Post-Operatorio</span></a>
    </li>
    <?php //endif; ?>
    <?php //if(in_array('logistica', $show)) : ?>
    <li<?php echo (strcmp($current, 'logistica') == 0) ? ' class="current"' : '' ?>>
        <a href="<?php echo url_for('logistica/logistica') ?>"><span>Log&iacute;stica</span></a>
    </li>
    <?php //endif; ?>
    <?php //if(in_array('usuarios', $show)) : ?>
    <li<?php echo (strcmp($current, 'usuarios') == 0) ? ' class="current"' : '' ?>>
        <a href="#"><span>Administraci&oacute;n de Usuarios</span></a>
    </li>
    <?php //endif; ?>
    <li class="logout"><a href=""><span>Logout</span></a></li>
</ul>