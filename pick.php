<?php

session_start();

$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}

$pick;
$my_id;

foreach ($_POST as $param_name => $param_val) {

    switch ($param_name){

        case "pick":
        $pick = $param_val;
        break;
        case "id":
        $my_id = $param_val;
        break;
    }
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
//else
//  echo "connected";

//SELECT * FROM Customers
//WHERE Country='Mexico';

$status = "complete";

$sql="SELECT " . $status . " FROM plinkosession WHERE id=" . $my_id;

//echo $sql;
$result = mysqli_query($conn, $sql);

$statusresult;

//$row = mysqli_fetch_row($result);
$row = $result->fetch_row();

$statusresult = $row[0];

$pick_1 = "pick_1";
$pick_1_credits = "pick_1_credits";
$pick_2 = "pick_2";
$pick_2_credits = "pick_2_credits";
$pick_3 = "pick_3";
$pick_3_credits = "pick_3_credits";
$pick_4 = "pick_4";
$pick_4_credits = "pick_4_credits";
$pick_5 = "pick_5";
$pick_5_credits = "pick_5_credits";
$pick_6 = "pick_6";
$pick_6_credits = "pick_6_credits";
$pick_7 = "pick_7";
$pick_7_credits = "pick_7_credits";
$pick_8 = "pick_8";
$pick_8_credits = "pick_8_credits";
$jackpot = "jackpot";

if ($statusresult == "0"){

//get results calculate win total
//calculate win

$sql = "SELECT " . $jackpot . ", " . $pick_1 . ", " . $pick_1_credits . ", " . 
$pick_2 . ", " . $pick_2_credits . ", " .
$pick_3 . ", " . $pick_3_credits . ", " .
$pick_4 . ", " . $pick_4_credits . ", " .
$pick_5 . ", " . $pick_5_credits . ", " .
$pick_6 . ", " . $pick_6_credits . ", " .
$pick_7 . ", " . $pick_7_credits . ", " .
$pick_8 . ", " . $pick_8_credits . " FROM plinkosession WHERE id=" . $my_id;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $jackpot = $row[$jackpot];
    $pick_1 = $row[$pick_1];
    $pick_1_credits = $row[$pick_1_credits];
    $pick_2 = $row[$pick_2];
    $pick_2_credits = $row[$pick_2_credits];
    $pick_3 = $row[$pick_3];
    $pick_3_credits = $row[$pick_3_credits];
    $pick_4 = $row[$pick_4];
    $pick_4_credits = $row[$pick_4_credits];
    $pick_5 = $row[$pick_5];
    $pick_5_credits = $row[$pick_5_credits];
    $pick_6 = $row[$pick_6];
    $pick_6_credits = $row[$pick_6_credits];
    $pick_7 = $row[$pick_7];
    $pick_7_credits = $row[$pick_7_credits];
    $pick_8 = $row[$pick_8];
    $pick_8_credits = $row[$pick_8_credits];

    }
} else {
    //echo "0 results";
}

$win = 0;

$under_1;
$under_2;
$under_3;
$under_4;
$under_5;
$under_6;
$under_7;
$under_8;

$results_array = array();

if ($pick_1 == "0"){
    $under_1 = $pick_1_credits;
}
else{
    $under_1 = $jackpot . " progessive +" . $pick_1_credits;
}

if ($pick_2 == "0"){
    $under_2 = $pick_2_credits;
}
else{
    $under_2 = $jackpot . " progessive +" . $pick_2_credits;
}

if ($pick_3 == "0"){
    $under_3 = $pick_3_credits;
}
else{
    $under_3 = $jackpot . " progessive +" . $pick_3_credits;
}

if ($pick_4 == "0"){
    $under_4 = $pick_4_credits;
}
else{
    $under_4 = $jackpot . " progessive +" . $pick_4_credits;
}

if ($pick_5 == "0"){
    $under_5 = $pick_5_credits;
}
else{
    $under_5 = $jackpot . " progessive +" . $pick_5_credits;
}

if ($pick_6 == "0"){
    $under_6 = $pick_6_credits;
}
else{
    $under_6 = $jackpot . " progessive +" . $pick_6_credits;
}

if ($pick_7 == "0"){
    $under_7 = $pick_7_credits;
}
else{
    $under_7 = $jackpot . " progessive +" . $pick_7_credits;
}

if ($pick_8 == "0"){
    $under_8 = $pick_8_credits;
}
else{
    $under_8 = $jackpot . " progessive +" . $pick_8_credits;
}

if ($pick == "1"){
    $win = $pick_1+ $pick_1_credits;
}
else if ($pick == "2"){
    $win = $pick_2+ $pick_2_credits;
}
else if ($pick == "3"){
    $win = $pick_3 + $pick_3_credits;
}
else if ($pick == "4"){
    $win = $pick_4 + $pick_4_credits;
}
else if ($pick == "5"){
    $win = $pick_5 + $pick_5_credits;
}
else if ($pick == "6"){
    $win = $pick_6 + $pick_6_credits;
}
else if ($pick == "7"){
    $win = $pick_7 + $pick_7_credits;
}
else if ($pick == "8"){
    $win = $pick_8 + $pick_8_credits;
}

$sql = "UPDATE plinkosession SET win='" . $win. "', pick='". $pick . "', complete='" . 1 . "' WHERE id=" . $my_id;

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE plinko SET coinout=coinout +'" . $win . "'";

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

$sql = "UPDATE users SET balance=balance +'" . $win . "' WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss +'" . $win . "' WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

array_push($results_array, $pick);
array_push($results_array, $under_1);
array_push($results_array, $under_2);
array_push($results_array, $under_3);
array_push($results_array, $under_4);
array_push($results_array, $under_5);
array_push($results_array, $under_6);
array_push($results_array, $under_7);
array_push($results_array, $under_8);
array_push($results_array, $win);

//$sql = "SELECT " . $card1 . ", " . $card2 . ", " . $card3 . ", " . $card4 . ", " . $card5 . " FROM session WHERE id=" . $my_id;

echo json_encode($results_array);
//echo $win_amount;
echo " ";

$conn->close();

}

?>