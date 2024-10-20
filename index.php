<?php
    
require 'config.php';
require 'helper.php';

$controller=router($routes);

require CONTR.'/'.$controller.'.php';
