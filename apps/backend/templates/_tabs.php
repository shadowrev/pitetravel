<?php
/*
 * Este parcial recibe estos parametros:
 * $show: arreglo que describe que pestanhas estan habilitadas para el usuario actual
 * $current: Define que pestanha debe ser seleccionada
 */
?>
<ul>
    <!-- CSS Tabs -->
    <li class="<?php echo ((strcmp($current, 'agencia') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('@agencia') ?>"><span>Agencias</span></a>
    </li>
    <li class="<?php echo ((strcmp($current, 'clinica') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('@clinica') ?>"><span>Cl&iacute;nicas</span></a>
    </li>
    <li class="<?php echo ((strcmp($current, 'enfermera') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('@enfermera') ?>"><span>Enfermeras</span></a>
    </li>
    <li class="<?php echo ((strcmp($current, 'hoteles') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('@hotel') ?>"><span>Hoteles</span></a>
    </li>
    <li class="<?php echo ((strcmp($current, 'destinoturistico') == 0) ? 'current' : '') ?>">
        <a href="<?php echo url_for('@destinoturistico') ?>"><span>Destinos Tur&iacute;sticos</span></a>
    </li>
    <li class="logout"><a href="<?php echo url_for('@sf_guard_signout') ?>"><span>Logout</span></a></li>
</ul>