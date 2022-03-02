<?php
session_start();
if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	
	//cap nhat bang allview va xoa bang guest
	if(@$_GET['act']=="updateview"){ save_guest_info();update_allview(0);}
	if(@$_GET['act']=="delggview"){ save_guest_info();update_allview(2);}
	if(@$_GET['act']=="delsignlog"){ save_guest_info();update_allview(3);}
	if(isset($_GET['type'])){ save_guest_info();delete_content(@$_GET['type'],@$_GET['id']);}
	disconnect_db();
} else {
	header("location:Fire-To-The-Hole");exit();
}
?>