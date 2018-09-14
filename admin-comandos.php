<?php


use \Icomp\PageAdmin;
use \Icomp\Model\User;
use \Icomp\Model\Device;
use \Icomp\Model\Comando;

$app->get('/admin/comandos',function(){
	$user = User::verifyLogin();


	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comandos/");

	$devices = Device::listAll();
	$page->setTpl("comandos",[
		"devices"=>$devices
	]);
});

$app->get('/admin/comandos/create/{iddevice}',function($req,$res,$args){

	$user = User::verifyLogin();

	$iddevice = (int)$args['iddevice'];

	$device = new Device();
	$device->get($iddevice);

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comandos/");

	$page->setTpl("comandos-create",[
		"device"=>$device->getValues()
	]);
});

$app->post('/admin/comandos/create/{iddevice}',function($req,$res,$args){

	User::verifyLogin();

	$iddevice = (int)$args['iddevice'];

	$comando = new Comando();
	$comando->setData($_POST);
	$comando->setdevices_id($iddevice);
	
	$comando->save();

	header("Location: /admin/comandos");
	exit;

});

$app->get('/admin/comandos/{idcomando}/update',function($req,$res,$args){

	$user = User::verifyLogin();
	$idcomando = (int)$args['idcomando'];

	$comando = new Comando();
	$comando->get($idcomando);

	$device = new Device();
	$device->get((int)$comando->getdevices_id());
	$comando->setname_device($device->getname());

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comandos/");
	$page->setTpl("comandos-update",[
		"comando"=>$comando->getValues()
	]);
});
$app->post('/admin/comandos/{idcomando}/update',function($req,$res,$args){

	User::verifyLogin();

	$comando = new Comando();
	$comando->setData($_POST);
	var_dump($comando);
	exit;
	$comando->update();

	
});


?>