<?php

require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/altorouter');

$router->map('GET','/', function(){
    echo 'home';
});


$router->map('GET','/admin', function(){
    include_once('admin.php');
});

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}