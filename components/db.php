<?php

class db {


public static function getConnection(){

	$db = new PDO ('mysql:host=localhost; dbname=land', 'root', '');
	return $db;

}

}


?>