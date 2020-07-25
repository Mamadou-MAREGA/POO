<?php

    use Router\Router;
    use App\Exceptions\NotFoundExceptions;

    require '../vendor/autoload.php';

    define('VIEWS', dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
    define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR); 

    $router = new Router($_GET['url']);


    $router->get('/', 'App\Controllers\BlogController@welcome');
    $router->get('/posts', 'App\Controllers\BlogController@index');
    $router->get('/posts/:id', 'App\Controllers\BlogController@show');
    $router->get('/tags/:id', 'App\Controllers\BlogController@tag');

    try {
        $router->run();
    }catch (NotFoundExceptions $e){
        echo $e->getMessage();
    }
