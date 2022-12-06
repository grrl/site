<?php
session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");
if(!isset($_SESSION['username'])){
    die(header("location: 404.php"));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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
    <h1 class="site-title" style="site-title; text-align: center; color: white; -webkit-text-stroke: 2px black;  font-weight: bold;">Lobby</h1><br>
  </hgroup>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav center">
        <!--
        <li><a href="login.php">LogIN</a></li>
        <li><a href="register.php">SignUp</a></li>
        -->
        <li><a href="index.php">Bonus Poker</a></li>
        <li><a href="account.php">Account</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>


<!--</div>-->
<main class="main-content">
 <div class="col-md-6 col-md-offset-4" style="color:white;">
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<h1 style="color:white;">Home</h1>
<div>
    <h4 style="color:white;">Welcome, <?php echo $_SESSION['username']; ?>.</h4>

</div>
<a href="logout.php">Log Out</a>
</div>
</nav>
</div>
</main>


</body>
</html>