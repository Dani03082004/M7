<?php
    function router(array $routes):string {
        $url=parse_url($_SERVER['REQUEST_URI'])['path'];
        $path=explode('/',$url);
        $uri=array_filter($path,function($item){
            return $item!=='';
        });
    $uri=array_values($uri);
    if (empty($uri[0])){
        $uri[0]='home';
    }
    if (in_array($uri[0],$routes,true)){
        return $uri[0];
    }
    http_response_code(404);
}

function addFieldProf($index, $profesor = null) {
    // el isset comprueba si esta declarada y el empty comprueba si esta vacio
    $nombre = isset($profesor['nombre']) ? htmlspecialchars($profesor['nombre']) : '';
    $apellido = isset($profesor['apellido']) ? htmlspecialchars($profesor['apellido']) : '';
    $edad = isset($profesor['edad']) ? htmlspecialchars($profesor['edad']) : '';

    return '
        <div class="field-group" id="field-group-' . $index . '">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre[' . $index . ']" placeholder="nombre" value="' . $nombre . '" required>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido[' . $index . ']" placeholder="apellido" value="' . $apellido . '" required>

            <label for="edad">Edad</label>
            <input type="number" name="edad[' . $index . ']" placeholder="edad" value="' . $edad . '" required>
        </div>
        <br>
    ';
}


function dd(){
    foreach (func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        "</pre>";
    }
    die;
}