<?php

$application_folder = 'application';

// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The path to the "application" folder
if (is_dir($application_folder))
{
	define('APPPATH', $application_folder.'/');
}
else
{
	
	exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
	
}


require_once 'core/mvc.php';

?>