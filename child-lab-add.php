<?php
session_start();
if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	save_guest_info();
	// Nếu người dùng submit form
	if (!empty($_POST['submit']))
	{
		// Neu ko co loi thi add
		add_child_lab($_POST['name'], $_POST['url'], $_POST['mother_page']);
	}
	disconnect_db();
} else {
	header("location:Fire-To-The-Hole");exit();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Add New Child Lab</title>
<?php include ("linkref.php");?>
</head>

<body id="admin">
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
	<?php include ("logo-top.php");?>
      <!-- add frame -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      <div class="bmp-add-project">
      	<h1>Add new Child lab:</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Give this page a cute name" maxlength="50" autofocus required/>
            <input type="text" name="url" placeholder="Full link of this child" maxlength="200" required/>
            <input type="text" name="mother_page" placeholder="Full link to contact with this child's mother" maxlength="200" required/>
            <input type="submit" class="submit-btn" name="submit" value="Add now">
        </form>
      </div>
      </div>
      <!-- end add frame -->
      
     
</div>
<?php include ("footer.php");?>
<?php include ("modal.php");?>
 
</body>
</html>