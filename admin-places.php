<?php

use \Icomp\PageAdmin;
use \Icomp\Model\Place;
use \Icomp\Model\User;
use \Icomp\Model\Comodo;

$app->get('/admin/places',function(){

	$user = User::verifyLogin();

	$places = Place::listAll();

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("places",[
		'places'=>$places
	]);
});

$app->get('/admin/places/create',function(){
	$user = User::verifyLogin();
	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("places-create");

});

$app->post('/admin/places/create',function(){
	
	User::verifyLogin();

	$places = new Place();

	
    $places->setData($_POST);


    $places->save();

    header("Location: /admin/places");
    exit;

});

$app->get('/admin/places/{idplace}',function($req,$res,$args){

	$user = User::verifyLogin();

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$idplace = $args['idplace'];
	
	$place = new Place();

	$place->get((int) $idplace);

	$page->setTpl("places-update",array(
		"place"=>$place->getValues()
	));
	
});


$app->post("/admin/places/{idplace}",function($req,$res,$args){

	$idplace = $args['idplace'];

	User::verifyLogin();

	$place = new Place();

	$place->get((int)$idplace);

	$place->setData($_POST);

	$place->update();
	
	header("Location: /admin/places");
	exit;
});

//Tela de deletar um local
$app->get('/admin/places/{idplace}/delete',function($req,$res,$args){

	User::verifyLogin();

	$idplace = $args['idplace'];
	
	$place = new Place();

	$place->get((int)$idplace);

	$place->delete((int)$place->getid());

	header("Location: /admin/places");
	exit;
});

$app->get("/admin/places/{idplace}/comodos",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$comodos = Comodo::listAll($idplace);

	
	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);
	
	$place = new Place();
	$place->get((int)$idplace);

	$page->setTpl("comodos",[
		'place'=>$place->getValues(),
		'comodos'=>$comodos
	]);

});

$app->get("/admin/places/{idplace}/comodos/create",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$place = new Place();

	$place->get((int)$idplace);

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("comodos-create",[
		"place"=>$place->getValues()
	]);

});

$app->post("/admin/places/{idplace}/comodos/create",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$comodo = new Comodo();

	$comodo->setid_places((int)$idplace);

	$comodo->setData($_POST);

	$comodo->save();
	
	header("Location: /admin/places/".$idplace."/comodos");
	exit;
});

$app->get("/admin/places/{idplace}/comodos/{idcomodo}",function($req,$res,$args){

	$user = User::verifyLogin();
	$idplace = $args['idplace'];
	$idcomodo = $args['idcomodo'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);
	$place = new Place();
	$place->get((int)$idplace);

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("comodos-update",[
		"place"=>$place->getValues(),
		"comodo"=>$comodo->getValues()
	]);

});

$app->post("/admin/places/{idplace}/comodos/{idcomodo}",function($req,$res,$args){

	User::verifyLogin();
	
	$comodo = new Comodo();
	$comodo->setid_places((int)$args['idplace']);
	$comodo->setData($_POST);
	$comodo->setid((int)$args['idcomodo']);

	$comodo->update();

	header("Location: /admin/places/".$args['idplace']."/comodos");
	exit;

});

$app->get("/admin/places/{idplace}/comodos/{idcomodo}/delete",function($req,$res,$args){

	User::verifyLogin();
	$idplace=$args['idplace'];

	$comodo = new Comodo();

	$comodo->delete((int)$args['idcomodo']);

	header("Location: /admin/places/".$idplace."/comodos");
	exit;




});






?>