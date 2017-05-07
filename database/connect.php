<?php error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

 	$host 		=	"127.0.0.1";
	$username 	= 	"root";
	$password 	= 	"root";
	$objConnect = 	mysqli_connect($host, $username, $password);


	if($objConnect) {
		//echo "MySQL Connected";
		$objDB = mysqli_select_db($objConnect, "restaurant");
	}
	mysqli_set_charset($objConnect, "utf8");
	/*else {
		echo "MySQL Connect Failed";
	}*/

?>