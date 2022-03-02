<?php
session_start();
if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	// Nếu người dùng submit form
	if (!empty($_POST['submit_project']))
	{
		// Lay data
		$data['img'] = $_POST['img'];
		$data['url'] = $_POST['url'];
		$data['title'] = $_POST['title'];
		$data['part'] = $_POST['part'];
		
		// Neu ko co loi thi add
		add_project($data['img'], $data['url'], $data['title'], $data['part']);
	}
	disconnect_db();
} else {
	header("location:Fire-To-The-Hole");exit();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Add New Project</title>
<?php include ("linkref.php");?>
</head>

<body id="admin">
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
	<?php include ("logo-top.php");?>
      <!-- add frame -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      <div class="bmp-add-project">
      	<h1>Add new project:</h1>
        <form method="post">
            <input type="text" class="" id="img" name="img" placeholder="Image URL" maxlength="200" autofocus required/>
            <input type="text" class="" id="url" name="url" placeholder="Content URL" maxlength="200" required/>
            <input type="text" class="" id="title" name="title" placeholder="Project's title" maxlength="30" required/>
            <input type="text" class="" id="part" name="part" placeholder="What I did in  this project?" maxlength="30" required/>
            <input type="submit" class="submit-btn" name="submit_project" value="Add now">
        </form>
      </div>
      </div>
      <!-- end add frame -->
      
     
</div>
<?php include ("footer.php");?>
<?php include ("modal.php");?>
 
</body>
</html>