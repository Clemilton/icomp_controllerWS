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
    
    $sql = new Icomp\DB\Sql();

    $results = $sql->select("SELECT * FROM login");

    echo json_encode($results);
    
	

});

$app->run();

 ?>