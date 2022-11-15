<?php 
   session_start();
   include 'classes/dbconnection.php';
   
   $session_var = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
   <title>Immunera</title>
   <link rel="icon" type="image/png" href="resources/Logo_blue.png" />
   <link rel="stylesheet" type="text/css" href="stylesheet/password.css" />
   <script src="https://kit.fontawesome.com/ffb41c23b7.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script>
      function copy_pass(pass) {
         $.ajax({
               method: "POST",
               url: "classes/copyPassword.php",
               data: {pass: pass},
               cache: false,
               success: function(html) {
                  console.log(html);
               }
            });
      }
      
      function copy_user(user) {
         $.ajax({
               method: "POST",
               url: "classes/copyUsername.php",
               data: {user: user},
               cache: false,
               success: function(html) {
                  console.log(html.trim());
               }
            });
      }
      
      function delete_card(card) {
         $.ajax({
               method: "POST",
               url: "classes/deleteCard.php",
               data: {card: card},
               cache: false,
               success: function(html) {
                  console.log(html);
               }
            });
      }
      
      function addPassword_Click() {
         
         var userid = $("#session_data").val();
         var title = $("#addTitlename").val();
         var username = $("#addUsername").val();
         var password = $("#addPassword").val();
         var notes = $("#addNotes").val();
         
         console.log(title);
         console.log(username);
         console.log(password);
         console.log(notes);
         
         if(title.length == 0 || username.length == 0 || password.length == 0 || notes.length == 0) {
            alert("All Fields are neccessary!");
         }
         else {
            
            $.ajax({
               method: "POST",
               url: "classes/password.php",
               data: {userid: userid, title: title, username: username, password: password, notes: notes},
               cache: false,
               success: function(html) {
                  if(html.trim() == "true") {
                     alert("Password added successfully");
                     window.location.href = "index.php";
                  }
                  else {
                     alert(html);
                  }
               }
            });
         }
      };
   </script>
</head>

<body>
   <div class="mainContainerPass">
      <p class="titlePass">Password</p>
      <hr class="hrPass">
      <div class="leftPanelPass">
         
         <?php
            $user_id = $_SESSION['user_id'];
            
            $obj = new dbconnection();
            $p_id = $obj->get_pass_cards($user_id);
         
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
         
            if(mysqli_num_rows($p_id) > 0) {
            
            while($line = mysqli_fetch_assoc($p_id)) {
               $data = $obj->get_password_data($line['password_id']);
         ?>
         <div class="cardsPass">
            <i class="fas fa-trash deleteIcon" id="<?php echo $line['password_id']; ?>_delete" onclick="delete_card(this.id)"></i>
            <p class="cardsTitlePass"><?php echo $data['title']; ?></p>
            <div class="cardUsernameDiv">
               <p class="cardsUsernamePass">Username : </p>
               <p class="cardsUsername"><?php echo $data['username']; ?></p>
               <input type="button" id="<?php echo $line['password_id']; ?>_user" onclick="copy_user(this.id)" class="getValueCard" value="COPY" />
            </div>
            <div class="cardPasswordDiv">
               <p class="cardsUsernamePass">Password : </p>
               <input type="button" id="<?php echo $line['password_id']; ?>_pass" onclick="copy_pass(this.id)" class="getValueCard" value="COPY" />
            </div>
            <div class="cardNotesDiv">
               <p class="cardNotes">Notes : </p>
               <p class="notes"><?php echo $data['notes']; ?></p>
            </div>
         </div>   
         <?php 
               }
            } else {
         ?>
         <input type="hidden" id="session_data" value="<?php echo $session_var; ?>" />
         <div class="noPassCard">
            <img src="resources/noDataFound.png" class="noDataFoundImg" />
            <p class="noDataFoundText">Add some passwords</p>
         </div>
         
         <?php
            }
         ?>

      </div>
      
      <div class="rightPanelPass">
         <p class="plusIconPass">+</p>
         <p class="rightTitlePass">Add Password</p>
         <p class="noticeRightPass">Added password can be used easily by just copying it and paste it anywhere.<em><b> Password will not be visible.</b></em></p>
         
         <div class="controlsRightPass">
            <input type="text" name="addTitlename" id="addTitlename" class="inputText" placeholder="Title" />
            
            <input type="text" name="addUsername" id="addUsername" class="inputText" placeholder="@Username"/>
            
            <input type="password" name="addPassword" id="addPassword" class="inputText" placeholder="Password" />
            
            <input type="text" name="addNotes" id="addNotes" class="inputText" placeholder="Notes" />
            
            <input type="button" name="addButton" id="addButton" class="updateButtonRight" value="Submit" onclick="addPassword_Click()" />
            
<!--            <p id="msgAddPassword">helllo</p>-->
         </div>
      </div>
   </div>
</body>

</html>
