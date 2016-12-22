<?php
class baseController 
{
	private $view_folder = 'views';
	private $vars = array();

	function __construct()
	{
		$this->view_folder = APPPATH.$this->view_folder;
	}

	protected function view($template='')
	{
		$template_path = $this->view_folder.'/'.$template;
		if(file_exists($template_path))
		{
			include_once $template_path;
		}
		else
		{
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


	protected function view_assign($var=NULL,$val=NULL)
	{
		if(isset($var) && isset($val))
		{
			$this->vars[$var] = $val;
		}
	}
}


?>