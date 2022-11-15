<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link type="text/css" rel="stylesheet" href="stylesheet/Signup.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script>
      
      function signup_Click() {

         var firstname = $("#firstname").val();
         var lastname = $("#lastname").val();
         var email = $("#email").val();
         var password = $("#password").val();
         var conf_password = $("#conf_password").val();
         
         var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
         
         if(email.length == 0 || password.length == 0 || firstname.length == 0 || lastname.length == 0 || conf_password.length == 0){
            $("#signup_msg").text("Every fields are mandatory");
            $("#signup_msg2").text("");
         }
         
         else if(reg.test(email) == false) {
            $("#signup_msg").text("Enter valid email");
            $("#signup_msg2").text("");
         }
         
         else if(password != conf_password) {
            $("#signup_msg").text("Both password does not match");
            $("#signup_msg2").text("");
         }
         
         else {
            $.ajax({
               method: "POST",
               url: "classes/signup.php",
               data: {
                  email: email,
                  password: password,
                  firstname: firstname,
                  lastname: lastname,
               },
               cache: false,
               success: function(html) {
                  console.log("string->" + html.trim());
                  if(html.trim() == "redirect"){
                     $("#signup_msg").text("");
                     $("#signup_msg2").text("Account created successfully");
                  }
                  else {
                     $("#signup_msg2").text("");
                     $("#signup_msg").text(html);
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
                     <h2>Sign up</h2>
                     <p>Already have an account?</p> <a href="SignIn.php">Sign in</a>
                  </div>
                  <div class="controlsBox">
                     <div class="FirstNameText">
                        <p>First Name</p>
                        <input id="firstname" type="text" name="firstName" />
                     </div>
                     <div class="LastNameText">
                        <p>Last Name</p>
                        <input id="lastname" type="text" name="lastName" />
                     </div>
                     <div class="emailText">
                        <p>Email Address</p>
                        <input id="email" type="text" name="email" />
                     </div>
                     <div class="passText">
                        <p>Password</p>
                        <input id="password" type="password" name="password" />
                     </div>
                     <div class="confPassText">
                        <p>Confirm Password</p>
                        <input id="conf_password" type="password" name="confPassword" />
                     </div>
                     <input type="submit" name="signup" value="Sign up" onclick="signup_Click();" />
                     <p id="signup_msg"></p>
                     <p id="signup_msg2"></p>
                     <div class="termsCondition">
                        <p>By creating account you are allowing our all </p>
                        <a href="#">Terms and condition</a>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </div>
</body>

</html>