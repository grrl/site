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
$username = $_SESSION['username'];

$sql="SELECT " . $id . " FROM users WHERE  username='$username'";

//echo $sql;
$result = mysqli_query($conn, $sql);

$number;

while($row = mysqli_fetch_assoc($result)) {

    $number = $id;

    //$progressive = $row["progressive"];

}

echo $number;

$conn->close();

?>