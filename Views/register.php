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

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="../app/Controllers/UserController.php">
        <h3>Create account Here</h3>
        

        <label for="username">first name</label>
        <input type="text" name="first_name" placeholder="first name" id="username" >
        <span><?php if(!empty($_SESSION['nameErr'])) {echo $_SESSION['nameErr']; $_SESSION['nameErr']="";}?></span>

        <label for="username">email</label>
        <input type="email" name="email" placeholder="Email " id="username" >
        <span><?php if(!empty($_SESSION['emailErr'])) {echo $_SESSION['emailErr']; $_SESSION['emailErr']="";}?></span>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">
        <span><?php if(!empty($_SESSION['passErr'])) {echo $_SESSION['passErr']; $_SESSION['passErr']="";}?></span>

        <label for="password">repeat assword</label>
        <input type="password" name="repeat_pass" placeholder="repeat Password" id="password">
        <span><?php if(!empty($_SESSION['r_passErr'])) {echo $_SESSION['r_passErr']; $_SESSION['r_passErr']="";}?></span>

        <button name="register">create account</button>
        
    </form>
</body>
</html>
