<?php
class class404 extends baseController{

	function index(){
		header("HTTP/1.0 404 Not Found");
		$this->view_assign('page_title','Page Not Found');
		$this->view_assign('template','not_found_404.html');
		$this->view('framework.html');
	}
}

?>