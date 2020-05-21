<?php
include_once 'dbh.inc.php';

$username = "";
$password ="";
$name = "";
$surname = "";
$email = "";
$birthday = "";
$phone = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"]))){
         $username_err = "Please enter a username.";
     }

     else{
         // Prepare a select statement
         //Take the data for the given username
         $tempUserName = trim($_POST["username"]);
         $sql = "SELECT * FROM user WHERE username = '$tempUserName' ";
         $query = mysqli_query($db, $sql);
         $rowcount= mysqli_num_rows($query);

         //Check if there exist this username or Email
         //Give the corresponding message
         if($rowcount == 1 ){
             $username_err = "This username is already taken.";
         }
         else {
           $username = trim($_POST["username"]);
         }
       }
       // Validate password
       if(empty(trim($_POST['password']))){
           $password_err = "Please enter a password.";
       }
       else if(strlen(trim($_POST['password'])) < 6){
           $password_err = "Password must have atleast 6 characters.";
       }
       else{
           $password = trim($_POST['password']);
       }
       if(empty(trim($_POST['name']))){
           $firstName_err = "Please enter your first name!";
       }
       if(empty(trim($_POST['surname']))){
           $lastName_err = "Please enter your last name!";
       }
       if(empty(trim($_POST['email']))){
           $userEmail_err = "Please enter your email!";
       }
       if(empty(trim($_POST['birthday']))){
           $date_err = "Please enter birth date!";
       }
       if(empty(trim($_POST['phone_number']))){
           $year_err = "Please enter birth year!";
       }

       // Check input errors before inserting in database
       if( empty($firstName_err) &&  empty($lastName_err) &&  empty($username_err) &&  empty($userEmail_err) &&  empty($password_err) &&  empty($confirm_password_err) &&  empty($city_err) &&  empty($date_err) &&  empty($month_err) &&  empty($year_err) ){
           $name = trim($_POST['name']);
           $surname = trim($_POST['surname']);
           $username = trim($_POST['username']);
           $email = trim($_POST['mail']);
           $password = trim($_POST['password']);
           $birthday = trim($_POST['date_of_birth']);
           $phone = trim($_POST['phone_number']);

           $sql = "INSERT INTO admin(username, password, email, date_of_birth, phone_number, name,surname) VALUES ('$username', '$password', '$email', '$birthday', '$phone', '$name', '$surname')";
           $query = mysqli_query($db, $sql);
           header("location: admin_login.php");
       }

 }
 ?>
