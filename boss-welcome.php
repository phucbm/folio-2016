<?php
session_start();
include_once("function.php");
if(@$_GET['xss']=="victim"){
	/*echo("<script>alert(123)</script>");*/
	send_report("victim",$_GET['url']);
}
else {
// Nếu người dùng submit form
if(@$_GET['sign']=="out"){save_guest_info();admin_signout();}
if (!empty($_POST['submit']))
{	
admin_signin($_POST['password']);		
}
disconnect_db();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Admin Sign In</title>
<?php include ("linkref.php");?>
</head>

<body id="admin" class="admin-sign-in">
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
<?php include ("logo-top.php");?>
      <!-- add frame -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12 admin-sign-in-frame">
      <form method="post">
		<input id="input_pass" type="password" name="password" placeholder="Type password here" required autofocus/>
        <input type="submit" name="submit" value="Sign In"/>
      </form>
      </div>
      <!-- end add frame -->
      
     
</div>
<?php include ("footer.php");?>
<?php include ("modal.php");?>
 
</body>
</html>