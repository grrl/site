<?php
session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");
if(isset($_SESSION['username'])){
    header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <hgroup>
    <h1 class="site-title" style="text-align: center; color: white; -webkit-text-stroke: 2px black;  font-weight: bold;">Login</h1><br>
  </hgroup>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav center">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <!--
        <li><a href="logout.php">LogOut</a></li>
        -->
      </ul>

    </div>
  </div>
</nav>

<main class="main-content">
 <div class="col-md-6 col-md-offset-2">
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="auth.php">
  <table style="    width: 60%;
    height: 100%;
    margin: 0;
    padding: 0;
    display:table;
">
     <tr>
           <td style="color:white;">Username : </td>
           <td ><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td style="color:white;">Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" value="Log in" name="login_btn" class="Log In"></td>
     </tr>
 
</table>
</form>
</div>

</main>
</div>

</body>
</html>
