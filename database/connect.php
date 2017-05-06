<?php error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

 	$host 		=	"sql12.freesqldatabase.com";
	$username 	= 	"sql12171941";
	$password 	= 	"gk3IfYrb9H";
	$objConnect = 	mysqli_connect($host, $username, $password);


	if($objConnect) {
		//echo "MySQL Connected";
		$objDB = mysqli_select_db($objConnect, "sql12171941");
	}
	/*else {
		echo "MySQL Connect Failed";
	}*/

?>