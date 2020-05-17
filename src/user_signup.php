<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to the MaxBet</title>
    <link rel="stylesheet" href="css/signup.css">
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
          <h1> welcome back user!</h1>
          <div class="container">
            <div class="login-box">
            <div class="row">
              <div class="col-md-6 login-mid">
                <form action="validation.php" method="post">
                  <div class="form-group">
                  <label> Name </label>
                 <input type="text" name="name" class="form-control" required>
               </div>
               <div class="form-group">
               <label> Surname </label>
              <input type="text" name="surname" class="form-control" required>
            </div>
            <div class="form-group">
            <label> Mail </label>
           <input type="text" name="mail" class="form-control" required>
         </div>
                  <div class="form-group">
                  <label> Username </label>
                 <input type="text" name="username" class="form-control" required>
               </div>
               <div class="form-group">
               <label> Password </label>
              <input type="password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
              <label> phone number </label>
             <input type="tel" id="phone" name="username" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday">
        </div>
        <div class="form-group">
        <label> Password </label>
       <input type="password" name="password" class="form-control" required>
       </div>
              <button type="submit" class="btn btn-primary"> Login </button>
              <br>
              </<br>
              <a href="user_login.php" class="to_register"> Have account? Login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </header>
  </body>
</html>
