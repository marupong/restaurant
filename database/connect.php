<?php error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

	$host 		=	"sql12.freesqldatabase.com";
	$username 	= 	"sql12171941";
	$password 	= 	"gk3IfYrb9H";
	$objConnect = 	mysql_connect($host, $username, $password);

	if($objConnect) {
		echo "MySQL Connected";
	}
	else {
		echo "MySQL Connect Failed : Error : ".mysql_error();
	}
	
	$objDB = mysql_select_db("sql12171941");

?>