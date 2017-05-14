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


    if ($format == 1){ //menuID is OrderDetailID
        updateOrderDetail($menuID, $menuQty, $menuNote);
    }
    else{
    	$menu 		= 	$_SESSION["Menus"][$menuID];

        $key        =   $menuID;

        $menuID     =   $menu['menuID'];
    	$menuName  	=   $menu['MenuName'];
        $menuPrice  =   $menu['MenuPrice'];


        $arrayMenu  =   array(
                            'menuID' => $menuID
                            ,'MenuName' => $menuName 
                            ,'MenuQty' => $menuQty
                            ,'MenuNote' => $menuNote 
                            ,'MenuPrice' => $menuPrice
                        );


        $_SESSION["Menus"][$key] = $arrayMenu;

    }

    header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
?>