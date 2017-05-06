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

	function getUserRoles($userRoleID) {
		global $objConnect;
		$strSQL     = 	"SELECT * FROM UserRoles ";
        $strSQL     .= 	"WHERE UserRoleID = '".$userRoleID."' ";
        $query   	= 	mysqli_query($objConnect, $strSQL);
        $result		=	mysqli_fetch_array($query);
        
		return $result;
	}

?>