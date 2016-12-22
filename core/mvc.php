<?php

class mvc{

	//default config
	private $default_class = 'home';
	private $default_method = 'index';
	private $default_controller_dir = 'controllers';
	private $base_controller = 'baseController'; 
	private $class404 = 'class404';
	private $method404 = 'index';


	
	function __construct(){

		$this->default_controller_dir = APPPATH.$this->default_controller_dir;

		$base_controller  = $this->default_controller_dir.'/'. $this->base_controller.'.php';

		if(file_exists($base_controller))
		{
			require_once $base_controller;
			$this->init();
		}
		else
		{
			$this->page_not_found();
		}

	}

	private function init()
	{
		$this->pathinfo = $_SERVER['PATH_INFO'];
		$path_parts  = $this->parse_path($this->pathinfo);

		if(empty($path_parts))
		{
			$this->load_controller($this->default_controller_dir,$this->default_class, $this->default_method);
		}
		else
		{
			$dir = $this->default_controller_dir;
			$method = $this->default_method;
			$params = array();
			$class = NULL;

			foreach ($path_parts as $index => $part) 
			{

				if(file_exists($dir.'/'.$part.'.php'))
				{
					$class = $part;
					unset($path_parts[$index]);

					if( isset($path_parts[$index+1])  ) 
					{
						$method = $path_parts[$index+1];
						unset($path_parts[$index+1]);  
					}
					if(count($path_parts))
					{
						$params = array_values($path_parts);
					}
					break;

				}
				else
				{
					$dir .= '/'.$part;
					unset($path_parts[$index]);
				}

			}

			$this->load_controller($dir,$class,$method,$params);

		}

	} 

	private function parse_path($path)
	{
		$parts = explode('/',  filter_var( rtrim($path,'/'),FILTER_SANITIZE_URL) );
		unset($parts[0]);
		return $parts;
	}


	private function load_controller($dir,$class,$method,$params=array())
	{
		$controller_path = $dir.'/'.$class.'.php'; 
		if(file_exists($controller_path))
		{
			require_once $controller_path;
			if(class_exists($class))
			{
				$obj = new $class;
				if(method_exists($obj, $method))
				{
					call_user_func_array(array($obj,$method), $params);
					return;
				}

			}
		}
		
		$this->page_not_found();

	}

	private function page_not_found()
	{	

		$controller_path = $this->default_controller_dir.'/'.$this->class404.'.php'; 
		if(file_exists($controller_path))
		{
			require_once $controller_path;
			if(class_exists($this->class404))
			{
				$obj = new $this->class404;
				if(method_exists($obj, $this->method404))
				{
					call_user_func_array(array($obj,$this->method404), array());
					return;
				}

			}
		}

		header("HTTP/1.0 404 Not Found");
		echo "<!DOCTYPE HTML> <html> <head> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>404 Page Not Found</title>
				<style type='text/css'>
					html{font-family:'Roboto', Arial, sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:80%;}
					html,body{color:#000;font-size:24px;height:100%;margin:0;padding:0;width:100%;}
					body{display:table;}
					.displayblock{text-align:center;display:table-cell;vertical-align:middle;}
				</style>
				</head>
					<body>
					<div class='displayblock'>
					<p>404</p>
					<p>Sorry Page Not Found :(</p>
					</div>
				</body>
				</html>";
		
	}


} 


new mvc();

?>