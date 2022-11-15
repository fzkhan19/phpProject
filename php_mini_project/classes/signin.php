<?php 

session_start();

include "myAutoLoader.php";

try {
   $obj = new dbconnection;
   if($obj->authenticate((string)$_POST['email'], (string)$_POST['password']) == "false") {
      echo "Incorrect email or password";
   }
   else if($obj->authenticate((string)$_POST['email'], (string)$_POST['password']) == "Something went wrong") {
      echo "Something went wrong! Try again later";
   }
   else {
      $_SESSION['user_id'] = $obj->authenticate((string)$_POST['email'], (string)$_POST['password']);
      echo "redirect";
   }
   exit();
} 
catch (Exception $ex) {
   echo "error".$ex;
}
?>