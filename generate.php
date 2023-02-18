<?php

//check if balance
session_start();

$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}

$bet_value;

foreach ($_POST as $param_name => $param_val) {

    
    switch ($param_name){

        case "bet":
        $bet_value = $param_val;
        break;
        default:
        break;
    }

    //echo "Param: $param_name; Value: $param_val<br />\n";
}

//echo $bet_value;
//echo " ";

switch ($bet_value){

  case "1":
  $bet_value = 0.4;
  break;
  case "2":
  $bet_value = 0.8;
  break;
  case "3":
  $bet_value = 1.2;
  break;
  case "4":
  $bet_value = 1.6;
  break;
  case "5":
  $bet_value = 2.0;
  break;
  case "6":
  $bet_value = 2.4;
  break;
  case "7":
  $bet_value = 2.8;
  break;
  case "8":
  $bet_value = 3.2;
  break;
}

//echo $bet_value;
//echo " ";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$balance = "balance";

$sql="SELECT " . $balance . " FROM users WHERE username='$user'";

//echo $sql;
$result = mysqli_query($conn, $sql);

//$number;

$row = $result->fetch_row();

$balance = $row[0];


//echo $number;
//echo " ";

if ($bet_value > 0 && $balance >= $bet_value){

$sql = "UPDATE users SET balance=balance -" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="SELECT " . $balance . " FROM users WHERE username='$user'";

//echo $sql;
$result = mysqli_query($conn, $sql);

$newbalance;

$row = $result->fetch_row();

$newbalance = $row[0];

//update points with bet

$sql = "UPDATE users SET loyalty=loyalty +" . $bet_value/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update session points with bet size

$sql = "UPDATE users SET points=points +" . $bet_value/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET coinin=coinin +" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss -" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update points end

//$conn->close();

$seed = (random_int(0, 999));

//echo $seed;
//echo " ";
$date = new DateTimeImmutable();
//echo date_timestamp_get($date);
$time_stamp = date_timestamp_get($date);

//multiplier
$win_multiplier = 0;

$bonus = false;

//$array = array(60, 0, 0, 53, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50);

if ($seed == 0 || $seed == 1){ //bonus
//activate bonus to ask client choice
//draw wins for choices 0,1,2,3,4,5
//then send win back to user
  $array = array(80, 0, 0, 49, 205, 270);
  $win_multiplier = "BONUS";
  $bonus = true;

}
else if ($seed >= 2 && $seed <= 45){ //2

  $win_multiplier = 2;

  $array = array(80, 0, 0, 51, 63, 60, -55, 40, 55, 40, 75, 130);
  //generate array path to return

}
else if ($seed >=46 && $seed <= 317){ //1.1

  $win_multiplier = 1.1;
  //generate array path to return

  $route = (random_int(0, 1));

  if ($route == 0){
  //choose between one array
  $array = array(80, 0, 0, 51, 63, 60, -85, 81, 60, 50, 45, 80);
  }
  else if ($route == 1) {
  $array = array(80, 0, 0, 51, 63, 60, -55, 40, 55, 40, -55, 30, 80, 100);
  }

}
else if ($seed >= 318 && $seed <= 771){ // 1.05

  $win_multiplier = 1.05;
  //generate array path to return
  $array = array(63, 0, 0, 51, -65, 55, 55, 40, -55, 40, 55, 50, 53, 90);

}
else if ($seed >= 772 && $seed <= 999){ //0.3

  $win_multiplier = 0.3;
  $array = array(0, 50, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50);
  //generate array path to return

}

//echo $win_multiplier;
//echo " ";

if ($win_multiplier == "BONUS"){
//request choice from player
//and after clicking return them with
//max bet text pick a jewel for additional prize
//and flash winner text in jackpot

} else {

//update seed and win multiplier with bet to sql database
//plinko coinin <= bet amount
//cointout <= bet amount * bet_multiplier
//increment cycle
//plinkosession
$win_amount = $win_multiplier * $bet_value;

//pick_1, pick_2, pick_3, pick_4, pick_5, pick_6, pick_7, pick_8
$sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, multiplier, win, balance, complete)
VALUES (default,'" . $time_stamp . "','" . $user . "','" . $seed .
"','" . $bonus . "','" . $bet_value . "','". $win_multiplier . "','" .  $win_amount . "','". $newbalance . "', 1)";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$results_array = array();

array_push($results_array, $win_amount);
//array_push($results_array, $id);
array_push($results_array, $array);

echo json_encode($results_array);
//echo $win_amount;
echo " ";

$opal_multiplier = floatval($bet_value) * 0.01 * 0.1;
$ruby_multiplier = floatval($bet_value) * 0.01 * 0.1;
$emerald_multiplier = floatval($bet_value) * 0.01 * 0.2;
$sapphire_multiplier = floatval($bet_value) * 0.01 * 0.2;
$diamond_multiplier = floatval($bet_value) * 0.01 * 0.4;

$sql = "UPDATE plinko SET coinin=coinin +" . $bet_value . ", coinout=coinout +" . $win_amount . ", cycle=cycle +" . 1 .
", opal=opal +" . $opal_multiplier . ", ruby=ruby +" . $ruby_multiplier . ", emerald=emerald +" . $emerald_multiplier .
", sapphire=sapphire +" . $sapphire_multiplier . ", diamond=diamond +" . $diamond_multiplier;

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE plinko SET payback=coinout/coinin";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET balance=balance +" . $win_amount . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss +" . $win_amount . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}



}

$conn->close();

}
?>