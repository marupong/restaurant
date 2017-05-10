<?php
	session_start();
	//session_destroy();

	unset($_SESSION["loginStatus"]);
	unset($_SESSION["username"]);
	unset($_SESSION["firstName"]);
	unset($_SESSION["lasttName"]);
	unset($_SESSION["profilePic"]);
	unset($_SESSION["userRoleID"]);
	unset($_SESSION["userRoleName"]);

	include "../common/config.php";

	header("Location: " . $HOST_NAME . "/pages/login.php");

?>