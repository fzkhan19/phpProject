<?php 

session_start();

include "myAutoLoader.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

try {
   $obj = new dbconnection;
   if($obj->add_user($firstname, $lastname, $email, $password) == "true") {
      echo "redirect";
   }
   else {
      echo $obj->add_user($firstname, $lastname, $email, $password);
   }
   exit();
} 
catch (Exception $ex) {
   echo "error".$ex;
}
?>