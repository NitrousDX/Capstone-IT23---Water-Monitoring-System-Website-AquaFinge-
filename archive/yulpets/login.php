<?php
require_once('backend.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="styles/general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP:wght@100&family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="loginform">
      <div class="log">Login</div>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <button class="btnlog" type="submit" name="submit">Login</button>
      </form>

      <p class="x" style="color: rgb(0,0,0,0.8);
                    font-size: 13px;
                    visibility: hidden;">Don't have an account?
        <a href="registration.php">
          <span>Sign up.</span>
        </a>
      </p>

      <div class="login-failed"><?php $class->login(); ?></div>

    </div>

    <div class="signup">
      <div style="width: 250px">
        <img class="cloud" src="image/cloud.webp">
      </div>

      <a href="registration.php">
        <button class="btnsignup">Don't have an account? Sign up.</button>
      </a>
    </div>
  </div>
</body>

</html>