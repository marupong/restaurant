<?php
	session_start();
	include "../common/config.php";
	include "../database/function.php";

	$tableID    =   $_GET['t'];
	$orderID    =   $_GET['i'];

	if(isset($orderID)){
		deleteOrderDetails($orderID);
		deleteOrder($orderID);
		setTableStatus($tableID, 0);
	}

	header("Location: " . $HOST_NAME . "/pages/show-tables.php");

?>