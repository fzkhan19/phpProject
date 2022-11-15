<?php
	session_start();
	if(isset($_SESSION['uid'])&& isset($_GET['id'])){
		include '../Database/Database_api.php';

		$db = new Database_api();
		$result = $db->deleteProduct($_GET['id']);
		header("location:../");
	}

?>