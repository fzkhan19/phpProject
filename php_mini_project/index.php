<?php
session_start();
$_SESSION['user_id'] = 1;
if(!isset($_SESSION['user_id'])) {
   header("Location: http://localhost/php_mini_project/SignIn.php");
}

?>


<!DOCTYPE html>
<html>

<head>
   <link rel="icon" type="image/png" href="resources/Logo_blue.png" />
   <title>Immunera</title>
   <link rel="stylesheet" type="text/css" href="stylesheet/index.css" />
   <script src="https://kit.fontawesome.com/ffb41c23b7.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         $("#rightSection").load("password.php");
         $("#navButton_1").click(function() {
            $("#rightSection").load("password.php");
            changeBtnColor(this);
         });
         
         $("#navButton_2").click(function() {
            $("#rightSection").load("password.php");
            changeBtnColor(this);
         });
         
         $("#navButton_3").click(function() {
            $("#rightSection").load("password.php");
            changeBtnColor(this);
         });
         
         $("#navButton_4").click(function() {
            $("#rightSection").load("password.php");
            changeBtnColor(this);
         });
         
         $("#navButton_5").click(function() {
            $("#rightSection").load("password.php");
            changeBtnColor(this);
         });
         
         function changeBtnColor(button) {
            $("#navButton_1").removeClass("active");
            $("#navButton_2").removeClass("active");
            $("#navButton_3").removeClass("active");
            $("#navButton_4").removeClass("active");
            $("#navButton_5").removeClass("active");
            
            $(button).addClass("active");
         }
      });
   </script>
</head>

<body>

</body>
<div class="masterBox">
   <section class="leftSection">
      <div class="iconPanel">
         <img src="resources/Logo_white.png" class="logoPanelImage" />
      </div>
      <div class="navigation">
         <div class="navGroupTitle">SERVICES</div>
         <div class="navigationButtonPanel">
            <div id="navButton_1" class="navButton active">
               <i class="fas fa-key navButtonIcon"></i>
               <p class="navButtonText">Password</p>
            </div>
<!--
            <div id="navButton_2" class="navButton">
               <i class="fas fa-sticky-note navButtonIcon"></i>
               <p class="navButtonText">Notes</p>
            </div>
            <div id="navButton_3" class="navButton">
               <i class="fas fa-credit-card navButtonIcon"></i>
               <p class="navButtonText">Credit cards</p>
            </div>
-->
         </div>
         
         <div class="navGroupTitle">SETTINGS</div>
         <div class="navigationButtonPanel">
            <div id="navButton_4" class="navButton">
               <i class="fas fa-user-edit navButtonIcon"></i>
               <p class="navButtonText">Edit Profile</p>
            </div>
            <div id="navButton_5" class="navButton">
               <i class="fas fa-user-minus navButtonIcon"></i>
               <p class="navButtonText">Delete Profile</p>
            </div>
         </div>
         
      </div>
   </section>
   <section class="rightSection" id="rightSection">

   </section>
</div>

</html>
