<?php

class home extends baseController 
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view_assign('page_title','SD Enterpises');
		$this->view_assign('template','home.html');
		$this->view('framework.html');
	}

	
}

?>