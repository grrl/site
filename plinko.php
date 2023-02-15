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
  <title>Plinko</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 2px;
}

tr:nth-child(even) {
  background-color: #f7feff;
}
tr:nth-child(odd) {
  background-color: #bdc8c9;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="plinko.js"></script>
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


         document.getElementById("jackpot").innerHTML = mydata.id;
         document.getElementById("balance").innerHTML = mydata.balance;
         document.getElementById("loyalty").innerHTML = Math.floor(mydata.loyalty);
         document.getElementById("winloss").innerHTML = mydata.winloss;
         document.getElementById("coinin").innerHTML = mydata.coinin;

      }
      
  });
}

window.onload = refresh_jackpot;

</script>
<body>
<div class="container">
  <hgroup>
    <h1 class="site-title" style="site-title; text-align: center; color: white; -webkit-text-stroke: 2px black;  font-weight: bold;">Plinko</h1><br>
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
        <li><a href="home.php">Home</a></li>
        <li><a href="index.php">Bonus Poker</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
</nav>

<!--</div>-->
<main class="main-content">
  <div class="col-md-6 col-md-offset-4">

<h4 style="color:white;">Your account data, <?php echo $_SESSION['username'] ?>.</h4>


<canvas id="mycanvas" src="plinko.js" width="580" height="360" style="border:5px solid blue;"></canvas>


</div>
</nav>
</div>
</main>


</body>
</html>