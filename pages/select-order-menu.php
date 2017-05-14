<?php 
    session_start();
    include "../common/config.php";
    include "../database/function.php";

    $tableID	=	$_GET['t'];
    $menuID		=	$_GET['id'];
    $menuQty 	=	$_GET['qty'];
    $menuNote 	=	$_GET['note'];
    $menuPrice   =   $_GET['price'];

    $menu 		= 	getMenu($menuID);

    $menuName 	=	$menu['MenuName'];

	//unset($_SESSION["Menus"]);

    $arrayMenu = array(
    				'menuID' => $menuID
                    ,'MenuName' => $menuName 
                    ,'MenuQty' => $menuQty
                    ,'MenuNote' => $menuNote 
                    ,'MenuPrice' => $menuPrice
                );

    $_SESSION["Menus"][] = $arrayMenu;

	
	header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
?>