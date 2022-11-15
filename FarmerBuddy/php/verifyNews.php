<?php
	session_start();
	if(isset($_SESSION['uid'])&& isset($_GET['id'])){
		include '../Database/Database_api.php';

		$db = new Database_api("farmerbuddy");
		echo $_GET['status'];
		$result = $db->updateNewsStatus($_GET['id'],$_GET['status']);


		header("location:../news.php");
	}

?>