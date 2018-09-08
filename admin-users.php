<?php

use \Icomp\PageAdmin;
use \Icomp\Model\User;
use \Icomp\Model\Place;

$app->get('/admin/users',function(){

	$user = User::verifyLogin();

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$users = User::listAll();

	$page->setTpl("users",[
		'users'=>$users
	]);


});

$app->get('/admin/users/create',function(){
	$user = User::verifyLogin();

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);


	$page->setTpl("users-create");
});

$app->post('/admin/users/create',function(){

	User::verifyLogin();

	$user = new User();

	$_POST["typeUser"]= (isset($_POST["typeUser"]))?"admin":"user";
	$_POST['password_hash'] = password_hash($_POST["password_hash"], PASSWORD_DEFAULT, [
        "cost"=>12
    ]);

    $user->setData($_POST);

    $user->save();

    header("Location: /admin/users");
    exit;

});

$app->get("/admin/user/{iduser}",function($request,$response,$args){
	


	User::verifyLogin();
	$iduser = $args['iduser'];
	
	$user = new User();

	$user->get((int) $iduser);
	
	$places = Place::listAll();


	$page  = new PageAdmin(["data"=>[
		"user"=>$user->getValues()
	]]);



	$page->setTpl("users-update",array(
		"user"=>$user->getValues(),
		"places"=>$places,
		"placesRelated"=>$user->getPlaces(),
		"placesNotRelated"=>$user->getPlaces(false)
	));
	
});

$app->post("/admin/user/{iduser}",function($req,$res,$args){

	var_dump($_POST);
	exit;
	$iduser = $args['iduser'];

	User::verifyLogin();

	$user = new User();

	$_POST["typeUser"]= (isset($_POST["inadmin"]))?"admin":"user";

	$user->get((int)$iduser);


	$user->setData($_POST);
	
	$user->update();
	
	header("Location: /admin/users");
	
	exit;
});

$app->get("/admin/user/{iduser}/password",function($req,$res,$args){

	$user = User::verifyLogin();

	$page  = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$iduser = $args['iduser'];

	$user = new User();

	$user->get((int)$iduser);

	$page->setTpl("users-password",[
		"user"=>$user->getValues(),
		"msgError"=>User::getError(),
		"msgSuccess"=>User::getSuccess()

	]);

});

$app->post("/admin/user/{iduser}/password",function($req,$res,$args){
	$iduser = $args['iduser'];

	User::verifyLogin();

	if (isset($_POST['password_hash']) && $_POST['password_hash']===''){
		User::setError("Preencha a nova senha.");
		header("Location: /admin/user/$iduser/password");
		exit;
	}

	if (isset($_POST['password_hash-confirm']) && $_POST['password_hash-confirm']===''){
		User::setError("Preencha a confirmação da nova senha.");
		header("Location: /admin/user/$iduser/password");
		exit;
	}

	if ($_POST['password_hash'] !== $_POST['password_hash-confirm']){
		User::setError("Confirme a nova senha corretamente.");
		header("Location: /admin/user/$iduser/password");
		exit;
	}

	$user = new User();

	$user->get((int)$iduser);

	$user->setPassword(User::getPasswordHash($_POST['password_hash']));
	
	User::setSuccess("Senha alterada com sucesso.");
	
	header("Location: /admin/user/$iduser/password");
	exit;
});

//Tela de deletar usuario
$app->get('/admin/user/{iduser}/delete',function($req,$res,$args){

	User::verifyLogin();

	$iduser = $args['iduser'];
	
	$user = new User();

	$user->get((int)$iduser);

	$user->delete((int)$user->getid());

	header("Location: /admin/users");

	exit;
});


$app->get('/admin/user/{iduser}/addPlace/{idplace}',function($req,$res,$args){


	User::verifyLogin();
	$iduser=$args['iduser'];
	$idplace=$args['idplace'];
	$user = new User();

	$user->get((int)$iduser);

	$user->addPlace((int)$idplace);

	header("Location: /admin/user/".$iduser);
	exit;
});

$app->get('/admin/user/{iduser}/removePlace/{idplace}',function($req,$res,$args){


	User::verifyLogin();
	$iduser=$args['iduser'];
	$idplace=$args['idplace'];
	$user = new User();

	$user->get((int)$iduser);

	$user->removePlace((int)$idplace);

	header("Location: /admin/user/".$iduser);
	exit;
});



?>
