<?php

	include "connect.php";

	function checkLogin($username, $password) {
		global $objConnect;
		
        $strSQL     = 	"SELECT * FROM Users ";
        $strSQL     .= 	"WHERE username = '".$username."' and password = '".base64_encode($password)."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        $loginStatus = 	mysqli_num_rows($query);

		return $loginStatus;
	}

	function getUser($username) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Users ";
        $strSQL     .= 	"WHERE username = '".$username."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result		=	mysqli_fetch_array($query);

        return $result;

	}

	function getUserRole($userRoleID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM UserRoles ";
        $strSQL     .= 	"WHERE UserRoleID = '".$userRoleID."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result		=	mysqli_fetch_array($query);
        
		return $result;
	}

	function updateLastLogin($username) {
		global $objConnect;
	    $strSQL     =   "UPDATE Users SET LastLogin = '".date('Y-m-d H:i:s')."' WHERE username = '".$username."' ";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_affected_rows($objConnect);

	    return $result;		
	}

	function getTables() {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Tables ";
        $strSQL     .= 	"ORDER BY TableNo ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        while($arr	= mysqli_fetch_array($query)){
        	$result[] = $arr;
        }
        
		return $result;
	}

	function getTable($tableID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Tables ";
        $strSQL     .= 	"WHERE TableID = '".$tableID."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result		= mysqli_fetch_array($query);
        
		return $result;
	}

	function getMenus($categoryID = NULL) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Menus ";

		if ($categoryID != NULL){
			$strSQL     .= 	"WHERE CategoryID = '".$categoryID."' ";
		}
		$strSQL     .= 	"ORDER BY CategoryID, MenuName ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        while($arr	= mysqli_fetch_array($query)){
        	$result[] = $arr;
        }
        
		return $result;		
	}

	function getMenu($menuID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Menus ";
		$strSQL     .= 	"WHERE MenuID = '".$menuID."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        $result		= 	mysqli_fetch_array($query);
        
		return $result;		
	}

	function getOrders($tableNo = NULL) {
		global $objConnect;
		
		$strSQL     = 	"SELECT ";
	 	$strSQL     .= 	"A.OrderID";
		$strSQL     .= 	",A.TableID";
		$strSQL     .= 	",B.TableNo";
		$strSQL     .= 	",A.OrderDateTime";
		$strSQL     .= 	",A.Username";
		$strSQL     .= 	",C.FirstName";
		$strSQL     .= 	",C.LastName ";
		$strSQL     .= 	",A.OrderStatus ";
		$strSQL     .= 	"FROM Orders A ";
		$strSQL     .= 	"LEFT JOIN Tables B ON A.TableID = B.TableID ";
		$strSQL     .= 	"LEFT JOIN Users C ON A.Username = C.Username ";
		$strSQL     .= 	"WHERE A.OrderStatus > 0 ";

		if ($tableNo != NULL){
			$strSQL     .= 	"AND B.TableNo = '".$tableNo."' ";
		}
		$strSQL     .= 	"ORDER BY A.OrderStatus, DATE(A.OrderDateTime) DESC, TIME(A.OrderDateTime) ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        while($arr	= mysqli_fetch_array($query)){
        	$result[] = $arr;
        }
        
		return $result;	
	}

	function getOrder($orderID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Orders ";
		$strSQL     .= 	"WHERE OrderID = '".$orderID."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        $result		= 	mysqli_fetch_array($query);
        
		return $result;		
	}	

	function addOrder($tableID, $OrderDateTime, $Username, $OrderTotalPrice, $OrderStatus) {
		global $objConnect;

		$strSQL		=	"insert into Orders (tableID, OrderDateTime, Username, OrderTotalPrice, ModifiedDateTime, OrderStatus) ";
		$strSQL     .=	"values (".$tableID.", '".$OrderDateTime."', '".$Username."', ".$OrderTotalPrice.", '".$OrderDateTime."', ".$OrderStatus.")";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_insert_id($objConnect);


	    return $result;		
	}

	function updateOrder($orderID, $tableID, $orderTotalPrice, $orderStatus) {
		global $objConnect;
	    $strSQL     =   "UPDATE Orders SET ";
	    $strSQL     .=	"TableID = ".$tableID." ";
	    $strSQL     .=	", OrderTotalPrice = ".$orderTotalPrice." ";
	    $strSQL     .=	", ModifiedDateTime = '".date('Y-m-d H:i:s')."' ";
	    $strSQL     .=	", OrderStatus = ".$orderStatus." ";
	    $strSQL     .=	"WHERE OrderID = '".$orderID."' ";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_affected_rows($objConnect);

	    return $result;		
	}

	function deleteOrder ($orderID) {
		global $objConnect;
		
		$strSQL     = 	"DELETE FROM Orders ";
		$strSQL     .= 	"WHERE OrderID = " .$orderID. " ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result     =   mysqli_affected_rows($objConnect);

	    return $result;	
	}

	function getOrderDetails ($orderID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM OrderDetails ";
		$strSQL     .= 	"WHERE OrderID = " .$orderID. " ";
        $strSQL     .= 	"ORDER BY OrderDetailID ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        while($arr	= mysqli_fetch_array($query)){
        	$result[] = $arr;
        }
        
		return $result;
	}

	function getOrderDetail ($orderDetailID) {
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM OrderDetails ";
		$strSQL     .= 	"WHERE OrderDetailID = " .$orderDetailID. " ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        $result		= 	mysqli_fetch_array($query);
        
		return $result;
	}

	function addOrderDetail($orderID, $menuID, $qty, $menuNote, $pricePerMenu) {
		global $objConnect;
		$strSQL		=	"INSERT INTO Orderdetails (OrderID, MenuID, Qty, MenuNote, PricePerMenu) ";
		$strSQL     .=	"VALUES (".$orderID.", ".$menuID.", ".$qty.", '".$menuNote."', ".$pricePerMenu.")";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_affected_rows($objConnect);

	    return $strSQL;	
	}

	function updateOrderDetail($OrderdetailID, $Qty, $MenuNote) {
		global $objConnect;

	    $strSQL     =   "UPDATE OrderDetails SET ";
	    $strSQL     .=	"Qty = ".$Qty." ";
	    $strSQL     .=	", MenuNote = '".$MenuNote."' ";
	    $strSQL     .=	"WHERE OrderdetailID = ".$OrderdetailID." ";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_affected_rows($objConnect);

	    return $result;	
	}

	function deleteOrderDetail ($OrderdetailID) {
		global $objConnect;
		
		$strSQL     = 	"DELETE FROM OrderDetails ";
		$strSQL     .= 	"WHERE OrderdetailID = " .$OrderdetailID. " ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result     =   mysqli_affected_rows($objConnect);

	    return $result;	
	}

	function deleteOrderDetails ($orderID) {
		global $objConnect;
		
		$strSQL     = 	"DELETE FROM OrderDetails ";
		$strSQL     .= 	"WHERE OrderID = " .$orderID. " ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result     =   mysqli_affected_rows($objConnect);

	    return $result;	
	}

	function getOrderID($tableID, $status){
		global $objConnect;
		
        $strSQL     = 	"SELECT OrderID FROM Orders ";
        $strSQL     .= 	"WHERE tableID = ".$tableID." ";
        $strSQL     .= 	"AND OrderStatus = ".$status." ";
        $strSQL     .= 	"ORDER BY OrderID DESC ";
        $strSQL     .= 	"LIMIT 1 ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        $result = 	mysqli_fetch_array($query);

		return $result['OrderID'];		
	}

	function getCategories(){
		global $objConnect;
		
		$strSQL     = 	"SELECT * FROM Categories ";
        $strSQL     .= 	"ORDER BY CategoryID ";
        $query   	= 	mysqli_query($objConnect, $strSQL);

        while($arr	= mysqli_fetch_array($query)){
        	$result[] = $arr;
        }
        
		return $result;		
	}

	function setTableStatus($tableID, $tableStatus) {
		/* tabel status : 0 = cancle, 1 = ordering, 2 = close/pay */
		global $objConnect;

		$strSQL     =   "UPDATE Tables SET ";
	    $strSQL     .=	"TableStatus = ".$tableStatus." ";
	    $strSQL     .=	"WHERE TableID = ".$tableID." ";
	    $query      =   mysqli_query($objConnect, $strSQL);
	    $result     =   mysqli_affected_rows($objConnect);

	    return $strSQL;	
	}

?>