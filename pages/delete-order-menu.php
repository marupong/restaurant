<?php
	session_start();
    include "../common/config.php";
    include "../database/function.php";

    $tableID	=	$_GET['t'];
    $index		=	$_GET['i'];

    /*
     *	format 1 = db , 2 = session
     */
    $format		=	$_GET['f'];

    if ($format == 1){ // index is OrderDetailID
        deleteOrderDetail($index);
    }
    else {
    	unset($_SESSION["Menus"][$index]);
    }

	header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
?>