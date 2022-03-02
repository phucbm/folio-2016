<?php
session_start();

if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	save_guest_info();
	$project = get_content("project","all");
	$lab = get_content("lab","all");
	$blog = get_content("blog","all");
	$guest_visit = get_content("guest", '0');
	$admin_visit = get_content("guest", '1');
	$gg_visit = get_content("guest", '2');
	$view = get_content('view','all');
	$noti = get_content('noti','all');
	$mess = get_content('mess','all');
	$child_lab = get_content('child_lab','all');
	if(isset($_POST['submit_noti'])){
		set_noti($_POST['noti']);
	}
	disconnect_db();
} else {
	header("location:Fire-To-The-Hole");exit();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Admin</title>

<?php include ("linkref.php");?>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
	<?php include ("logo-top.php");?>
    <!-- views page -->
    <h1><i class="fa fa-users" aria-hidden="true"></i> All visitors: 
	   <?php foreach($view as $item){
		   $allvisitors = count($guest_visit) + $item['view'];
		  echo $allvisitors." (from ".$item['fr_om']." to this moment)";}?>
          <a href="delete.php?act=updateview" onClick="return confirm('This action will update visit number in VIEW table, then delete all guest records in GUEST table. Are you sure?')"> - <i class="fa fa-refresh" aria-hidden="true"></i></a>
          </h1>
    <!-- end view -->
    
    <!-- noti -->
    <h1><i class="fa fa-flag" aria-hidden="true"></i> Current notification:</h1>
    <form method="post">
    	<div class="bmp-col-10 bmp-col-m-9 bmp-col-s-12">
        	<input type="text" name="noti" value="<?php foreach($noti as $item){echo $item['noti_content'];}?>" placeholder="Type new notification here.."/></div>
        <div class="bmp-col-2 bmp-col-m-3 bmp-col-s-12">
        	<input type="submit" class="submit-btn" name="submit_noti" value="Set new notification!" /></div>
    </form>
    <!-- end noti -->
    
    <!-- message -->      	
            <div class="menu-toggle">
            	<h1><i class="fa fa-commenting" aria-hidden="true"></i> Message: <?php echo count($mess);?></h1></div>
            <div>
                <table>
                  <tbody>
                    <tr>
                      <th>STT</th>
                      <th>ID - IP</th>
                      <th>From</th>
                      <th>Subject</th>
                      <th>Time</th>
                      <th>Message</th>
                      <th>Action</th>
                    </tr>
                    <?php $stt=1; foreach($mess as $item){?>
                    <tr>
                      <td><?php echo $stt++;?></td>
                      <td><?php echo @$item['id'];?> - <?php echo @$item['ct_ip'];?></td>
                      <td><?php echo @$item['ct_name'];?> - 
					  	<a href="mailto:<?php echo @$item['ct_mail'];?>"><?php echo @$item['ct_mail'];?></a></td>
                      <td><?php echo @$item['ct_abt'];?></td>
                      <td><?php echo @$item['ct_time'];?></td>
                      <td><?php echo @$item['ct_mess'];?></td>
                      <td>
                      <a href="delete.php?type=mess&id=<?php echo @$item['id'];?>" onclick="return confirm('Are you sure to delete mess from: <?php echo @$item['ct_name'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
            </div>
      <!-- end message -->
      
      <!-- project -->      	
            <div class="menu-toggle">
            	<h1><i class="fa fa-briefcase" aria-hidden="true"></i> Project: <?php echo count($project);?> - 
                <a target='_blank' href="project-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h1></div>
            <div>
                <table>
                  <tbody>
                    <tr>
                      <th>STT</th>
                      <th>ID</th>
                      <th>Thumbnail</th>
                      <th>Title</th>
                      <th>Create</th>
                      <th>Last Update</th>
                      <th>View</th>
                      <th>Action</th>
                    </tr>
                    <?php $stt=1; foreach($project as $item){?>
                    <tr>
                      <td><?php echo $stt++;?></td>
                      <td><?php echo @$item['project_id'];?></td>
                      <td><img src="<?php echo @$item['img'];?>" alt="<?php echo @$item['title'];?>"/></td>
                      <td><a href="<?php echo @$item['url'];?>" target="new"><?php echo @$item['title'];?></a></td>
                      <td><?php echo @$item['project_date'];?></td>
                      <td><?php echo @$item['project_date_update'];?></td>
                      <td>
                      <a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/post-inside.php?url=<?php echo @$item['url'];?>" target="new">
                      <?php echo @$item['view'];?></a></td>
                      <td>
                      <a href="project-edit.php?id=<?php echo @$item['project_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                      <a href="delete.php?type=project&id=<?php echo @$item['project_id'];?>" onclick="return confirm('Are you sure to delete project: <?php echo @$item['title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
            </div>
      <!-- end project -->
      
      <!-- lab -->
		<div class="menu-toggle">
        	<h1><i class="fa fa-flask" aria-hidden="true"></i> Labs: <?php echo count($lab);?> - 
            <a target='_blank' href="post-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h1></div>
        <div>
            <table>
              <tbody>
                <tr>
                  <th>STT</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Color</th>
                  <th>Icon</th>
                  <th>Create</th>
                  <th>Last Update</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
                <?php $stt=1; foreach($lab as $item){?>
                <tr>
                  <td><?php echo $stt++;?></td>
                  <td><?php echo @$item['post_id'];?></td>
                  <td><a href="lab/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="new"><?php echo @$item['post_title'];?></a></td>
                  <td style="background:<?php echo @$item['color'];?>"><?php echo @$item['color'];?></td>
                  <td><?php echo @$item['post_icon'];?></td>
                  <td><?php echo @$item['post_date_add'];?></td>
                  <td><?php echo @$item['post_date_update'];?></td>
                  <td><?php echo @$item['status'];?></td>
                  <td>
                  <a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/lab/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="new">
                  <?php echo @$item['post_view'];?></a></td>
                  <td>
                  <a target='_blank' href="post-edit.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                  <a href="delete.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['type'];?>: <?php echo @$item['post_title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
      <!-- end lab -->
      
      <!-- child lab -->      	
            <div class="menu-toggle">
            	<h1><i class="fa fa-child" aria-hidden="true"></i> Child page from Lab: <?php echo count($child_lab);?> - 
                <a target='_blank' href="child-lab-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                </h1></div>
            <div>
                <table>
                  <tbody>
                    <tr>
                      <th>STT</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>From</th>
                      <th>View</th>
                      <th>Create</th>
                      <th>Last Update</th>
                      <th>Action</th>
                    </tr>
                    <?php $stt=1; foreach($child_lab as $item){?>
                    <tr>
                      <td><?php echo $stt++;?></td>
                      <td><?php echo @$item['id'];?></td>
                      <td><a href="<?php echo @$item['url'];?>" target="_blank"><?php echo @$item['name'];?></a></td>
                      <td><a href="<?php echo @$item['mother_page'];?>" target="_blank"><?php echo @$item['mother_page'];?></a></td>
                      <td><?php echo @$item['view'];?></td>
                      <td><?php echo @$item['date_add'];?></td>
                      <td><?php echo @$item['date_update'];?></td>
                      <td>
              
              <a target='_blank' href="child-lab-edit.php?id=<?php echo @$item['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              <a href="delete.php?type=child_lab&id=<?php echo @$item['id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['name'];?> from <?php echo @$item['mother_page'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
              		</td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
            </div>
      <!-- end child lab -->
      
       <!-- blog -->
		<div class="menu-toggle">
        	<h1><i class="fa fa-rss" aria-hidden="true"></i> Blogs: <?php echo count($blog);?> - 
            <a target='_blank' href="post-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h1></div>
        <div>
        <table>
          <tbody>
            <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Title</th>
              <th>Color</th>
              <th>Icon</th>
              <th>Create</th>
              <th>Last Update</th>
              <th>Status</th>
              <th>View</th>
              <th>Action</th>
            </tr>
            <?php $stt=1; foreach($blog as $item){?>
            <tr>
              <td><?php echo $stt++;?></td>
              <td><?php echo @$item['post_id'];?></td>
              <td><a href="blog/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="_blank"><?php echo @$item['post_title'];?></a></td>
              <td style="background:<?php echo @$item['color'];?>"><?php echo @$item['color'];?></td>
              <td><?php echo @$item['post_icon'];?></td>
              <td><?php echo @$item['post_date_add'];?></td>
              <td><?php echo @$item['post_date_update'];?></td>
              <td><?php echo @$item['status'];?></td>
              <td>
			  <a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/blog/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="new">
			  <?php echo @$item['post_view'];?></a></td>
              <td>
              <a target='_blank' href="post-edit.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              <a href="delete.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['type'];?>: <?php echo @$item['post_title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        </div>
      <!-- end blog -->
      
      <!-- admin visit-->
      <div class="menu-toggle">
      	<h1><i class="fa fa-user" aria-hidden="true"></i> Recently admin actions: <?php echo count($admin_visit);?> - 
        <a href="delete.php?type=guest&id=1" onClick="return confirm('This action will delete all admin actions in GUEST table. Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></h1></div>
      <div style="overflow-x:auto;overflow-y:scroll;height:600px;">
        <table>
          <tbody>
            <tr>
              <th>STT</th>
              <th>time</th>
              <th>name-IP</th>
              <th>URl</th>
              <th>from</th>
              <th>browser</th>
              <th>location</th>
              <th>service</th>
            </tr>
            <?php $stt=count($admin_visit); foreach($admin_visit as $item){?>
            <tr>
              <td><?php echo $stt--;?></td>
              <td><?php echo @$item['g_time'];?></td>
              <!-- IP -->
              <td>
              <a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new">
			  <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
              <!-- URL -->
              <td>
              <a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
			  <?php echo @$item['g_url'];?></a></td>
              <!-- refer -->
              <td><div style="overflow-y: hidden;overflow-x: scroll; width:200px;">
			  <a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
			  <?php echo @$item['g_refer'];?></a></div></td>
              <!-- browser -->
              <td><div style="overflow-x: hidden;overflow-y: scroll; height:50px;">
			  <a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
			  <?php echo @$item['g_brs'];?></a></div></td>
              <!-- location -->
              <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new">
			  <?php echo @$item['g_loc'];?></a></td>
              <!-- nha mang -->
              <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new">
			  <?php echo @$item['g_mang'];?></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        </div>
      <!-- end admin visit -->
      
      <!-- guest visit-->
      <div class="menu-toggle">
      	<h1><i class="fa fa-users" aria-hidden="true"></i> Recently visitors: <?php echo count($guest_visit);?> - 
        <a href="delete.php?act=updateview" onClick="return confirm('This action will delete all guest records in GUEST table. Are you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </h1></div>
      <div style="overflow-x:auto;overflow-y:scroll;height:600px;">
        <table>
          <tbody>
            <tr>
              <th>STT</th>
              <th>time</th>
              <th>name-IP</th>
              <th>URl</th>
              <th>from</th>
              <th>browser</th>
              <th>location</th>
              <th>service</th>
            </tr>
            <?php $stt=count($guest_visit); foreach($guest_visit as $item){?>
            <tr>
              <td><?php echo $stt--;?></td>
              <td><?php echo @$item['g_time'];?></td>
              <!-- IP -->
              <td>
              <a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new">
			  <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
              <!-- URL -->
              <td>
              <a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
			  <?php echo @$item['g_url'];?></a></td>
              <!-- refer -->
              <td><div style="overflow-y: hidden;overflow-x: scroll; width:200px;">
			  <a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
			  <?php echo @$item['g_refer'];?></a></div></td>
              <!-- browser -->
              <td><div style="overflow-x: hidden;overflow-y: scroll; height:50px;">
			  <a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
			  <?php echo @$item['g_brs'];?></a></div></td>
              <!-- location -->
              <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new">
			  <?php echo @$item['g_loc'];?></a></td>
              <!-- nha mang -->
              <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new">
			  <?php echo @$item['g_mang'];?></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        </div>
      <!-- end guest visit -->
      
      <!-- gg visit-->
      <div class="menu-toggle">
      	<h1><i class="fa fa-users" aria-hidden="true"></i> Recently GG visitors: <?php echo count($gg_visit);?> - 
        <a href="delete.php?act=delggview" onClick="return confirm('This action will delete all guest records in GUEST table. Are you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </h1></div>
      <div style="overflow-x:auto;overflow-y:scroll;height:600px;">
        <table>
          <tbody>
            <tr>
              <th>STT</th>
              <th>time</th>
              <th>name-IP</th>
              <th>URl</th>
              <th>from</th>
              <th>browser</th>
              <th>location</th>
              <th>service</th>
            </tr>
            <?php $stt=count($gg_visit); foreach($gg_visit as $item){?>
            <tr>
              <td><?php echo $stt--;?></td>
              <td><?php echo @$item['g_time'];?></td>
              <!-- IP -->
              <td>
              <a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new">
			  <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
              <!-- URL -->
              <td>
              <a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
			  <?php echo @$item['g_url'];?></a></td>
              <!-- refer -->
              <td><div style="overflow-y: hidden;overflow-x: scroll; width:200px;">
			  <a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
			  <?php echo @$item['g_refer'];?></a></div></td>
              <!-- browser -->
              <td><div style="overflow-x: hidden;overflow-y: scroll; height:50px;">
			  <a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
			  <?php echo @$item['g_brs'];?></a></div></td>
              <!-- location -->
              <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new">
			  <?php echo @$item['g_loc'];?></a></td>
              <!-- nha mang -->
              <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new">
			  <?php echo @$item['g_mang'];?></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        </div>
      <!-- end gg visit -->
</div>

<?php include ("footer.php");?>
<?php include ("modal.php");?>
</body>
</html>