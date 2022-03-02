<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("function.php");
save_guest_info();
$name = "404";
count_view("child_lab",$name);
if(@$_SESSION['admin']=='admin'){
	$tips = "<a href='Fire-To-The-Hole?sign=out'>Sign Out Admin</a>";
} else {
	$tips = "Tips: Use shortcut to imrprove your experience ;)";
}
?>
<!doctype html>
<html>
<head>
<title>404 - Angry Square | BMP</title>
<?php include ("linkref.php");?>
<style>
/*area game background-color*/
canvas {
	margin:10% 20% 0 20%;
	position:absolute;
    border-bottom:10px solid #F5F5F5;
    background-color: #F44336;
}
body{background:#F44336;}
h2{text-align:center;}
h2#sm-scr{display:none;}
a:link,a:visited,a:hover{color:white;}
a:hover{text-decoration:none}
img{padding:5%}
</style>
<script>
$(document).keydown(function(){
			if(event.which==32){accelerate(-0.2);			}
});
$(document).keyup(function(){
			if(event.which==32){accelerate(0.05);}
});
function s(){
$(window).resize(function(e) {
    if($(window).innerWidth()<1100){
		$("canvas").css("display","none");
		$("#lg-scr").css("display","none");
		$("#sm-scr").css("display","block");
	} else {
		$("#lg-scr").css("display","block");
		$("#sm-scr").css("display","none");
		$("canvas").css("display","block");}
});
if($(window).innerWidth()<1100){
	$("canvas").css("display","none");
	$("h2#lg-scr").css("display","none");
		$("h2#sm-scr").css("display","block");
	} else {
		$("#lg-scr").css("display","block");
		$("#sm-scr").css("display","none");
		$("canvas").css("display","block");}
}
</script>
</head>

<body onload="startGame();s()">
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
<div class="main">

<h2>Ooops!! The page you looking for cannot be found!</h2>
<h2 id="lg-scr">Go home by <a href="home">clicking here</a> or use <kbd>Space bar</kbd> to play Angry Square!</h2>
<h2 id="sm-scr">Go home by clicking here <i class="fa fa-hand-o-down" aria-hidden="true"></i>
<a href="home"><img src="images/system-img/404-face.jpg" alt="404-face.jpg" width="100%"></a>
</h2>

<!--<h2><button id="acce" onmousedown="accelerate(-0.2)" onmouseup="accelerate(0.05)">ACCELERATE</button></h2>-->

<!--game frame-->
<script>
var myGamePiece;
var myObstacles = [];
var myScore;

/*object and score*/
function startGame() {
    myGamePiece = new component(30, 30, "#F5F5F5", 50, 120);/*(width, height, color, x-khoang cach voi le trai, y)*/
    myGamePiece.gravity = 0.05;
    myScore = new component("30px", "Consolas", "#F5F5F5", 280, 40, "text");
    myGameArea.start();
}

/*width height*/
var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 800;
        this.canvas.height = 450;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.score = 0;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
    this.gravity = 0;
    this.gravitySpeed = 0;
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.gravitySpeed += this.gravity;
        this.x += this.speedX;
        this.y += this.speedY + this.gravitySpeed;
        this.hitBottom();
    }
    this.hitBottom = function() {
        var rockbottom = myGameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;
            this.gravitySpeed = 0;
        }
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            return;
        }
    }
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(150)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 50;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(10, height, "#F5F5F5", x, 0));
        myObstacles.push(new component(10, x - height - gap, "#F5F5F5", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].x += -1;
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myGamePiece.newPos();
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function accelerate(n) {
    myGamePiece.gravity = n;
}
</script>
<!--end game frame-->

</div>      
<?php include ("modal.php");?>
 
</body>
</html>