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

$opal = "opal";
$ruby = "ruby";
$emerald = "emerald";
$sapphire = "sapphire";
$diamond = "diamond";

$opal_progressive;
$ruby_progressive;
$emerald_progressive;
$sapphire_progressive;
$diamond_progressive;

$sql = "SELECT " . $opal . "," . $ruby. "," . $emerald . "," . $sapphire . "," . $diamond . " FROM plinko";
//echo $sql;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $opal = $row[$opal];
    $ruby = $row[$ruby];
    $emerald = $row[$emerald];
    $sapphire = $row[$sapphire];
    $diamond = $row[$diamond];
    }
} else {
    //echo "0 results";
}

$results_array = array();

array_push($results_array, $opal);
array_push($results_array, $ruby);
array_push($results_array, $emerald);
array_push($results_array, $sapphire);
array_push($results_array, $diamond);

echo json_encode($results_array);

$conn->close();

?>