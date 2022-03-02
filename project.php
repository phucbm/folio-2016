<?php
session_start();
//chuyen huong toi trang admin
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
include_once("function.php");
save_guest_info();
	$project = get_content('project','all');
	$name = "Project";
	count_view("child_lab",$name);
	disconnect_db();
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Project</title>
<?php include ("linkref.php");?>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
	<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      	<a href="home"><img src="images/system-img/bmp-black-bg.png" class="bmp-logo" alt="bmp-black-bg.png"/></a>
      </div>
      <!-- frame -->
      <?php foreach($project as $item){?>
      <div class="bmp-col-4 bmp-col-m-6 bmp-col-s-12">
      	<bmp-project-frame>
            <bmp-project-img><a href="post-inside.php?url=<?php echo @$item['url'];?>" target="_blank"><img src="<?php echo @$item['img'];?>" alt="<?php echo @$item['title'];?>"/></a></bmp-project-img>
            <bmp-project-tit><?php echo @$item['title'];?></bmp-project-tit>
            <bmp-project-content><?php echo @$item['part'];?></bmp-project-content>
        </bmp-project-frame>
      </div>
      <?php }?>
      <!-- end frame -->
      
     
</div>

<?php include ("footer.php");?>
<?php include ("modal.php");?>

</body>
</html>