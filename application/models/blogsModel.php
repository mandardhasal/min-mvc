<?php

class blogsModel extends baseModel{

	function __construct(){
        parent::__construct();
	}


	public function get_blogs(){

        //db queries here
        
		return array("blogs"=>"my blogs");
	}

}

?>