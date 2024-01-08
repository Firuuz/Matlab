<?php
include("database.php");
include("classes.php");

$message_erreur = "";

if(isset($_POST["register"])){
   $username = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   if(!empty($username) && !empty($email) && !empty($password)){
      $user = new User($username, $email, $password);//if faut crée l'objet user pour utiliser les fonction 'public function'
      $user->addUser($conn);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

if(isset($_POST["login"])){
   $username = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   if(!empty($username) && !empty($email) && !empty($password)){
      User::authentifierUser($conn, $username, $email, $password); // c'est pas necessaire pour crée un objet User pour utiliser les fonction 'static'
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">

            <h2>Application<br> Register Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" >
               <img src="old money/Princess Diana's Most Iconic Outfits All Included the Color Red.jpeg" alt="">

                  <?php 
                     if(isset($_POST["login"]) && !empty(User::$message_erreur)){
                        echo User::$message_erreur . "<br>";
                     } 
                  ?>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name="login" class="btn btn-black text-white">Login</button>
                  <button type="submit" name="register" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>