<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Icomp\Page;

session_start();

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->config('debug', true);

$app->get('/', function() {

    $page = new Page();

    $page->setTpl("index");

});

require_once('admin.php');

require_once('admin-users.php');

require_once('admin-places.php');

require_once('admin-devices.php');

require_once('admin-controladores.php');

require_once('rest-api.php');

$app->run();

 ?>