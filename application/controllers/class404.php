<?php
class class404 extends baseController{

	function index(){
		header("HTTP/1.0 404 Not Found");
		$this->viewAssign('pageTitle','Page Not Found');
		$this->viewAssign('template','not_found_404.html');
		$this->view('framework.html');
	}
}

?>