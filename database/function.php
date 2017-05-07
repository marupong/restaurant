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

?>