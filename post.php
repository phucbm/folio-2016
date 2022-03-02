<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}

	include_once("function.php");
	save_guest_info();
	if(@$_GET['type']==""){$_GET['type']="lab";}
	$post = get_content($_GET['type'],"all");
	$name = $_GET['type'];
	count_view("child_lab",$name);
	disconnect_db();
	if(@$_SESSION['admin']=='admin'){
	$tips = "<a href='Fire-To-The-Hole?sign=out'>Sign Out Admin</a>";
} else {
	$tips = "Tips: Use shortcut to imrprove your experience ;)";
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | <?php echo $_GET['type'];?></title>
<?php include ("linkref.php");?>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main">
<?php include ("logo-top.php");?>
      <!-- type icon -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
              <div id="lab-type"><?php if($_GET['type']=="lab") {echo "<i class='fa fa-flask' aria-hidden='true'></i>";} else {echo "<i class='fa fa-share-alt' aria-hidden='true'></i>";};?></div>
      </div>
              <!-- line -->
        <?php foreach($post as $item){?>
		<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">

        	<bmp-lab-line style="background:<?php echo @$item['color'];?>">
            <a href="<?php echo @$item['type'];?>/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>">
            <h3 <?php if(@$item['status']=='hide'){echo "style='color:#F44336'";}?>>
            <!-- mark status -->
			<?php if(@$item['status']=='hide'){echo "HIDED - ";}?>
			<?php echo @$item['post_icon'];?>
            <br>
			<?php echo @$item['post_title'];?></h3></a>
            </bmp-lab-line>
        </div>

     <?php }?>
           <!-- end line -->
</div>      
<?php include ("modal.php");?>
 
</body>
</html>