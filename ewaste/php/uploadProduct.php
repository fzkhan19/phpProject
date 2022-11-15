<?php
session_start();  
  if(isset($_POST['submit'])){
    include '../Database/Database_api.php';
    $db = new Database_api("farmerbuddy");


    $name = $_POST['productName'];
    
    $db->insertProduct($name);
    header("location:../");

  }

?>