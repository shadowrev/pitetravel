<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
    </head>
    <body>
        <div id="encabezado">
            <img src="<?php echo public_path('') ?>images/pite_logo_2.jpg" alt="PITE Logo" />
        </div>
        <div id="contenido">
            <?php echo $sf_content ?>
        </div>
        <div id="pie">
            <p>PITE Travel<br />
            &copy;2010 - Todos los derechos reservados</p>
        </div>
    </body>
</html>