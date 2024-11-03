<?php
    
// Llamamos al config y al helper con el require
require 'config.php';
require 'helper.php';

// Llamamos a la función router que tenemos en el helper
$controller=router($routes);

// Llamamos al controlador
require CONTR.'/'.$controller.'.php';
