<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link type="text/css" rel="stylesheet" href="stylesheet/Signin.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script>
      
      function signin_Click() {

         var email = $("#email").val();
         var password = $("#password").val();
         var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
         
         if(email.length == 0 || password.length == 0){
            $("#signin_msg").text("Email and password both required");
         }
         
         else if(reg.test(email) == false) {
            $("#signin_msg").text("Enter valid email");
         }
         
         else {
            $.ajax({
               method: "POST",
               url: "classes/signin.php",
               data: {email: email, password: password},
               cache: false,
               success: function(html) {
                  if(html.trim() == "redirect"){
                     window.location.href = "index.php";
                  }
                  else {
                     $("#signin_msg").text(html);
                  }
               }
            });
         }
      }
      
   </script>
</head>

<body>
   <div class="backgroundImg">
      <div class="mainContainer">
         <div class="leftSubContainer">
            <div class="mainLogo">
               <div class="subMainLogo">
                  <img src="resources/Logo_white.png">
                  <p><em>Immunera</em></p>
               </div>
            </div>
            <div class="creditBehance">
               <img src="resources/icon-behnace.png">
               <p>Behance Inc.</p>
            </div>
         </div>
         <div class="rightSubContainer">
            <div class="contentBox">
               <section class="subContentBox">
                  <div class="SignInTitle">
                     <h2>Sign in</h2>
                     <p>New user?</p> <a href="Signup.php">Create an account</a>
                  </div>
                  <div id="controlsBox" class="controlsBox">
                     <div class="emailText">
                        <p>Email address</p>
                        <input id="email" type="text" name="email" />
                     </div>
                     <div class="passText">
                        <p>Password</p>
                        <input id=password type="password" name="password" />
                     </div>
                     <input type="submit" id="signin" name="signin" onclick="signin_Click()" />
                     <p id="signin_msg"></p>
                     </div>
               </section>
            </div>
         </div>
      </div>
   </div>
</body>

</html>
