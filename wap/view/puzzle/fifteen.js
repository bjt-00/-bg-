"use strict";

$(document).ready(function () {
    var emptyBoxY = 300;
    var emptyBoxX = 300;
    var timer = 0;
    
    //display blocks with fix size and position
    var divs = $("#puzzlearea div");
    divs.each( function(i,div) {
        var x = ((i % 4) * 100);
        var y = (Math.floor(i / 4) * 100);
        div.className = "puzzlepiece";
        $(div).css({
            left: x + 'px',
            top: y + 'px',
            backgroundImage : 'url("background.jpg")',
            backgroundPosition : -x + 'px ' + (-y) + 'px'
            });

        div.x = x;
        div.y = y;
    });
    var getBlocks = (function () {
        var d = [];
        var c = $(".puzzlepiece");
        c.each(function(i,p) {
            d[i] = {x: $(p).position().left,
                y: $(p).position().top
            };
        });
      return d;
    });
    //keep block x,y positions for later use
    var blocks = getBlocks();
    
    //move current box to empty location
    function moveToEmptyBox(current) {
        var pos = current.position();
        current.css("top", emptyBoxY + "px");
        current.css("left", emptyBoxX + "px");
        emptyBoxX = pos.left;
        emptyBoxY = pos.top;

    }
    function checkWin() {
        var divnow = getBlocks();
        var complete = true;
        blocks.each(function(i,block) {
            if ((Math.floor(block.x) !== Math.floor(divnow[i].x)) || (Math.floor(block.y) !== Math.floor(divnow[i].y))) {
                complete = false;
            }
        });
        if (complete) {
            clearInterval(timer);
            alert("You Won!");

        }
    }

    $(".puzzlepiece").click(function () {
        var current = $(this).position();
        if ((emptyBoxY === current.top && (emptyBoxX === current.left + 100 || emptyBoxX === current.left - 100)) || (emptyBoxX === current.left && (emptyBoxY === current.top + 100 || emptyBoxY === current.top - 100))) {
            moveToEmptyBox($(this));
            checkWin();

        }
    });
    $(".puzzlepiece").hover(function () {
        var current = $(this).position();
        if ((emptyBoxY === current.top && (emptyBoxX === current.left + 100 || emptyBoxX === current.left - 100)) || (emptyBoxX === current.left && (emptyBoxY === current.top + 100 || emptyBoxY === current.top - 100))) {
            $(this).addClass("movablepiece");
        }
    }, function () {
        $(this).removeClass("movablepiece");
    });
    var t = 0;
    $("#shufflebutton").click(function () {
    	
        var allpiece = $(".puzzlepiece");
        var pice = [];
        allpiece.each(function(j,piece) {
            if (
                    (emptyBoxY == Math.floor($(piece).position().top) && (emptyBoxX == Math.floor($(piece).position().left + 100)
                           || emptyBoxX == Math.floor($(piece).position().left - 100)))
                    || (emptyBoxX == Math.floor($(piece).position().left)
                            && (emptyBoxY == Math.floor($(piece).position().top + 100)
                                    || emptyBoxY == Math.floor($(piece).position().top - 100)))
                    ) {
            	pice.push($(piece));
            }
        });

        for (var i = 0; i < 100; i++) {
            var idx = Math.floor(Math.random() * (pice.length));
            moveToEmptyBox($(pice[idx]));
       }
        t = 0;

        $("#timer").text("Time : " + t + " seconds");
        clearInterval(timer);
        timer = setInterval(function () {
            t++;
            $("#time").text("Time :" + t + "seconds");
        }, 1000);
    });


});
