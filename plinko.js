
document.addEventListener('DOMContentLoaded', function() {
const canvas = document.getElementById('mycanvas');
let firstx = 0;
let firsty = 0;
let x = 1;
var ctx = canvas.getContext("2d"); //get the context
var c = {  //create an object to draw
  x:0,  //x value
  y:0,  //y value
  r:5 //radius
}
var redraw = function(){
  ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas
  ctx.beginPath();  //draw the object c
  ctx.arc(c.x, c.y, c.r, 0, Math.PI*2); 
  ctx.closePath();
  ctx.fill();
    
  requestAnimationFrame(redraw);
}

const sleep = (duration) => {
  return new Promise(resolve => setTimeout(resolve, duration));
}

let move_array = [100,10,20,20,30,30];

//canvas size is
async function move(array){

  console.log("move animation starts");
  for (let i = 0; i < array.length; i+=2) {
    //firstx+=5;
    firstx = firstx + array[i];
    firsty = firsty + array[i+1];

    console.log("moving x " + array[i] + " y " + array[i+1]);
    //var x = firstx;//Math.random() // this returns a float between 0.0 and 1.0
    c.x = x + firstx;//canvas.width;
    c.y = x + firstx//canvas.height;
    redraw();
    await sleep(1000)
  }
  console.log("move animation ends");
}

//redraw();

move(move_array);
//setInterval(move, 1000);
});
