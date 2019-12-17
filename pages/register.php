<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form method="post">
              <div><a href="login.php"><img id="backbtn" src="../img/back.png" alt="back"></a></div>
              <img id="logo" src="../img/nhl.png" alt="nhl">
              <input type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z']*">
              <input type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z']*">
              <input class="mail" type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <input type="password" name="pwr" placeholder="Repeat Password">
              <div id="errorDiv">
              <?php
                if(isset($_POST['register'])){
                  include("lib.php");
                }
               ?>
              </div>
              <div class="regdiv">
                <input class="inputbtn" type="submit" name="register" value="Register">
              </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
