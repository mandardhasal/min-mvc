<?php

class blogs extends baseController {

	function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load_model('blogsModel','blogs');
		$blogs = $this->blogs->get_blogs();

		$this->viewAssign('pageTitle','Blogs');
		$this->viewAssign('blogs',$blogs['blogs']);
		$this->viewAssign('template','blogs.html');

		$this->view('framework.html');
	}
	
}

?>