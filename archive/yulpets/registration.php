<?php 
  require_once('backend.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="styles/login.css">
  <link rel="stylesheet" href="styles/general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP:wght@100&family=Quicksand:wght@500&display=swap" rel="stylesheet">

</head>
<body>

  <div class="container">
    
    <div class="signup2">
      <div style="width: 250px">
        <img class="cloud" src="image/cloud.webp">
      </div>
      <a href="login.php">
      <button class="btnlogin">Already have an account? Login.</button>
      </a>
    </div>

    <div class="signupform">
      <div class="sign">Sign up</div>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

        
        <input type="text" name="username" id="username" placeholder="Username"><br>
        <input type="email" name="email" id="email" placeholder="Email" autocomplete="off"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>

        <input type="hidden" name="access" id="access" value="user">
        <button class="btnsign" type="submit" name="add">Sign Up</button>

      </form>
      <div>
      <?php $class->add_user();?>
      </div>
      <p class="x" style="color: rgb(0,0,0,0.8);
                    font-size: 13px;
                    visibility: hidden;" >Already have an account? 
                    <a href="login.php">
                      <span>Login.</span>
                    </a>
         </p>

    </div>

  </div>

 

</body>
</html>