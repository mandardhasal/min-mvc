# min-mvc

Simple, basic minimumal mvc framework for php. Gives SEO friendly urls

##Requirments

PHP version 5.6 or newer is recommended.

##Installation

Either Download a copy or fork on GitHub.

##Setup with apache
Add following rules to your project's root directory
```
RewriteEngine on
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]
RewriteCond $1 !^(index\.php|images|css|js|fonts|robots|sitemap)
RewriteRule ^(.*)$ /index.php/$1 [L]
Options -Indexes
```

##Usage

###Controllers
Controllers are placed in controllers folder, every controller must extend baseController class.

Basic URL structure

```
/[CLASS]/[METHOD]/[ARGUMENT1]/[ARGUMENT2]/...
```

Controller Example

```
<?php

class home extends baseController {

	function __construct(){
		parent::__construct();
	}

	//url:-  www.yourdomain.com/home/

	public function index(){  //by default index method is invoked

		$this->viewAssign('pageTitle','Home');
		$this->viewAssign('template','home.html');
		$this->view('framework.html');

	}


	//url:- www.yourdomain.com/home/profile  //name is optional argument
	
	public function profile($name=''){

		$this->viewAssign('pageTitle','Profile');
		$this->viewAssign('name',$name);	
		$this->viewAssign('template','profile.html');
		$this->view('framework.html');

	}

	
}

?>
```

###Views
Views are placed in views folder with .html extension.


###Calling a view
```
$this->view('welcome.html');
```

###Passing Variables to views
```
$this->viewAssign('pageTitle','Profile');
$this->viewAssign('name',$name);	
$this->viewAssign('template','profile.html');
$this->view('framework.html');
```

###Using Variables in views
```
<h1>Welcome to profile page <?php echo $this->vars['name'];?> </h1>
<p>This is Home controller and profile method</p>
```


###Models
Models are placed in models folder, every model must extend baseModel class.

###Database connections
Database connections can be done in baseModel.php

Database Connection exmaple.
```
<?php

class baseModel{

	function __construct(){
		//make db connections here
		// A db object can be initialized here.
	}

}
?>
```

Model Exmaple
```
<?php
class blogsModel extends baseModel{

	function __construct(){
        parent::__construct();
	}


	public function get_blogs(){

        //db queries here
        
		return array(/*data*/);
	}

}
?>
```