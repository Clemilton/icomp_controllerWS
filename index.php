<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->config('debug', true);

$app->get('/', function() {
    
    $page = new Icomp\Page();

    $page->setTpl("index");

    
	

});

$app->run();

 ?>