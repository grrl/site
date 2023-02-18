<?php
session_start();

//connect to database
//$db=mysqli_connect("localhost","root","","mysite");

//echo $_SESSION['username'];

if(!isset($_SESSION['username'])){
   die(header("location: 404.php"));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Plinko</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="plinko.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="plinko.css">
</head>
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
<script type="text/javascript" src="plinko.js"></script>
<script type="text/javascript">
//var path_array = [60, 0, 0, 53, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50];

//document.addEventListener('DOMContentLoaded', function() {
var canvas;
var ctx; 
document.addEventListener('DOMContentLoaded', function() {
  canvas = document.getElementById('mycanvas');
  ctx = canvas.getContext("2d"); //get the context

  ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas
 
  //plinko board
  ctx.fillStyle = "white";

  //line 1
  //l1_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l1_1.x, l1_1.y, l1_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l1_2
  ctx.beginPath();  
  ctx.arc(l1_2.x, l1_2.y, l1_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l1_3
  ctx.beginPath();  
  ctx.arc(l1_3.x, l1_3.y, l1_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 2
  //l2_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l2_1.x, l2_1.y, l2_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l2_2
  ctx.beginPath();  
  ctx.arc(l2_2.x, l2_2.y, l2_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l2_3
  ctx.beginPath();  
  ctx.arc(l2_3.x, l2_3.y, l2_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l2_4
  ctx.beginPath();  
  ctx.arc(l2_4.x, l2_4.y, l2_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 3
  //l3_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l3_1.x, l3_1.y, l3_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l3_2
  ctx.beginPath();  
  ctx.arc(l3_2.x, l3_2.y, l3_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l3_3
  ctx.beginPath();  
  ctx.arc(l3_3.x, l3_3.y, l3_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l3_4
  ctx.beginPath();  
  ctx.arc(l3_4.x, l3_4.y, l3_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l3_5
  ctx.beginPath();  
  ctx.arc(l3_5.x, l3_5.y, l3_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 4
  //l4_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l4_1.x, l4_1.y, l4_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l4_2
  ctx.beginPath();  
  ctx.arc(l4_2.x, l4_2.y, l4_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l4_3
  ctx.beginPath();  
  ctx.arc(l4_3.x, l4_3.y, l4_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l4_4
  ctx.beginPath();  
  ctx.arc(l4_4.x, l4_4.y, l4_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l4_5
  ctx.beginPath();  
  ctx.arc(l4_5.x, l4_5.y, l4_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l4_6
  ctx.beginPath();  
  ctx.arc(l4_6.x, l4_6.y, l4_6.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 5
  //l5_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l5_1.x, l5_1.y, l5_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_2
  ctx.beginPath();  
  ctx.arc(l5_2.x, l5_2.y, l5_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_3
  ctx.beginPath();  
  ctx.arc(l5_3.x, l5_3.y, l5_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_4
  ctx.beginPath();  
  ctx.arc(l5_4.x, l5_4.y, l5_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_5
  ctx.beginPath();  
  ctx.arc(l5_5.x, l5_5.y, l5_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_6
  ctx.beginPath();  
  ctx.arc(l5_6.x, l5_6.y, l5_6.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l5_7
  ctx.beginPath();  
  ctx.arc(l5_7.x, l5_7.y, l5_7.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 6
  //l6_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l6_1.x, l6_1.y, l6_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_2
  ctx.beginPath();  
  ctx.arc(l6_2.x, l6_2.y, l6_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_3
  ctx.beginPath();  
  ctx.arc(l6_3.x, l6_3.y, l6_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_4
  ctx.beginPath();  
  ctx.arc(l6_4.x, l6_4.y, l6_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_5
  ctx.beginPath();  
  ctx.arc(l6_5.x, l6_5.y, l6_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_6
  ctx.beginPath();  
  ctx.arc(l6_6.x, l6_6.y, l6_6.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_7
  ctx.beginPath();  
  ctx.arc(l6_7.x, l6_7.y, l6_7.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l6_8
  ctx.beginPath();  
  ctx.arc(l6_8.x, l6_8.y, l6_8.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 7
  //l7_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l7_1.x, l7_1.y, l7_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_2
  ctx.beginPath();  
  ctx.arc(l7_2.x, l7_2.y, l7_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_3
  ctx.beginPath();  
  ctx.arc(l7_3.x, l7_3.y, l7_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_4
  ctx.beginPath();  
  ctx.arc(l7_4.x, l7_4.y, l7_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_5
  ctx.beginPath();  
  ctx.arc(l7_5.x, l7_5.y, l7_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_6
  ctx.beginPath();  
  ctx.arc(l7_6.x, l7_6.y, l7_6.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_7
  ctx.beginPath();  
  ctx.arc(l7_7.x, l7_7.y, l7_7.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_8
  ctx.beginPath();  
  ctx.arc(l7_8.x, l7_8.y, l7_8.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l7_9
  ctx.beginPath();  
  ctx.arc(l7_9.x, l7_9.y, l7_9.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  //line 8
  //l8_1
  ctx.beginPath();  //draw the object c
  ctx.arc(l8_1.x, l8_1.y, l8_1.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_2
  ctx.beginPath();  
  ctx.arc(l8_2.x, l8_2.y, l8_2.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_3
  ctx.beginPath();  
  ctx.arc(l8_3.x, l8_3.y, l8_3.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_4
  ctx.beginPath();  
  ctx.arc(l8_4.x, l8_4.y, l8_4.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_5
  ctx.beginPath();  
  ctx.arc(l8_5.x, l8_5.y, l8_5.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_6
  ctx.beginPath();  
  ctx.arc(l8_6.x, l8_6.y, l8_6.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_7
  ctx.beginPath();  
  ctx.arc(l8_7.x, l8_7.y, l8_7.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_8
  ctx.beginPath();  
  ctx.arc(l8_8.x, l8_8.y, l8_8.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_9
  ctx.beginPath();  
  ctx.arc(l8_9.x, l8_9.y, l8_9.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();
  //l8_10
  ctx.beginPath();  
  ctx.arc(l8_10.x, l8_10.y, l8_10.r, 0, Math.PI*2);
  ctx.closePath();
  ctx.fill();

  ctx.fillStyle = "red";

  ctx.beginPath();
  ctx.fillRect(25, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "rgba(252, 94, 3, 1)";
  ctx.beginPath();
  ctx.fillRect(85, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "rgba(255, 157, 0, 1)";
  ctx.beginPath();
  ctx.fillRect(145, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "orange";
  ctx.beginPath();
  ctx.fillRect(206, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "rgba(255, 221, 0, 1)";
  ctx.beginPath();
  ctx.fillRect(265, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "orange";
  ctx.beginPath();
  ctx.fillRect(324, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "rgba(255, 157, 0, 1)";
  ctx.beginPath();
  ctx.fillRect(383, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "rgba(252, 94, 3, 1)";
  ctx.beginPath();
  ctx.fillRect(444, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "red";
  ctx.beginPath();
  ctx.fillRect(507, 325, 50, 20);
  ctx.closePath();

  ctx.fillStyle = "black";
  ctx.font = "bold 9pt Verdana";

  //first 1
  ctx.beginPath();
  ctx.fillText("BONUS", 26, 339);
  ctx.closePath();

  //left 2
  ctx.beginPath();
  ctx.fillText("2", 105, 339);
  ctx.closePath();

  //left 3
  ctx.beginPath();
  ctx.fillText("1.1", 160, 339);
  ctx.closePath();

  //left 4
  ctx.beginPath();
  ctx.fillText("1.05", 215, 339);
  ctx.closePath();

  //middle 5
  ctx.beginPath();
  ctx.fillText("0.3", 280, 339);
  ctx.closePath();

  //right 6
  ctx.beginPath();
  ctx.fillText("1.05", 335, 339);
  ctx.closePath();

  //right 7
  ctx.beginPath();
  ctx.fillText("1.1", 395, 339);
  ctx.closePath();
  
  //right 8
  ctx.beginPath();
  ctx.fillText("2", 460, 339);
  ctx.closePath();

  //last 9
  ctx.beginPath();
  ctx.fillText("BONUS", 508, 339);
  ctx.closePath();
});

var drawball = true;

//ball
var c = {  //create an object to draw
  x:250,  //x value
  y:0,  //y value
  r:10 //radius
}

//line 1 3 balls
var l1_1 = {
  x:230,
  y:30,
  r:10
}
var l1_2 = {
  x:290,
  y:30,
  r:10
}
var l1_3 = {
  x:350,
  y:30,
  r:10
}
//line 2 4 balls
var l2_1 = {
  x:200,
  y:70,
  r:10
}
var l2_2 = {
  x:260,
  y:70,
  r:10
}
var l2_3 = {
  x:320,
  y:70,
  r:10
}
var l2_4 = {
  x:380,
  y:70,
  r:10  
}
//line 3 5 balls
var l3_1 = {
  x:170,
  y:110,
  r:10
}
var l3_2 = {
  x:230,
  y:110,
  r:10
}
var l3_3 = {
  x:290,
  y:110,
  r:10
}
var l3_4 = {
  x:350,
  y:110,
  r:10  
}
var l3_5 = {
  x:410,
  y:110,
  r:10  
}
//line 4 6 balls
var l4_1 = {
  x:140,
  y:150,
  r:10
}
var l4_2 = {
  x:200,
  y:150,
  r:10
}
var l4_3 = {
  x:260,
  y:150,
  r:10
}
var l4_4 = {
  x:320,
  y:150,
  r:10  
}
var l4_5 = {
  x:380,
  y:150,
  r:10  
}
var l4_6 = {
  x:440,
  y:150,
  r:10  
}
//line 5 7 balls
var l5_1 = {
  x:110,
  y:190,
  r:10
}
var l5_2 = {
  x:170,
  y:190,
  r:10
}
var l5_3 = {
  x:230,
  y:190,
  r:10
}
var l5_4 = {
  x:290,
  y:190,
  r:10  
}
var l5_5 = {
  x:350,
  y:190,
  r:10  
}
var l5_6 = {
  x:410,
  y:190,
  r:10  
}
var l5_7 = {
  x:470,
  y:190,
  r:10  
}
//line 6 8 balls
var l6_1 = {
  x:80,
  y:230,
  r:10
}
var l6_2 = {
  x:140,
  y:230,
  r:10
}
var l6_3 = {
  x:200,
  y:230,
  r:10
}
var l6_4 = {
  x:260,
  y:230,
  r:10  
}
var l6_5 = {
  x:320,
  y:230,
  r:10  
}
var l6_6 = {
  x:380,
  y:230,
  r:10  
}
var l6_7 = {
  x:440,
  y:230,
  r:10  
}
var l6_8 = {
  x:500,
  y:230,
  r:10  
}
//line 7 9 balls
var l7_1 = {
  x:50,
  y:270,
  r:10
}
var l7_2 = {
  x:110,
  y:270,
  r:10
}
var l7_3 = {
  x:170,
  y:270,
  r:10
}
var l7_4 = {
  x:230,
  y:270,
  r:10  
}
var l7_5 = {
  x:290,
  y:270,
  r:10  
}
var l7_6 = {
  x:350,
  y:270,
  r:10  
}
var l7_7 = {
  x:410,
  y:270,
  r:10  
}
var l7_8 = {
  x:470,
  y:270,
  r:10  
}
var l7_9 = {
  x:530,
  y:270,
  r:10  
}
//line 8 10 balls
var l8_1 = {
  x:20,
  y:310,
  r:10
}
var l8_2 = {
  x:80,
  y:310,
  r:10
}
var l8_3 = {
  x:140,
  y:310,
  r:10
}
var l8_4 = {
  x:200,
  y:310,
  r:10  
}
var l8_5 = {
  x:260,
  y:310,
  r:10  
}
var l8_6 = {
  x:320,
  y:310,
  r:10  
}
var l8_7 = {
  x:380,
  y:310,
  r:10  
}
var l8_8 = {
  x:440,
  y:310,
  r:10  
}
var l8_9 = {
  x:500,
  y:310,
  r:10  
}
var l8_10 = {
  x:560,
  y:310,
  r:10  
}

let frame = 0
let frameLimit = 3


const sleep = (duration) => {
  return new Promise(resolve => setTimeout(resolve, duration));
}

function draw_and_clear(){

ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas

//plinko board
ctx.fillStyle = "white";

//line 1
//l1_1
ctx.beginPath();  //draw the object c
ctx.arc(l1_1.x, l1_1.y, l1_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l1_2
ctx.beginPath();  
ctx.arc(l1_2.x, l1_2.y, l1_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l1_3
ctx.beginPath();  
ctx.arc(l1_3.x, l1_3.y, l1_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 2
//l2_1
ctx.beginPath();  //draw the object c
ctx.arc(l2_1.x, l2_1.y, l2_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l2_2
ctx.beginPath();  
ctx.arc(l2_2.x, l2_2.y, l2_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l2_3
ctx.beginPath();  
ctx.arc(l2_3.x, l2_3.y, l2_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l2_4
ctx.beginPath();  
ctx.arc(l2_4.x, l2_4.y, l2_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 3
//l3_1
ctx.beginPath();  //draw the object c
ctx.arc(l3_1.x, l3_1.y, l3_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l3_2
ctx.beginPath();  
ctx.arc(l3_2.x, l3_2.y, l3_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l3_3
ctx.beginPath();  
ctx.arc(l3_3.x, l3_3.y, l3_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l3_4
ctx.beginPath();  
ctx.arc(l3_4.x, l3_4.y, l3_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l3_5
ctx.beginPath();  
ctx.arc(l3_5.x, l3_5.y, l3_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 4
//l4_1
ctx.beginPath();  //draw the object c
ctx.arc(l4_1.x, l4_1.y, l4_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l4_2
ctx.beginPath();  
ctx.arc(l4_2.x, l4_2.y, l4_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l4_3
ctx.beginPath();  
ctx.arc(l4_3.x, l4_3.y, l4_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l4_4
ctx.beginPath();  
ctx.arc(l4_4.x, l4_4.y, l4_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l4_5
ctx.beginPath();  
ctx.arc(l4_5.x, l4_5.y, l4_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l4_6
ctx.beginPath();  
ctx.arc(l4_6.x, l4_6.y, l4_6.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 5
//l5_1
ctx.beginPath();  //draw the object c
ctx.arc(l5_1.x, l5_1.y, l5_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_2
ctx.beginPath();  
ctx.arc(l5_2.x, l5_2.y, l5_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_3
ctx.beginPath();  
ctx.arc(l5_3.x, l5_3.y, l5_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_4
ctx.beginPath();  
ctx.arc(l5_4.x, l5_4.y, l5_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_5
ctx.beginPath();  
ctx.arc(l5_5.x, l5_5.y, l5_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_6
ctx.beginPath();  
ctx.arc(l5_6.x, l5_6.y, l5_6.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l5_7
ctx.beginPath();  
ctx.arc(l5_7.x, l5_7.y, l5_7.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 6
//l6_1
ctx.beginPath();  //draw the object c
ctx.arc(l6_1.x, l6_1.y, l6_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_2
ctx.beginPath();  
ctx.arc(l6_2.x, l6_2.y, l6_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_3
ctx.beginPath();  
ctx.arc(l6_3.x, l6_3.y, l6_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_4
ctx.beginPath();  
ctx.arc(l6_4.x, l6_4.y, l6_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_5
ctx.beginPath();  
ctx.arc(l6_5.x, l6_5.y, l6_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_6
ctx.beginPath();  
ctx.arc(l6_6.x, l6_6.y, l6_6.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_7
ctx.beginPath();  
ctx.arc(l6_7.x, l6_7.y, l6_7.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l6_8
ctx.beginPath();  
ctx.arc(l6_8.x, l6_8.y, l6_8.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 7
//l7_1
ctx.beginPath();  //draw the object c
ctx.arc(l7_1.x, l7_1.y, l7_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_2
ctx.beginPath();  
ctx.arc(l7_2.x, l7_2.y, l7_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_3
ctx.beginPath();  
ctx.arc(l7_3.x, l7_3.y, l7_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_4
ctx.beginPath();  
ctx.arc(l7_4.x, l7_4.y, l7_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_5
ctx.beginPath();  
ctx.arc(l7_5.x, l7_5.y, l7_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_6
ctx.beginPath();  
ctx.arc(l7_6.x, l7_6.y, l7_6.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_7
ctx.beginPath();  
ctx.arc(l7_7.x, l7_7.y, l7_7.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_8
ctx.beginPath();  
ctx.arc(l7_8.x, l7_8.y, l7_8.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l7_9
ctx.beginPath();  
ctx.arc(l7_9.x, l7_9.y, l7_9.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

//line 8
//l8_1
ctx.beginPath();  //draw the object c
ctx.arc(l8_1.x, l8_1.y, l8_1.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_2
ctx.beginPath();  
ctx.arc(l8_2.x, l8_2.y, l8_2.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_3
ctx.beginPath();  
ctx.arc(l8_3.x, l8_3.y, l8_3.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_4
ctx.beginPath();  
ctx.arc(l8_4.x, l8_4.y, l8_4.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_5
ctx.beginPath();  
ctx.arc(l8_5.x, l8_5.y, l8_5.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_6
ctx.beginPath();  
ctx.arc(l8_6.x, l8_6.y, l8_6.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_7
ctx.beginPath();  
ctx.arc(l8_7.x, l8_7.y, l8_7.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_8
ctx.beginPath();  
ctx.arc(l8_8.x, l8_8.y, l8_8.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_9
ctx.beginPath();  
ctx.arc(l8_9.x, l8_9.y, l8_9.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();
//l8_10
ctx.beginPath();  
ctx.arc(l8_10.x, l8_10.y, l8_10.r, 0, Math.PI*2);
ctx.closePath();
ctx.fill();

ctx.fillStyle = "red";

ctx.beginPath();
ctx.fillRect(25, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "rgba(252, 94, 3, 1)";
ctx.beginPath();
ctx.fillRect(85, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "rgba(255, 157, 0, 1)";
ctx.beginPath();
ctx.fillRect(145, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "orange";
ctx.beginPath();
ctx.fillRect(206, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "rgba(255, 221, 0, 1)";
ctx.beginPath();
ctx.fillRect(265, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "orange";
ctx.beginPath();
ctx.fillRect(324, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "rgba(255, 157, 0, 1)";
ctx.beginPath();
ctx.fillRect(383, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "rgba(252, 94, 3, 1)";
ctx.beginPath();
ctx.fillRect(444, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "red";
ctx.beginPath();
ctx.fillRect(507, 325, 50, 20);
ctx.closePath();

ctx.fillStyle = "black";
ctx.font = "bold 9pt Verdana";

//first 1
ctx.beginPath();
ctx.fillText("BONUS", 26, 339);
ctx.closePath();

//left 2
ctx.beginPath();
ctx.fillText("2", 105, 339);
ctx.closePath();

//left 3
ctx.beginPath();
ctx.fillText("1.1", 160, 339);
ctx.closePath();

//left 4
ctx.beginPath();
ctx.fillText("1.05", 215, 339);
ctx.closePath();

//middle 5
ctx.beginPath();
ctx.fillText("0.3", 280, 339);
ctx.closePath();

//right 6
ctx.beginPath();
ctx.fillText("1.05", 335, 339);
ctx.closePath();

//right 7
ctx.beginPath();
ctx.fillText("1.1", 395, 339);
ctx.closePath();

//right 8
ctx.beginPath();
ctx.fillText("2", 460, 339);
ctx.closePath();

//last 9
ctx.beginPath();
ctx.fillText("BONUS", 508, 339);
ctx.closePath();
}

var redraw = function(){

  if (drawball){
  requestAnimationFrame(redraw);
  }

  draw_and_clear();
  
  //if (drawball){
  ctx.fillStyle = "rgba(255, 36, 0, 1)";
  //game ball
  ctx.beginPath();  
  ctx.arc(c.x, c.y, c.r, 0, Math.PI*2); 
  ctx.closePath();
  ctx.fill();
  //}
  console.log("we are still her");  
}

//ball middle 0.3
//let move_array = [0, 50, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50];

//ball right 1.05
//let move_array = [60, 0, 0, 53, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 48, 40, 15, 50];

//ball left 1.1

let endpointx = 250;
let endpointy = 250;

let firstx = 250;
let firsty = 0;
let x = 0;
let y = 0;

let timestamp = "";

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
function refresh_jackpots() {

$.ajax({
      type: "get",
      url: "bonus.php",
      data: 
      {  
        //'username' : $username
      },
      cache:false,
      success: function (data) 
      {
         //alert('Data Send');
         //$('#msg').html(html);
         //let text = this.data;
        let text = this.data;
        console.log("data is " + data);
        let mydata = JSON.parse(data);

        //console.log("data is " + data[0]);
         //console.log("typeof" + typeof data);
         //jackpot_value = data;
         //console.log("jackpot_value is " + jackpot_value);

         document.getElementById("opal").innerHTML = "$ " + parseFloat(mydata[0]).toFixed(2);
         document.getElementById("ruby").innerHTML = "$ " + parseFloat(mydata[1]).toFixed(2);
         document.getElementById("emerald").innerHTML = "$ " + parseFloat(mydata[2]).toFixed(2);
         document.getElementById("sapphire").innerHTML = "$ " + parseFloat(mydata[3]).toFixed(2);
         document.getElementById("diamond").innerHTML = "$ " + addCommas(mydata[4]);

      }
      
  });
}

var winamount = 0;

//canvas size is
//add argument to function at the end
async function move(array){
  //drawball = true;

  console.log("move animation starts");
  for (let i = 0; i < array.length; i+=2) {
    //await sleep(1000);
    //firstx+=5;
    //firstx = firstx + array[i];
    firstx+= array[i];
    firsty += array[i+1];

    //console.log("moving x " + array[i] + " y " + array[i+1]);

    let currentcx = c.x;
    let currentcy = c.y;
    //console.log("before while loop");
    //console.log("firstx " + firstx + " " + firsty);

    let arrayx = array[i];
    let arrayy = array[i+1];

    //console.log("arrayx " + arrayx + " arrayy " + arrayy);

    let movexaverage;
    if (arrayy == 0 && arrayx != 0){
      c.x = c.x + arrayx;
      redraw();
      await sleep(1);
    } else {
       movexaverage = (arrayx / arrayy);
    }
    //console.log("movexaverage " + movexaverage);
    while (c.y != firsty){

      if (movexaverage > 0){
          c.x = c.x + movexaverage;
      } else {
          //console.log("reducing movexaverage " + c.x);
          c.x = c.x + movexaverage;
          //console.log("c.x " + c.x);
      }
      c.y = c.y + 1;
      redraw();
      await sleep(1);
    }
    
  }
  console.log("move animation ends");
  //drawball = false;
  c = {  //create an object to draw
    x:250,  //x value
    y:0,  //y value
    r:10 //radius
  }
  firstx = 250;
  firsty = 0;
  x = 0;
  y = 0;
  //ctx.fillStyle = "#ffffff";
  //ctx.fillRect(0,0,canvas.width, canvas.height);
  console.log("we are here");
  draw_and_clear();
  document.getElementById("play_button").disabled = false;

  refresh_jackpots();

  document.getElementById("gamestate").innerHTML = "GAME OVER!";

  if (winamount > 0){
    document.getElementById("winlabel").innerHTML = "WIN $ " + addCommas(parseFloat(winamount).toFixed(2));
  }

  winamount = 0;

  //winlabel

}

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

function generate(){

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

        if (my_string != "")
          document.getElementById("txtHint").innerHTML = my_string;

        //document.getElementById("card1").innerHTML = card_1 + " " + card_2 + " " + card_3 + " " + card_4 + " " + card_5;

        //console.log(typeof card_1);
        //console.log(typeof card_2);
        //console.log(typeof card_3);
        //console.log(typeof card_4);
        //console.log(typeof card_5);

        cards_dealt = true;
        document.getElementById("play_button").value = "DRAW";
      }
    };
    xmlhttp.open("GET", "draw.php?q=" + str, true);
    xmlhttp.send();

}

function openForm() {
  //change button color according to jackpot
  document.getElementById("myForm").style.display = "block";
  document.getElementById("mycanvas").style.display = "none";
}

function closeForm() {
  //get number from button send to server and update win to user
  //end game
  //send all button values back
  //replace chosen button with award
  //then 1 by one show rest awards
  //increase credits counter then go back to base game

  document.getElementById("myForm").style.display = "none";
  document.getElementById("mycanvas").style.display = "block";
}

var bet_level = 8;
var credit_format = false;
let my_array;

//let move_array = [80, 0, 0, 49, 205, 270];
//let move_array = [80, 0, 0, 51, 63, 60, -85, 81, 60, 50, 45, 80];
//let move_array = [63, 0, 0, 51, -65, 55, 55, 40, -55, 40, 55, 50, 53, 90];

function play_plinko() {

  
  console.log(bet_level);
  $.ajax({
    type: "post",
    url: "generate.php",
    data: 
    {  
      'bet' : bet_level
    },
    cache:false,
    success: function (data) 
    {
      let text = this.data;
      console.log("data is " + data);
      let mydata = JSON.parse(data);

      winamount = mydata[0];
      my_array = mydata[1];
      //win = mydata.win_amount;

      console.log(my_array);

      document.getElementById("winlabel").innerHTML = "";
      document.getElementById("gamestate").innerHTML = "GOOD LUCK!";

      document.getElementById("play_button").disabled = true;
      console.log("round starting here");
      console.log(my_array);

      //call draw plinkopath here
      drawball = true;
      move(my_array);
      drawball = false;

      //document.getElementById("loyalty").innerHTML = mytext + ", you have " + Math.floor(mydata.loyalty) + " points";
      //document.getElementById("sessionpoints").innerHTML = "Session points: " + Math.floor(mydata.points);
    }
});

//drawball = true;
//move(move_array);
//drawball = false;

/*
if(drawball == true){
  if (start == true){
    drawball = true;
    move(path_array);
    drawball = false;
  }
}
else{*/
//}
}

function increase_bet(){

//save bet preference in user settings?
//bets 0.5 1 1.5 2 2.5 3
//bets 0.6 1.2 1.8 2.4. 3.0 3.6
//bets 0.8 1.6 2.4 3.2 4.0 4.8
//bets 0.4 0.8 1.2 1.6 2.0 2.4 2.8 3.2

if (credit_format){

  switch (bet_level){

    case 1:
      bet_level = 2;
      document.getElementById("bet_amount").value = "  80";
    break;
    case 2:
      bet_level = 3;
      document.getElementById("bet_amount").value = "120";
    break;
    case 3:
      bet_level = 4;
      document.getElementById("bet_amount").value = "160";
    break;
    case 4:
      bet_level = 5;
      document.getElementById("bet_amount").value = "200";
    break;
    case 5:
      bet_level = 6;
      document.getElementById("bet_amount").value = "240";
    break;
    case 6:
      bet_level = 7;
      document.getElementById("bet_amount").value = "280";
    break;
    case 7:
      bet_level = 8;
      document.getElementById("bet_amount").value = "320";
    break;
    default:
      break; 
    } 
  }
    else{

    switch (bet_level){

    case 1:
      bet_level = 2;
      document.getElementById("bet_amount").value = " 0.8";
    break;
    case 2:
      bet_level = 3;
      document.getElementById("bet_amount").value = " 1.2";
    break;
    case 3:
      bet_level = 4;
      document.getElementById("bet_amount").value = " 1.6";
    break;
    case 4:
      bet_level = 5;
      document.getElementById("bet_amount").value = " 2.0";
    break;
    case 5:
      bet_level = 6;
      document.getElementById("bet_amount").value = " 2.4";
    break;
    case 6:
      bet_level = 7;
      document.getElementById("bet_amount").value = " 2.8";
    break;
    case 7:
      bet_level = 8;
      document.getElementById("bet_amount").value = " 3.2";
    break;
    default:
      break;
  }
  }
}

function decrease_bet(){

  if (credit_format){

    switch (bet_level){
    case 2:
      bet_level = 1;
      document.getElementById("bet_amount").value = "  40";
    break;
    case 3:
      bet_level = 2;
      document.getElementById("bet_amount").value = "  80";
    break;
    case 4:
      bet_level = 3;
      document.getElementById("bet_amount").value = "120";
    break;
    case 5:
      bet_level = 4;
      document.getElementById("bet_amount").value = "160";
    break;
    case 6:
      bet_level = 5;
      document.getElementById("bet_amount").value = "200";
    break;
    case 7:
      bet_level = 6;
      document.getElementById("bet_amount").value = "240";
    break;
    case 8:
      bet_level = 7;
      document.getElementById("bet_amount").value = "280";
    break;
    default:
    break;
  }
  }
  else {
  switch (bet_level){
    case 2:
      bet_level = 1;
      document.getElementById("bet_amount").value = " 0.4";
    break;
    case 3:
      bet_level = 2;
      document.getElementById("bet_amount").value = " 0.8";
    break;
    case 4:
      bet_level = 3;
      document.getElementById("bet_amount").value = " 1.2";
    break;
    case 5:
      bet_level = 4;
      document.getElementById("bet_amount").value = " 1.6";
    break;
    case 6:
      bet_level = 5;
      document.getElementById("bet_amount").value = " 2.0";
    break;
    case 7:
      bet_level = 6;
      document.getElementById("bet_amount").value = " 2.4";
    break;
    case 8:
      bet_level = 7;
      document.getElementById("bet_amount").value = " 2.8";
    break;
    default:
    break;
  }
  }
}

function change_format(){

  if (credit_format){

      switch (bet_level){

      case 1:
        document.getElementById("bet_amount").value =  " 0.4";
      break;
      case 2:
        document.getElementById("bet_amount").value =  " 0.8";
      break;
      case 3:
        document.getElementById("bet_amount").value =  " 1.2";
      break;
      case 4:
        document.getElementById("bet_amount").value =  " 1.6";
      break;
      case 5:
        document.getElementById("bet_amount").value =  " 2.0";
      break;
      case 6:
        document.getElementById("bet_amount").value =  " 2.4";
      break;
      case 7:
        document.getElementById("bet_amount").value =  " 2.8";
      break;
      case 8:
        document.getElementById("bet_amount").value =  " 3.2";
      break;
      default:
      break;
    }
    credit_format = false;
  }
  else{

    switch (bet_level){

      case 1:
        document.getElementById("bet_amount").value =  "  40";
      break;
      case 2:
        document.getElementById("bet_amount").value =  "  80";
      break;
      case 3:
        document.getElementById("bet_amount").value =  "120";
      break;
      case 4:
        document.getElementById("bet_amount").value =  "160";
      break;
      case 5:
        document.getElementById("bet_amount").value =  "200";
      break;
      case 6:
        document.getElementById("bet_amount").value =  "240";
      break;
      case 7:
        document.getElementById("bet_amount").value =  "280";
      break;
      case 8:
        document.getElementById("bet_amount").value =  "320";
      break;
      default:
      break;
    }
    credit_format = true;
  }

}

window.onload = refresh_jackpots;
//});
</script>
<body>
<div class="container">
  <hgroup>
    <h1 class="site-title" style="site-title; text-align: center; color: white; -webkit-text-stroke: 2px black;  font-weight: bold;">Plinko</h1><br>
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
        <li><a href="index.php">Bonus Poker</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
</nav>

<!--</div>-->
<main class="main-content">
  <div class="col-md-6 col-md-offset-4">

<!--
<h4 style="color:white;">Your account data, <?php echo $_SESSION['username'] ?>.</h4>
-->
<table>
    <tr>
      <th>
        <h4 id="opal">$2.5</h2>
      <p>Opal</p>
      </th>
      <th>
        <h4 id="ruby">$5</h2>
      <p style="color: #E0115F;">Ruby</p>
      </th>
      <th>
        <h4 id="emerald">$10</h2>
      <p style="color: #50C878;">Emerald</p>
      </th>
      <th>
        <h4 id="sapphire">$100</h2>
      <p style="color: #0f52ba;">Sapphire</p>
      </th>
      <th>
        <h4 id="diamond">$1,000</h2>
      <p style="color: #b9f2ff;">Diamond</p>
      </th>
    </tr>
    </table>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Jackpot name: Make a pick</h1>
    <h4>Total BET: XXX = Y Progressive Award(s) hidden</h4>
    <h6>THE HIGHER THE BET THE MORE PROGRESSIVES AVAILABLE IN SELECTION</h5>
    <table>
    <tr>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
    </tr>
    <tr>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
      <th>
        <button type="button" class="button5" onclick="closeForm()"></button>
      </th>
    </tr>
    </table>
    <h5>SELECT A JEWEL</h5>
    <!--<button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
  </form>
</div>
<canvas id="mycanvas" src="plinko.js" width="580" height="360" style="border:5px solid blue; margin-left:-27px;"></canvas>

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
  <th style="padding-left:50px;">
  <span class="dot" style="color:white;padding-left:7px; padding-top:6px;height: 30px;
  width: 30px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;">1¢</span>
  </th>
  <th>
  <input type="button" name="button1"
    class="button" value=" + " id="bet_button" style="float:right;background-color:#1f1e1e;" onclick="increase_bet()"/>    
  <input type="button" name="button1" id="bet_amount" class="button" value=" 3.2" style="float:right;background-color:#1f1e1e;" onclick="change_format()"/>
  <input type="button" name="button1"
    class="button" value=" − " id="bet_button" style="float:right;background-color:#1f1e1e;" onclick="decrease_bet()"/>
  </th>
  <th>
    <input type="button" name="button1"
    class="button" value="PLAY" id="play_button" style="float:right;background-color:#1f1e1e;" onclick="play_plinko()"/>    
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
      <p id="loyalty" style="white-space:nowrap;">Points total:</p>
    </th>
    <th>
      <p id="gamestate"></p>
    </th>
  </tr>
</table>
<p>PLINKO</p>

</div>
</nav>
</div>
</main>


</body>
</html>