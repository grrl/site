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
//else
//  echo "connected";


//default, 

$sql = "SELECT id, card_1, card_2, card_3,
card_4, card_5 FROM session WHERE username='$user' AND complete='0)'";

$result = mysqli_query($conn, $sql);

$number;


while($row = mysqli_fetch_assoc($result)) {

    $number = $row;
    //$progressive = $row["progressive"];
}

echo json_encode($number);


$conn->close();

?>