	var canvas;
	var ctx;
	var width; 					
	var height; 				
	var bgColor = "black";		
	var ballRadius = 10; 		
	var x = 200; 				
	var y = 384; 				
	var ballColor = "white";	
	var dx = 1.5;				
	var dy = -4;				
	var padX; 					
	var padWidth;			
	var padHeight;			
	var padColor = "white";	
	var rightDown = false;
	var leftDown = false;
	var bricks;
	var nrows;
	var ncols;
	var brwidth;
	var brheight;
	var padding;
	var colors = ["orange", "green", "purple", "red", 
	             "blue","yellow"];
	function init(){
		canvas = document.getElementById('my_canvas');
		ctx = canvas.getContext("2d");
		width = canvas.width;
		height = canvas.height;
		padWidth = width/4.5;
		padHeight = height/40;
		padX = (width/2) - (padWidth/2);
		gameInterval = setInterval(draw, 10);
		x = 200;
		y = 384;
		dx = 1.5;
		dy = -4;
		nrows=6;
		ncols=5;
		brwidth = (width/ncols) - 1;
		brheight=20;
		padding = 2;
		bricks = new Array(nrows);
  		for (i=0; i < nrows; i++) {
    		bricks[i] = new Array(ncols);
  		    for (j=0; j < ncols; j++) {
     			bricks[i][j] = 1;
    		}
  		}
	}
	function draw(){
		ctx.fillStyle = bgColor;
		clear();
		ctx.fillStyle = ballColor;
		circle(x, y, ballRadius);
		if (rightDown) padX += 5;
		else if (leftDown) padX -= 5;
			
		ctx.fillStyle = padColor;
		rect(padX, height-padHeight, padWidth, padHeight);    		
   		for (i=0; i < nrows; i++) {
            ctx.fillStyle = colors[i];
    		for (j=0; j < ncols; j++) {
      			if (bricks[i][j] == 1) {
        			rect((j * (brwidth + padding)) + padding, 
           			(i * (brheight + padding)) + padding,
         		   	brwidth, brheight);
      			}
   			}
 		} 
 		rowheight = brheight + padding;
  		colwidth = brwidth + padding;
  		row = Math.floor(y/rowheight);
  		col = Math.floor(x/colwidth);
  		if (y < nrows * rowheight && row >= 0 
  			&& col >= 0 && bricks[row][col] == 1) {
    		dy = -dy;
    		bricks[row][col] = 0;
  		}
		if (x + dx + ballRadius > width || x + dx - ballRadius < 0)
			dx = -dx;
		if (y + dy - ballRadius < 0)
			dy = -dy;
		else if (y + dy + ballRadius > height - padHeight) {
			if (x > padX && x < padX + padWidth) {
				dx = 8 * ((x-(padX+padWidth/2))/padWidth);
				dy = -dy;
			}
			else if (y + dy + ballRadius > height){
				clearInterval(gameInterval);
			}
		}
		if(padX+padWidth> width || padX<0){
			padX=-padX;
		}
		x += dx;
		y += dy;
	}
	function clear(){ 
		ctx.clearRect(0, 0, width, height);
		rect(0, 0, width, height);
	}
	function rect(x, y, width, height){
		ctx.beginPath();
		ctx.fillRect(x, y, width, height);
		ctx.closePath();
	}
	function circle(x,y,r){
		ctx.beginPath();
		ctx.arc(x, y, r, 0, Math.PI*2, true);
		ctx.closePath();
		ctx.fill();
	}
	function onKeyDown(evt){
		if (evt.keyCode == 39) rightDown = true;
		else if (evt.keyCode == 37) leftDown = true;
	}
	function onKeyUp(evt){
		if (evt.keyCode == 39) rightDown = false;
		else if (evt.keyCode == 37) leftDown = false;
	}	
	document.addEventListener('keydown',onKeyDown);
	document.addEventListener('keyup',onKeyUp);
		