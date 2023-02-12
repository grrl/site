
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
function move(){
  firstx+=5;
  //var x = firstx;//Math.random() // this returns a float between 0.0 and 1.0
  c.x = x + firstx;//canvas.width;
  c.y = x + firstx//canvas.height;
}
redraw();

setInterval(move, 1000);

/*
const ctx = canvas.getContext('2d');

 const p = {
   x: 25,
   y: 25
 };
 const velo = 3;
 const corner = 50;
 const rad = 20;
 
 const ball = {
   x: p.x,
   y: p.y
 };
 
 let moveX = Math.cos(Math.PI / 180 * corner) * velo;
 let moveY = Math.sin(Math.PI / 180 * corner) * velo;

const DrawMe = () => {
   ctx.clearRect(0, 0, 400, 300);

   if (ball.x > canvas.width - rad || ball.x < rad) moveX = -moveX;
   if (ball.y > canvas.height - rad || ball.y < rad) moveY = -moveY;

   ball.x += moveX;
   ball.y += moveY;

   ctx.beginPath();
   ctx.fillStyle = 'green';
   ctx.arc(ball.x, ball.y, rad, 0, Math.PI * 2, false);
   ctx.fill();
   ctx.closePath();
}
//setInterval(DrawMe, 10);
*/
});
