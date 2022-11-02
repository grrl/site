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


/*
if ($card0 == 0 && $card1 == 9 && $card2 == 10 && $card3 == 11 && $card4 == 12 ||
$card0 == 13 && $card1 == 22 && $card2 == 23 && $card3 == 24 && $card4 == 25 ||
$card0 == 26 && $card1 == 35 && $card2 == 36 && $card3 == 37 && $card4 == 38 ||
$card0 == 39 && $card1 == 48 && $card2 == 49 && $card3 == 50 && $card4 == 51){

      $win = "ROYAL FLUSH";

}
*/

$three_of_kind = FALSE;
$four_of_kind = FALSE;
$two_pair = 0;
$full_house = FALSE;

for ($i = 0; $i < 12; $i++) { //go through all 13 values
  //cards[$i] is card
    
  $of_kind_counter = 0;

  for ($j = 0; $j < 5; $j++) { //go through selected cards

      if ($cards[$j] == $i || $cards[$j] == $i + 13 ||
          $cards[$j] == $i + 26 || $cards[$j] == $i + 39){
          
          $of_kind_counter++;
      }

  }

  if ($of_kind_counter == 4){
      $four_of_kind = TRUE;
      break;
  }
  else if ($three_of_kind == TRUE && $two_pair == 2){
      $full_house == TRUE;
      break;
  }
  else if ($of_kind_counter == 3){
      $three_of_kind = TRUE;
  }
  else if ($of_kind_counter == 2/* && $two_pair != 2*/){
      $two_pair++;
  }
}

if ($cards[0] == "0" && $cards[1] == "9" && $cards[2] == "10" && $cards[3] == "11" && $cards[4] == "12" ||
    $cards[0] == "13" && $cards[1] == "22" && $cards[2] == "23" && $cards[3] == "24" && $cards[4] == "25" ||
    $cards[0] == "26" && $cards[1] == "35" && $cards[2] == "36" && $cards[3] == "37" && $cards[4] == "38" ||
    $cards[0] == '39' && $cards[1] == '48' && $cards[2] == '49' && $cards[3] == '50' && $cards[4] == '51'){

      $win = "ROYAL FLUSH";

} else if (
    $cards[0] == "0" && $cards[1] == "1" && $cards[2] == "2" && $cards[3] == "3" && $cards[4] == "4" ||
    $cards[0] == "1" && $cards[1] == "2" && $cards[2] == "3" && $cards[3] == "4" && $cards[4] == "5" ||
    $cards[0] == "2" && $cards[1] == "3" && $cards[2] == "4" && $cards[3] == "5" && $cards[4] == "6" ||
    $cards[0] == "3" && $cards[1] == "4" && $cards[2] == "5" && $cards[3] == "6" && $cards[4] == "7" ||
    $cards[0] == "4" && $cards[1] == "5" && $cards[2] == "6" && $cards[3] == "7" && $cards[4] == "8" ||
    $cards[0] == "5" && $cards[1] == "6" && $cards[2] == "7" && $cards[3] == "8" && $cards[4] == "9" ||
    $cards[0] == "6" && $cards[1] == "7" && $cards[2] == "8" && $cards[3] == "9" && $cards[4] == "10" ||
    $cards[0] == "7" && $cards[1] == "8" && $cards[2] == "9" && $cards[3] == "10" && $cards[4] == "11" ||
    $cards[0] == "8" && $cards[1] == "9" && $cards[2] == "10" && $cards[3] == "11" && $cards[4] == "12" ||
    
    $cards[0] == "13" && $cards[1] == "14" && $cards[2] == "15" && $cards[3] == "16" && $cards[4] == "17" ||
    $cards[0] == "14" && $cards[1] == "15" && $cards[2] == "16" && $cards[3] == "17" && $cards[4] == "18" ||
    $cards[0] == "15" && $cards[1] == "16" && $cards[2] == "17" && $cards[3] == "18" && $cards[4] == "19" ||
    $cards[0] == "16" && $cards[1] == "17" && $cards[2] == "18" && $cards[3] == "19" && $cards[4] == "20" ||
    $cards[0] == "17" && $cards[1] == "18" && $cards[2] == "19" && $cards[3] == "20" && $cards[4] == "21" ||
    $cards[0] == "18" && $cards[1] == "19" && $cards[2] == "20" && $cards[3] == "21" && $cards[4] == "22" ||
    $cards[0] == "19" && $cards[1] == "20" && $cards[2] == "21" && $cards[3] == "22" && $cards[4] == "23" ||
    $cards[0] == "20" && $cards[1] == "21" && $cards[2] == "22" && $cards[3] == "23" && $cards[4] == "24" ||
    $cards[0] == "21" && $cards[1] == "22" && $cards[2] == "23" && $cards[3] == "24" && $cards[4] == "25" ||
    
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
    $cards[0] == "47" && $cards[1] == "48" && $cards[2] == "49" && $cards[3] == "50" && $cards[4] == "51"){
  //straight flush

      $win == "STRAIGHT FLUSH";

 } else if ($cards[0] == "0" && $cards[1] == "13" && $cards[2] == "26" && $cards[3] == "39" || //last card random
          $cards[0] == "0" && $cards[2] == "13" && $cards[3] == "26" && $cards[4] == "39" || //2nd card random
          $cards[0] == "0" && $cards[1] == "13" && $cards[3] == "26" && $cards[4] == "39" || //3rd card random
          $cards[0] == "0" && $cards[1] == "13" && $cards[2] == "26" && $cards[4] == "39") //4th card random
{

  $win == "4 ACES";
}

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

  $win = "3 OF KIND";
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