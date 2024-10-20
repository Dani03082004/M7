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

function dd(){
    foreach (func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        "</pre>";
    }
    die;
}