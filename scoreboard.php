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
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="welcome">    
<h1>Üdvözöllek <b><?php $name = $_SESSION["username"]; echo htmlspecialchars($name);?></b>!</h1>
</div>
<div class="nav_bar">     
<p><a href="index.php">Vissza a játékba</a><a href="reset-password.php">Jelszó módosítása</a><a href="logout.php">Kijelentkezés</a></p> 
</div>    
<div class=ranking>
    <table>        
        <tr>
            <th>Helyezés</th>
            <th>Név</th>
            <th>Pontszám</th>
        </tr>      
   <?php
   require('config.php');
   $conx=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   if(!$conx){print("Can not connect");}
   $sql= "SELECT username, score from users ORDER BY score DESC";
   $result = $conx-> query($sql);
   $i=1;
   if($result-> num_rows > 0){
       while($row=$result->fetch_assoc()){
       echo "<tr><td>". $i ."</td><td>". $row["username"] ."</td><td>". $row["score"] ."</td></tr>";
        $i+=1;
    }
   }else{
       echo "0 result";
   }
   $conx-> close();
   ?> 
</table> 
</div>  
</body>
</html>