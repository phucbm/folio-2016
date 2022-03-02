<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("../function.php");
save_guest_info();
if(@$_SESSION['admin']=='admin'){$tips = "<a href='Fire-To-The-Hole?sign=out'>Đại ca muốn thoát thì hãy nhấp vào em :\"\>></a>";} 
else {$tips = "Tips: Use shortcut to imrprove your experience ;)";}
//IMPORTANT
$name = "Teen Code";
count_view("child_lab",$name);
$child_lab = get_content('child_lab_view',$name);
$github_link = "https://github.com/phucbm/lab-file/blob/master/sontung-code.php";
//get link of current page
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!doctype html>
<html>
<head>

<title>Phổ cập TeenCode | BMP</title>
<meta itemprop="image" content="http://site.phucbm.com/buiminhphuc.tk/images/lab/teencode.gif" />
<meta name="description" content="Chương trình Javascript đơn giản chuyển tiếng Việt thành tiếng của Sky và teencode." />
<meta name="keywords" content="sơn tùng mpt, sky, teencode, bmp, bui minh phuc, javascript">
<?php include ("../labref.php");?>

<script>
/*      ******       **        **   ******       
        **    **     ****    ****   **    **     
        **    **     ** **  ** **   **    **     
        ********     **  ****  **   ******       
        **      **   **        **   **           
        **      **   **        **   **           
        ********     **  2016  **   **         feel free to copy*/
		
var noti=0;
function play_now(){
	//lấy chuỗi
	var val_ea = code.ea.value; 
	var val_sky = code.sky.value;
	var val_tr = code.trau.value;
	var val_s = code.stime.value;
	
	//gan so chu s va thay vao chuoi goc
	var s='';
	for(var i=0;i<val_s;i++){s+='s';}
	s = "\'"+s+" ";
	var str_e = val_ea.replace(/ /g,s);

	var eaLang =['ch','ck','nh','nk','b','p',
	'a','4','á','A\'','à','a`','ã','a~','ả','A~','ạ','Ạ',
	'â','a^','ầ','a^`','ấ','A^\'','ẩ','a^~','ậ','Ạ^',
	'ắ','Ă\'','ằ','Ă`','ẵ','Ă~','ẳ','Ă~','ặ','Ặ','ă','Ă',
	'o','0','ó','0\'','ò','0`','õ','0~','ọ','0','ỏ','O~',
	'ỗ','0^~','ố','0^\'','ô','0^','ồ','0^`','ổ','0^~','ộ','Ọ^',
	'ơ','Ơ','ớ','Ơ\'','ờ','Ơ`','ở','ơ~','ỡ','Ơ~','ợ','Ợ',
	'ủ','u~','ụ','Ụ','ù','U`','ú','U\'','ũ','U~','u','U',
	'ư','Ư','ứ','Ư\'','ừ','Ư`','ữ','Ư~','ử','Ư?','ự','Ự',
	'i','1','í','1\'','ì','I`','ĩ','I~','ị','!',
	'ê','e^','ề','3^`','ể','Ê~','ệ','Ệ','ễ','e^~','ế','3^\'',
	'e','3','é','3\'','è','3`','ẻ','E~','ẽ','3~','ẹ','Ẹ',
	'gi','z','gì','j`','y','i',
	'yêu','iêu','thích','thík','không','k0','được','dk','vậy','vaj'];
	
	var str_tr = val_ea.toLowerCase();
	for(var i=0;i<eaLang.length;i+=2){
		var re = new RegExp(eaLang[i], "g");
		str_tr = str_tr.replace(re,eaLang[i+1]);
	}

	
	//gan
	code.sky.value = str_e;
	code.trau.value = str_tr;
	
	//set length
	val_sky = code.sky.value;
	val_tr = code.trau.value;
	switch(val_ea.length){
		case 0: code.elen.value ='';break;
		default: code.elen.value = val_ea.length + ' kí tự';
	}
	switch(val_sky.length){
		case 0: code.slen.value ='';break;
		default: code.slen.value = val_sky.length + ' kí tự';
	}
	switch(val_tr.length){
		case 0: code.tlen.value ='';break;
		default: code.tlen.value = val_tr.length + ' kí tự';
	}
}

function xoa(){
	code.ea.value='';code.sky.value='';code.trau.value='';
}

$(document).keyup(function(){ play_now();});
</script>

<style>
input#len {
	border: 0;
	background: rgba(0,0,0,0.00)
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
<div class="main jumbotron">
  <h1 style="text-align:center">TEEN CODE CHO MỌI NGƯỜI</h1>
  <p style="text-align:center" id="watch"></p>
</div>

<div class="main container">
  <form method="post" name="code" autocomplete="off">
    
    <div class="form-group">
      <label for="sel1">Số chữ 's':</label>
      <input type="number" onChange="play_now()" class="form-control" name='stime' min="1" max="10" value="1">
    </div>
    
    <!-- Tiếng Sky -->
    <div class="form-group">
      <label class="control-label" for="dai">Tiếng Sky: 
      <input id="len" type="text" name="slen" disabled/>
      </label>
      <textarea class="form-control" name="sky" id="sky"></textarea>
    </div>
    
    <!-- Tiếng Trẩu -->
    <div class="form-group">
      <label class="control-label" for="dai">Tiếng Trẩu: 
      <input id="len" type="text" name="tlen" disabled/>
      </label>
      <textarea class="form-control" name="trau" id="trau"></textarea>
    </div>
    
    <!-- nhap chuoi -->
    <div class="form-group">
      <label for="num">Tiếng mặt đất: 
      <input id="len" type="text" name="elen" disabled/>
      </label>
      <textarea class="form-control" type="text" name="ea" id="ea" placeholder="Gõ tiếng Việt có dấu..." autofocus></textarea>
    </div>
    
    <!-- clear message -->
    <div class="btn-group btn-group-justified">
            <!-- clear all-->
            <div class="btn-group">
            <button class="btn btn-danger" type="button" onClick="xoa()">Xóa tất cả</button></div>
        </div>
  </form>
</div>
<?php include ("../modal.php");?>
<?php include ("../footer.php");?>
</body>
</html>