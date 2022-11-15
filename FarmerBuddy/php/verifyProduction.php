<?php
	session_start();
	if(isset($_SESSION['uid'])&& isset($_GET['id'])){
		include '../Database/Database_api.php';

		$db = new Database_api("farmerbuddy");
		echo $_GET['status'];
		$result = $db->updateProductionStatus($_GET['id'],$_GET['status']);

		if($result == false)
			$_SESSION['notification'] = "Error in updating in Database";

		header("location:../verifyProduction.php");
	}

?>