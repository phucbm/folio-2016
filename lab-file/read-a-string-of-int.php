<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("../function.php");
save_guest_info();
if(@$_SESSION['admin']=='admin'){$tips = "<a href='Fire-To-The-Hole?sign=out'>Đại ca muốn thoát thì hãy nhấp vào em :\"\>></a>";} 
else {$tips = "Tips: Use shortcut to imrprove your experience ;)";}
//IMPORTANT
$name = "Choi Voi Chuoi So";
count_view("child_lab",$name);
$child_lab = get_content('child_lab_view',$name);
$github_link = "https://github.com/phucbm/lab-file/blob/master/read-a-string-of-int.php";
//get link of current page
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!doctype html>
<html>
<head>

<title>Chơi với chuỗi số | BMP</title>
<meta itemprop="image" content="http://site.phucbm.com/buiminhphuc.tk/images/lab/chuoi-so.gif" />
<meta name="description" content="Chương trình này viết bằng Javascript, sử dụng mảng để xử lý chuỗi. Nhập dãy số tự nhiên bất kì, mỗi số cách nhau bằng khoảng trắng. Trả về tổng, tích, sắp xếp lại theo theo thứ tự." />
<meta name="keywords" content="chuỗi số, tổng chuỗi số, katakana, bmp, bui minh phuc, javascript">
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
	noti +=1;
	switch(noti){
	case 20: alert('Cũng chịu chơi quá ha :))');break;
	case 30: alert('Có vẻ nghiêm túc! Có gì mà gõ nhiều vậy?');break;
	case 50: alert('Định hack đúng không? Chết mày rồi con ạ.');break;
	}
	var num_arr = new Array(); //tạo mảng chứa số
	num_val = chuoi.num.value; //lấy chuỗi
	
	flag=0;
	var z = 0;
	
	//tách số và gán vào mảng
	for(var i = 0;i < num_val.length;i++){
		if(flag==1){break;} //gặp flag thì break
		if(z-1==num_val.length){break;}
		
		num_arr[i] = '';
		
		for(var j=z;j < num_val.length;j++,z++){ //sau break j = 0
			temp = num_val.substr(j,1);
			if(temp.charCodeAt(0)==32){z++;break;} //gặp khoảng trắng thì break
			if(temp.charCodeAt(0)>=48 && temp.charCodeAt(0)<=57 || temp.charCodeAt(0)>=45){
				num_arr[i] += temp;
				if((num_arr[i]).length==num_val.length){flag=1;break;} //chiều dài phần tử bằng đúng chiều dài chuỗi thì break
			}
		}
	}
	
	//lọc xóa num_arr chứa dấu cách
	for(var i=0; i < num_arr.length; i++){
		if(isNaN((num_arr[i]).charCodeAt(0))){
			num_arr.splice(i,1);i--;
		}
		else {num_arr[i] = parseFloat((num_arr[i]));}
	}
	
	//tổng
	for(var i=0,tong='',result=0; i < num_arr.length; i++){
		if(i==0) {p=""} else {p=" + "}
		if(num_arr[i]>0){ tong += p + num_arr[i];}
		else { tong += p + '(' + num_arr[i] + ')';}
		result += num_arr[i];
		chuoi.tong.value = tong + ' = ' + result;
	}
	
	//tích
	for(var i=0,tich='',result=1; i < num_arr.length; i++){
		if(i==0) {p=""} else {p=" x "}
		if(num_arr[i]>0){ tich += p + num_arr[i];}
		else { tich += p + '(' + num_arr[i] + ')';}
		result *= num_arr[i];
		chuoi.tich.value = tich + ' = ' + result;
	}
	
	
	//sắp xếp tăng dần 1 3 2 4
	if(num_arr.length==1){
		chuoi.tang.value = "Ê các Hạ! Nó cho tao có một số à không sắp xếp được :(";
		chuoi.giam.value = "Hãm thật tao cũng không hơn gì mày đường Tăng ạ!";
	}
	else {
		for(var i=0; i < num_arr.length-1; i++){
			for(var j=i+1; j < num_arr.length; j++){
				if(num_arr[i] > num_arr[j]){
					temp = num_arr[i];
					num_arr[i] = num_arr[j];
					num_arr[j] = temp;
				}
			}
			chuoi.tang.value = num_arr.join(' < ');
		}
		chuoi.giam.value = num_arr.sort(function(a, b){return b - a}).join(' > ');
	}
	
	chuoi.dai.value = num_arr.length + ' số và ' + num_val.length + ' kí tự.'; //lấy độ dài chuỗi sau khi lọc space
	
	
}

function xoa_chuoi(){
	chuoi.num.value = "";
	chuoi.tong.value="";
	chuoi.dai.value="";
	chuoi.tich.value="";
	chuoi.tang.value="";
	chuoi.giam.value="";
}

$(document).keyup(function(){ play_now();});
</script>

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
  <h1 style="text-align:center">Sắp xếp. Tổng. Tích.</h1>
  <p style="text-align:center">Ngôn ngữ sử dụng: JavaScript. Hỗ trợ tập số thực.</p>
</div>

<div class="main container">
  <form method="post" name="chuoi" action="">
    <!-- nhap chuoi -->
    <div class="form-group">
      <label for="num">Nhập chuỗi số bất kì:</label>
      <input class="form-control" type="text" name="num" value="15 -11 -1996" placeholder="Số thập phân, số âm số dương chấp hết nhé!" required/>
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block" type="button" name="submit" onClick="play_now()">Chơi</button>
    </div>
    
    <!-- result message -->
    <div class="form-group">
      <label class="control-label" for="dai">Chuỗi có:</label>
      <input class="form-control" name="dai" value="" disabled>
    </div>
    
    <div class="form-group">
      <label class="control-label" for="tong">Tổng các số trong chuỗi là:</label>
      <input class="form-control" name="tong" value="" disabled>
    </div>
    
    <div class="form-group">
      <label class="control-label" for="tich">Tích các số trong chuỗi là:</label>
      <input class="form-control" name="tich" value="" disabled>
    </div>
    
    <div class="form-group">
      <label class="control-label" for="tang">Sắp xếp theo thứ tự tăng dần:</label>
      <input class="form-control" name="tang" value="" disabled>
    </div>
    
    <div class="form-group">
      <label class="control-label" for="giam">Sắp xếp theo thứ tự giảm dần:</label>
      <input class="form-control" name="giam" value="" disabled>
    </div>
    
    <!-- clear message -->
    <button class="btn btn-warning btn-block" type="button" name="xoa" onClick="xoa_chuoi()">Xóa chuỗi</button>
  </form>
</div>
<?php include ("../modal.php");?>
<?php include ("../footer.php");?>
</body>
</html>