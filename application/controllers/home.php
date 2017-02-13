<?php

class home extends baseController {

	function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->viewAssign('pageTitle','Home');
		$this->viewAssign('template','home.html');
		$this->view('framework.html');

	}


	public function profile($name=''){

		$this->viewAssign('pageTitle','Profile');
		$this->viewAssign('name',$name);	
		$this->viewAssign('template','profile.html');
		$this->view('framework.html');

	}

	
}

?>