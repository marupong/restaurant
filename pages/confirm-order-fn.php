<?php
	session_start();
	include "../common/config.php";
	include "../database/function.php";

	$status 	=	'';

	$tableID    =   $_GET['t'];

	$orderID			= 	getOrderID($tableID, 1);

	
	$username			=	$_SESSION['username'];
	$orderTotalPrice	=	0;
	$orderStatus		=	1;


	if (isset($orderID)) { //update order

		$result 	= 	updateOrder($orderID, $tableID, $orderTotalPrice, $orderStatus);
		$status 	= 	($result > 0)? 'u':'nu';

	}
	else { // inset order
		if (count($_SESSION["Menus"]) > 0) {

			$orderDateTime		=	date('Y-m-d H:i:s');

			$orderID 	= 	addOrder($tableID, $orderDateTime, $username, $orderTotalPrice, $orderStatus);	
			$status 	= 	(isset($orderID))? 'i':'ni';

		}	
		else {
			$status 	=	'e';	
		}

	}


	if (count($_SESSION["Menus"]) > 0) {
 		foreach ($_SESSION["Menus"] as $key => $menu) {
			$menuID     =   $menu['menuID'];
			//$menuName   =   $menu['MenuName'];
			$menuQty    =   $menu['MenuQty'];
			$menuNote   =   $menu['MenuNote'];
			$menuPrice  =   $menu['MenuPrice'];

			addOrderDetail($orderID, $menuID, $menuQty, $menuNote, $menuPrice);

 		}

 		unset($_SESSION["Menus"]);
 	}

 	if(isset($orderID)){
 		setTableStatus($tableID, 1);
 	}
		
	
 	header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID . "&s=" . $status);
 	
?>