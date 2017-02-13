<?php

class basic extends baseController {

	function __construct(){
		parent::__construct();
	}

	public function index(){
			
		$this->view('header.html');
		$this->view('content.html');
		$this->view('footer.html');

	}
	
}

?>