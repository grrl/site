<?php

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


$sql = "SELECT progressive FROM jackpot";
//echo $sql;
$result = mysqli_query($conn, $sql);

$progressive;

while($row = mysqli_fetch_assoc($result)) {

  $progressive = $row["progressive"];

}

echo $progressive;

$conn->close();

?>