"use strict";
var activeId=15;
var emptyBoxX =300;
var emptyBoxY =300;
var exmptyBoxId=16;
var blocks = [];

function getBlockById(id){
	var found=id;
	$(blocks).each(function(i,div){
		if(id==div.id){
			found = div;
		}
	});
	return found;
};
function move(){
	activeId = $(this).attr("id");
	copyStyle();
	nextCandidates();
};
function resetBorders(){
	$(blocks).each(function(i,div){
		$(div.dv).css({borderColor:"#000000",color:"#000000"});
		$(div.dv).unbind("click");
		$(div.dv).hover(
				function(){
					$(div.dv).css({borderColor:'black',color:'black'});
				},
				function(){
					$(div.dv).css({borderColor:'black',color:'black'});
					});

	});
}
function setSelected(id){
	var top = getBlockById(id);
	$(top.dv).css({borderColor:'blue',color:'blue'});
	$(top.dv).bind("click",move);
	$(top.dv).hover(
			function(){
				$(top.dv).css({borderColor:'red',color:'red'});
			},
			function(){
				$(top.dv).css({borderColor:'blue',color:'blue'});
				});
}
function nextCandidates(){
	resetBorders();
	var id = parseInt(activeId);
	var selected = [];
	
	if(id!=1 && id!=2 && id!=3 && id!=4 ){
		setSelected(id-4);//top
	}
	if(id!=13 && id!=9 && id!=5 && id!=1 ){
	    setSelected(id-1);//left
	}
	//alert(id);
	if(id!=4 && id!=8 && id!=12  ){
		setSelected(1 + id);//right
	}
	if(id!=13 && id!=14 && id!=15 && id!=16 ){
		setSelected(id+4);//bottom
	}
}
function shuffle(){
	var shufle =[4,8,5];
	blocks.each(function(i,div){
	activeId = Math.floor((Math.random() * 14));
	//alert(activeId);
	//activeId=i;
	//alert(activeId+" div="+div+" i="+i);
	copyStyle();
	nextCandidates();

	});
	
	//reset values to initial stage
	activeId=15;
	emptyBoxX =300;
	emptyBoxY =300;
	
}
function copyStyle(){
	//alert(id+" "+ blockStyle.id+" - " +blockStyle.x);
	var activeBlock = getBlockById(activeId);
	
	var tempX = activeBlock.x;
	var tempY = activeBlock.y;
	var tempId= activeBlock.id;
	
	//alert($(activeBlock.dv).position().left);
    $(activeBlock.dv).css({
        // set basic style and background
    	borderColor:'red',
    	left:emptyBoxX+'px',
    	top:emptyBoxY+'px'
        });
	$(activeBlock.dv).attr("id",exmptyBoxId);
	$(activeBlock.dv).attr("title",'id='+exmptyBoxId+' '+emptyBoxX+','+emptyBoxY);
	activeBlock.id = exmptyBoxId;

    $("#shufflebutton").text("Current = "+exmptyBoxId+",x="+emptyBoxX+",y="+emptyBoxY+"=> Next Loc = "+tempId+",x="+tempX+",y="+tempY);
    emptyBoxX = tempX;//(tempX==emptyBoxX && (exmptyBoxId!="16" && tempId!="12")&&(exmptyBoxId!="12" || tempId!="16")?tempX+100:tempX );//(tempX==emptyBoxX && (exmptyBoxId=="16" || exmptyBoxId=="15") ?tempX+100:tempX);//(activeId=="15"?"300":tempX);
    emptyBoxY = tempY;//(tempY==emptyBoxY && (exmptyBoxId=="12" && tempId=="16")?tempY+100:tempY );//(tempY==emptyBoxY?tempY-100:tempY);
    exmptyBoxId= tempId;
    
}
$(document).ready(function(){
	
	$("#shufflebutton").click(shuffle);
    var divs = $("#puzzlearea div");  
    // initialize each piece
    var init = function (){
    	
    divs.each(function(i,div){	
        // calculate x and y for this piece
        var x = ((i % 4) * 100) ;
        var y = (Math.floor(i / 4) * 100) ;
        $(div).addClass("puzzlepiece");
        $(div).click(move);
        $(div).attr("id",i+1);
        $(div).attr("title",'id='+(i+1)+' '+x+','+y);//for testing only
        
        var block = {id:i+1,
        			 x:x,
        			 y:y,
        			 dv:div};
        blocks.push(block);//for later use
       $(div).css({
        // set basic style and background
        left: block.x + 'px',
        top:  block.y + 'px',
        backgroundImage : 'url("background.jpg")',
        backgroundPosition : -block.x + 'px ' + (-block.y) + 'px'
        //backgroundPosition: -50 + 'px ' + -50 + 'px'
        });
        // store x and y for later
        div.x = x;
        div.y = y; 
        
        
    })//each end
    };//init end
    init();

})

/*
$(document).ready(function () {
var init = function() {
    var divs = $('#puzzlearea div');

    // initialize each piece
    divs.each(function (i, div) {
        // calculate x and y for this piece
        var x = ((i % 4) * 100) ;
        var y = (Math.floor(i / 4) * 100) ;

        // set basic style and background
        $(div).addClass("puzzlepiece");
        $(div).css({
            left: x + 'px',
            top: y + 'px',
            backgroundImage: 'url("background.jpg")',
            backgroundPosition: -x + 'px ' + (-y) + 'px'
        });

        // store x and y for later
        $(div).data({left: x, top: y});
        //div.x = x;
        //div.y = y;

        if(i == 11 || i == 14) {
            $(div).addClass("movablepiece");
        }
    });

    $(".movablepiece").click(function () {
        $(this).css({left: ($(this).position().left - 100) });
        // var pos = $(this).data();
        // alert(JSON.stringify(pos));
    });
};
init();
});
*/