<?php

spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$className);

    require_once  dirname(__FILE__).DIRECTORY_SEPARATOR . $file . '.php'; 
}

$app = new Framework\Application();

$app->get("user/[0-9]+", function () use ($app) {
    
    $app->response->addData(array("foo" => "bar", 12 => true));
});


$app->run();