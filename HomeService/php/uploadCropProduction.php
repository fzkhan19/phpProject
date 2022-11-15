<?php
session_start();  
  if(isset($_POST['submit'])){
    include '../Database/Database_api.php';
    $db = new Database_api();

    $date = explode('-',$_POST['date']);
    $dd = $date[2];
    $mm = $date[1];
    $yyyy = $date[0];

    $name = $_POST['cropname'];
    $amt = $_POST['cropamt'];

    $db->insertCropProduction($_SESSION['uid'],$dd,$mm,$yyyy,$name,$amt);
    header("location:../uploadProduction.php");
  }

?>