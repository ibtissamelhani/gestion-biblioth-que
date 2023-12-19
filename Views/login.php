<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/css/authStyle.css">
    <!--Stylesheet-->
    <!-- <style media="screen">

    </style> -->
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="../app/Controllers/UserController.php">
        <h3>Login Here</h3>
        <span><?php if(!empty($_SESSION['message'])) {echo $_SESSION['message']; $_SESSION['message']="";}?></span>


        <label for="username">email</label>
        <input type="email" name="email" placeholder="Email or Phone" id="username">
        <span><?php if(!empty($_SESSION['emailEr'])) {echo $_SESSION['emailEr']; $_SESSION['emailEr']="";}?></span>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">
        <span><?php if(!empty($_SESSION['passwordErr'])) {echo $_SESSION['passwordErr']; $_SESSION['passwordErr']="";}?></span>

        <button name="login">Log In</button>
     
    </form>
</body>
</html>
