<?php
	session_start();
	include "../common/config.php";
	include "../database/function.php";

	$tableID    =   $_GET['t'];

	$checkHasOrder		= 	checkHasOrder($tableID, 0);

	$OrderDateTime		=	date('Y-m-d H:i:s');
	$Username			=	$_SESSION['username'];
	$OrderTotalPrice	=	0;
	$OrderStatus		=	0;

	if (checkHasOrder == 0){
		//echo addOrder($tableID, $OrderDateTime, $Username, $OrderTotalPrice, $OrderStatus);	
	}

	//echo addOrder($tableID, $OrderDateTime, $Username, $OrderTotalPrice, $OrderStatus);

	/*
	if (count($_SESSION["Menus"]) > 0) {
 		foreach ($_SESSION["Menus"] as $key => $menu) {
			$menuID     =   $menu['menuID'];
			$MenuName   =   $menu['MenuName'];
			$MenuQty    =   $menu['MenuQty'];
			$MenuNote   =   $menu['MenuNote'];

			echo $tableID ;
 		}
 	}*/
?>