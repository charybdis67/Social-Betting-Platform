<?php
// Include config file
require_once 'dbh.inc.php';
session_start();
if(!empty($_SESSION['username'])){
  header("location: user.php");
  exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM admin WHERE LOWER(username) = LOWER('$username') and password = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count == 1) {
          session_start();
          $_SESSION['username'] = $username;
          header("location: user.php");
        }else {
          $password_err = "Your Login Name or Password is invalid";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to the MaxBet</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>
  <body>
      <header>
        <div class="wrapper">
          <u1 class="nav-area">
            <li><a href="main.php">Home Page</a><li>
            </u1>
          </div>
        <div class="welcome-text">
          <h1> welcome back Dear Admin!</h1>
          <div class="container">
            <div class="login-box">
            <div class="row">
              <div class="col-md-6 login-mid">
                <form action="user.php" method="post">
                  <div class="form-group<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                  <label> Username </label>
                 <input type="text" name="username" class="form-control" required>
               </div>
               <div class="form-group<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
               <label> Password </label>
              <input type="password" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary"> Login </button>
              <a href="#" class="to_register">Don't have account yet? Join us</a>

                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </header>
  </body>
</html>
