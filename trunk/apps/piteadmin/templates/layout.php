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
        <div id="encabezado">
            <img src="<?php echo public_path('') ?>images/pite_logo.jpg" alt="PITE Logo" />
        </div>
        <?php if(strcasecmp($sf_context->getModuleName(), 'sfGuardAuth') != 0): ?>
        <div id="menu">
            <?php include_partial('global/tabs', array('current' => $sf_context->getModuleName())) ?>
        </div>
        <?php endif; ?>
        <div id="contenido">
            <?php echo $sf_content ?>
        </div>
        <div id="pie">&copy;2010</div>
    </body>
</html>