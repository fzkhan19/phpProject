<?php
session_start();  
  if(isset($_POST['schemeId'])){
    include '../Database/Database_api.php';
    $db = new Database_api("farmerbuddy");

    $db->delete($_GET['id']);
    header("location:../index.php");
  }

?>