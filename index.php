<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="welcome">
   <h1>Üdvözöllek <b><?php $name = $_SESSION["username"]; echo htmlspecialchars($name);?></b>!</h1>
    </div>
    <div class="nav_bar">
   <p><a href="scoreboard.php">Ranglista</a><a href="reset-password.php">Jelszó módosítása</a><a href="logout.php">Kijelentkezés</a></p> 
   </div> 
   <div class="game">
   <canvas></canvas>
   <script src="js/index.js"></script>
   </div>
</body>
</html>