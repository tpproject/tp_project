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
	var points=0;
	var level=1;
	var start = false;
	var completed = false;
	
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
		dx = 0.5;
		dy = -4;
		nrows=6;
		ncols=5;
		brwidth = 79;
		brheight=20;
		padding = 2;
		bricks = new Array(nrows);
  		for (i=0; i < nrows; i++) {
    		bricks[i] = new Array(ncols);
  		    for (j=0; j < ncols; j++) {
     			bricks[i][j] = 1;
    		}
  		}
		if(completed == false)
			points=0;
		start = true;
	}
	function drawBricks(){
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
			points=points+(5*level);
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
		rect(padX, height-padHeight, padWidth,padHeight);    		
   		drawBricks();
		if (x + dx + ballRadius +100> width || x + dx - ballRadius < 0)
			dx = -dx;
		if (y + dy - ballRadius < 0)
			dy = -dy;
		else if (y + dy + ballRadius > height - padHeight) {
			if (x > padX && x < padX + padWidth) {
				dx = 8 * ((x-(padX+padWidth/2))/padWidth);
				dy = -dy;
			}
			else if (y + dy + ballRadius > height){
				start = false;
				points = 0;
				clearInterval(gameInterval);
				ctx.font = "25pt Calibri";
    			ctx.fillStyle = "white";
   	    		ctx.fillText("Game Over", 120, 200);
				completed = false;
				ctx.font = "10pt Calibri";
				ctx.fillText("press enter or space to retry", 120, 230);
				localStorage.setItem("Boyan",points);	
			}
		}
		if( padX<0){
			padX=-padX;
		}
		if(padX+padWidth+100 >= width){
			padX=padX-6;
		}
		x += dx;
		y += dy;
		ctx.font = "15pt Calibri";
    	ctx.fillStyle = "white";
   	    ctx.fillText("Points:", 415, 20);
		ctx.fillText(points, 440, 45);
		if(points<150)
			ctx.fillText("Level 1", 415, 120);
		else if(points<450)
			ctx.fillText("Level 2", 415, 120);
		else if(points<900)
			ctx.fillText("Level 3", 415, 120);
		else if(points<1500)
			ctx.fillText("Level 4", 415, 120);
		else if(points<2250)
			ctx.fillText("Level 5", 415, 120);
		if((points==150 && level==1) || (points == 450 && level==2) || (points==900 && level ==3) 
			|| (points==1500 && level ==4) || (points==2250 && level == 5) && completed==false){
			clearInterval(gameInterval);
			start = false;
			completed = true;
			level = level + 1;
			ctx.font = "25pt Calibri";
    		ctx.fillStyle = "white";
			ctx.fillText("Congratulations!", 110, 200);
			ctx.font = "10pt Calibri";
			ctx.fillText("press enter to continue...", 160, 230);
			if(enterDown == true) {
				init();
			}
		}			
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
		if(evt.keyCode == 13) enterDown = true;
		if (evt.keyCode == 109) mDown = true;
	}
	function onKeyUp(evt){
		if (evt.keyCode == 39) rightDown = false;
		else if (evt.keyCode == 37) leftDown = false;
		if(evt.keyCode == 13) enterDown = false;
		if (evt.keyCode == 109) mDown = true;
	}
	
	document.addEventListener('keydown',onKeyDown);
	document.addEventListener('keyup',onKeyUp);
