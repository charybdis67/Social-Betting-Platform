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
        <div class="welcome-text">
          <h1> welcome back Dear Admin!</h1>
          <div class="container">
            <div class="login-box">
            <div class="row">
              <div class="col-md-6 login-mid">
                <form action="validation.php" method="post">
                  <div class="form-group">
                  <label> Username </label>
                 <input type="text" name="username" class="form-control" required>
               </div>
               <div class="form-group">
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
