<?php
if(0 == strcmp($cargar_contacto_logistica, 'responsable'))
    include_partial('form_responsable', array(
        'form_responsable' => $form_responsable
    ));
else
    include_partial('form_guia', array(
        'form_contacto' => $form_contacto
    ));
?>