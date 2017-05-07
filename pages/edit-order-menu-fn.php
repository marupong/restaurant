<?php
	session_start();
    include "../common/config.php";
    include "../database/function.php";

  	$tableID    =   $_GET['t'];
    $menuID     =   $_GET['id'];

    $menuQty 	=	$_GET['qty'];
    $menuNote 	=	$_GET['note'];

    /*
     *  format 1 = db , 2 = session
     */
    $format     =   $_GET['f'];


    if ($format == 1){

    }
    else{
    	$menu 		= 	$_SESSION["Menus"][$menuID];
    	$menuName  	=   $menu['MenuName'];
    }

    $arrayMenu 	= 	array(
	    				'menuID' => $menuID
	                    ,'MenuName' => $menuName 
	                    ,'MenuQty' => $menuQty
	                    ,'MenuNote' => $menuNote 
                	);

    $_SESSION["Menus"][$menuID] = $arrayMenu;

    header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
?>