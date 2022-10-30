<?php


 

#$data = $_POST['card1'];
//$data = array("card1"=>$data, "Status"=>"Success");

#echo $data;

$card1_boolean;
$card2_boolean;
$card3_boolean;
$card4_boolean;
$card5_boolean;
$timestamp;

$card1;
$card2;
$card3;
$card4;
$card5;

foreach ($_POST as $param_name => $param_val) {

    
    switch ($param_name){

        case "box1":
        $card1_boolean = $param_val;
            break;
        case "box2":
        $card2_boolean = $param_val;
            break;
        case "box3":
        $card3_boolean = $param_val;
            break;
        case "box4":
        $card4_boolean = $param_val;
            break;
        case "box5":
        $card5_boolean = $param_val;
            break;
        case "timestamp":
        $timestamp = $param_val;
        break;
    }

    //echo "Param: $param_name; Value: $param_val<br />\n";
}
/*
echo $card1_boolean;
echo " ";
echo $card2_boolean;
echo " ";
echo $card3_boolean;
echo " ";
echo $card4_boolean;
echo " ";
echo $card5_boolean;
echo " ";
*/
//echo $timestamp;
//echo " ";

//if not checked get new card back to client with mysql

//1->6
//2->7
//3->8
//4->9
//5->10

if($card1_boolean == 'true'){
    //$card1 = 1;
    $card1 = "card_1";
}
else{
    //$card1 = 6;
    $card1 = "card_6";

}
if($card2_boolean == 'true'){
    //$card2 = 2;
    $card2 = "card_2";

}
else{
    //$card2 = 7;
    $card2 = "card_7";
}
if($card3_boolean == 'true'){
    //$card3 = 3;
    $card3 = "card_3";
}
else{
    //$card3 = 8;
    $card3 = "card_8";

}
if($card4_boolean == 'true'){
    //$card4 = 4;
    $card4 = "card_4";
}
else{
    //$card4 = 9;
    $card4 = "card_9";
}
if($card5_boolean == 'true'){
    //$card5 = 5;
    $card5 = "card_5";
}
else{
    //$card5 = 10;
    $card5 = "card_10";
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


$sql = "SELECT " . $card1 . ", " . $card2 . ", " . $card3 . ", " . $card4 . ", " . $card5 ." FROM session WHERE time=" . $timestamp;
//echo $sql;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo  $row[$card1]. " " . $row[$card2] .
    " " . $row[$card3] .  " " . $row[$card4] .  " " . $row[$card5]/*."<br>"*/;
    //echo $result;
  }
} else {
  //echo "0 results";
}


$conn->close();


//if all checked get five first cards and check if won

//check if won return win and update to mysql and client

//update round played true


?>
