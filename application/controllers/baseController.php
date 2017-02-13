<?php
/**
* baseController
* @package Min-mvc
* @version 1.0
* @since 2017
* @author Mandar Dhasal (mandar.dhasal@gmail.com) 
*/

/*
* All controllers must extend this base controller 
*/
class baseController {
	private $view_folder = 'views';
	private $model_folder = 'models';
	private $vars = array();

	function __construct(){
		$this->view_folder = APPPATH.$this->view_folder;
		$this->model_folder = APPPATH.$this->model_folder;
	}

	/**
	* views are loaded using this function
	* @param $template: String file name
	*/
	protected function view($template=''){
		$template_path = $this->view_folder.'/'.$template;
		if(file_exists($template_path)){
			include_once $template_path;
		}else{
			header("HTTP/1.0 404 Not Found");
			echo "<!DOCTYPE HTML> <html> <head> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>Page Not Found</title>
				<style type='text/css'>
					html{font-family:'Roboto', Arial, sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:80%;}
					html,body{color:#000;font-size:24px;height:100%;margin:0;padding:0;width:100%;}
					body{display:table;}
					.displayblock{text-align:center;display:table-cell;vertical-align:middle;}
				</style>
				</head>
					<body>
					<div class='displayblock'>
					<p>Page Not Found</p>
					</div>
				</body>
				</html>";
		}
	}

	/**
	* variables to views are assigned using this function
	* @param $var: String 
	* @param $val; mixed value
	*/
	protected function viewAssign($var=NULL,$val=NULL){
		if(isset($var) && isset($val)){
			$this->vars[$var] = $val;
		}
	}


	/**
	* models are loaded using this function
	* @param $file: String file name
	* @param $as: String alias for referencing the model obj
	*/
	protected function load_model($file,$as){
		require_once $this->model_folder.'/'.'baseModel'.'.php';
		require_once $this->model_folder.'/'.$file.'.php';
		if(!empty($as)){
			$this->$as = new $file();
		}else{
			$this->$file = new $file();
		}

	}
}


?>