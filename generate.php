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

$number;

$row = $result->fetch_row();

$number = $row[0];

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

$conn->close();

$seed = (random_int(0, 999));

//echo $seed;
//echo " ";
$date = new DateTimeImmutable();
//echo date_timestamp_get($date);
$time_stamp = date_timestamp_get($date);

//multiplier
$win_multiplier = 0;

$array = array(60, 0, 0, 53, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50);

if ($seed == 0 || $seed == 1){ //bonus
//activate bonus to ask client choice
//draw wins for choices 0,1,2,3,4,5
//then send win back to user

  $win_multiplier = "BONUS";
}
else if ($seed >= 2 && $seed <= 45){ //2

  $win_multiplier = 2;

  //generate array path to return

}
else if ($seed >=46 && $seed <= 317){ //1.1

  $win_multiplier = 1.1;
  //generate array path to return

}
else if ($seed >= 318 &&$seed <= 771){ // 1.05

  $win_multiplier = 1.05;
  //generate array path to return

}
else if ($seed >= 772 && $seed <= 999){ //0.3

  $win_multiplier = 0.3;
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

$results_array = array();

//array_push($results_array, $win_amount);
//array_push($results_array, $id);
//array_push($results_array, $array);


//echo json_encode($win_amount);
echo $win_amount;
echo " ";

}

}