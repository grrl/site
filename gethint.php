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
//echo '<pre>'; print_r($deck); echo '</pre>';
//echo '<pre>'; echo $seed_1; echo '<pre>';
$seed_1 = (random_int(0, 51));
$card_1 = $deck[$seed_1];
unset($deck[$seed_1]);
array_unshift($deck);

//echo $seed_2;
//echo '<pre>'; print_r($deck); echo '</pre>';

$seed_2 = (random_int(0, 50));
$card_2 = $deck[$seed_2];
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
unset($deck[$card_9]);
array_unshift($deck);

$seed_10 = (random_int(0, 42));
$card_10 = $deck[$seed_10];
//unset($deck[$seed_10]);
//array_unshift($deck);

$date = new DateTimeImmutable();

//echo date_timestamp_get($date);

$time_stamp = date_timestamp_get($date);

// Output "no suggestion" if no hint was found or output correct values

//echo $time_stamp;
//echo " ";
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

//check win here

//royal flush

//push to array and arrange
//first is lowest highest last

$cards = array($card_1, $card_2, $card_3, $card_4, $card_5);


sort($cards);


$win = "";

//$win = $cards[0];

//$card0 = array_values($cards)[0];
//$card1 = array_values($cards)[0];
//$card2 = array_values($cards)[0];
//$card3 = array_values($cards)[0];
//$card4 = array_values($cards)[0];


//sort($cards);

//print_r($cards);

//royal flush

if ($cards[0] == "0" && $cards[1] == "9" && $cards[2] == "10" && $cards[3] == "11" && $cards[4] == "12" ||
    $cards[0] == "13" && $cards[1] == "22" && $cards[2] == "23" && $cards[3] == "24" && $cards[4] == "25" ||
    $cards[0] == "26" && $cards[1] == "35" && $cards[2] == "36" && $cards[3] == "37" && $cards[4] == "38" ||
    $cards[0] == "39" && $cards[1] == "48" && $cards[2] == "49" && $cards[3] == "50" && $cards[4] == "51"){

      $win = "ROYAL FLUSH";

}
else {

for ($i = 0; $i < 32; $i++){

    if ($cards[0] == $i && $cards[1] == $i + 1 &&
        $cards[2] == $i + 2 && $cards[3] == $i + 3 &&
        $cards[4] == $i + 4){
    
        $win = "STRAIGHT FLUSH";
        break;
    }
}

if ($win != "STRAIGHT FLUSH"){

  if ((($cards[0] >= 0 && $cards[0] <= 12) && 
  ($cards[1] >= 0 && $cards[1] <= 12) &&
  ($cards[2] >= 0 && $cards[2] <= 12) &&
  ($cards[3] >= 0 && $cards[3] <= 12) &&
  ($cards[4] >= 0 && $cards[4] <= 12)) ||
  
  (($cards[0] >= 13 && $cards[0] <= 25) && 
  ($cards[1] >= 13 && $cards[1] <= 25) &&
  ($cards[2] >= 13 && $cards[2] <= 25) &&
  ($cards[3] >= 13 && $cards[3] <= 25) &&
  ($cards[4] >= 13 && $cards[4] <= 25)) ||

  (($cards[0] >= 26 && $cards[0] <= 38) && 
  ($cards[1] >= 26 && $cards[1] <= 38) &&
  ($cards[2] >= 26 && $cards[2] <= 38) &&
  ($cards[3] >= 26 && $cards[3] <= 38) &&
  ($cards[4] >= 26 && $cards[4] <= 38)) ||

  (($cards[0] >= 39 && $cards[0] <= 51) && 
  ($cards[1] >= 39 && $cards[1] <= 51) &&
  ($cards[2] >= 39 && $cards[2] <= 51) &&
  ($cards[3] >= 39 && $cards[3] <= 51) &&
  ($cards[4] >= 39 && $cards[4] <= 51)))
  {
    $win = "FLUSH";
  }
}

if ($win != "FLUSH" && $win != "STRAIGHT FLUSH"){

$card_1_straight = $cards[0];
$card_2_straight = $cards[1];
$card_3_straight = $cards[2];
$card_4_straight = $cards[3];
$card_5_straight = $cards[4];

if ($cards[0] > 39){
  $card_1_straight = $cards[0] - 39;
}
else if ($cards[0] > 25){
  $card_1_straight = $cards[0] - 26;
}
else if ($cards[0] > 13){
  $card_1_straight = $cards[0] - 13;
}
if ($cards[1] > 39){
  $card_2_straight = $cards[1] - 39;
}
else if ($cards[1] > 25){
  $card_2_straight = $cards[1] - 26;
}
else if ($cards[1] > 13){
  $card_2_straight = $cards[1] - 13;
}
if ($cards[2] > 39){
  $card_3_straight = $cards[2] - 39;
}
else if ($cards[2] > 25){
  $card_3_straight = $cards[2] - 26;
}
else if ($cards[2] > 13){
  $card_3_straight = $cards[2] - 13;
}
if ($cards[3] > 39){
  $card_4_straight = $cards[3] - 39;
}
else if ($cards[3] > 25){
  $card_4_straight = $cards[3] - 26;
}
else if ($cards[3] > 13){
  $card_4_straight = $cards[3] - 13;
}
if ($cards[4] > 39){
  $card_5_straight = $cards[4] - 39;
}
else if ($cards[4] > 25){
  $card_5_straight = $cards[4] - 26;
}
else if ($cards[4] > 13){
  $card_5_straight = $cards[4] - 13;
}


for ($i = 0; $i < 8; $i++){

  if ($card_1_straight == $i && $card_2_straight == $i + 1 &&
    $card_3_straight == $i + 2 && $card_4_straight == $i + 3 &&
    $card_5_straight == $i + 4){

      $win = "STRAIGHT";
      break;
  }
}
}

$three_of_kind = FALSE;
$four_of_kind = FALSE;
$two_pair = 0;
$full_house = FALSE;
$four_aces = FALSE;

for ($i = 0; $i < 13; $i++) { //go through all 13 values
  //cards[$i] is card
    
  $of_kind_counter = 0;

  for ($j = 0; $j < 5; $j++) { //go through selected cards

      if ($cards[$j] == $i || $cards[$j] == $i + 13 ||
          $cards[$j] == $i + 26 || $cards[$j] == $i + 39){
          
            //echo $cards[$j];
            //echo " ";
            $of_kind_counter++;
      }
  }

  if ($of_kind_counter == 4 && $i == 0){
        $four_aces = TRUE;
        //echo "fouracestrue";
        $win = "4 ACES";
        break;
  }
  else if (($of_kind_counter == 4 && $i == 1)||
           ($of_kind_counter == 4 && $i == 2)||
           ($of_kind_counter == 4 && $i == 3)){

        $win = "4 2s 3s or 4s";
        break;
  }
  else if ($of_kind_counter == 4){
      $four_of_kind = TRUE;
      $win = "4 OF KIND";
      break;
  }
  else if ($three_of_kind == TRUE && $two_pair == 2){
      $full_house == TRUE;
      $win = "FULL HOUSE";
      break;
  }
  else if ($of_kind_counter == 3){
      $three_of_kind = TRUE;
  }
  else if ($of_kind_counter == 2/* && $two_pair != 2*/){
      $two_pair++;
  }
}

if ($three_of_kind && !$full_house){
  $win = "THREE OF KIND";
}
else if ($two_pair == 2 & !$full_house){

  $win = "TWO PAIR";
}

//check flush

if ($win == ""){
    if ((($cards[0] == "10" || $cards[0] == "23" || $cards[0] == "36" || $cards[0] == "49") && //jacks
    ($cards[1] == "10" || $cards[1] == "23" || $cards[1] == "36" || $cards[1] == "49")) ||
    
    (($cards[0] == "10" || $cards[0] == "23" || $cards[0] == "36" || $cards[0] == "49") && 
    ($cards[2] == "10" || $cards[2] == "23" || $cards[2] == "36" || $cards[2] == "49")) ||
    
    (($cards[0] == "10" || $cards[0] == "23" || $cards[0] == "36" || $cards[0] == "49") && 
    ($cards[3] == "10" || $cards[3] == "23" || $cards[3] == "36" || $cards[3] == "49")) ||
    
    (($cards[0] == "10" || $cards[0] == "23" || $cards[0] == "36" || $cards[0] == "49") && 
    ($cards[4] == "10" || $cards[4] == "23" || $cards[4] == "36" || $cards[4] == "49")) ||
    
    (($cards[1] == "10" || $cards[1] == "23" || $cards[1] == "36" || $cards[1] == "49") && 
    ($cards[2] == "10" || $cards[2] == "23" || $cards[2] == "36" || $cards[2] == "49")) ||
    
    (($cards[1] == "10" || $cards[1] == "23" || $cards[1] == "36" || $cards[1] == "49") && 
    ($cards[3] == "10" || $cards[3] == "23" || $cards[3] == "36" || $cards[3] == "49")) ||
    
    (($cards[1] == "10" || $cards[1] == "23" || $cards[1] == "36" || $cards[1] == "49") && 
    ($cards[4] == "10" || $cards[4] == "23" || $cards[4] == "36" || $cards[4] == "49")) ||
    
    (($cards[1] == "10" || $cards[1] == "23" || $cards[1] == "36" || $cards[1] == "49") && 
    ($cards[2] == "10" || $cards[2] == "23" || $cards[2] == "36" || $cards[2] == "49")) ||
    
    (($cards[2] == "10" || $cards[2] == "23" || $cards[2] == "36" || $cards[2] == "49") && 
    ($cards[3] == "10" || $cards[3] == "23" || $cards[3] == "36" || $cards[3] == "49")) ||
    
    (($cards[2] == "10" || $cards[2] == "23" || $cards[2] == "36" || $cards[2] == "49") && 
    ($cards[4] == "10" || $cards[4] == "23" || $cards[4] == "36" || $cards[4] == "49")) ||

    (($cards[3] == "10" || $cards[3] == "23" || $cards[3] == "36" || $cards[3] == "49") && 
    ($cards[4] == "10" || $cards[4] == "23" || $cards[4] == "36" || $cards[4] == "49")) ||
    
    
    (($cards[0] == "11" || $cards[0] == "24" || $cards[0] == "37" || $cards[0] == "50") && //queens
    ($cards[1] == "11" || $cards[1] == "24" || $cards[1] == "37" || $cards[1] == "50")) ||
    
    (($cards[0] == "11" || $cards[0] == "24" || $cards[0] == "37" || $cards[0] == "50") && 
    ($cards[2] == "11" || $cards[2] == "24" || $cards[2] == "37" || $cards[2] == "50")) ||
    
    (($cards[0] == "11" || $cards[0] == "24" || $cards[0] == "37" || $cards[0] == "50") && 
    ($cards[3] == "11" || $cards[3] == "24" || $cards[3] == "37" || $cards[3] == "50")) ||
    
    (($cards[0] == "11" || $cards[0] == "24" || $cards[0] == "37" || $cards[0] == "50") && 
    ($cards[4] == "11" || $cards[4] == "24" || $cards[4] == "37" || $cards[4] == "50")) ||
    
    (($cards[1] == "11" || $cards[1] == "24" || $cards[1] == "37" || $cards[1] == "50") && 
    ($cards[2] == "11" || $cards[2] == "24" || $cards[2] == "37" || $cards[2] == "50")) ||
    
    (($cards[1] == "11" || $cards[1] == "24" || $cards[1] == "37" || $cards[1] == "50") && 
    ($cards[3] == "11" || $cards[3] == "24" || $cards[3] == "37" || $cards[3] == "50")) ||
    
    (($cards[1] == "11" || $cards[1] == "24" || $cards[1] == "37" || $cards[1] == "50") && 
    ($cards[4] == "11" || $cards[4] == "24" || $cards[4] == "37" || $cards[4] == "50")) ||
    
    (($cards[1] == "11" || $cards[1] == "24" || $cards[1] == "37" || $cards[1] == "50") && 
    ($cards[2] == "11" || $cards[2] == "24" || $cards[2] == "37" || $cards[2] == "50")) ||
    
    (($cards[2] == "11" || $cards[2] == "24" || $cards[2] == "37" || $cards[2] == "50") && 
    ($cards[3] == "11" || $cards[3] == "24" || $cards[3] == "37" || $cards[3] == "50")) ||
    
    (($cards[2] == "11" || $cards[2] == "24" || $cards[2] == "37" || $cards[2] == "50") && 
    ($cards[4] == "11" || $cards[4] == "24" || $cards[4] == "37" || $cards[4] == "50")) ||

    (($cards[3] == "11" || $cards[3] == "24" || $cards[3] == "37" || $cards[3] == "50") && 
    ($cards[4] == "11" || $cards[4] == "24" || $cards[4] == "37" || $cards[4] == "50")) ||


    (($cards[0] == "12" || $cards[0] == "25" || $cards[0] == "38" || $cards[0] == "51") && //KINGS
    ($cards[1] == "12" || $cards[1] == "25" || $cards[1] == "38" || $cards[1] == "51")) ||
    
    (($cards[0] == "12" || $cards[0] == "25" || $cards[0] == "38" || $cards[0] == "51") && 
    ($cards[2] == "12" || $cards[2] == "25" || $cards[2] == "38" || $cards[2] == "51")) ||
    
    (($cards[0] == "12" || $cards[0] == "25" || $cards[0] == "38" || $cards[0] == "51") && 
    ($cards[3] == "12" || $cards[3] == "25" || $cards[3] == "38" || $cards[3] == "51")) ||
    
    (($cards[0] == "12" || $cards[0] == "25" || $cards[0] == "38" || $cards[0] == "51") && 
    ($cards[4] == "12" || $cards[4] == "25" || $cards[4] == "38" || $cards[4] == "51")) ||
    
    (($cards[1] == "12" || $cards[1] == "25" || $cards[1] == "38" || $cards[1] == "51") && 
    ($cards[2] == "12" || $cards[2] == "25" || $cards[2] == "38" || $cards[2] == "51")) ||
    
    (($cards[1] == "12" || $cards[1] == "25" || $cards[1] == "38" || $cards[1] == "51") && 
    ($cards[3] == "12" || $cards[3] == "25" || $cards[3] == "38" || $cards[3] == "51")) ||
    
    (($cards[1] == "12" || $cards[1] == "25" || $cards[1] == "38" || $cards[1] == "51") && 
    ($cards[4] == "12" || $cards[4] == "25" || $cards[4] == "38" || $cards[4] == "51")) ||
    
    (($cards[1] == "12" || $cards[1] == "25" || $cards[1] == "38" || $cards[1] == "51") && 
    ($cards[2] == "12" || $cards[2] == "25" || $cards[2] == "38" || $cards[2] == "51")) ||
    
    (($cards[2] == "12" || $cards[2] == "25" || $cards[2] == "38" || $cards[2] == "51") && 
    ($cards[3] == "12" || $cards[3] == "25" || $cards[3] == "38" || $cards[3] == "51")) ||
    
    (($cards[2] == "12" || $cards[2] == "25" || $cards[2] == "38" || $cards[2] == "51") && 
    ($cards[4] == "12" || $cards[4] == "25" || $cards[4] == "38" || $cards[4] == "51")) ||

    (($cards[3] == "12" || $cards[3] == "25" || $cards[3] == "38" || $cards[3] == "51") && 
    ($cards[4] == "12" || $cards[4] == "25" || $cards[4] == "38" || $cards[4] == "51")) ||


    (($cards[0] == "0" || $cards[0] == "13" || $cards[0] == "26" || $cards[0] == "39") && //ACES
    ($cards[1] == "0" || $cards[1] == "13" || $cards[1] == "26" || $cards[1] == "39")) ||
    
    (($cards[0] == "0" || $cards[0] == "13" || $cards[0] == "26" || $cards[0] == "39") && 
    ($cards[2] == "0" || $cards[2] == "13" || $cards[2] == "26" || $cards[2] == "39")) ||
    
    (($cards[0] == "0" || $cards[0] == "13" || $cards[0] == "26" || $cards[0] == "39") && 
    ($cards[3] == "0" || $cards[3] == "13" || $cards[3] == "26" || $cards[3] == "39")) ||
    
    (($cards[0] == "0" || $cards[0] == "13" || $cards[0] == "26" || $cards[0] == "39") && 
    ($cards[4] == "0" || $cards[4] == "13" || $cards[4] == "26" || $cards[4] == "39")) ||

    (($cards[1] == "0" || $cards[1] == "13" || $cards[1] == "26" || $cards[1] == "39") && 
    ($cards[2] == "0" || $cards[2] == "13" || $cards[2] == "26" || $cards[2] == "39")) ||
    
    (($cards[1] == "0" || $cards[1] == "13" || $cards[1] == "26" || $cards[1] == "39") && 
    ($cards[3] == "0" || $cards[3] == "13" || $cards[3] == "26" || $cards[3] == "39")) ||
    
    (($cards[1] == "0" || $cards[1] == "13" || $cards[1] == "26" || $cards[1] == "39") && 
    ($cards[4] == "0" || $cards[4] == "13" || $cards[4] == "26" || $cards[4] == "39")) ||
    
    (($cards[1] == "0" || $cards[1] == "13" || $cards[1] == "26" || $cards[1] == "39") && 
    ($cards[2] == "0" || $cards[2] == "13" || $cards[2] == "26" || $cards[2] == "39")) ||
    
    (($cards[2] == "0" || $cards[2] == "13" || $cards[2] == "26" || $cards[2] == "39") && 
    ($cards[3] == "0" || $cards[3] == "13" || $cards[3] == "26" || $cards[3] == "39")) ||

    (($cards[3] == "0" || $cards[3] == "13" || $cards[3] == "26" || $cards[3] == "39") && 
    ($cards[4] == "0" || $cards[4] == "13" || $cards[4] == "26" || $cards[4] == "39")) ||
    
    (($cards[2] == "0" || $cards[2] == "13" || $cards[2] == "26" || $cards[2] == "39") && 
    ($cards[4] == "0" || $cards[4] == "13" || $cards[4] == "26" || $cards[4] == "39")))//jacks or better
   {
       $win = "JACKS OR BETTER";
   }
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


//default, 

$sql = "INSERT INTO session (id, time, card_1, card_2, card_3,
card_4, card_5, card_6, card_7, card_8, card_9, card_10, win, complete)
VALUES (default," . $time_stamp . "," . $card_1
  . "," . $card_2 . "," . $card_3 . "," . $card_4 . "," .
   $card_5 . "," . $card_6 . "," . $card_7 . "," .
   $card_8 . "," . $card_9 . "," . $card_10 . ",'" . $win . "', 0)";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}



/*
$sql = "SELECT id FROM session WHERE time=" . $time_stamp;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["card_1"] . "<br>";
    echo $row["id"];
  }
} else {
  //echo "0 results";
}
*/

$id = mysqli_insert_id($conn);

echo " ";
echo $id;
echo " ";
echo $win;

//increase progressive by 1% meter

/*
Update MyTable
Set IDColumn = IDColumn + 1
*/

$sql = "UPDATE jackpot SET progressive=progressive +" . 0.0125;

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>