<?php 

spl_autoload_register(function ($class) {
    $dir = str_replace("Alura\\Php", "src", $class);
    $dir = str_replace("\\", DIRECTORY_SEPARATOR, $dir);
    $dir .= ".php";

    if(file_exists($dir)) {
         require_once $dir;
    } 
});
