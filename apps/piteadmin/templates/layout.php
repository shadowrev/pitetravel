<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <?php if($sf_user->hasFlash('notificacion')) : ?>
        <div class="mensaje notificacion"><?php echo $sf_user->getFlash('notificacion'); ?></div>
        <?php endif ?>
        <?php if($sf_user->hasFlash('error')) : ?>
        <div class="mensaje error"><?php echo $sf_user->getFlash('error'); ?></div>
        <?php endif ?>
        <div id="encabezado">
            <img src="<?php echo public_path('') ?>images/pite_logo_2.jpg" alt="PITE Logo" />
        </div>
        <?php if(0 != strcmp($sf_context->getUser()->getAttribute('user_id'), '')): ?>
        <div>
            Usuario Actual: <?php echo $sf_context->getUser()->getAttribute('user_name') ?>
        </div>
        <?php endif ?>
        <?php $clase_contenido = '' ?>
        <?php if(strcasecmp($sf_context->getModuleName(), 'sfGuardAuth') != 0): ?>
        <?php $clase_contenido = ' class="borde"' ?>
        <div id="menu">
            <?php include_partial('global/tabs', array('current' => $sf_context->getModuleName())) ?>
        </div>
        <?php endif; ?>
        <div id="contenido"<?php echo $clase_contenido ?>>
            <?php echo $sf_content ?>
            <div style="clear: both; height: 10px"></div>
        </div>
        <div id="pie">
            <p>PITE Travel<br />
            &copy;2010 - Todos los derechos reservados</p>
        </div>
    </body>
</html>