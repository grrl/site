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

        case "id":
        $my_id = $param_val;
        break;
        case "pick":
        $pick = $param_val;
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
$pick_1_credits = "pick_1_credits";;
$pick_2 = "pick_2";
$pick_2_credits = "pick_2_credits";;
$pick_3 = "pick_3";
$pick_3_credits = "pick_3_credits";;
$pick_4 = "pick_4";
$pick_4_credits = "pick_4_credits";;
$pick_5 = "pick_5";
$pick_5_credits = "pick_5_credits";;
$pick_6 = "pick_6";
$pick_6_credits = "pick_6_credits";;
$pick_7 = "pick_7";
$pick_7_credits = "pick_7_credits";;
$pick_8 = "pick_8";
$pick_8_credits = "pick_8_credits";;


if ($statusresult == "0"){

    //calculate win

$sql = "UPDATE plinkosession SET win='" . $win.
"', complete=". 1 . ", res_1=". $card_1_final . ", res_2=" . $card_2_final .
", res_3=" . $card_3_final . ", res_4=" . $card_4_final . ", res_5=" . $card_5_final . " WHERE id=" . $my_id;

    

$sql = "SELECT " . $card1 . ", " . $card2 . ", " . $card3 . ", " . $card4 . ", " . $card5 . " FROM session WHERE id=" . $my_id;


}




?>