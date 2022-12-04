<?php

session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");

//echo $_SESSION['username'];

$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}

/*
$username;

foreach ($_POST as $param_name => $param_val) {

    
    switch ($param_name){

        case "username":
        $username = $param_val;
        break;
    }

    //echo "Param: $param_name; Value: $param_val<br />\n";
}
*/
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

$id = "id";
$balance = "balance";
$loyalty = "loyalty";
$winloss = "winloss";
$coinin  = "coinin";

$sql="SELECT " . $id . "," . $balance . "," . $loyalty . " FROM users WHERE username='$user'";

//echo $sql;
$result = mysqli_query($conn, $sql);

$number;

while($row = mysqli_fetch_assoc($result)) {

    $number = $row;
    //$progressive = $row["progressive"];
}

echo json_encode($number);

$conn->close();

?>