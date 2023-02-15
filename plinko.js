
document.addEventListener('DOMContentLoaded', function() {
const canvas = document.getElementById('mycanvas');
let firstx = 250;
let firsty = 0;
let x = 0;
let y = 0;
var ctx = canvas.getContext("2d"); //get the context

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

var redraw = function(){
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

  ctx.fillStyle = "black";

  //console.log("animating " + c.x + " " + c.y);
  //game ball
  ctx.beginPath();  
  ctx.arc(c.x, c.y, c.r, 0, Math.PI*2); 
  ctx.closePath();
  ctx.fill();
  
  requestAnimationFrame(redraw);
}

const sleep = (duration) => {
  return new Promise(resolve => setTimeout(resolve, duration));
}

//let move_array = [100,10,20,20,30,30, 0, 20, -50, 10, 10, 10, 0, 100];

//bonus ball
let move_array = [0, 50, -30, 15, 50, 48, -50, 35, 50, 40, -50, 40, 50, 40, 15, 50];

//canvas size is
async function move(array){

  console.log("move animation starts");
  for (let i = 0; i < array.length; i+=2) {
    //await sleep(1000);
    //firstx+=5;
    firstx = firstx + array[i];
    firsty = firsty + array[i+1];

    console.log("moving x " + array[i] + " y " + array[i+1]);

    let currentcx = c.x;
    let currentcy = c.y;
    console.log("before while loop");
    console.log("firstx " + firstx + " " + firsty);

    let arrayx = array[i];
    let arrayy = array[i+1];

    console.log("arrayx " + arrayx + " arrayy " + arrayy);

    let movexaverage = (arrayx / arrayy);

    console.log("movexaverage " + movexaverage);
    while (c.y != firsty){

      if (movexaverage > 0){
          c.x = c.x + movexaverage;
      } else {
          console.log("reducing movexaverage " + c.x);
          c.x = c.x + movexaverage;
          console.log("c.x " + c.x);
      }
      c.y = c.y + 1;
      redraw();
      await sleep(5);
    }
    /*
    while (c.x != firstx || c.y != firsty){
      console.log("cx " + c.x + " cy " + c.y);
      if (c.x != firstx){
        if (firstx > c.x){
          c.x = c.x + 1;//canvas.width;
        }
        else if (firstx < c.x){
          c.x = c.x - 1;
        }
        console.log("c.x is " + c.x + " firstx is " + firstx);
      }
      if (c.y != firsty){
        c.y = c.y + 1;//canvas.height;
      }
      redraw();
      await sleep(16);
    }
    */
    //await sleep(400);
  }
  console.log("move animation ends");
}

//redraw();

move(move_array);
//setInterval(move, 1000);
});
