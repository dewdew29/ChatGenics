<!DOCTYPE html>
<html >

  <head>
    <link rel="stylesheet" href="stylelogin.css">

    <title>Login Page</title>
  </head>
  <body>
<h1 style="color:white; text-align: center;"> Welcome to ChatGenics</h1>
    <div id="main" class="main">
      <?php session_start() ;
require_once("connection.php");

if(Isset($_POST['Login'])){
  $Username=$_POST['Username'];
  $password=$_POST['password'];

  $q='SELECT * FROM `user` where `Username`="'.$Username.'" and `password`="'.$password.'"';
  $r= mysqli_query($con,$q);
  if(mysqli_num_rows($r) > 0){
    $_SESSION['Username']= $Username;
header("location:index.php");
  }else{
    echo "Your Username and Password do not match";
  }
}
       ?>
      <h2 style="text-align:center"> Login </h2> <br>
      <form  method="POST">
        User Name:-<br>
        <input type="text" name="Username" placeholder="Username" required/><br><br>

        Password:-<br>
        <input type="password" name="password" placeholder="Password" required/><br><br>
      <button>  <input class="btn" type="submit" name="Login" value = "Login" style="background-color:white;color:black;"/> </button>
<br><br><p>Not a User?</p> <a href="registration.php">Create an Account</a>
      </form>

    </div>
  </body>
</html>
