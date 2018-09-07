<?php

namespace Icomp;
use Rain\Tpl;

class Page{

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	private $dir_project = '';

	public function __construct($opts = array(),$tpl_dir="/views/"){
		$this->options = array_merge($this->defaults, $opts);
		
		$config = array(
		    "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].$this->dir_project.$tpl_dir,
		    "cache_dir"     => $_SERVER['DOCUMENT_ROOT'].$this->dir_project."/views-cache/",
		    "debug"         => false
		);

		Tpl::configure($config);

		$this->tpl = new Tpl;

		$this->setData($this->options['data']);

		if($this->options["header"]==true) // caso a pagina tenha header
			$this->tpl->draw("header");
	}

	public function __destruct()
	{
		if($this->options["footer"]==true) // caso a pagina tenha footer
			$this->tpl->draw("footer", false);
	}

	//Seta os valores das variaveis no template
	private function setData($data = array())
	{
		foreach($data as $key => $val)
		{
			$this->tpl->assign($key, $val);
		}
	}
	//Seta o c
	public function setTpl($tplname, $data = array(), $returnHTML = false)
	{
		$this->setData($data);
		return $this->tpl->draw($tplname, $returnHTML);
	}
}


?>