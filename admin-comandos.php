<?php


use \Icomp\PageAdmin;
use \Icomp\Model\User;
use \Icomp\Model\Device;

$app->get('/admin/comandos',function(){
	$user = User::verifyLogin();


	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comandos/");

	$devices = Device::listAll();
	$page->setTpl("comandos",[
		"devices"=>$devices
	]);
});




?>