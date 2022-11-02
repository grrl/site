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
        case "id":
        $my_id = $param_val;
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


$sql = "SELECT " . $card1 . ", " . $card2 . ", " . $card3 . ", " . $card4 . ", " . $card5 ." FROM session WHERE id=" . $my_id;
//echo $sql;
$result = mysqli_query($conn, $sql);

$card_1_final;
$card_2_final;
$card_3_final;
$card_4_final;
$card_5_final;

/*
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo  $row[$card1]. " " . $row[$card2] .
    " " . $row[$card3] .  " " . $row[$card4] .  " " . $row[$card5];//."<br>"
    //echo $result;
  }
} else {
  //echo "0 results";
}
*/

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $card_1_final = $row[$card1];
    $card_2_final = $row[$card2];
    $card_3_final = $row[$card3];
    $card_4_final = $row[$card4];
    $card_5_final = $row[$card5];
    }
} else {
    //echo "0 results";
}

echo $card_1_final;
echo " ";
echo $card_2_final;
echo " "; 
echo $card_3_final;
echo " ";
echo $card_4_final;
echo " ";
echo $card_5_final;
echo " ";


$cards = array($card_1_final, $card_2_final, $card_3_final, $card_4_final, $card_5_final);

sort($cards);

$win = "";


//if contains 3 of them
// 0, 1, 13, 26, 29
// 0, 13, 26, 39


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
  else if ($of_kind_counter == 4){
      $four_of_kind = TRUE;
      break;
  }
  else if ($three_of_kind == TRUE && $two_pair == 2){
      $full_house == TRUE;
      //break;
  }
  else if ($of_kind_counter == 3){
      $three_of_kind = TRUE;
  }
  else if ($of_kind_counter == 2/* && $two_pair != 2*/){
      $two_pair++;
  }
}

/*
if ($four_aces == TRUE)
{ 
    $win == "4 ACES";
}
*/

if ($cards[0] == "0" && $cards[1] == "9" && $cards[2] == "10" && $cards[3] == "11" && $cards[4] == "12" ||
    $cards[0] == "13" && $cards[1] == "22" && $cards[2] == "23" && $cards[3] == "24" && $cards[4] == "25" ||
    $cards[0] == "26" && $cards[1] == "35" && $cards[2] == "36" && $cards[3] == "37" && $cards[4] == "38" ||
    $cards[0] == "39" && $cards[1] == "48" && $cards[2] == "49" && $cards[3] == "50" && $cards[4] == "51"){

      $win = "ROYAL FLUSH";

} else if (
    ($cards[0] == "0" && $cards[1] == "1" && $cards[2] == "2" && $cards[3] == "3" && $cards[4] == "4") ||
    ($cards[0] == "1" && $cards[1] == "2" && $cards[2] == "3" && $cards[3] == "4" && $cards[4] == "5") ||
    ($cards[0] == "2" && $cards[1] == "3" && $cards[2] == "4" && $cards[3] == "5" && $cards[4] == "6") ||
    ($cards[0] == "3" && $cards[1] == "4" && $cards[2] == "5" && $cards[3] == "6" && $cards[4] == "7") ||
    ($cards[0] == "4" && $cards[1] == "5" && $cards[2] == "6" && $cards[3] == "7" && $cards[4] == "8") ||
    ($cards[0] == "5" && $cards[1] == "6" && $cards[2] == "7" && $cards[3] == "8" && $cards[4] == "9") ||
    ($cards[0] == "6" && $cards[1] == "7" && $cards[2] == "8" && $cards[3] == "9" && $cards[4] == "10") ||
    ($cards[0] == "7" && $cards[1] == "8" && $cards[2] == "9" && $cards[3] == "10" && $cards[4] == "11") ||
    ($cards[0] == "8" && $cards[1] == "9" && $cards[2] == "10" && $cards[3] == "11" && $cards[4] == "12") ||
    
    ($cards[0] == "13" && $cards[1] == "14" && $cards[2] == "15" && $cards[3] == "16" && $cards[4] == "17") ||
    ($cards[0] == "14" && $cards[1] == "15" && $cards[2] == "16" && $cards[3] == "17" && $cards[4] == "18") ||
    ($cards[0] == "15" && $cards[1] == "16" && $cards[2] == "17" && $cards[3] == "18" && $cards[4] == "19") ||
    ($cards[0] == "16" && $cards[1] == "17" && $cards[2] == "18" && $cards[3] == "19" && $cards[4] == "20") ||
    ($cards[0] == "17" && $cards[1] == "18" && $cards[2] == "19" && $cards[3] == "20" && $cards[4] == "21") ||
    ($cards[0] == "18" && $cards[1] == "19" && $cards[2] == "20" && $cards[3] == "21" && $cards[4] == "22") ||
    ($cards[0] == "19" && $cards[1] == "20" && $cards[2] == "21" && $cards[3] == "22" && $cards[4] == "23") ||
    ($cards[0] == "20" && $cards[1] == "21" && $cards[2] == "22" && $cards[3] == "23" && $cards[4] == "24") ||
    ($cards[0] == 21 && $cards[1] == 22 && $cards[2] == 23 && $cards[3] == 24 && $cards[4] == 25) ||
    
    $cards[0] == "26" && $cards[1] == "27" && $cards[2] == "28" && $cards[3] == "29" && $cards[4] == "30" ||
    $cards[0] == "27" && $cards[1] == "28" && $cards[2] == "29" && $cards[3] == "30" && $cards[4] == "31" ||
    $cards[0] == "28" && $cards[1] == "29" && $cards[2] == "30" && $cards[3] == "31" && $cards[4] == "32" ||
    $cards[0] == "29" && $cards[1] == "30" && $cards[2] == "31" && $cards[3] == "32" && $cards[4] == "33" ||
    $cards[0] == "30" && $cards[1] == "31" && $cards[2] == "32" && $cards[3] == "33" && $cards[4] == "34" ||
    $cards[0] == "31" && $cards[1] == "32" && $cards[2] == "33" && $cards[3] == "34" && $cards[4] == "35" ||
    $cards[0] == "32" && $cards[1] == "33" && $cards[2] == "34" && $cards[3] == "35" && $cards[4] == "36" ||
    $cards[0] == "33" && $cards[1] == "34" && $cards[2] == "35" && $cards[3] == "36" && $cards[4] == "37" ||
    $cards[0] == "34" && $cards[1] == "35" && $cards[2] == "36" && $cards[3] == "37" && $cards[4] == "38" ||
    
    $cards[0] == "39" && $cards[1] == "40" && $cards[2] == "41" && $cards[3] == "42" && $cards[4] == "43" ||
    $cards[0] == "40" && $cards[1] == "41" && $cards[2] == "42" && $cards[3] == "42" && $cards[4] == "44" ||
    $cards[0] == "41" && $cards[1] == "42" && $cards[2] == "43" && $cards[3] == "44" && $cards[4] == "45" ||
    $cards[0] == "42" && $cards[1] == "43" && $cards[2] == "44" && $cards[3] == "45" && $cards[4] == "46" ||
    $cards[0] == "43" && $cards[1] == "44" && $cards[2] == "45" && $cards[3] == "46" && $cards[4] == "47" ||
    $cards[0] == "44" && $cards[1] == "45" && $cards[2] == "46" && $cards[3] == "47" && $cards[4] == "48" ||
    $cards[0] == "45" && $cards[1] == "46" && $cards[2] == "47" && $cards[3] == "48" && $cards[4] == "49" ||
    $cards[0] == "46" && $cards[1] == "47" && $cards[2] == "48" && $cards[3] == "49" && $cards[4] == "50" ||
    $cards[0] == "47" && $cards[1] == "48" && $cards[2] == "49" && $cards[3] == "50" && $cards[4] == "51")
{
  //straight flush

      $win == "STRAIGHT FLUSH";

 }
 /* else if ($cards[0] == "0" && $cards[1] == "13" && $cards[2] == "26" && $cards[3] == "39" || //last card random
          $cards[0] == "0" && $cards[2] == "13" && $cards[3] == "26" && $cards[4] == "39" || //2nd card random
          $cards[0] == "0" && $cards[1] == "13" && $cards[3] == "26" && $cards[4] == "39" || //3rd card random
          $cards[0] == "0" && $cards[1] == "13" && $cards[2] == "26" && $cards[4] == "39" ||
          $cards[1] == "0" && $cards[2] == "13" && $cards[3] == "26" && $cards[4] == "39"  ) //4th card random
//($four_aces == TRUE)
{ 
        $win == "4 ACES";
}*/
else if ($cards[0] == "1" && $cards[1] == "14" && $cards[2] == "27" && $cards[3] == "40" || //last card random
$cards[0] == "1" && $cards[2] == "14" && $cards[3] == "27" && $cards[4] == "40" || //2nd card random
$cards[0] == "1" && $cards[1] == "14" && $cards[3] == "27" && $cards[4] == "40" || //3rd card random
$cards[0] == "1" && $cards[1] == "14" && $cards[2] == "27" && $cards[4] == "40" || //4th card random
$cards[1] == "1" && $cards[2] == "14" && $cards[3] == "27" && $cards[4] == "40" || //first card random

$cards[0] == "2" && $cards[1] == "15" && $cards[2] == "28" && $cards[3] == "41" || //last card random
$cards[0] == "2" && $cards[2] == "15" && $cards[3] == "28" && $cards[4] == "41" || //2nd card random
$cards[0] == "2" && $cards[1] == "15" && $cards[3] == "28" && $cards[4] == "41" || //3rd card random
$cards[0] == "2" && $cards[1] == "15" && $cards[2] == "28" && $cards[4] == "41" || //4th card random
$cards[1] == "2" && $cards[2] == "15" && $cards[3] == "28" && $cards[4] == "41" || //first card random
          
$cards[0] == "3" && $cards[1] == "16" && $cards[2] == "29" && $cards[3] == "42" || //last card random
$cards[0] == "3" && $cards[2] == "16" && $cards[3] == "29" && $cards[4] == "42" || //2nd card random
$cards[0] == "3" && $cards[1] == "16" && $cards[3] == "29" && $cards[4] == "42" || //3rd card random
$cards[0] == "3" && $cards[1] == "16" && $cards[2] == "29" && $cards[4] == "42" || //4th card random
$cards[1] == "3" && $cards[2] == "16" && $cards[3] == "29" && $cards[4] == "42") //first card random) //2's 3's or 4's
{

  $win == "4 2s, 3s or 4s";
}
else if ($four_of_kind == TRUE){ //3 of kind

    $win = "4 OF KIND";
}
  else if ($full_house == TRUE){
  
    $win = "FULL HOUSE";
}
  else if ($three_of_kind == TRUE){
  
    $win = "FAULT IS HERE 3";
}
else if ($two_pair == 2){
    $win = "TWO PAIR";
}
else if ((($cards[0] == "10" || $cards[0] == "23" || $cards[0] == "36" || $cards[0] == "49") && //jacks
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
*/
echo $win;

//update database finished round and update win
//inser statement

/*
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
*/

$sql = "UPDATE session SET win='" . $win. "', complete=". 1 . ", res_1=". $card_1_final . ", res_2=" . $card_2_final . ", res_3=" . $card_3_final . ", res_4=" . $card_4_final . ", res_5=" . $card_5_final . " WHERE id=" . $my_id;

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


//if all checked get five first cards and check if won

//check if won return win and update to mysql and client

//update round played true


?>
