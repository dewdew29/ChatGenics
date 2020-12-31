<!DOCTYPE html>
<html >
  <head>
    <link rel="stylesheet" href="stylereg.css">

    <title>Registration</title>
  </head>
  <body>
    <h1 style="color:white; text-align: center;"> Welcome to ChatGenics</h1>
<?php

require_once("connection.php");

if(isset($_POST['Register'])){
  $Name=$_POST['Name'];
  $Username = $_POST['Username'];
  $password = $_POST['password'];

if($Name !="" and $Username != "" and $password != ""){
$q =  "INSERT INTO `user` (`id`, `Name`,`Username`,`password`)
       VALUES('','".$Name."', '".$Username."', '".$password."')
      ";
    if(mysqli_query($con, $q )){
header("location:login.php");
    }else{
      echo $q;
    }
}
else{
  echo "Please fill all details";
}
}
?>
   <div id="main" class="main">
<br>
   <h2 style="text-align: center";>Registration</h2>
   <br>
   <form method="POST">
   Name :-<br> <input type="text" name="Name" placeholder="Type Your Name" required />
   <br> <br>
   Username :-<br> <input type="text" name="Username" placeholder="Your Username" required />
   <br> <br>
   Password :-<br> <input type="password" name="password" placeholder="Enter Password" required />
   <br><br>

<button>   <input class="btn" type="submit" name="Register" value="Register" style="background-color:white;color:black;" /> </button>
   <br><p>Already a User? <a href="login.php">Login</a>
   </form>
   </div>







  </body>
</html>
