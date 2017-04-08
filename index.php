<?php

spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$className);

    require_once  dirname(__FILE__).DIRECTORY_SEPARATOR . $file . '.php'; 
}

$app = new Framework\Application();

$app->get("test", function () use ($app) {
    
});

$app->print_route();