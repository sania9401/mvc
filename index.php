<?php

//Main options


// Connect system files

define ('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');

//connect database


//Call router
	
	$router=new Router();
	$router->run();

?>