
document.addEventListener('DOMContentLoaded', function() {
const canvas = document.getElementById('mycanvas');
let firstx = 0;
let firsty = 0;
let x = 0;
let y = 0;
var ctx = canvas.getContext("2d"); //get the context
var c = {  //create an object to draw
  x:0,  //x value
  y:0,  //y value
  r:5 //radius
}

var l1_1 = {
  x:140,
  y:30,
  r:10
}

var l1_2 = {
  x:200,
  y:30,
  r:10
}

var l1_3 = {
  x:260,
  y:30,
  r:10
}


var redraw = function(){
  ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas
 
  //plinko board
  ctx.fillStyle = "white";
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

  ctx.fillStyle = "black";
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

let move_array = [100,10,20,20,30,30, 0, 20, -50, 10, 10, 10, 0, 100];

//canvas size is
async function move(array){

  console.log("move animation starts");
  for (let i = 0; i < array.length; i+=2) {
    //await sleep(1000);
    //firstx+=5;
    firstx = firstx + array[i];
    firsty = firsty + array[i+1];

    console.log("moving x " + array[i] + " y " + array[i+1]);
    //var x = firstx;//Math.random() // this returns a float between 0.0 and 1.0
    c.x = x + firstx;//canvas.width;
    c.y = y + firsty//canvas.height;
    redraw();
    await sleep(1000);
  }
  console.log("move animation ends");
}

//redraw();

move(move_array);
//setInterval(move, 1000);
});
