<?php
session_start();
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
	include_once("function.php");
	save_guest_info();
	//get link of current page
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$type=isset($_GET['type'])?$_GET['type']:1;
	$id=isset($_GET['id'])?$_GET['id']:1;
	if($type==$id){header("location:post.php");}
	$post = get_content($type,$id);
	//get the next post by id
	$next_post_type = $type."next";
	$next_post = get_content($next_post_type,$id);
	//get the newest post
	$newest_post_type = $type."newest";
	$newest_post = get_content($newest_post_type,$id);
	//if there is no next post show newest post
	if(count($next_post)==0){$next_post = $newest_post;}
	//neu co URL tu project thi them view roi redirect toi url
	if(isset($_GET['url'])){
		//lỗi ko dùng hàm count_view để dẫn tới url đc, tạm dùng cách này
		header("location:{$_GET['url']}");
		//count_view('project',$_GET['url']);
	}
	//tang view
	count_view('post',$id);
	disconnect_db();
?>
<!doctype html>
<html>
<head>
<?php foreach($post as $item) {?>
<title><?php echo @$item['post_title'];?></title>
<?php include ("linkref.php");?>
</head>

<body  style="background:<?php echo @$item['color'];?>">
<!--FB button-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=507805842747161";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<!--end fb button-->

<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
<div class="main">
  <?php include ("logo-top.php");?>
  <!-- inside -->
  <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
    <div class="bmp-inside"> 
      <!-- icon -->
      <div class="bmp-icon-tit"><?php echo @$item['post_icon'];?></div>
      <div class="bmp-inside-container"> 
        
        <!-- title -->
        <h1><?php echo @$item['post_title'];?></h1>
        
        <!-- content -->
        <div class="bmp-content"> 
          
          <!-- info post -->
          <p style="font-style:italic;color:#BDBDBD;text-align:center;"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo @$item['post_date_add'];?> - <i class="fa fa-eye" aria-hidden="true"></i> <?php echo @$item['post_view'];?> 
            
            <!--fb like share btn-->
          <div class="fb-like" data-href="<?php echo $actual_link;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="<?php if(@$_SESSION['admin']=='admin'){echo 'true';} else {echo 'false';}?>" data-share="true"></div>
          
          <!--info for admin--> 
          <span <?php if(@$_SESSION['admin']=='admin'){echo 'style="display:inline"';} else {echo 'style="display:none"';}?>> - <?php echo @$item['status'];?> - </span> <a <?php if(@$_SESSION['admin']=='admin'){echo 'style="display:inline"';} else {echo 'style="display:none"';}?> href='post-edit.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
          </p>
          <?php echo @$item['post_content'];?> 
          
          <!--fb like share btn-->
          <div class="fb-like" data-href="<?php echo $actual_link;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="<?php if(@$_SESSION['admin']=='admin'){echo 'true';} else {echo 'false';}?>" data-share="true"></div>
        </div>
        <!-- end content --> 
        
        <!-- previous --> 
        
        <!-- next -->
        <?php foreach($next_post as $item){?>
        <bmp-nav-next style="background:<?php echo @$item['color'];?>">
          <div id="next-box"> <a href="<?php echo @$item['type'];?>/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>"> <?php echo @$item['post_title'];?> </a> </div>
        </bmp-nav-next>
        <?php }?>
      </div>
    </div>
  </div>
  <!-- end inside --> 
  
</div>
<?php include ("modal.php");?>
</body>
<?php }?>
</html>