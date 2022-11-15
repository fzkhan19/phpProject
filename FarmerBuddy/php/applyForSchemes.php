<?php
session_start();  
  if(isset($_POST['schemeId'])){
    include '../Database/Database_api.php';
    $db = new Database_api("farmerbuddy");

    $sid = $_POST['schemeId'];

    $db->applyForScheme($_SESSION['uid'],$sid);
    header("location:../schemes.php");
  }

?>