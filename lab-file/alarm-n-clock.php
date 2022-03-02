<?php /*
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("../function.php");
save_guest_info();
if(@$_SESSION['admin']=='admin'){$tips = "<a href='Fire-To-The-Hole?sign=out'>Sign Out Admin</a>";} 
else {$tips = "Tips: Use shortcut to imrprove your experience ;)";}
//IMPORTANT
$name = "Alarm & Clock";
count_view("child_lab",$name);
$child_lab = get_content('child_lab_view',$name);
//get link of current page
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
*/
?>

<!doctype html>
<html>
<head>
<title>Alarm & Clock | BMP</title>
<meta itemprop="image" content="http://site.phucbm.com/buiminhphuc.tk/images/lab/alarmnclock.gif" />
<meta name="description" content="" />
<meta name="keywords" content="phucsnef, bmp, bui minh phuc, javascript">
<?php include ("../labref.php");?>
<script>
/*      ******       **        **   ******       
        **    **     ****    ****   **    **     
        **    **     ** **  ** **   **    **     
        ********     **  ****  **   ******       
        **      **   **        **   **           
        **      **   **        **   **           
        ********     **  2016  **   **  1 Oct 2016       feel free to refer */
/*-------------------------------------------------------------------------- GLOBAL ------------*/

/*-------------------------------------------------------------------------- ALARM ------------*/
var arAlarm = [];
var gate = 'OPEN';
var sound = 'mute';
//get sound
var thathu = new Audio('../sounds/alarm/thathu.mp3');
var ppap = new Audio('../sounds/alarm/ppap.mp3');
var classic = new Audio('../sounds/alarm/classic.mp3');
var foxsay = new Audio('../sounds/alarm/foxsay.mp3');
var harlem = new Audio('../sounds/alarm/harlem.mp3');
function toggleAlarm(n){
	arAlarm[n][2]=='ON' ? arAlarm[n][2]='OFF' : arAlarm[n][2]='ON';
}
function playSound(n){	
	if(sound=='play'){
		switch(arAlarm[n][3]){
			case 'thathu':
				thathu.loop = true;
				thathu.play();
				break;
			case 'ppap':
				ppap.loop = true;
				ppap.play();
				break;
			case 'harlem':
				harlem.loop = true;
				harlem.play();
				break;
			case 'foxsay':
				foxsay.loop = true;
				foxsay.play();
				break;
			default:
				classic.loop = true;
				classic.play();
		}
	}
	else if(sound=='mute') {
		switch(arAlarm[n][3]){
			case 'thathu':thathu.pause();break;
			case 'ppap':ppap.pause();break;
			case 'harlem':harlem.pause();break;
			case 'foxsay':foxsay.pause();break;
			default:classic.pause();
		}
	}
}
function alarmRing(n){
		gate = 'CLOSE';
		//prevent click outside modal to close
		$('#alarmRingModal').modal({backdrop: 'static',keyboard: false})
		
		var content = '<h1>'+arAlarm[n][1]+'</h1>';
		var dismiss = '<button type="button" class="btn btn-default" onClick="dismiss('+n+')">DISMISS</button>';
		$("#alarmRingBody").html(content);
		$("#alarmRingDismiss").html(dismiss);
		$("#alarmRingModal").modal("show");

}
function dismiss(n){
	gate = 'OPEN';
	arAlarm[n][2] = 'OFF';
	sound='mute';
	playSound(n);
	$("#alarmRingModal").modal("hide");
	
	//force modal to removed, needed when 2 alarm come up in 1 minute
	$('body').removeClass('modal-open');
	$('.modal-backdrop').remove();
}
setInterval(showAlarm,100);
function showAlarm(){
	
	var now = new Date();
	var liAlarm ='';
	for(var i=0;i<arAlarm.length;i++){
		
		//count time left
		var timeLeft;
		arAlarm[i][2] == 'ON' ? timeLeft = arAlarm[i][0].getTime()-now.getTime() : timeLeft=0;
		function toHourMin(miliseconds,type){
		  
		  	//type of return
		  	if(type=='short'){
			  	h = miliseconds.getHours();
			  	m = miliseconds.getMinutes();
			  	//if(h>12){amorpm = ' PM';} else {amorpm = ' AM';}
			  	return h + ':' + m;
			}
		  	else if(type=='full'){
				var cd = 24 * 60 * 60 * 1000,
				ch = 60 * 60 * 1000,
				d = Math.floor(miliseconds / cd),
				h = Math.floor( (miliseconds - d * cd) / ch),
				m = Math.round( (miliseconds - d * cd - h * ch) / 60000),
				pad = function(n){ return n < 10 ? '0' + n : n; };
				60===m && (h++,m=0);
				h===24 && (d++,h = 0);
			  
				//is single or plural
				m > 1 ? minute = ' minutes' : minute = ' minute';
				h > 1 ? hour = ' hours ' : hour = ' hour ';
			  	return h==0 ? m + minute : pad(h) + hour + pad(m) + minute;
		  	}
		}
		
		//minute = 0 => play alarm
		function isOver(t){
			var cd = 24 * 60 * 60 * 1000,
				ch = 60 * 60 * 1000,
				d = Math.floor(t / cd),
				h = Math.floor( (t - d * cd) / ch),
				m = Math.round( (t - d * cd - h * ch) / 60000);
			return h+m;
		}
		function checkGate(){
			"OPEN"==gate && 0==isOver(timeLeft) && "ON"==arAlarm[i][2] ? 
			(alarmRing(i),sound="play",playSound(i)) : 
			setTimeout(checkGate,1000);
		}
		checkGate();			

		//set state
		var iconState;
		arAlarm[i][2]=='ON' ? iconState='<i class="material-icons">radio_button_checked</i> ON' : iconState='<i class="material-icons">radio_button_unchecked</i> OFF';
		
		 //show alarm div
		liAlarm += '<div class="row"><div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 bmp-alarm-box"><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><h2 id="alarmHour">'+toHourMin(arAlarm[i][0],'short')+'</h2><p id="alarmName">'+arAlarm[i][1]+'</p><p id="alarmLeft">'+toHourMin(timeLeft,'full')+'</p></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="text-align:center"><button type="button" class="btn btn-info bmp-alarm-check" onClick="toggleAlarm('+i+')">'+iconState+'</button><button type="button" class="btn btn-info bmp-alarm-check" id="delBtn" onClick="arAlarm.splice('+i+',1)"><i class="material-icons">delete</i></button></div></div></div>';
	}
 
	document.getElementById("liAlarm").innerHTML = liAlarm;
}
function setNewAlarm(){
	var now = new Date();
	//get value
	var hour = $("#addAlarmHour").val(); //0-23
	var minu = $("#addAlarmMin").val(); //0-59
	var name = $("#addAlarmName").val(); //text
	var alarmSound = $('select[name=addAlarmSound]').val();
	
	//set time for alarm
	var alarm = new Date();
	alarm.setHours(hour,minu,0,0);
	//neu alarm < hien tai => set for tomorrow
	alarm < now && alarm.setDate(now.getDate()+1);

	//save
	arAlarm.push([alarm,name,'ON',alarmSound]);
	
	//hide after save alarm
	$("#addAlarm").modal("hide");
}

/*-------------------------------------------------------------------------- WORLD CLOCK ------------*/
//truyen vao mui gio utc, tra ve theo format
function utcTimeFormat(utc,format){
	var date = new Date();
	
	//set mui gio hien tai = gio utc + do lech mui gio
	date.setHours(date.getUTCHours()+utc);

	var weekday = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	var month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	var h = date.getHours(),
		m = date.getMinutes(),
		s = date.getSeconds(),
		wd = weekday[date.getDay()],
		mth = month[date.getMonth()],
		d = date.getDate(),
		y = date.getFullYear();
	h > 12 ? am = ' PM' : am = ' AM';
	m < 10 ? m = '0' + m : m = m;
	switch(format){
		case 'h:m:s AM':
			h > 12 ? h-=12 : h=h;
			return h + ':' + m + ':' + s + am;
			break;
		case 'h:m AM':
			h > 12 ? h-=12 : h=h;
			return h + ':' + m + am;
			break;
		case 'wd, mth d, y':
			return wd + ', ' + mth + ' ' + d + ', ' + y;
			break;
		default: return 'Wrong format input!';
	}	
}

var place = [
	[7,'Hà Nội, Việt Nam'],
	[7,'TP. Hồ Chí Minh, Việt Nam'],
	[9,'Tokyo, Japan']
];
var arWc = [[7,'Local time'],[12,'USA']];


setInterval(showLocalTime,1000);
function showLocalTime(){
	var placeList = '';
	for(var i=0;i<arWc.length;i++){
		
		placeList += '<h3 id="wc-local-time">'+utcTimeFormat(arWc[i][0],'h:m AM')+'</h3><h5>'+arWc[i][1]+'</h5><h5 id="wc-local-day">'+utcTimeFormat(arWc[i][0],'wd, mth d, y')+'</h5>';
	
	}
	
	document.getElementById("wc-show-list").innerHTML = placeList;
	
}

function addWc(){
	var utcCode = $("#wc-list").find(":selected").attr('utc');
	var where = $("#wc-list").find(":selected").text();
	arWc.push([utcCode,where]);
	$("#addWorldClock").modal('hide');
}

</script>
<style>
.bmp-alarm-btn {
	border: 2px solid transparent;
	background: transparent;
	color: white;
	margin: 20px 6px;
}
.bmp-alarm-btn:hover {
	border: 2px solid gray;
	border-radius: 0;
	background: transparent;
	color: white;
	margin: 20px 6px;
}
.row {
	margin: 0
}
.bmp-alarm-box {
	margin: 6px 0;
}
body, .modal-body, .modal-footer, .modal-header {
	background: #333333;
	color: #ffffff
}
.bmp-alarm-check {
	border: 0;
	background: transparent;
	padding-top: 15px
}
.bmp-alarm-check:hover {
	border: 0;
	background: transparent;
}
body {
	padding-top: 10px
}
</style>
</head>
<body>

<!--FB button-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=507805842747161";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 

<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
<div class="main container-fluid">
  <h2>Alarm & Clock</h2>
  <div class="navbar-header"> </div>
  <ul class="nav nav-tabs" role="tablist">
    <li class="active" id="li-alarm"><a data-toggle="tab" href="#home"><i class="material-icons">access_alarms</i> Alarm</a></li>
    <li id="li-world"><a data-toggle="tab" href="#menu1"><i class="material-icons">language</i> World Clock</a></li>
    <li id="li-timer"><a data-toggle="tab" href="#menu2"><i class="material-icons">timelapse</i> Timer</a></li>
    <li id="li-stop"><a data-toggle="tab" href="#menu3"><i class="material-icons">timer</i> Stopwatch</a></li>
  </ul>
  <div class="tab-content"> 
    
    <!-- ALARM -->
    <div id="home" class="tab-pane fade in active">
      <div class="row" id="liAlarm"></div>
      <div class="row">
        <button type="button" class="btn btn-default bmp-alarm-btn" data-toggle="modal" data-target="#addAlarm"><i class="material-icons" style="font-size:50px">add</i></button>
        <!--<button type="button" class="btn btn-default bmp-alarm-btn" id="delAlarmCtrl" onClick="toggleDelBtn()"></button>--> 
      </div>
    </div>
    
    <!-- WORLD CLOCK -->
    <div id="menu1" class="tab-pane fade">
    	<!-- local -->
        <div class="row" id="wc-show-list"></div>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addWorldClock"><i class="material-icons">add</i></button>
    </div>
    
    <!-- TIMER -->
    <div id="menu2" class="tab-pane fade">
      <h1>Not Available</h1>
    </div>
    
    <!-- STOPWATCH -->
    <div id="menu3" class="tab-pane fade">
      <h1>Not Available</h1>
    </div>
  </div>
</div>

<!-- add alarm Modal -->
<div id="addAlarm" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">NEW ALARM</h4>
      </div>
      <div class="modal-body">
        <div class="row"> 
          
          <!-- HOUR -->
          <div class="col-lg-6">
            <label for="usr">Hours:</label>
            <input type="number" min="0" max="23" class="form-control" id="addAlarmHour" value="7" autofocus>
          </div>
          
          <!-- MIN -->
          <div class="col-lg-6">
            <label for="usr">Minutes:</label>
            <input type="number" min="0" max="59" class="form-control" id="addAlarmMin" value="30">
          </div>
          
          <!-- NAME -->
          <div class="col-lg-12">
            <label for="usr">Alarm name:</label>
            <input type="text" class="form-control" id="addAlarmName" value="Untitled">
          </div>
          
          <!-- SOUND -->
          <div class="col-lg-12">
            <label for="sound">Sound:</label>
            <select class="form-control" name="addAlarmSound" id="addAlarmSound">
              <option value="thathu">THA THU</option>
              <option value="ppap">PPAP</option>
              <option value="harlem">HARLEM SHAKE</option>
              <option value="foxsay">WHAT DOES THE FOX SAY</option>
              <option value="classic">CLASSIC</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="setNewAlarm();"><i class="material-icons">save</i></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="material-icons">close</i></button>
      </div>
    </div>
  </div>
</div>

<!-- alarm ring Modal -->
<div id="alarmRingModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ALARM</h4>
      </div>
      <div class="modal-body" id="alarmRingBody"></div>
      <div class="modal-footer" id="alarmRingDismiss"></div>
    </div>
  </div>
</div>

<!-- add world clock Modal -->
<div id="addWorldClock" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">NEW WORLD CLOCK</h4>
      </div>
      <div class="modal-body">
        <select class="form-control" id="wc-list">
        <script>
for(p in place){
    var option=$('<option></option>');
    option.attr('utc',place[p][0]);
    option.text(place[p][1]);
    $('#wc-list').append(option);
}
</script>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="addWc()"><i class="material-icons">add</i></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="material-icons">close</i></button>
      </div>
    </div>
  </div>
</div>

<?php include ("../modal.php");?>
<?php /*include ("../footer.php");*/?>
</body>
</html>