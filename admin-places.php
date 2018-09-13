<?php

use \Icomp\PageAdmin;
use \Icomp\Model\Place;
use \Icomp\Model\User;
use \Icomp\Model\Comodo;

$app->get('/admin/places',function(){

	$user = User::verifyLogin();

	$places = Place::listAll();

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/places/");

	$page->setTpl("places",[
		'places'=>$places
	]);
});

$app->get('/admin/places/create',function(){
	$user = User::verifyLogin();
	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/places/");

	$page->setTpl("places-create");

});

$app->post('/admin/places/create',function(){

	User::verifyLogin();
	$place = new Place();
    $place->setData($_POST);
    $place->save();

    header("Location: /admin/places");
    exit;

});

$app->get('/admin/places/{idplace}',function($req,$res,$args){

	$user = User::verifyLogin();

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/places/");
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






?>