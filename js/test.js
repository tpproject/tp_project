function testCanvasWidthAndHeight(){
		init();
		assertEquals(canvas.width,width);
		assertEquals(canvas.height,height);            
}
function testPadWidthAndHeight(){
	init();
	assertEquals(padWidth,width/4.5);
	assertEquals(padHeight,height/40);           
}
function testPadX(){
	init(); 
	assertEquals(padX,((width/2)-50) - (padWidth/2));
}
function testBricksArray(){
	init();
	assertFalse(i==ncols);
	assertFalse(j==nrows);
}
function testXAndY(){
	init();
	assertEquals(x, 200);
	assertEquals(y, 384);
}
function testDXAndDY(){
	init();
	assertEquals(dx, 0.5);
	assertEquals(dy, (-3-level));
}
function testRowHeightAndColWidth(){
	init();
	assertEquals(rowheight, (brheight + padding));
	assertEquals(colwidth, (brwidth + padding));
}
function testBrWidthAndBrHeright(){
	init();
	assertEquals(brwidth, 79);
	assertEquals(brheight, 20);
}
function testStart(){
	init();
	assertEquals(start, true);
}
function testClear(){
	init();
		
}
