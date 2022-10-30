<?php
// Array with names


// get the q parameter from URL
//$q = $_REQUEST["q"];

$deck = array(
  
  0,
  1, //  [0]
  2, //  [1]
  3, //  [2]
  4, //  [3]
  5, //  [4]
  6,
  7,
  8,
  9,
  10,
  11,
  12,
  13,
  14,
  15,
  16,
  17,
  18,
  19,
  20,
  21,
  22,
  23,
  24,
  25,
  26,
  27,
  28,
  29,
  30,  
  31,
  32,
  33,
  34,
  35,
  36,
  37,
  38,
  39,
  40,
  41,
  42,
  43,
  44,
  45,
  46,
  47,
  48,
  49,
  50,
  51
);

// given min and max range
// Not valid range
$seed_1 = (random_int(0, 51));
//echo '<pre>'; print_r($deck); echo '</pre>';
//echo '<pre>'; echo $seed_1; echo '<pre>';
$card_1 = $deck[$seed_1];
unset($deck[$seed_1]);
array_unshift($deck);

$seed_2 = (random_int(0, 50));
$card_2 = $deck[$seed_2];
//echo $seed_2;
//echo '<pre>'; print_r($deck); echo '</pre>';
unset($deck[$seed_2]);
array_unshift($deck);

$seed_3 = (random_int(0, 49));
$card_3 = $deck[$seed_3];
unset($deck[$seed_3]);
array_unshift($deck);
//echo '<pre>'; print_r($deck); echo '</pre>';

$seed_4 = (random_int(0, 48));
$card_4 = $deck[$seed_4];
unset($deck[$seed_4]);
array_unshift($deck);
//echo '<pre>'; print_r($deck); echo '</pre>';

$seed_5 = (random_int(0, 47));
$card_5 = $deck[$seed_5];
unset($deck[$seed_5]);
array_unshift($deck);

$seed_6 = (random_int(0, 46));
$card_6 = $deck[$seed_6];
unset($deck[$seed_6]);
array_unshift($deck);

$seed_7 = (random_int(0, 45));
$card_7 = $deck[$seed_7];
unset($deck[$seed_7]);
array_unshift($deck);


$seed_8 = (random_int(0, 44));
$card_8 = $deck[$seed_8];
unset($deck[$seed_8]);
array_unshift($deck);


$seed_9 = (random_int(0, 43));
$card_9 = $deck[$seed_9];
unset($deck[$seed_5]);
array_unshift($deck);

$seed_10 = (random_int(0, 43));
$card_10 = $deck[$seed_10];
unset($deck[$seed_10]);
array_unshift($deck);

$date = new DateTimeImmutable();

//echo date_timestamp_get($date);

$time_stamp = date_timestamp_get($date);

// Output "no suggestion" if no hint was found or output correct values

echo $time_stamp;
echo " ";
echo  $card_1;
echo " ";
echo  $card_2;
echo " ";
echo  $card_3;
echo " ";
echo  $card_4;
echo " ";
echo  $card_5;
//echo '<pre>';
//echo  $card_6;
//echo " ";
//echo  $card_7;
//echo " ";
//echo  $card_8;
//echo " ";
//echo  $card_9;
//echo " ";
//echo  $card_10;

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


$sql = "INSERT INTO session (id, time, card_1, card_2, card_3,
card_4, card_5, card_6, card_7, card_8, card_9, card_10, win, complete)
VALUES (default," . $time_stamp . "," . $card_1
  . "," . $card_2 . "," . $card_3 . "," . $card_4 . "," .
   $card_5 . "," . $card_6 . "," . $card_7 . "," .
   $card_8 . "," . $card_9 . "," . $card_10 . ",0,0)";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT id, card_1 FROM session";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["card_1"] . "<br>";
  }
} else {
  //echo "0 results";
}


$conn->close();

?>