<?php

include 'myAutoLoader.php';

$title = $_POST['title'];
$username = $_POST['username'];
$password = $_POST['password'];
$notes = $_POST['notes'];
$userid = $_POST['userid'];

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$obj = new dbconnection();

if (!isset($title) || !isset($username) || !isset($password) || !isset($notes) || !isset($userid)) {
   echo "All fields are required";
} 
else {
   if($obj->add_password($userid, $title, $username, $password, $notes) == "true") {
      echo "true";
   }
   else {
      echo "Some error occured";
   }
}

?>