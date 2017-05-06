<?php
	session_start();
	session_destroy();
	include "../common/config.php";

	header("Location: " . $HOST_NAME . "/pages/login.php");

?>