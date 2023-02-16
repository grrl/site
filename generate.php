<?php

//check if balance
session_start();

$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}

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


if ($number >= 1.25){

$sql = "UPDATE users SET balance=balance -" . 1.25 . " WHERE username='$user'";

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

//update points

$sql = "UPDATE users SET loyalty=loyalty +" . 1.25/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update session points

$sql = "UPDATE users SET points=points +" . 1.25/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET coinin=coinin +" . 1.25 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss -" . 1.25 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update points end

$conn->close();

$seed = (random_int(0, 999));

$date = new DateTimeImmutable();
//echo date_timestamp_get($date);
$time_stamp = date_timestamp_get($date);

$win_amount = 0;

if ($seed == 0 || $seed == 1){ //bonus
//activate bonus to ask client choice
//draw wins for choices 0,1,2,3,4,5
//then send win back to user

  $win_amount = "BONUS";
}
else if ($seed >= 2 || $seed <= 45){ //2

  $win_amount = 2;

  //generate array to return

}
else if ($seed >=46 || $seed <= 317){ //1.1

  $win_amount = 1.1;
  //generate array to return

}
else if ($seed >= 318 || $seed <= 771){ // 1.05

  $win_amount = 1.05;
  //generate array to return

}
else if ($seed >= 772 || $seed <= 999){ //0.3

  $win_amount = 0.3;
  //generate array to return

}

if ($win_amount == "BONUS"){

//request choice from player
//and after clicking return them with 

} else {


}

}