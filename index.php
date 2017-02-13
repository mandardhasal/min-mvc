<?php

/**
* baseController
* @package Min-mvc
* @version 1.0
* @since 2017
* @author Mandar Dhasal (mandar.dhasal@gmail.com) 
* @license	http://opensource.org/licenses/MIT	MIT License
*/


/* define environments here */

//eg:-
//define('ENVIRONMENT', 'development');



/* set error reporting here */
//eg:
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);



$application_folder = 'application';

// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The path to the "application" folder
if (is_dir($application_folder)){
	define('APPPATH', $application_folder.'/');
}else{
	exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
}



require_once 'core/mvc.php';

?>