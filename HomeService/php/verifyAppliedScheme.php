<?php
	session_start();
	if(isset($_SESSION['uid'])&& isset($_GET['id'])){
		include '../Database/Database_api.php';

		$db = new Database_api();
		echo $_GET['status'];
		$result = $db->updateAppliedSchemeStatus($_GET['id'],$_GET['status']);


		header("location:../schemes.php");
	}

?>