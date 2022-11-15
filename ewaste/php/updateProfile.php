<?php
if(isset($_POST['submit'])){
    session_start();
    include '../Database/Database_api.php';
    $db = new Database_api();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
   
    if(($db->updateUser($name,$email,$address,$phone))!= false){
      header("location:../users-profile.php");
    }
    
  }

?>