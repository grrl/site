<?php

//check if balance
session_start();

$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}

$bet_value;

foreach ($_POST as $param_name => $param_val) {

    
    switch ($param_name){

        case "bet":
        $bet_value = $param_val;
        break;
        default:
        break;
    }

    //echo "Param: $param_name; Value: $param_val<br />\n";
}

//echo $bet_value;
//echo " ";

switch ($bet_value){

  case "1":
  $bet_value = 0.4;
  break;
  case "2":
  $bet_value = 0.8;
  break;
  case "3":
  $bet_value = 1.2;
  break;
  case "4":
  $bet_value = 1.6;
  break;
  case "5":
  $bet_value = 2.0;
  break;
  case "6":
  $bet_value = 2.4;
  break;
  case "7":
  $bet_value = 2.8;
  break;
  case "8":
  $bet_value = 3.2;
  break;
}

//echo $bet_value;
//echo " ";

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

$balance = "balance";

$sql="SELECT " . $balance . " FROM users WHERE username='$user'";

//echo $sql;
$result = mysqli_query($conn, $sql);

//$number;

$row = $result->fetch_row();

$balance = $row[0];


//echo $number;
//echo " ";

if ($bet_value > 0 && $balance >= $bet_value){

$sql = "UPDATE users SET balance=balance -" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="SELECT " . $balance . " FROM users WHERE username='$user'";

//echo $sql;
$result = mysqli_query($conn, $sql);

$newbalance;

$row = $result->fetch_row();

$newbalance = $row[0];

//update points with bet

$sql = "UPDATE users SET loyalty=loyalty +" . $bet_value/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update session points with bet size

$sql = "UPDATE users SET points=points +" . $bet_value/4 . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET coinin=coinin +" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss -" . $bet_value . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

//update points end

//$conn->close();

$seed = (random_int(0, 1)); //999

//echo $seed;
//echo " ";
$date = new DateTimeImmutable();
//echo date_timestamp_get($date);
$time_stamp = date_timestamp_get($date);

//multiplier
$win_multiplier = 0;

$bonus = false;

//$array = array(60, 0, 0, 53, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50);

if ($seed == 0 || $seed == 1){ //bonus
//activate bonus to ask client choice
//draw wins for choices 0,1,2,3,4,5
//then send win back to user
  $array = array(80, 0, 0, 49, 205, 270);
  $win_multiplier = "BONUS";
  $bonus = true;

}
else if ($seed >= 2 && $seed <= 45){ //2

  $win_multiplier = 2;

  $array = array(80, 0, 0, 51, 63, 60, -55, 40, 55, 40, 75, 130);
  //generate array path to return

}
else if ($seed >=46 && $seed <= 317){ //1.1

  $win_multiplier = 1.1;
  //generate array path to return

  $route = (random_int(0, 1));

  if ($route == 0){
  //choose between one array
  $array = array(80, 0, 0, 51, 63, 60, -85, 81, 60, 50, 45, 80);
  }
  else if ($route == 1) {
  $array = array(80, 0, 0, 51, 63, 60, -55, 40, 55, 40, -55, 30, 80, 100);
  }

}
else if ($seed >= 318 && $seed <= 771){ // 1.05

  $win_multiplier = 1.05;
  //generate array path to return
  $array = array(63, 0, 0, 51, -65, 55, 55, 40, -55, 40, 55, 50, 53, 90);

}
else if ($seed >= 772 && $seed <= 999){ //0.3

  $win_multiplier = 0.3;
  $array = array(0, 50, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50);
  //generate array path to return

}

//echo $win_multiplier;
//echo " ";

if ($win_multiplier == "BONUS"){
//draw jackpot seed

$jackpotseed = (random_int(0, 999));

$opal = "opal";
$ruby = "ruby";
$emerald = "emerald";
$sapphire = "sapphire";
$diamond = "diamond";

$jackpotwin = 0;
$jackpotname;

$creditwin = 0;

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

$progressives = 1;
switch ($bet_value){
  case 0.4:
  $progressives = 1;
  break; 
  case 0.8:
  $progressives = 2;
  break; 
  case 1.2:
  $progressives = 3;
  break;     
  case 1.6:
  $progressives = 4;
  break;  
  case 2.0:
  $progressives = 5;
  break;
  case 2.4:
  $progressives = 6;
  break;
  case 2.8:
  $progressives = 7;
  break;
  case 3.2:
  $progressives = 8;
  break;  
}

if ($jackpotseed == 0){

  //diamond
  $jackpotwin = $diamond;
  $jackpotname = "diamond";

  $deck = array(
  
    20,
    80, 
    20,
    40, 
    20, 
    80,
    20,
    40
  );

  //draw credit win for each pick
  $seed_1 = (random_int(0, 7));
  $credit_1 = $deck[$seed_1];
  unset($deck[$seed_1]);
  array_unshift($deck);
  
  $seed_2 = (random_int(0, 6));
  $credit_2 = $deck[$seed_2];
  unset($deck[$seed_2]);
  array_unshift($deck);
  
  $seed_3 = (random_int(0, 5));
  $credit_3 = $deck[$seed_3];
  unset($deck[$seed_3]);
  array_unshift($deck);
  
  $seed_4 = (random_int(0, 4));
  $credit_4 = $deck[$seed_4];
  unset($deck[$seed_4]);
  array_unshift($deck);
  
  $seed_5 = (random_int(0, 3));
  $credit_5 = $deck[$seed_5];
  unset($deck[$seed_5]);
  array_unshift($deck);

  $seed_6 = (random_int(0, 2));
  $credit_6 = $deck[$seed_6];
  unset($deck[$seed_6]);
  array_unshift($deck);
  
  $seed_7 = (random_int(0, 1));
  $credit_7 = $deck[$seed_7];
  unset($deck[$seed_7]);
  array_unshift($deck);
  
  $credit_8 = $deck[0];

  $pick_1 = 0;
  $pick_2 = 0;
  $pick_3 = 0;
  $pick_4 = 0;
  $pick_5 = 0;
  $pick_6 = 0;
  $pick_7 = 0;
  $pick_8 = 0;

  $deck = array(
  
    1,
    2, 
    3,
    4, 
    5, 
    6,
    7,
    8
  );

  if ($progressives == 8){

    $pick_1 = $diamond;
    $pick_2 = $diamond;
    $pick_3 = $diamond;
    $pick_4 = $diamond;
    $pick_5 = $diamond;
    $pick_6 = $diamond;
    $pick_7 = $diamond;
    $pick_8 = $diamond;
  }
  else {

    $i = 7;
    $j = 0;
    while ($j < $progressives){

      $progressiveseed = (random_int(0, $i));
      $progressivenumber = $deck[$progressiveseed];
      unset($deck[$progressiveseed]);
      array_unshift($deck);

      if ($progressivenumber == 1)
        $pick_1 = $diamond;
      else if ($progressivenumber == 2)
        $pick_2 = $diamond;
      else if ($progressivenumber == 3)
        $pick_3 = $diamond;
      else if ($progressivenumber == 4)
        $pick_4 = $diamond;
      else if ($progressivenumber == 5)
        $pick_5 = $diamond;
      else if ($progressivenumber == 6)
        $pick_6 = $diamond;
      else if ($progressivenumber == 7)
        $pick_7 = $diamond;
      else if ($progressivenumber == 8)
        $pick_8 = $diamond;

      $i--;
      $j++;
    }
  }

  //next draw positions for jackpot based by bet level
  //if max bet all positions have a jackpot
  $sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, jackpotseed, balance,
  pick_1, pick_1_credits, pick_2, pick_2_credits, pick_3, pick_3_credits, pick_4,
  pick_4_credits, pick_5, pick_5_credits, pick_6, pick_6_credits, pick_7, pick_7_credits, pick_8, pick_8_credits, complete)
  VALUES (default," . $time_stamp . "," . $user . "," . $seed .
  "," . $bonus . "," . $bet_value . ",". $jackpotseed . "," . $newbalance . ",".
  $pick_1 . "," . $credit_1 . ",". $pick_2 . "," . $credit_2 . ",". 
  $pick_3 . "," . $credit_3 . ",". $pick_4 . "," . $credit_4 . ",". 
  $pick_5 . "," . $credit_5 . ",". $pick_6 . "," . $credit_6 . ",". 
  $pick_7 . "," . $credit_7 . ",". $pick_8 . "," . $credit_8 . ", 0)";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }


}
else if ($jackpotseed >= 1 && $jackpotseed <= 624){
  //opal
  $jackpotwin = $opal;
  $jackpotname = "opal";

  //draw credit win for each pick

  $deck = array(
  
    0.05,
    0.2,
    0.1, //  [0]
    0.05, //  [1]
    0.05, //  [2]
    0.2, //  [3]
    0.1,
    0.05 //  [4]
  );

  //draw credit win for each pick
  $seed_1 = (random_int(0, 7));
  $credit_1 = $deck[$seed_1];
  unset($deck[$seed_1]);
  array_unshift($deck);
  
  $seed_2 = (random_int(0, 6));
  $credit_2 = $deck[$seed_2];
  unset($deck[$seed_2]);
  array_unshift($deck);
  
  $seed_3 = (random_int(0, 5));
  $credit_3 = $deck[$seed_3];
  unset($deck[$seed_3]);
  array_unshift($deck);
  
  $seed_4 = (random_int(0, 4));
  $credit_4 = $deck[$seed_4];
  unset($deck[$seed_4]);
  array_unshift($deck);
  
  $seed_5 = (random_int(0, 3));
  $credit_5 = $deck[$seed_5];
  unset($deck[$seed_5]);
  array_unshift($deck);

  $seed_6 = (random_int(0, 2));
  $credit_6 = $deck[$seed_6];
  unset($deck[$seed_6]);
  array_unshift($deck);
  
  $seed_7 = (random_int(0, 1));
  $credit_7 = $deck[$seed_7];
  unset($deck[$seed_7]);
  array_unshift($deck);
  
  $credit_8 = $deck[0];

  $pick_1 = 0;
  $pick_2 = 0;
  $pick_3 = 0;
  $pick_4 = 0;
  $pick_5 = 0;
  $pick_6 = 0;
  $pick_7 = 0;
  $pick_8 = 0;

  $deck = array(
  
    1,
    2, 
    3,
    4, 
    5, 
    6,
    7,
    8
  );

  if ($progressives == 8){

    $pick_1 = $opal;
    $pick_2 = $opal;
    $pick_3 = $opal;
    $pick_4 = $opal;
    $pick_5 = $opal;
    $pick_6 = $opal;
    $pick_7 = $opal;
    $pick_8 = $opal;
  }
  else {

    $i = 7;
    $j = 0;
    while ($j < $progressives){

      $progressiveseed = (random_int(0, $i));
      $progressivenumber = $deck[$progressiveseed];
      unset($deck[$progressiveseed]);
      array_unshift($deck);

      if ($progressivenumber == 1)
        $pick_1 = $opal;
      else if ($progressivenumber == 2)
        $pick_2 = $opal;
      else if ($progressivenumber == 3)
        $pick_3 = $opal;
      else if ($progressivenumber == 4)
        $pick_4 = $opal;
      else if ($progressivenumber == 5)
        $pick_5 = $opal;
      else if ($progressivenumber == 6)
        $pick_6 = $opal;
      else if ($progressivenumber == 7)
        $pick_7 = $opal;
      else if ($progressivenumber == 8)
        $pick_8 = $opal;

      $i--;
      $j++;
    }
  }

  //next draw positions for jackpot based by bet level
  //if max bet all positions have a jackpot
  $sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, jackpotseed, balance,
  pick_1, pick_1_credits, pick_2, pick_2_credits, pick_3, pick_3_credits, pick_4,
  pick_4_credits, pick_5, pick_5_credits, pick_6, pick_6_credits, pick_7, pick_7_credits, pick_8, pick_8_credits, complete)
  VALUES (default," . $time_stamp . "," . $user . "," . $seed .
  "," . $bonus . "," . $bet_value . ",". $jackpotseed . "," . $newbalance . ",".
  $pick_1 . "," . $credit_1 . ",". $pick_2 . "," . $credit_2 . ",". 
  $pick_3 . "," . $credit_3 . ",". $pick_4 . "," . $credit_4 . ",". 
  $pick_5 . "," . $credit_5 . ",". $pick_6 . "," . $credit_6 . ",". 
  $pick_7 . "," . $credit_7 . ",". $pick_8 . "," . $credit_8 . ", 0)";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
else if ($jackpotseed >= 625 && $jackpotseed <= 749){
  //ruby
  $jackpotwin = $ruby;
  $jackpotname = "ruby";
  //draw credit win for each pick

  $deck = array(
  
    0.1,
    0.1, //  [0]
    0.2,
    0.4, //  [1]
    0.2,
    0.1, //  [2]
    0.1, //  [3]
    0.4 //  [4]
  );

  //draw credit win for each pick
  $seed_1 = (random_int(0, 7));
  $credit_1 = $deck[$seed_1];
  unset($deck[$seed_1]);
  array_unshift($deck);
  
  $seed_2 = (random_int(0, 6));
  $credit_2 = $deck[$seed_2];
  unset($deck[$seed_2]);
  array_unshift($deck);
  
  $seed_3 = (random_int(0, 5));
  $credit_3 = $deck[$seed_3];
  unset($deck[$seed_3]);
  array_unshift($deck);
  
  $seed_4 = (random_int(0, 4));
  $credit_4 = $deck[$seed_4];
  unset($deck[$seed_4]);
  array_unshift($deck);
  
  $seed_5 = (random_int(0, 3));
  $credit_5 = $deck[$seed_5];
  unset($deck[$seed_5]);
  array_unshift($deck);

  $seed_6 = (random_int(0, 2));
  $credit_6 = $deck[$seed_6];
  unset($deck[$seed_6]);
  array_unshift($deck);
  
  $seed_7 = (random_int(0, 1));
  $credit_7 = $deck[$seed_7];
  unset($deck[$seed_7]);
  array_unshift($deck);
  
  $credit_8 = $deck[0];

  $pick_1 = 0;
  $pick_2 = 0;
  $pick_3 = 0;
  $pick_4 = 0;
  $pick_5 = 0;
  $pick_6 = 0;
  $pick_7 = 0;
  $pick_8 = 0;

  $deck = array(
  
    1,
    2, 
    3,
    4, 
    5, 
    6,
    7,
    8
  );

  if ($progressives == 8){

    $pick_1 = $ruby;
    $pick_2 = $ruby;
    $pick_3 = $ruby;
    $pick_4 = $ruby;
    $pick_5 = $ruby;
    $pick_6 = $ruby;
    $pick_7 = $ruby;
    $pick_8 = $ruby;
  }
  else {

    $i = 7;
    $j = 0;
    while ($j < $progressives){

      $progressiveseed = (random_int(0, $i));
      $progressivenumber = $deck[$progressiveseed];
      unset($deck[$progressiveseed]);
      array_unshift($deck);

      if ($progressivenumber == 1)
        $pick_1 = $ruby;
      else if ($progressivenumber == 2)
        $pick_2 = $ruby;
      else if ($progressivenumber == 3)
        $pick_3 = $ruby;
      else if ($progressivenumber == 4)
        $pick_4 = $ruby;
      else if ($progressivenumber == 5)
        $pick_5 = $ruby;
      else if ($progressivenumber == 6)
        $pick_6 = $ruby;
      else if ($progressivenumber == 7)
        $pick_7 = $ruby;
      else if ($progressivenumber == 8)
        $pick_8 = $ruby;

      $i--;
      $j++;
    }
  }

  //next draw positions for jackpot based by bet level
  //if max bet all positions have a jackpot
  $sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, jackpotseed, balance,
  pick_1, pick_1_credits, pick_2, pick_2_credits, pick_3, pick_3_credits, pick_4,
  pick_4_credits, pick_5, pick_5_credits, pick_6, pick_6_credits, pick_7, pick_7_credits, pick_8, pick_8_credits, complete)
  VALUES (default," . $time_stamp . "," . $user . "," . $seed .
  "," . $bonus . "," . $bet_value . ",". $jackpotseed . "," . $newbalance . ",".
  $pick_1 . "," . $credit_1 . ",". $pick_2 . "," . $credit_2 . ",". 
  $pick_3 . "," . $credit_3 . ",". $pick_4 . "," . $credit_4 . ",". 
  $pick_5 . "," . $credit_5 . ",". $pick_6 . "," . $credit_6 . ",". 
  $pick_7 . "," . $credit_7 . ",". $pick_8 . "," . $credit_8 . ", 0)";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
else if ($jackpotseed >= 750 && $jackpotseed <= 874){
  //emerald
  $jackpotwin = $emerald;
  $jackpotname = "emerald";
  //draw credit win for each pick

  $deck = array(
  
    0.2,
    0.2,
    0.4, //  [0]
    0.8, //  [1]
    0.2, //  [2]
    0.4,
    0.2, //  [3]
    0.8 //  [4]
  );

  //draw credit win for each pick
  $seed_1 = (random_int(0, 7));
  $credit_1 = $deck[$seed_1];
  unset($deck[$seed_1]);
  array_unshift($deck);
  
  $seed_2 = (random_int(0, 6));
  $credit_2 = $deck[$seed_2];
  unset($deck[$seed_2]);
  array_unshift($deck);
  
  $seed_3 = (random_int(0, 5));
  $credit_3 = $deck[$seed_3];
  unset($deck[$seed_3]);
  array_unshift($deck);
  
  $seed_4 = (random_int(0, 4));
  $credit_4 = $deck[$seed_4];
  unset($deck[$seed_4]);
  array_unshift($deck);
  
  $seed_5 = (random_int(0, 3));
  $credit_5 = $deck[$seed_5];
  unset($deck[$seed_5]);
  array_unshift($deck);

  $seed_6 = (random_int(0, 2));
  $credit_6 = $deck[$seed_6];
  unset($deck[$seed_6]);
  array_unshift($deck);
  
  $seed_7 = (random_int(0, 1));
  $credit_7 = $deck[$seed_7];
  unset($deck[$seed_7]);
  array_unshift($deck);
  
  $credit_8 = $deck[0];

  $pick_1 = 0;
  $pick_2 = 0;
  $pick_3 = 0;
  $pick_4 = 0;
  $pick_5 = 0;
  $pick_6 = 0;
  $pick_7 = 0;
  $pick_8 = 0;

  $deck = array(
  
    1,
    2, 
    3,
    4, 
    5, 
    6,
    7,
    8
  );

  if ($progressives == 8){

    $pick_1 = $emerald;
    $pick_2 = $emerald;
    $pick_3 = $emerald;
    $pick_4 = $emerald;
    $pick_5 = $emerald;
    $pick_6 = $emerald;
    $pick_7 = $emerald;
    $pick_8 = $emerald;
  }
  else {

    $i = 7;
    $j = 0;
    while ($j < $progressives){

      $progressiveseed = (random_int(0, $i));
      $progressivenumber = $deck[$progressiveseed];
      unset($deck[$progressiveseed]);
      array_unshift($deck);

      if ($progressivenumber == 1)
        $pick_1 = $emerald;
      else if ($progressivenumber == 2)
        $pick_2 = $emerald;
      else if ($progressivenumber == 3)
        $pick_3 = $emerald;
      else if ($progressivenumber == 4)
        $pick_4 = $emerald;
      else if ($progressivenumber == 5)
        $pick_5 = $emerald;
      else if ($progressivenumber == 6)
        $pick_6 = $emerald;
      else if ($progressivenumber == 7)
        $pick_7 = $emerald;
      else if ($progressivenumber == 8)
        $pick_8 = $emerald;

      $i--;
      $j++;
    }
  }

  //next draw positions for jackpot based by bet level
  //if max bet all positions have a jackpot
  $sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, jackpotseed, balance,
  pick_1, pick_1_credits, pick_2, pick_2_credits, pick_3, pick_3_credits, pick_4,
  pick_4_credits, pick_5, pick_5_credits, pick_6, pick_6_credits, pick_7, pick_7_credits, pick_8, pick_8_credits, complete)
  VALUES (default," . $time_stamp . "," . $user . "," . $seed .
  "," . $bonus . "," . $bet_value . ",". $jackpotseed . "," . $newbalance . ",".
  $pick_1 . "," . $credit_1 . ",". $pick_2 . "," . $credit_2 . ",". 
  $pick_3 . "," . $credit_3 . ",". $pick_4 . "," . $credit_4 . ",". 
  $pick_5 . "," . $credit_5 . ",". $pick_6 . "," . $credit_6 . ",". 
  $pick_7 . "," . $credit_7 . ",". $pick_8 . "," . $credit_8 . ", 0)";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
else if ($jackpotseed >= 875 && $jackpotseed <= 999){
  //sapphire
  $jackpotwin = $sapphire;
  $jackpotname = "sapphire";
  //draw credit win for each pick

  $deck = array(
  
    2,
    8, //  [0]
    2,
    4, //  [1]
    2, //  [2]
    8,
    4, //  [3]
    2 //  [4]
  );

  //draw credit win for each pick
  $seed_1 = (random_int(0, 7));
  $credit_1 = $deck[$seed_1];
  unset($deck[$seed_1]);
  array_unshift($deck);
  
  $seed_2 = (random_int(0, 6));
  $credit_2 = $deck[$seed_2];
  unset($deck[$seed_2]);
  array_unshift($deck);
  
  $seed_3 = (random_int(0, 5));
  $credit_3 = $deck[$seed_3];
  unset($deck[$seed_3]);
  array_unshift($deck);
  
  $seed_4 = (random_int(0, 4));
  $credit_4 = $deck[$seed_4];
  unset($deck[$seed_4]);
  array_unshift($deck);
  
  $seed_5 = (random_int(0, 3));
  $credit_5 = $deck[$seed_5];
  unset($deck[$seed_5]);
  array_unshift($deck);

  $seed_6 = (random_int(0, 2));
  $credit_6 = $deck[$seed_6];
  unset($deck[$seed_6]);
  array_unshift($deck);
  
  $seed_7 = (random_int(0, 1));
  $credit_7 = $deck[$seed_7];
  unset($deck[$seed_7]);
  array_unshift($deck);
  
  $credit_8 = $deck[0];

  $pick_1 = 0;
  $pick_2 = 0;
  $pick_3 = 0;
  $pick_4 = 0;
  $pick_5 = 0;
  $pick_6 = 0;
  $pick_7 = 0;
  $pick_8 = 0;

  $deck = array(
  
    1,
    2, 
    3,
    4, 
    5, 
    6,
    7,
    8
  );

  if ($progressives == 8){

    $pick_1 = $sapphire;
    $pick_2 = $sapphire;
    $pick_3 = $sapphire;
    $pick_4 = $sapphire;
    $pick_5 = $sapphire;
    $pick_6 = $sapphire;
    $pick_7 = $sapphire;
    $pick_8 = $sapphire;
  }
  else {

    $i = 7;
    $j = 0;
    while ($j < $progressives){

      $progressiveseed = (random_int(0, $i));
      $progressivenumber = $deck[$progressiveseed];
      unset($deck[$progressiveseed]);
      array_unshift($deck);

      if ($progressivenumber == 1)
        $pick_1 = $sapphire;
      else if ($progressivenumber == 2)
        $pick_2 = $sapphire;
      else if ($progressivenumber == 3)
        $pick_3 = $sapphire;
      else if ($progressivenumber == 4)
        $pick_4 = $sapphire;
      else if ($progressivenumber == 5)
        $pick_5 = $sapphire;
      else if ($progressivenumber == 6)
        $pick_6 = $sapphire;
      else if ($progressivenumber == 7)
        $pick_7 = $sapphire;
      else if ($progressivenumber == 8)
        $pick_8 = $sapphire;

      $i--;
      $j++;
    }
  }

  //next draw positions for jackpot based by bet level
  //if max bet all positions have a jackpot
  $sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, jackpotseed, balance,
  pick_1, pick_1_credits, pick_2, pick_2_credits, pick_3, pick_3_credits, pick_4,
  pick_4_credits, pick_5, pick_5_credits, pick_6, pick_6_credits, pick_7, pick_7_credits, pick_8, pick_8_credits, complete)
  VALUES (default," . $time_stamp . "," . $user . "," . $seed .
  "," . $bonus . "," . $bet_value . ",". $jackpotseed . "," . $newbalance . ",".
  $pick_1 . "," . $credit_1 . ",". $pick_2 . "," . $credit_2 . ",". 
  $pick_3 . "," . $credit_3 . ",". $pick_4 . "," . $credit_4 . ",". 
  $pick_5 . "," . $credit_5 . ",". $pick_6 . "," . $credit_6 . ",". 
  $pick_7 . "," . $credit_7 . ",". $pick_8 . "," . $credit_8 . ", 0)";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

}


$results_array = array();

array_push($results_array, $win_multiplier);
//array_push($results_array, $id);
array_push($results_array, $array);

array_push($results_array, $jackpotname);

echo json_encode($results_array);
//echo $win_amount;
echo " ";


} else {

//update seed and win multiplier with bet to sql database
//plinko coinin <= bet amount
//cointout <= bet amount * bet_multiplier
//increment cycle
//plinkosession
$win_amount = $win_multiplier * $bet_value;

//pick_1, pick_2, pick_3, pick_4, pick_5, pick_6, pick_7, pick_8
$sql = "INSERT INTO plinkosession (id, time, username, seed, bonus, bet, multiplier, win, balance, complete) 
VALUES (default," . $time_stamp . "," . $user . "," . $seed .
"," . $bonus . "," . $bet_value . ",". $win_multiplier . "," .  $win_amount . ",". $newbalance . ", 1)";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$results_array = array();

array_push($results_array, $win_amount);
//array_push($results_array, $id);
array_push($results_array, $array);

echo json_encode($results_array);
//echo $win_amount;
echo " ";

$opal_multiplier = floatval($bet_value) * 0.01 * 0.1;
$ruby_multiplier = floatval($bet_value) * 0.01 * 0.1;
$emerald_multiplier = floatval($bet_value) * 0.01 * 0.2;
$sapphire_multiplier = floatval($bet_value) * 0.01 * 0.2;
$diamond_multiplier = floatval($bet_value) * 0.01 * 0.4;

$sql = "UPDATE plinko SET coinin=coinin +" . $bet_value . ", coinout=coinout +" . $win_amount . ", cycle=cycle +" . 1 .
", opal=opal +" . $opal_multiplier . ", ruby=ruby +" . $ruby_multiplier . ", emerald=emerald +" . $emerald_multiplier .
", sapphire=sapphire +" . $sapphire_multiplier . ", diamond=diamond +" . $diamond_multiplier;

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE plinko SET payback=coinout/coinin";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET balance=balance +" . $win_amount . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE users SET winloss=winloss +" . $win_amount . " WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}



}

$conn->close();

}
?>