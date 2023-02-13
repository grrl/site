
document.addEventListener('DOMContentLoaded', function() {
const canvas = document.getElementById('mycanvas');
let firstx = 1;
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
//canvas size is 
function move(){
  firstx+=5;
  //var x = firstx;//Math.random() // this returns a float between 0.0 and 1.0
  c.x = x + firstx;//canvas.width;
  c.y = x + firstx//canvas.height;
}
redraw();

setInterval(move, 1000);

});
