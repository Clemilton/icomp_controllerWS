<?php



use \Icomp\PageAdmin;
use \Icomp\Model\User;



$app->get('/admin/login', function() {
	
    User::logout();
	$page  = new PageAdmin([
		"header"=>false,
		"footer"=>false,

	]);

	$page->setTpl("login",[
		'error'=>User::getMsgError()
	]);

});

$app->post('/admin/login',function() {

	$results = User::login($_POST["login"],$_POST["password"]);
	
	header("Location: /admin");
	exit;

});


$app->get('/admin', function() {


    $user = User::verifyLogin();
	
	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);
	
	$page->setTpl("index");

});

$app->get('/admin/logout',function(){
	User::logout();
	header("Location: /admin/login");
	exit;
});



?>