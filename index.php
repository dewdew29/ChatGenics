<!DOCTYPE html>
<html >
<style>
*{margin:0px; padding:0px; }
#main{border:1px solid black; width:450px; height:500px; margin:24px auto;}
#message_area{width:98%; padding:0% 1%; border: 1px solid blue; height:440px; overflow: auto; }
#refresh{text-align: center;}
</style>
  <head>
    <title>Index Page</title>
  </head>

  <body>

  <?php session_start();

  if(isset($_SESSION['Username'])){
echo '<b><p align=center>Welcome to the Chat : '.$_SESSION['Username'];
echo "<br> <br>";
echo '<a href="logout.php">Log Out</a><br><br> </b>';
}else{
  header("location:login.php");
}


?>
<div class="refresh" id="refresh" >
  <b>
<a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh Chat</a>
</b>
</div>
<div class="main" id="main">
<div class="message_area" id="message_area">


       <?php
       include("connection.php");
$q1 ="SELECT * FROM `message`";
$r1= mysqli_query($con,$q1);
while($row=mysqli_fetch_assoc($r1)){
  $message = $row['message'];
  $Username= $row['Username'];
  echo '<h4 style="color:red">'.$Username.'</h4>';
  echo '<p>'.$message.'</p>';
  echo '<hr>';
}

       if(isset($_POST['submit'])){
         $message = $_POST['message'];
         $q = 'INSERT INTO `message` (`id`, `message`, `Username`)
              VALUES("","'.$message.'","'.$_SESSION['Username'].'")
              ';
         if(mysqli_query($con,$q)){
           echo '<h4 style="color:red">'.$_SESSION['Username'].'</h4>';
           echo '<p>'.$message.'</p>';
         }
         }

        ?>
     </div>


     <form method="post">

       <input type="text" name="message" style="width:370px; height:50px;" placeholder = "Type your message" />
       <input type="submit" name="submit" style="width:70px; height:50px;" value="Message" />
     </form>
</div>

  </body>
</html>
