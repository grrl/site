<?php
session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");

//echo $_SESSION['username'];

if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rabbani sarkar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

let timestamp = "";

//let jackpot_value;
function refresh_jackpot() {

$.ajax({
      type: "get",
      url: "balance.php",
      data: 
      {  
        //'username' : $username
      },
      cache:false,
      success: function (data) 
      {
         //alert('Data Send');
         //$('#msg').html(html);
         //let text = this.data;
        let text = this.data;
        console.log("data is " + data);
        let mydata = JSON.parse(data);

        //console.log("data is " + data[0]);
         //console.log("typeof" + typeof data);
         //jackpot_value = data;
         //console.log("jackpot_value is " + jackpot_value);


         document.getElementById("jackpot").innerHTML = "Id: " + mydata.id;
         document.getElementById("balance").innerHTML = "Balance: " + mydata.balance;

      }
      
  });
      
}

window.onload = refresh_jackpot;
</script>
<body>
<div class="container">
  <hgroup>
    <h1 class="site-title" style="text-align: center; color: green;">Lobby</h1><br>
  </hgroup>

<br>
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
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>


<!--</div>-->
<main class="main-content">
 <div class="col-md-6 col-md-offset-4">

<p id="jackpot">Home</p>
<p id="balance">Balance</p>

<a href="logout.php">Log Out</a>
</div>
</nav>
</div>
</main>


</body>
</html>