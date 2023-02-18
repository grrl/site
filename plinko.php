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
  <link rel="stylesheet" href="plinko.css">
</head>
<style>
    * {
      box-sizing: border-box;
    }
    
    body{
      background-color: "#1f1e1e";
    }
    
    .column {
      float: left;
      width: 20.00%;
      padding: 5px;
    }
    
    /*Clearfix (clear floats)*/ 
    .row::after {
      content: "";
      clear: both;
      display: table;
    }
    
    table {
        border-collapse: separate;
        /*border-spacing: 0 15px;*/
      }
      th {
        /*background-color: gray;*/
        color: white;
      }
      th,
      td {
        width: 150px;
        /*text-align: right;*/
        /*border: 1px solid black;*/
        padding: 5px;
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

function change_cash(){

if (!cash){

  document.getElementById("balance").value =  document.getElementById("balance").value / 4;
  document.getElementById("credit_cash").innerHTML =  "CASH $";

  cash = true;
}
else{

  document.getElementById("balance").value = document.getElementById("balance").value * 4;
  document.getElementById("credit_cash").innerHTML =  "CREDIT";

  cash = false;
}
}

function generate(){

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        document.getElementById("txtHint").innerHTML = "";

        //document.getElementById("box1").disabled = false;
        //document.getElementById("box2").disabled = false;
        //document.getElementById("box3").disabled = false;
        //document.getElementById("box4").disabled = false;
        //document.getElementById("box5").disabled = false;

        let text = this.responseText;
        const myArray = text.split(" ");
        let size = myArray.length;
        let card_1 = myArray[0];
        let card_2 = myArray[1];
        let card_3 = myArray[2];
        let card_4 = myArray[3];
        let card_5 = myArray[4];
        timestamp = myArray[5];
        console.log("id is " + timestamp);


        let my_string = "";
        for (let i = 6; i< size; i++){
            if (i == size - 1)
              my_string += myArray[i];
            else
              my_string += myArray[i] + " ";
        }
        //let win = myArray[6];
        //console.log(my_string);

        console.log("win is " + my_string)

        if (my_string != "")
          document.getElementById("txtHint").innerHTML = my_string;

        //document.getElementById("card1").innerHTML = card_1 + " " + card_2 + " " + card_3 + " " + card_4 + " " + card_5;

        //console.log(typeof card_1);
        //console.log(typeof card_2);
        //console.log(typeof card_3);
        //console.log(typeof card_4);
        //console.log(typeof card_5);

        cards_dealt = true;
        document.getElementById("play_button").value = "DRAW";
      }
    };
    xmlhttp.open("GET", "draw.php?q=" + str, true);
    xmlhttp.send();

}

function openForm() {
  //change button color according to jackpot
  document.getElementById("myForm").style.display = "block";
  document.getElementById("mycanvas").style.display = "none";
}

function closeForm() {
  //get number from button send to server and update win to user
  //end game
  //send all button values back
  //replace chosen button with award
  //then 1 by one show rest awards
  //increase credits counter then go back to base game

  document.getElementById("myForm").style.display = "none";
  document.getElementById("mycanvas").style.display = "block";
}

var bet_level = 8;
var credit_format = false;

function increase_bet(){

//save bet preference in user settings?
//bets 0.5 1 1.5 2 2.5 3
//bets 0.6 1.2 1.8 2.4. 3.0 3.6
//bets 0.8 1.6 2.4 3.2 4.0 4.8
//bets 0.4 0.8 1.2 1.6 2.0 2.4 2.8 3.2

if (credit_format){

  switch (bet_level){

    case 1:
      bet_level = 2;
      document.getElementById("bet_amount").value = "  80";
    break;
    case 2:
      bet_level = 3;
      document.getElementById("bet_amount").value = "120";
    break;
    case 3:
      bet_level = 4;
      document.getElementById("bet_amount").value = "160";
    break;
    case 4:
      bet_level = 5;
      document.getElementById("bet_amount").value = "200";
    break;
    case 5:
      bet_level = 6;
      document.getElementById("bet_amount").value = "240";
    break;
    case 6:
      bet_level = 7;
      document.getElementById("bet_amount").value = "280";
    break;
    case 7:
      bet_level = 8;
      document.getElementById("bet_amount").value = "320";
    break;
    default:
      break; 
    } 
  }
    else{

    switch (bet_level){

    case 1:
      bet_level = 2;
      document.getElementById("bet_amount").value = " 0.8";
    break;
    case 2:
      bet_level = 3;
      document.getElementById("bet_amount").value = " 1.2";
    break;
    case 3:
      bet_level = 4;
      document.getElementById("bet_amount").value = " 1.6";
    break;
    case 4:
      bet_level = 5;
      document.getElementById("bet_amount").value = " 2.0";
    break;
    case 5:
      bet_level = 6;
      document.getElementById("bet_amount").value = " 2.4";
    break;
    case 6:
      bet_level = 7;
      document.getElementById("bet_amount").value = " 2.8";
    break;
    case 7:
      bet_level = 8;
      document.getElementById("bet_amount").value = " 3.2";
    break;
    default:
      break;
  }
  }
}

function decrease_bet(){

  if (credit_format){

    switch (bet_level){
    case 2:
      bet_level = 1;
      document.getElementById("bet_amount").value = "  40";
    break;
    case 3:
      bet_level = 2;
      document.getElementById("bet_amount").value = "  80";
    break;
    case 4:
      bet_level = 3;
      document.getElementById("bet_amount").value = "120";
    break;
    case 5:
      bet_level = 4;
      document.getElementById("bet_amount").value = "160";
    break;
    case 6:
      bet_level = 5;
      document.getElementById("bet_amount").value = "200";
    break;
    case 7:
      bet_level = 6;
      document.getElementById("bet_amount").value = "240";
    break;
    case 8:
      bet_level = 7;
      document.getElementById("bet_amount").value = "280";
    break;
    default:
    break;
  }
  }
  else {
  switch (bet_level){
    case 2:
      bet_level = 1;
      document.getElementById("bet_amount").value = " 0.4";
    break;
    case 3:
      bet_level = 2;
      document.getElementById("bet_amount").value = " 0.8";
    break;
    case 4:
      bet_level = 3;
      document.getElementById("bet_amount").value = " 1.2";
    break;
    case 5:
      bet_level = 4;
      document.getElementById("bet_amount").value = " 1.6";
    break;
    case 6:
      bet_level = 5;
      document.getElementById("bet_amount").value = " 2.0";
    break;
    case 7:
      bet_level = 6;
      document.getElementById("bet_amount").value = " 2.4";
    break;
    case 8:
      bet_level = 7;
      document.getElementById("bet_amount").value = " 2.8";
    break;
    default:
    break;
  }
  }
}

function change_format(){

  if (credit_format){

      switch (bet_level){

      case 1:
        document.getElementById("bet_amount").value =  " 0.4";
      break;
      case 2:
        document.getElementById("bet_amount").value =  " 0.8";
      break;
      case 3:
        document.getElementById("bet_amount").value =  " 1.2";
      break;
      case 4:
        document.getElementById("bet_amount").value =  " 1.6";
      break;
      case 5:
        document.getElementById("bet_amount").value =  " 2.0";
      break;
      case 6:
        document.getElementById("bet_amount").value =  " 2.4";
      break;
      case 7:
        document.getElementById("bet_amount").value =  " 2.8";
      break;
      case 8:
        document.getElementById("bet_amount").value =  " 3.2";
      break;
      default:
      break;
    }
    credit_format = false;
  }
  else{

    switch (bet_level){

      case 1:
        document.getElementById("bet_amount").value =  "  40";
      break;
      case 2:
        document.getElementById("bet_amount").value =  "  80";
      break;
      case 3:
        document.getElementById("bet_amount").value =  "120";
      break;
      case 4:
        document.getElementById("bet_amount").value =  "160";
      break;
      case 5:
        document.getElementById("bet_amount").value =  "200";
      break;
      case 6:
        document.getElementById("bet_amount").value =  "240";
      break;
      case 7:
        document.getElementById("bet_amount").value =  "280";
      break;
      case 8:
        document.getElementById("bet_amount").value =  "320";
      break;
      default:
      break;
    }
    credit_format = true;
  }

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

<table>
    <tr>
      <th>
      <h2>2.5</h2>
      <p>Opal</p>
      </th>
      <th>
      <h2>5</h2>
      <p>Ruby</p>
      </th>
      <th>
      <h2>10</h2>
      <p>Sapphire</p>
      </th>
      <th>
      <h2>100</h2>
      <p>Emerald</p>
      </th>
      <th>
      <h2>1,000</h2>
      <p>Diamond</p>
      </th>
    </tr>
    </table>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Jackpot name: Make a pick</h1>
    <h4>Total BET: XXX = Y Progressive Award(s) hidden</h4>
    <h6>THE HIGHER THE BET THE MORE PROGRESSIVES AVAILABLE IN SELECTION</h5>
    <table>
    <tr>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
    </tr>
    <tr>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
    </tr>
    </table>
    <h5>SELECT A JEWEL</h5>
    <!--<button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
  </form>
</div>
<canvas id="mycanvas" src="plinko.js" width="580" height="360" style="border:5px solid blue; margin-left:-27px;"></canvas>

<table>
  <tr>
    <th>
      <label id="winlabel" style="color:white;"></label>
    </th>
    <th>
  </th>
  <th>
  </th>
  <th>
  </th>
  <th>
    <label id="credit_cash">CREDIT</label>
    <input type="button" id="balance" onclick="change_cash()" value="" style="border:none;background-color:#1f1e1e;"/>
  </th>
  </tr>
</table>
<table>
  <tr>
    <th>
      <input type="button" name="button3"
      class="button" id="game_info" onclick="myFunction()" value="GAME INFO" style="background-color:#1f1e1e;" onclick=""/>
    </th>
  <th style="padding-left:50px;">
  <span class="dot" style="color:white;padding-left:7px; padding-top:6px;height: 30px;
  width: 30px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;">1¢</span>
  </th>
  <th>
  <input type="button" name="button1"
    class="button" value=" + " id="bet_button" style="float:right;background-color:#1f1e1e;" onclick="increase_bet()"/>    
  <input type="button" name="button1" id="bet_amount" class="button" value=" 3.2" style="float:right;background-color:#1f1e1e;" onclick="change_format()"/>
  <input type="button" name="button1"
    class="button" value=" − " id="bet_button" style="float:right;background-color:#1f1e1e;" onclick="decrease_bet()"/>
  </th>
  <th>
    <input type="button" name="button1"
    class="button" value="PLAY" id="play_button" style="float:right;background-color:#1f1e1e;" onclick="openForm()"/>    
  </th>
  </tr>
</table>
<br>
<table>
  <tr>
    <th>
      <p id="sessionpoints">Session points: 0</p>
    </th>
    <th>
    </th>
    <th>
      <p id ="loyalty" style="white-space:nowrap;">Points total:</p>
    </th>
    <th>
      <p id ="gamestate"></p>
    </th>
  </tr>
</table>
<p>PLINKO</p>

</div>
</nav>
</div>
</main>


</body>
</html>