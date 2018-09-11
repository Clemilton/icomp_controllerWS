<?php

use \Icomp\PageAdmin;
use \Icomp\Model\User;
use \Icomp\Model\Controlador;
use \Icomp\Model\Place;


$app->get('/admin/controladores',function(){

	$user = User::verifyLogin();

	$controladores = Controlador::listAll();

	$controladores = Controlador::addNames($controladores);


	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/controladores/");

	$page->setTpl("controladores",[
		"controladores"=>$controladores
	]);

});

$app->get('/admin/controladores/create',function(){


	$user = User::verifyLogin();

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/controladores/");

	$places = Place::listAll();
	
	$page->setTpl("controladores-create",[
		"places"=>$places
	]);
});



$app->post('/admin/controladores/create',function(){

	User::verifyLogin();
	


	$controlador = new Controlador();

	$controlador->setData($_POST);



	$controlador->save();

	header("Location: /admin/controladores");
	exit;
});

$app->get('/admin/controladores/{idcontrolador}',function($req,$res,$args){
	$user = User::verifyLogin();
	
	$idcontrolador = (int)$args['idcontrolador'];
	

	$controlador = new Controlador();
	$controlador->get($idcontrolador);


	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/controladores/");

	
	$places = Place::listAll();

	$page->setTpl("controlador-update",[
		"controlador"=>$controlador->getValues(),
		
	]);
	
});

$app->post('/admin/controladores/{idcontrolador}',function($req,$res,$args){
	User::verifyLogin();
	
	$idcontrolador = (int)$args['idcontrolador'];

	$controlador = new Controlador();
	$controlador->setid($idcontrolador);
	$controlador->setData($_POST);

	$controlador->update();

	header("Location: /admin/controladores");
	exit;
});



$app->get('/admin/controladores/{idcontrolador}/delete',function($req,$res,$args){
	$user = User::verifyLogin();

	$idcontrolador = (int)$args['idcontrolador'];
	
	$controlador = new Controlador();

	$controlador->delete($idcontrolador);

	header("Location: /admin/controladores");
	exit;

});


?>