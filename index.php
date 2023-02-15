<?php
session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");
if(!isset($_SESSION['username'])){
    die(header("location: 404.php"));
}

?>
<html>
<head>
<style>
    * {
      box-sizing: border-box;
    }
    
    body{
      background-color: "#1f1e1e";
    }
    
    .column {
      float: left;
      width: 20.00%;
      padding: 5px;
    }
    
    /*Clearfix (clear floats)*/ 
    .row::after {
      content: "";
      clear: both;
      display: table;
    }
    
    table {
        border-collapse: separate;
        /*border-spacing: 0 15px;*/
      }
      th {
        /*background-color: gray;*/
        color: white;
      }
      th,
      td {
        width: 150px;
        /*text-align: right;*/
        /*border: 1px solid black;*/
        padding: 5px;
      }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

let timestamp = ""; 
var cash = false;

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

//let jackpot_value;
function refresh_jackpot() {

$.ajax({
      type: "get",
      url: "jackpot.php",
      data: 
      {  
        //'progressive' : jackpot
      },
      cache:false,
      success: function (data) 
      {
         //alert('Data Send');
         //$('#msg').html(html);
         //let text = this.data;
         console.log("data is " + data);
         //console.log("typeof" + typeof data);
         //jackpot_value = data;
         //console.log("jackpot_value is " + jackpot_value);

          document.getElementById("jackpot").innerHTML = "$ " + addCommas(data);

      }
      
  });

  $.ajax({
      type: "get",
      url: "credits.php",
      data: 
      {  
        //'progressive' : jackpot
      },
      cache:false,
      success: function (data) 
      {
        let text = this.data;
        console.log("data is " + data);
        let mydata = JSON.parse(data);

        if (cash == true){
          document.getElementById("balance").value = mydata.balance;
         }
         else{
          document.getElementById("balance").value = mydata.balance * 4;
         } 

         let mytext = '<?php echo $_SESSION['username'] ?>';
        //document.getElementById("loyalty").innerHTML = mytext + "you have " + mydata.loyalty + " points";
        document.getElementById("loyalty").innerHTML = mytext + ", you have " + Math.floor(mydata.loyalty) + " points";

        document.getElementById("sessionpoints").innerHTML = "Session points: " + Math.floor(mydata.points);

      }
  });
      
}

function get_card(card){

var my_card = "";
switch (card) {
case '0':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/3/36/Playing_card_club_A.svg";
  break;
case '1':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/f/f5/Playing_card_club_2.svg";
    break;
case '2':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/6/6b/Playing_card_club_3.svg";
    break;
case '3':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/3/3d/Playing_card_club_4.svg";

    break;         
case '4':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/50/Playing_card_club_5.svg";

  break;
case '5':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/a/a0/Playing_card_club_6.svg";

    break;
case '6':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/4/4b/Playing_card_club_7.svg";

    break;
case '7':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/e/eb/Playing_card_club_8.svg";

    break;
case '8':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/27/Playing_card_club_9.svg";

    break;
case '9':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/3/3e/Playing_card_club_10.svg";

    break;
case '10':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/b/b7/Playing_card_club_J.svg";

  break;
case '11':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/f/f2/Playing_card_club_Q.svg";

    break;
case '12':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/22/Playing_card_club_K.svg";

  break;
case '13':
   my_card = "https://upload.wikimedia.org/wikipedia/commons/d/d3/Playing_card_diamond_A.svg";

  break;
case '14':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/59/Playing_card_diamond_2.svg";

    break;                  
case '15':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/8/82/Playing_card_diamond_3.svg";

  break;
case '16':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/20/Playing_card_diamond_4.svg";

    break;
case '17':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/f/fd/Playing_card_diamond_5.svg";

    break;
case '18':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/8/80/Playing_card_diamond_6.svg";

    break;
case '19':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/e/e6/Playing_card_diamond_7.svg";

    break;
case '20':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/7/78/Playing_card_diamond_8.svg";

    break;
case '21':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/9/9e/Playing_card_diamond_9.svg";

  break;
case '22':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/3/34/Playing_card_diamond_10.svg";

    break;
case '23':
   my_card = "https://upload.wikimedia.org/wikipedia/commons/a/af/Playing_card_diamond_J.svg";

    break;
case '24':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/0/0b/Playing_card_diamond_Q.svg";

    break;         
case '25':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/7/78/Playing_card_diamond_K.svg";

  break;
case '26':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/57/Playing_card_heart_A.svg";

    break;
case '27':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/d/d5/Playing_card_heart_2.svg";

    break;
case '28':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/b/b6/Playing_card_heart_3.svg";

    break;
case '29':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/a/a2/Playing_card_heart_4.svg";

    break;
case '30':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/52/Playing_card_heart_5.svg";

    break;
case '31':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/c/cd/Playing_card_heart_6.svg";

  break;
case '32':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/9/94/Playing_card_heart_7.svg";

    break;
case '33':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/50/Playing_card_heart_8.svg";

    break;
case '34':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/50/Playing_card_heart_9.svg";

    break;         
case '35':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/9/98/Playing_card_heart_10.svg";

  break;
case '36':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/4/46/Playing_card_heart_J.svg";

    break;
case '37':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/7/72/Playing_card_heart_Q.svg";

    break;
case '38':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/d/dc/Playing_card_heart_K.svg";

    break;
case '39':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/25/Playing_card_spade_A.svg";

    break;
case '40':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/f/f2/Playing_card_spade_2.svg";

    break;
case '41':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/52/Playing_card_spade_3.svg";

  break;
case '42':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/2c/Playing_card_spade_4.svg";

    break;
case '43':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/9/94/Playing_card_spade_5.svg";

    break;
case '44':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/d/d2/Playing_card_spade_6.svg";

    break;         
case '45':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/6/66/Playing_card_spade_7.svg";

  break;
case '46':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/2/21/Playing_card_spade_8.svg";

    break;
case '47':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/e/e0/Playing_card_spade_9.svg";

    break;
case '48':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/8/87/Playing_card_spade_10.svg";

    break;
case '49':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/b/bd/Playing_card_spade_J.svg";

    break;
case '50':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/5/51/Playing_card_spade_Q.svg";

    break;
case '51':
  my_card = "https://upload.wikimedia.org/wikipedia/commons/9/9f/Playing_card_spade_K.svg";

  break;
}
return my_card;
}

var cards_dealt = false;

function refresh_everything(){

$.ajax({
    type: "get",
    url: "gamestate.php",
    data: 
    {  
      //'progressive' : jackpot
    },
    cache:false,
    success: function (data) 
    {
       //alert('Data Send');
       //$('#msg').html(html);
       //let text = this.data;
      let text = this.data;

      //console.log("data is " + data)

      let mydata = "";
      try {
        mydata = JSON.parse(data);
        } catch (exceptionVar) {
        console.log(exceptionVar);
      }

      if (mydata != ""/*mydata.card_1 != ""*/){
        console.log("data is " + data);

      timestamp = mydata.id;

      document.getElementById("box1").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
      document.getElementById("box2").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
      document.getElementById("box3").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
      document.getElementById("box4").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
      document.getElementById("box5").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

      console.log("card " + mydata.card_1);

      sleep(game_speed).then(() => {
      // Do something after the sleep!

        document.getElementById("box1").src = get_card(mydata.card_1);
      }); 
      sleep(game_speed * 2).then(() => {

      document.getElementById("box2").src = get_card(mydata.card_2);
      }); 
      sleep(game_speed * 3).then(() => {
      document.getElementById("box3").src = get_card(mydata.card_3);
      });
      sleep(game_speed * 4).then(() => {
      document.getElementById("box4").src = get_card(mydata.card_4);
      });
      sleep(game_speed * 5).then(() => {
      document.getElementById("box5").src = get_card(mydata.card_5);
      });
      cards_dealt = true;
      document.getElementById("play_button").value = "DRAW";

      }
    }
});  

$.ajax({
    type: "get",
    url: "jackpot.php",
    data: 
    {  
      //'progressive' : jackpot
    },
    cache:false,
    success: function (data) 
    {
       //alert('Data Send');
       //$('#msg').html(html);
       //let text = this.data;
       console.log("data is " + data);
       //console.log("typeof" + typeof data);
       //jackpot_value = data;
       //console.log("jackpot_value is " + jackpot_value);

      document.getElementById("jackpot").innerHTML = "$ " + addCommas(data);

    }
    
});

$.ajax({
    type: "get",
    url: "credits.php",
    data: 
    {  
      //'progressive' : jackpot
    },
    cache:false,
    success: function (data) 
    {
      let text = this.data;
      console.log("data is " + data);
      let mydata = JSON.parse(data);

      if (cash == true){
        document.getElementById("balance").value = mydata.balance;
       }
       else{
        document.getElementById("balance").value = mydata.balance * 4;
       }
       let mytext = '<?php echo $_SESSION['username'] ?>';
       //document.getElementById("loyalty").innerHTML = mytext + "you have " + mydata.loyalty + " points";
       document.getElementById("loyalty").innerHTML = mytext + ", you have " + Math.floor(mydata.loyalty) + " points";

       document.getElementById("sessionpoints").innerHTML = "Session points: " + Math.floor(mydata.points);
    }
});

}

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

var hold_1 = false;
var hold_2 = false;
var hold_3 = false;
var hold_4 = false;
var hold_5 = false;

function change_cash(){

  if (!cash){

    document.getElementById("balance").value =  document.getElementById("balance").value / 4;
    document.getElementById("credit_cash").innerHTML =  "CASH $";

    cash = true;
  }
  else{

    document.getElementById("balance").value = document.getElementById("balance").value * 4;
    document.getElementById("credit_cash").innerHTML =  "CREDIT";

    cash = false;
  }
}

function change_cards(str){

if (cards_dealt == false)
  return;

var time = timestamp;
//var box1 = $('#box1').val();
//var box2 = $('#box2').val();
//var box3 = $('#box3').val();
//var box4 = $('#box4').val();
//var box5 = $('#box5').val();

//document.getElementById("box1").value = $('#box1').is(':checked');
//document.getElementById("box2").value = $('#box2').is(':checked');
//document.getElementById("box3").value = $('#box3').is(':checked');
//document.getElementById("box4").value = $('#box4').is(':checked');
//document.getElementById("box5").value = $('#box5').is(':checked');

//console.log("box1 value " + $('#box1').is(':checked'));

//console.log("is checked" + card1);

    //var descr=document.getElementById('descr').value;
    
    $.ajax({
    type: "post",
    url: "result.php",
    data: 
    {  
       'id' : time,
       'box1' : hold_1,
       'box2' : hold_2,
       'box3' : hold_3,
       'box4' : hold_4,
       'box5' : hold_5
    },
    cache:false,
    success: function (data) 
    {
       //alert('Data Send');
       //$('#msg').html(html);
       let text = this.data;
       console.log("data is " + data);
       let myArray = data.split(" ");
       let size = myArray.length;
      //timestamp = myArray[0];
      let card_1 = myArray[0];
      console.log(card_1);
      let card_2 = myArray[1];
      console.log(card_2);
      let card_3 = myArray[2];
      console.log(card_3);
      let card_4 = myArray[3];
      console.log(card_4);
      let card_5 = myArray[4];
      console.log(card_5);
      //let win = myArray[5];

      let my_string = "";
      for (let i = 5; i< size; i++){
        if (i == size - 1)
          my_string += myArray[i];
        else
          my_string += myArray[i] + " ";
      }

      console.log("win is " + my_string);

      var winamount = "";

      if (cash == true){
        switch (my_string){

          case "ROYAL FLUSH":
            winamount = document.getElementById("jackpot").value;
          break;
          case "STRAIGHT FLUSH":
            winamount = "62.25";
          break;
          case "4 OF KIND":
            winamount = "31.25";
          break;
          case "FULL HOUSE":
            winamount = "8.75";
          break;
          case "FLUSH":
          winamount = "6.25";
          break;
          case "STRAIGHT":
          winamount = "5.00";
          break;
          case "THREE OF KIND":
          winamount = "3.75";
          break;
          case "TWO PAIR":
          winamount = "2.5";
          break;
          case "JACKS OR BETTER":
          winamount = "1.25";
          break;
        }
      }
      else {
        switch (my_string){

          case "ROYAL FLUSH":
            winamount = document.getElementById("jackpot").value * 4;
          break;
          case "STRAIGHT FLUSH":
            winamount = "250";
          break;
          case "4 OF KIND":
            winamount = "125";
          break;
          case "FULL HOUSE":
            winamount = "35";
          break;
          case "FLUSH":
          winamount = "25";
          break;
          case "STRAIGHT":
          winamount = "20";
          break;
          case "THREE OF KIND":
          winamount = "15";
          break;
          case "TWO PAIR":
          winamount = "10";
          break;
          case "JACKS OR BETTER":
          winamount = "5";
          break;
        }
      }

      console.log("winamount " + winamount)

      if (winamount != ""){
        console.log("printing winamount ");

        if (cash == true){
          document.getElementById("winlabel").innerHTML = "WIN $ " + winamount;
        }
        else{
          document.getElementById("winlabel").innerHTML = "WIN " + winamount;
        }
      }
 

      if (my_string != "")
        document.getElementById("txtHint").innerHTML = my_string;
      else
        document.getElementById("txtHint").innerHTML = "";

        var blinkme = "";
        switch (my_string){

          case "ROYAL FLUSH":
          blinkme = "rf";
          break;
          case "STRAIGHT FLUSH":
          blinkme = "sf";
          break;
          case "FOUR OF KIND":
          blinkme = "4ok";
          break;
          case "FULL HOUSE":
          blinkme = "fh";
          break;
          case "FLUSH":
          blinkme = "fl";
          break;
          case "STRAIGHT":
          blinkme = "st";
          break;
          case "THREE OF KIND":
          blinkme = "3ok";
          break;
          case "TWO PAIR":
          blinkme = "tp";
          break;
          case "JACKS OR BETTER":
          blinkme = "jb";
          break;
        }

        if (blinkme != ""){
          blink_win(blinkme);
        }

    //var checked_1 = document.getElementById("box1").checked;
    //var checked_2 = document.getElementById("box2").checked;
    //var checked_3 = document.getElementById("box3").checked;
    //var checked_4 = document.getElementById("box4").checked;
    //var checked_5 = document.getElementById("box5").checked;

    if (hold_1)
      document.getElementById("box1").src = get_card(card_1);
    else {
      document.getElementById("box1").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

    sleep(game_speed).then(() => {
      document.getElementById("box1").src = get_card(card_1);
    });
    }

    if (hold_2)
      document.getElementById("box2").src = get_card(card_2);
    else {
      document.getElementById("box2").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

        if (hold_1){
        sleep(game_speed).then(() => {
          document.getElementById("box2").src = get_card(card_2);
        });
        }
        else{
          sleep(game_speed * 2).then(() => {
          document.getElementById("box2").src = get_card(card_2);
        });
        }
    }

    if (hold_3)
      document.getElementById("box3").src = get_card(card_3);
    else {
      document.getElementById("box3").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

      if (hold_1 && hold_2){
        sleep(game_speed).then(() => {
          document.getElementById("box3").src = get_card(card_3);
        });
      }
      else if (hold_1 || hold_2){
          sleep(game_speed * 2).then(() => {
          document.getElementById("box3").src = get_card(card_3);
        });
      
      } else{
          sleep(game_speed * 3).then(() => {
          document.getElementById("box3").src = get_card(card_3);
        });
      }
    }
    if (hold_4)
      document.getElementById("box4").src = get_card(card_4);
    else{
      document.getElementById("box4").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

      if (hold_1 && hold_2 && hold_3){
        sleep(game_speed).then(() => {
          document.getElementById("box4").src = get_card(card_4);
        });
      }
       else if (hold_1 && hold_2 || hold_1 && hold_3 || hold_2 && hold_3) {
          sleep(game_speed * 2).then(() => {
          document.getElementById("box4").src = get_card(card_4);
        });
      }
      else if (hold_1 || hold_2 || hold_3){
          sleep(game_speed * 3).then(() => {
          document.getElementById("box4").src = get_card(card_4);
        });
      
      } else{
        sleep(game_speed * 4).then(() => {
          document.getElementById("box4").src = get_card(card_4);
        });
      }

    }

    if (hold_5)
      document.getElementById("box5").src = get_card(card_5);
    else{

      document.getElementById("box5").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

      if (hold_1 && hold_2 && hold_3 && hold_4){
        sleep(game_speed).then(() => {
          document.getElementById("box5").src = get_card(card_5);
        });
      } else if (hold_1 && hold_2 && hold_3 || 
                hold_1 && hold_3 && hold_4 || 
                hold_2 && hold_3 && hold_4 ||
                 hold_1 && hold_2 && hold_4) {
          sleep(game_speed * 2).then(() => {
          document.getElementById("box5").src = get_card(card_5);
        });
      }
      else if (hold_1 && hold_2 || hold_2 && hold_3 || hold_3 && hold_4 ||
               hold_1 && hold_3 || hold_1 && hold_4 || hold_2 && hold_4){
          sleep(game_speed * 4).then(() => {
          document.getElementById("box5").src = get_card(card_5);
        });
      } 
      else if (hold_1 || hold_2 || hold_3 || hold_4){
          sleep(game_speed * 4).then(() => {
          document.getElementById("box5").src = get_card(card_5);
        });
      } 
      else{
        sleep(game_speed * 5).then(() => {
          document.getElementById("box5").src = get_card(card_5);
        });
      }
    }

      /*
      document.getElementById("card1").innerHTML = card_1;
      document.getElementById("card2").innerHTML = card_2;
      document.getElementById("card3").innerHTML = card_3;
      document.getElementById("card4").innerHTML = card_4;
      document.getElementById("card5").innerHTML = card_5;
      */
       //$("#result").html(data);
       console.log("data sent ok");
       console.log("cleanup");

       /*
       document.getElementById("box1").checked = false;
       document.getElementById("box2").checked = false;
       document.getElementById("box3").checked = false;
       document.getElementById("box4").checked = false;
       document.getElementById("box5").checked = false;
       document.getElementById("box1").disabled = true;
       document.getElementById("box2").disabled = true;
       document.getElementById("box3").disabled = true;
       document.getElementById("box4").disabled = true;
       document.getElementById("box5").disabled = true;
       */
       cards_dealt = false;
       document.getElementById("play_button").value = "DEAL";
       //document.getElementById("txtHint").innerHTML = "GAME OVER!";
       document.getElementById("gamestate").innerHTML = "GAME OVER!";
       refresh_jackpot();
    }
    
});


return false;
/*
console.log("now in get request");
if (str.length == 0) {
document.getElementById("txtHint").innerHTML = "";
return;
} else {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

    document.getElementById("txtHint").innerHTML = this.responseText;

  }
};
xmlhttp.open("POST", "gethint2.php?q=" + str, true);
xmlhttp.send();
}
*/
}

game_speed = 100;

function hold(str){

  if (cards_dealt){
    
    switch (str){
      case 1:
      hold_1 = !hold_1;
      if (hold_1)
        document.getElementById("hold_card_1").innerHTML = "HELD";
      else
        document.getElementById("hold_card_1").innerHTML = "";
      break;
      case 2:
      hold_2 = !hold_2;
      if (hold_2)
        document.getElementById("hold_card_2").innerHTML = "HELD";
      else
        document.getElementById("hold_card_2").innerHTML = "";
      break;
      case 3:
      hold_3 = !hold_3;
      if (hold_3)
        document.getElementById("hold_card_3").innerHTML = "HELD";
      else
        document.getElementById("hold_card_3").innerHTML = "";
      break;
      case 4:
      hold_4 = !hold_4;
      if (hold_4)
        document.getElementById("hold_card_4").innerHTML = "HELD";
      else
        document.getElementById("hold_card_4").innerHTML = "";
      break;
      case 5:
      hold_5 = !hold_5;
      if (hold_5)
        document.getElementById("hold_card_5").innerHTML = "HELD";
      else
        document.getElementById("hold_card_5").innerHTML = "";
      break;
    }


  }
}

function change_speed(){

    if (game_speed == 100){
      game_speed = 50;
      document.getElementById("speed").value = "SPEED >>>";
    }
    else if (game_speed == 50){
      game_speed = 200;
      document.getElementById("speed").value = "SPEED >";
    }
    else if (game_speed == 200){
      game_speed = 100;
      document.getElementById("speed").value = "SPEED >>";
    }

}


var blink_white = true;
var game_start = false;
function blink_win(win) {    
  
  //  create a loop function
  var win_label = win;
  if (win != "jackpot")
    win_label = win + "l";
  var my_color = "#BFBFBF";//document.getElementById(win).style.color;
  var timer1 = setInterval(function() {   //  call a 3s setTimeout when the loop is called
    if (game_start == true/*document.getElementById("play_button").value != "DRAW"*/) {           //  if the counter < 10, call the loop function
      document.getElementById(win).style.color = my_color;
      console.log("game_startc  " + game_start);
      game_start = false;
      clearTimeout(timer1);             //  ..  again which will trigger another
    }      

    console.log("blinking");
    console.log("game_start " + game_start);

    if (blink_white == true){

      document.getElementById(win).style.color = "white";
      document.getElementById(win_label).style.color = "white";
      blink_white = false;
    }
    else{

      document.getElementById(win).style.color = "#BFBFBF";
      document.getElementById(win_label).style.color = "#BFBFBF";
      blink_white = true;
    }
    //  ..  setTimeout()
  }, 1000);
  document.getElementById(win).style.color = my_color;

}


function showHint(str) {

  //document.getElementById("gamestate").innerHTML = "GOOD LUCK!";

  document.getElementById("rf").style.color = "#BFBFBF";
  document.getElementById("sf").style.color = "#BFBFBF";
  document.getElementById("4ok").style.color = "#BFBFBF";
  document.getElementById("fh").style.color = "#BFBFBF";
  document.getElementById("fl").style.color = "#BFBFBF";
  document.getElementById("st").style.color = "#BFBFBF";
  document.getElementById("3ok").style.color = "#BFBFBF";
  document.getElementById("tp").style.color = "#BFBFBF";
  document.getElementById("jb").style.color = "#BFBFBF";

  document.getElementById("jackpot").style.color = "#BFBFBF";
  document.getElementById("sfl").style.color = "#BFBFBF";
  document.getElementById("4okl").style.color = "#BFBFBF";
  document.getElementById("fhl").style.color = "#BFBFBF";
  document.getElementById("fll").style.color = "#BFBFBF";
  document.getElementById("stl").style.color = "#BFBFBF";
  document.getElementById("3okl").style.color = "#BFBFBF";
  document.getElementById("tpl").style.color = "#BFBFBF";
  document.getElementById("jbl").style.color = "#BFBFBF";
  
  if (cards_dealt == true){
      game_start = false;
      change_cards(str);
      refresh_jackpot();
      cards_dealt = false;
      return;
  }
  else{
    document.getElementById("hold_card_1").innerHTML = "";
    document.getElementById("hold_card_2").innerHTML = "";
    document.getElementById("hold_card_3").innerHTML = "";
    document.getElementById("hold_card_4").innerHTML = "";
    document.getElementById("hold_card_5").innerHTML = "";
    hold_1 = false;
    hold_2 = false;
    hold_3 = false;
    hold_4 = false;
    hold_5 = false;
  }

  if (cash == true){
    if (document.getElementById("balance").value < 1.25){
      return;
    }
    else{
      game_start = true;
      document.getElementById("balance").value = document.getElementById("balance").value - 1.25;
      document.getElementById("gamestate").innerHTML = "GOOD LUCK!";
      document.getElementById("winlabel").innerHTML = "";
    }
  }
  else{
    if (document.getElementById("balance").value < 5){
      return;
    }
    else {
      game_start = true;
      document.getElementById("balance").value = document.getElementById("balance").value - 5;
      document.getElementById("gamestate").innerHTML = "GOOD LUCK!";
      document.getElementById("winlabel").innerHTML = "";
    }
  }

  //refresh_jackpot();

  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        document.getElementById("txtHint").innerHTML = "";

        //document.getElementById("box1").disabled = false;
        //document.getElementById("box2").disabled = false;
        //document.getElementById("box3").disabled = false;
        //document.getElementById("box4").disabled = false;
        //document.getElementById("box5").disabled = false;

        let text = this.responseText;
        const myArray = text.split(" ");
        let size = myArray.length;
        let card_1 = myArray[0];
        let card_2 = myArray[1];
        let card_3 = myArray[2];
        let card_4 = myArray[3];
        let card_5 = myArray[4];
        timestamp = myArray[5];
        console.log("id is " + timestamp);


        let my_string = "";
        for (let i = 6; i< size; i++){
            if (i == size - 1)
              my_string += myArray[i];
            else
              my_string += myArray[i] + " ";
        }
        //let win = myArray[6];
        //console.log(my_string);

        console.log("win is " + my_string)

        var blinkme = "";
        switch (my_string){

          case "ROYAL FLUSH":
          blinkme = "rf";
          break;
          case "STRAIGHT FLUSH":
          blinkme = "sf";
          break;
          case "FOUR OF KIND":
          blinkme = "4ok";
          break;
          case "FULL HOUSE":
          blinkme = "fh";
          break;
          case "FLUSH":
          blinkme = "fl";
          break;
          case "STRAIGHT":
          blinkme = "st";
          break;
          case "THREE OF KIND":
          blinkme = "3ok";
          break;
          case "TWO PAIR":
          blinkme = "tp";
          break;
          case "JACKS OR BETTER":
          blinkme = "jb";
          break;
        }

        if (blinkme != ""){
          blink_win(blinkme);
        }

        if (my_string != "")
          document.getElementById("txtHint").innerHTML = my_string;

        //document.getElementById("card1").innerHTML = card_1 + " " + card_2 + " " + card_3 + " " + card_4 + " " + card_5;

        //console.log(typeof card_1);
        //console.log(typeof card_2);
        //console.log(typeof card_3);
        //console.log(typeof card_4);
        //console.log(typeof card_5);

        console.log("getcard1 " + get_card(card_1));
        console.log("getcard2 " + get_card(card_2));
        console.log("getcard3 " + get_card(card_3));
        console.log("getcard4 " + get_card(card_4));
        console.log("getcard5 " + get_card(card_5));


        document.getElementById("box1").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
        document.getElementById("box2").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
        document.getElementById("box3").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
        document.getElementById("box4").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";
        document.getElementById("box5").src = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png";

        sleep(game_speed).then(() => {
        // Do something after the sleep!

          document.getElementById("box1").src = get_card(card_1);
        }); 
        sleep(game_speed * 2).then(() => {

        document.getElementById("box2").src = get_card(card_2);
        }); 
        sleep(game_speed * 3).then(() => {
        document.getElementById("box3").src = get_card(card_3);
        });
        sleep(game_speed * 4).then(() => {
        document.getElementById("box4").src = get_card(card_4);
        });
        sleep(game_speed * 5).then(() => {
        document.getElementById("box5").src = get_card(card_5);
        });
        cards_dealt = true;
        document.getElementById("play_button").value = "DRAW";
      }
    };
    xmlhttp.open("GET", "draw.php?q=" + str, true);
    xmlhttp.send();
    
  }
  
}

function myFunction() {
  console.log("toggled");
  window.alert("Malfunction voids all pays.");

}

window.onload = refresh_everything;

</script>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
<div class="container">
  <hgroup>
    <h1 class="site-title" style="text-align: center; color: white; -webkit-text-stroke: 2px black;  font-weight: bold;">Bonus Poker</h1><br>
  </hgroup>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav center">
        <!--
        <li><a href="login.php">LogIN</a></li>
        <li><a href="register.php">SignUp</a></li>
        -->
        <li><a href="home.php">Home</a></li>
        <li><a href="account.php">Account</a></li>
        <li><a href="plinko.php">Plinko</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div style="
        margin-left: 250px;    
    ">  
  
  <table>
    <div>
    <tr>
      <td id="rf" style="color:#BFBFBF;">ROYAL FLUSH</td>
      <td id="jackpot" style="text-align: right;color:#BFBFBF;">4000</td>
    </tr>
    <tr>
      <td id="sf" style="color:#BFBFBF;">STRAIGHT FLUSH</td>
      <td id="sfl" style="text-align: right;color:#BFBFBF;">250</td>
    </tr>
    <tr>
      <td id="4ok" style="color:#BFBFBF;">4 OF KIND</td>
      <td id="4okl" style="text-align: right;color:#BFBFBF;">125</td>
    </tr>
    <tr>
      <td id="fh" style="color:#BFBFBF;">FULL HOUSE</td>
      <td id="fhl" style="text-align: right;color:#BFBFBF;">35</td>
    </tr>
    <tr>
      <td id="fl" style="color:#BFBFBF;">FLUSH</td>
      <td id="fll" style="text-align: right;color:#BFBFBF;">25</td>
    </tr>
    <tr>
      <td id="st" style="color:#BFBFBF;">STRAIGHT</td>
      <td id="stl" style="text-align: right;color:#BFBFBF;">20</td>
    </tr>
    <tr>
      <td id="3ok" style="color:#BFBFBF;">3 OF KIND</td>
      <td id="3okl" style="text-align: right;color:#BFBFBF;">15</td>
    </tr>
    <tr>
      <td id="tp" style="color:#BFBFBF;">TWO PAIR</td>
      <td id="tpl" style="text-align: right;color:#BFBFBF;">10</td>
    </tr>
    <tr>
      <td id="jb" style="color:#BFBFBF;">JACKS OR BETTER</td>
      <td id="jbl" style="text-align: right;color:#BFBFBF;">5</td>
    </tr>
  </div>
</table>

<!--showHint(this.value)
<form action="">
  <input type="button" name="button1"
  class="button" value="DEAL" onclick="showHint(this.value)"/>
</form>
-->
<table style="height: 25px">
<tr>
  <th>
  </th>
  <th>
  </th>
  <th>
  <label><span id="txtHint" style="color:white;white-space:nowrap;"></span></label>
  </th>
  <th>
  </th>
  <th>
  </th>
  <th>
  </th>
  </tr>
</table>
<table style="height: 40px">
  <tr>
    <th>
      <label id="hold_card_1" style="color: white; padding-left: 25px;"></label>
    </th>
    <th>
      <label id="hold_card_2" style="color: white; padding-left: 25px"></label>
    </th>
  <th>
    <label id="hold_card_3" style="color: white; padding-left: 25px"></label>
  </th>
  <th>
    <label id="hold_card_4" style="color: white; padding-left: 25px"></label>

  </th>
  <th>
    <label id="hold_card_5" style="color: white; padding-left: 25px"></label>

  </th>
  </tr>
</table>

<table>
  <tr>
    <th>
    <input type="image" id="box1" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" onclick="hold(1)" width="100" height="100" name="vehicle1" value="0">
    <label id="card1"></label><br>
    <!--<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage1" width="100" height="100"></img>-->
    </th>
    <th>
    <input type="image" id="box2" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" onclick="hold(2)" width="100" height="100" name="vehicle2" value="0">
    <label id="card2"></label><br>
  </th>
  <th>
    <input type="image" id="box3" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" onclick="hold(3)" width="100" height="100" name="vehicle3" value="0">
    <label id="card3"></label><br>
  </th>
  <th>
    <input type="image" id="box4" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" onclick="hold(4)" width="100" height="100" name="vehicle4" value="0">
    <label id="card4"></label><br>
  </th>
  <th>
    <input type="image" id="box5" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" onclick="hold(5)" width="100" height="100" name="vehicle5" value="0">
    <label id="card5"></label><br>
  </th>
  </tr>
</table>
<table>
  <tr>
    <th>
      <label id="winlabel" style="color:white;"></label>
    </th>
    <th>
  </th>
  <th>
  </th>
  <th>
  </th>
  <th>
    <label id="credit_cash">CREDIT</label>
    <input type="button" id="balance" onclick="change_cash()" value="" style="border:none;background-color:#1f1e1e;"/>
  </th>
  </tr>
</table>
<table>
  <tr>
    <th>
      <input type="button" name="button3"
      class="button" id="game_info" onclick="myFunction()" value="GAME INFO" style="background-color:#1f1e1e;" onclick=""/>
    </th>
    <th>
      <input type="button" name="button2"
      class="button" id="speed" value="SPEED >>" onclick="change_speed()"style="float:left;background-color:#1f1e1e;"/>      
    </th>
  <th>
  <span class="dot" style="color:white;padding-left:2px; padding-top:6px;height: 30px;
  width: 30px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;">25¢</span>
  </th>
  <th>
  </th>
  <th>
    <input type="button" name="button1"
    class="button" value="DEAL" id="play_button" style="float:right;background-color:#1f1e1e;" onclick="showHint(this.value)"/>    
  </th>
  </tr>
</table>
<br>
<table>
  <tr>
    <th>
      <p id="sessionpoints">Session points: 0</p>
    </th>
    <th>
    </th>
    <th>
    <p id ="loyalty" style="white-space:nowrap;">Points total:</p>
    </th>
    <th>
    </th>
    <th>
      <p id ="gamestate"></p>
    </th>
  </tr>
</table>
  <!--
  <div class="row">
    <div class="column">
      <input type="checkbox" id="box1" name="vehicle1" value="0">
      <label id="card1"></label><br>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage1" width="100" height="100"></img>
    </div>
    <div class="column">
      <input type="checkbox" id="box2" name="vehicle2" value="0">
      <label id="card2"></label><br>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage2" width="100" height="100"></img>    
    </div>
    <div class="column">
      <input type="checkbox" id="box3" name="vehicle3" value="0">
      <label id="card3"></label><br>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage3" width="100" height="100"></img>    
    </div>
    <div class="column">
      <input type="checkbox" id="box4" name="vehicle4" value="0">
      <label id="card4"></label><br>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage4" width="100" height="100"></img>
    </div>
    <div class="column">
      <input type="checkbox" id="box5" name="vehicle5" value="0">
      <label id="card5"></label><br>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Card_back_01.svg/703px-Card_back_01.svg.png" id="cardimage5" width="100" height="100"></img>
    </div>
  </div>
  -->
<!--<button onclick="change_cards(this.value)">DEAL</button>-->
<!--<button onclick="showHint(this.value)">DEAL</button>-->
<!--
<form action="">
  <input type="button" name="button2"
  class="button" id="speed" value="SPEED >>" onclick="change_speed()"style="float:left"/>
  <input type="button" name="button1"
  class="button" value="DEAL" style="float:right" onclick="showHint(this.value)"/>
</form>
-->
<!--<div id="result"></div>-->

<p>BONUS POKER</p>

</div>
  


</body>
</html>
