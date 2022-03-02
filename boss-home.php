<?php 
session_start();

if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	save_guest_info();
	//add password by AJAX method
	if(isset($_REQUEST['q'])){
				if($_REQUEST['q']=='addPassword'){
					save_pw($_REQUEST['service_name'], $_REQUEST['user_name'], $_REQUEST['pw'], $_REQUEST['link_to'], $_REQUEST['note'], "add");
				}
				if($_REQUEST['q']=='editPassword'){
					save_pw($_REQUEST['service_name'], $_REQUEST['user_name'], $_REQUEST['pw'], $_REQUEST['link_to'], $_REQUEST['note'], $_REQUEST['id']);
				}
			}
	$project = get_content("project","all");
	$lab = get_content("lab","all");
	$blog = get_content("blog","all");
	$guest_visit = get_content("guest", '0');
	$admin_visit = get_content("guest", '1');
	$gg_visit = get_content("guest", '2');
	$signin_visit = get_content("guest", '3');
	$view = get_content('view','all');
	$noti = get_content('noti','all');
	$watashinodesu = get_content('watashinodesu','pw');
	$mess = get_content('mess','all');
	$child_lab = get_content('child_lab','all');
	$guest_today = get_content('todayview', '0');
	$gg_today = get_content('todayview', '2');
	$admin_today = get_content('todayview', '1');
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
<?php include ("labref.php");?>
<script>
          function editPw(id) {
				var service_name = document.getElementById('service_name'+id).value;
				var user_name = document.getElementById('user_name'+id).value;
				var pw = document.getElementById('pw'+id).value;
				var link_to = document.getElementById('link_to'+id).value;
				var note = document.getElementById('note'+id).value;
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET", "boss-home.php?q=editPassword&service_name=" + service_name +
					"&user_name=" + user_name+
					"&pw=" + pw+
					"&link_to=" + link_to+
					"&id="+id+
					"&note="+note, true);
					xmlhttp.send();
					alert("Edit success!");
			}
          function addPw() {
				var service_name = document.getElementById('service_name').value;
				var user_name = document.getElementById('user_name').value;
				var pw = document.getElementById('pw').value;
				var link_to = document.getElementById('link_to').value;
				var note = document.getElementById('note').value;
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET", "boss-home.php?q=addPassword&service_name=" + service_name +"&user_name=" + user_name+"&pw=" + pw+"&link_to=" + link_to+"&note="+note, true);
					xmlhttp.send();
					alert("Your report has been sent. Thank you for your support!");
			}
			</script>
<style>
.watashino-txt{
	color:transparent;
}
.watashino-txt::selection{
	background:black;
}
button.btn-admin {
	width: 220px;
	height: 220px;
	padding: 10px;
	margin: 10px;
}
i.i-admin {
	font-size: 100px
}
span.span-admin {
	font-size: 25px;
}
p.p-admin {
	font-size: 35px;
	margin: 0
}
td img {
	width: 30px;
	transition: all 0.5s ease;
}
td img:hover {
	width: 150px;
}
td, th {
	text-align: center;
	padding: 0 1vw;
	vertical-align: middle;
}
.modal-lg {
	width: 90%;
}
.bmp-text-overflow {
	width: 13em;
	word-wrap: break-word;
}
ten3px{font-size:13px;}
</style>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
<div class="main container-fluid">
  <?php include ("logo-top.php");?>
  
  <!-- noti -->
  <form method="post" style="margin:a auto">
    <div style="text-align:center;margin:15px 0">
      <div style="width:400px;display:inline-block">
        <input type="text" class="form-control" name="noti" value="<?php foreach($noti as $item){echo $item['noti_content'];}?>" placeholder="Type new notification here.."/>
      </div>
      <div style="width:150px;display:inline-block">
        <input type="submit" class="btn btn-info" name="submit_noti" value="Set new notification!" />
      </div>
    </div>
  </form>
  <div style="text-align:center"> 
    <!--btn group--> 
    
    <!-- all view progress -->
    <button type="button" class="btn btn-default btn-admin">
    <h1 style="font-size:80px">
    
      <?php foreach($view as $item){
		   $allvisitors = count($guest_visit) + $item['view'];
		  echo $allvisitors;}?>
      <h6><span class="badge span-admin">VISITORS</span></h6>
    </h1>
    </button>
    
    <!-- btn mess -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#mess">
    <i class="fa fa-commenting i-admin" aria-hidden="true"></i>
    <p class="p-admin">Message</p>
    <p><span class="badge span-admin"><?php echo count($mess);?></span></p>
    </button>
    
    <!-- btn project -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#project">
    <i class="fa fa-flag i-admin" aria-hidden="true"></i>
    <p class="p-admin">Project</p>
    <p><span class="badge span-admin"><?php echo count($project);?></span></p>
    </button>
    
    <!-- btn lab -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#lab">
    <i class="fa fa-flask i-admin" aria-hidden="true"></i>
    <p class="p-admin">Lab</p>
    <p><span class="badge span-admin"><?php echo count($lab);?></span></p>
    </button>
    
    <!-- btn child_lab -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#child_lab">
    <i class="fa fa-child i-admin" aria-hidden="true"></i>
    <p class="p-admin">Child lab</p>
    <p><span class="badge span-admin"><?php echo count($child_lab);?></span></p>
    </button>
    
    <!-- btn blog -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#blog">
    <i class="fa fa-rss i-admin" aria-hidden="true"></i>
    <p class="p-admin">Blog</p>
    <p><span class="badge span-admin"><?php echo count($blog);?></span></p>
    </button>
    
    <!-- btn admin_visit -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#admin_visit">
    <i class="fa fa-user i-admin" aria-hidden="true"></i>
    <p class="p-admin">Admin</p>
    <p>
    <span class="badge span-admin" style="background:#00C853"><?php if(count($admin_today)!=0) echo count($admin_today).'<ten3px>today</ten3px>';?></span>
    <span class="badge span-admin"><?php echo count($admin_visit);?></span>
    </p>
    </button>
    
    <!-- btn guest_visit -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#guest_visit">
    <i class="fa fa-users i-admin" aria-hidden="true"></i>
    <p class="p-admin">Guest</p>
    <p>
    <span class="badge span-admin" style="background:#00C853"><?php if(count($guest_today)!=0) echo count($guest_today).'<ten3px>today</ten3px>';?></span>
    <span class="badge span-admin"> <?php echo count($guest_visit);?></span>
    </p>
    </button>
    
    <!-- btn gg_visit -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#gg_visit">
    <i class="fa fa-bug i-admin" aria-hidden="true"></i>
    <p class="p-admin">Auto bot</p>
    <p>
    <span class="badge span-admin" style="background:#00C853"><?php if(count($gg_today)!=0) echo count($gg_today).'<ten3px>today</ten3px>';?></span>
    <span class="badge span-admin"> <?php echo count($gg_visit);?></span>
    </p>
    </button>
    
    <!-- btn signin_visit -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#signin_visit">
    <i class="fa fa-sign-in i-admin" aria-hidden="true"></i>
    <p class="p-admin">Sign-in Fail</p>
    <p><span class="badge span-admin"><?php echo count($signin_visit);?></span></p>
    </button>
    
    <!-- btn watashinodesu -->
    <button type="button" class="btn btn-default btn-admin" data-toggle="modal" data-target="#watashinodesu">
    <i class="fa fa-key i-admin" aria-hidden="true"></i>
    <p class="p-admin">私のパスです</p>
    <p><span class="badge span-admin"><?php echo count($watashinodesu);?></span></p>
    </button>
  </div>
  
  
  <!-- Modal mess -->
  <div id="mess" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Messages</h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>ID - IP</th>
                  <th>From</th>
                  <th>Subject</th>
                  <th>Time</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $stt=1; foreach($mess as $item){?>
                <tr>
                  <td><?php echo $stt++;?></td>
                  <td><?php echo @$item['id'];?> - <?php echo @$item['ct_ip'];?></td>
                  <td><?php echo @$item['ct_name'];?> - <a href="mailto:<?php echo @$item['ct_mail'];?>"><?php echo @$item['ct_mail'];?></a></td>
                  <td><?php echo @$item['ct_abt'];?></td>
                  <td><?php echo @$item['ct_time'];?></td>
                  <td><?php echo @$item['ct_mess'];?></td>
                  <td><a href="delete.php?type=mess&id=<?php echo @$item['id'];?>" onclick="return confirm('Are you sure to delete mess from: <?php echo @$item['ct_name'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal project -->
  <div id="project" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Project <a target='_blank' href="project-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=1; foreach($project as $item){?>
                <tr>
                  <td><?php echo $stt++;?></td>
                  <td><?php echo @$item['project_id'];?></td>
                  <td><img src="<?php echo @$item['img'];?>" alt="<?php echo @$item['title'];?>"/></td>
                  <td><a href="<?php echo @$item['url'];?>" target="new"><?php echo @$item['title'];?></a></td>
                  <td><?php echo @$item['project_date'];?></td>
                  <td><?php echo @$item['project_date_update'];?></td>
                  <td><a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/post-inside.php?url=<?php echo @$item['url'];?>" target="new"> <?php echo @$item['view'];?></a></td>
                  <td><a href="project-edit.php?id=<?php echo @$item['project_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> <a href="delete.php?type=project&id=<?php echo @$item['project_id'];?>" onclick="return confirm('Are you sure to delete project: <?php echo @$item['title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  lab -->
  <div id="lab" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lab <a target='_blank' href="post-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
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
                  <td><a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/lab/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="new"> <?php echo @$item['post_view'];?></a></td>
                  <td><a target='_blank' href="post-edit.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> <a href="delete.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['type'];?>: <?php echo @$item['post_title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  child_lab -->
  <div id="child_lab" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Child lab <a href="child-lab-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=1; foreach($child_lab as $item){?>
                <tr>
                  <td><?php echo $stt++;?></td>
                  <td><?php echo @$item['id'];?></td>
                  <td><a href="<?php echo @$item['url'];?>" target="_blank"><?php echo @$item['name'];?></a></td>
                  <td><a href="<?php echo @$item['mother_page'];?>" target="_blank"><?php echo @$item['mother_page'];?></a></td>
                  <td><?php echo @$item['view'];?></td>
                  <td><?php echo @$item['date_add'];?></td>
                  <td><?php echo @$item['date_update'];?></td>
                  <td><a href="child-lab-edit.php?id=<?php echo @$item['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> <a href="delete.php?type=child_lab&id=<?php echo @$item['id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['name'];?> from <?php echo @$item['mother_page'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  blog -->
  <div id="blog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Blog <a target='_blank' href="post-add.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
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
                  <td><a href="count-by.php?col=g_url&by=/site.phucbm.com/buiminhphuc.tk/blog/<?php echo @$item['title_no_sign'];?>-<?php echo @$item['post_id'];?>" target="new"> <?php echo @$item['post_view'];?></a></td>
                  <td><a target='_blank' href="post-edit.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> <a href="delete.php?type=<?php echo @$item['type'];?>&id=<?php echo @$item['post_id'];?>" onclick="return confirm('Are you sure to delete <?php echo @$item['type'];?>: <?php echo @$item['post_title'];?>?')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  admin_visit -->
  <div id="admin_visit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Admin logs <a href="delete.php?type=guest&id=1" onClick="return confirm('This action will delete all admin actions in GUEST table. Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=count($admin_visit); foreach($admin_visit as $item){?>
                <tr>
                  <td><?php echo $stt--;?></td>
                  <td><?php echo @$item['g_time'];?></td>
                  <!-- IP -->
                  <td><a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new"> <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
                  <!-- URL -->
                  <td><a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_url'];?></div>
                    </a></td>
                  <!-- refer -->
                  <td><a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_refer'];?></div>
                    </a></td>
                  <!-- browser -->
                  <td><a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_brs'];?></div>
                    </a></td>
                  <!-- location -->
                  <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new"> <?php echo @$item['g_loc'];?></a></td>
                  <!-- nha mang -->
                  <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new"> <?php echo @$item['g_mang'];?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!--end res table--> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  guest_visit -->
  <div id="guest_visit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Guest logs <a href="delete.php?act=updateview" onClick="return confirm('This action will delete all guest records in GUEST table. Are you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a></h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=count($guest_visit); foreach($guest_visit as $item){?>
                <tr>
                  <td><?php echo $stt--;?></td>
                  <td><?php echo @$item['g_time'];?></td>
                  <!-- IP -->
                  <td><a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new"> <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
                  <!-- URL -->
                  <td><a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_url'];?></div>
                    </a></td>
                  <!-- refer -->
                  <td><a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_refer'];?></div>
                    </a></td>
                  <!-- browser -->
                  <td><a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_brs'];?></div>
                    </a></td>
                  <!-- location -->
                  <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new"> <?php echo @$item['g_loc'];?></a></td>
                  <!-- nha mang -->
                  <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new"> <?php echo @$item['g_mang'];?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!--end res table--> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  gg_visit -->
  <div id="gg_visit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bot visiting logs <a href="delete.php?act=delggview" onClick="return confirm('This action will delete all visits by auto bots. Are you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> </h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=count($gg_visit); foreach($gg_visit as $item){?>
                <tr>
                  <td><?php echo $stt--;?></td>
                  <td><?php echo @$item['g_time'];?></td>
                  <!-- IP -->
                  <td><a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new"> <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
                  <!-- URL -->
                  <td><a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_url'];?></div>
                    </a></td>
                  <!-- refer -->
                  <td><a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_refer'];?></div>
                    </a></td>
                  <!-- browser -->
                  <td><a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_brs'];?></div>
                    </a></td>
                  <!-- location -->
                  <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new"> <?php echo @$item['g_loc'];?></a></td>
                  <!-- nha mang -->
                  <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new"> <?php echo @$item['g_mang'];?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!--end res table--> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  signin_visit -->
  <div id="signin_visit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign-in fail logs <a href="delete.php?act=delsignlog" onClick="return confirm('This action will delete all guest records in GUEST table. Are you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> </h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
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
              </thead>
              <tbody>
                <?php $stt=count($signin_visit); foreach($signin_visit as $item){?>
                <tr>
                  <td><?php echo $stt--;?></td>
                  <td><?php echo @$item['g_time'];?></td>
                  <!-- IP -->
                  <td><a href="count-by.php?col=g_ip&by=<?php echo @$item['g_ip'];?>" target="new"> <?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></a></td>
                  <!-- URL -->
                  <td><a href="count-by.php?col=g_url&by=<?php echo @$item['g_url'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_url'];?></div>
                    </a></td>
                  <!-- refer -->
                  <td><a href="count-by.php?col=g_refer&by=<?php echo @$item['g_refer'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_refer'];?></div>
                    </a></td>
                  <!-- browser -->
                  <td><a href="count-by.php?col=g_brs&by=<?php echo @$item['g_brs'];?>" target="new">
                    <div class="bmp-text-overflow" ><?php echo @$item['g_brs'];?></div>
                    </a></td>
                  <!-- location -->
                  <td><a href="count-by.php?col=g_loc&by=<?php echo @$item['g_loc'];?>" target="new"> <?php echo @$item['g_loc'];?></a></td>
                  <!-- nha mang -->
                  <td><a href="count-by.php?col=g_mang&by=<?php echo @$item['g_mang'];?>" target="new"> <?php echo @$item['g_mang'];?></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!--end res table--> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal  watashinodesu -->
  <div id="watashinodesu" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"> 
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">私のパスです 
          <a data-toggle="collapse" data-target="#demo"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
          <!-- ad pw form -->
          <div id="demo" class="collapse form-inline"  style="text-align:center;">
            <input class="form-control" maxlength="50" type="text" id="service_name" placeholder="Service" autofocus>
            <input class="form-control" maxlength="200" type="text" id="link_to" placeholder="Service link">
            <input class="form-control" maxlength="50" type="text" id="user_name" placeholder="Username">
            <input class="form-control" maxlength="20" type="text" id="pw" placeholder="Password">
            <input class="form-control" maxlength="200" type="text" id="note" placeholder="Note">
          <button onClick="addPw()" class="btn btn-primary">Add new password</button>
         
          </div>
          </h4>
        </div>
        <div class="modal-body"> 
          <!--table-->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Service</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Note</th>
                  <th>Create</th>
                  <th>Update</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $stt=count($watashinodesu); foreach($watashinodesu as $item){?>
                <tr>
                  <td><?php echo $stt--;?></td>
                  <td><a href="<?php echo @$item['link_to'];?>" target="_blank"><?php echo @$item['service_name'];?></a></td>
                  
                  <!-- user_name -->
                  <td>
				  <p id="namae<?php echo @$item['id_desu'];?>" data-clipboard-target="#namae<?php echo @$item['id_desu'];?>"><?php echo @$item['user_name'];?></p>
                  <script>(function(){new Clipboard('#namae<?php echo @$item['id_desu'];?>');})();</script>
                  </td>
                  
                  <!-- pw -->
                  <td id="watashino-pw">
				  <p class="watashino-txt" id="watashi<?php echo @$item['id_desu'];?>" data-clipboard-target="#watashi<?php echo @$item['id_desu'];?>"><?php echo @$item['pw'];?></p>
                  <script>(function(){new Clipboard('#watashi<?php echo @$item['id_desu'];?>');})();</script>
                  </td>
                  
                  <!-- note -->
                  <td><?php echo @$item['note'];?></td>
                  
                  <!-- create_date -->
                  <td><?php echo @$item['create_date'];?></td>
                  
                  <!-- update_date -->
                  <td><?php echo @$item['update_date'];?></td>
                  
                  <!-- action -->
                  <td>
                  <a data-toggle="collapse" data-target="#edit-pw<?php echo @$item['id_desu'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                   
                  <a href="delete.php?type=watashinodesu&id=<?php echo @$item['id_desu'];?>" onClick="return confirm('You gonna permanent delete password ID: <?php echo @$item['id_desu'];?>. \nAre you sure?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </td>
                  <!--edit pw form-->
                  <div id="edit-pw<?php echo @$item['id_desu'];?>" class="collapse form-inline">
                  
                <input value='<?php echo @$item['service_name'];?>' class="form-control" maxlength="100" type="text" id="service_name<?php echo @$item['id_desu'];?>" placeholder="Service" autofocus>
                <input value="<?php echo @$item['link_to'];?>" class="form-control" maxlength="200" type="text" id="link_to<?php echo @$item['id_desu'];?>" placeholder="Service link">
                <input value="<?php echo @$item['user_name'];?>" class="form-control" maxlength="50" type="text" id="user_name<?php echo @$item['id_desu'];?>" placeholder="Username">
                <input value="<?php echo @$item['pw'];?>" class="form-control" maxlength="20" type="text" id="pw<?php echo @$item['id_desu'];?>" placeholder="Password">
                <input value="<?php echo @$item['note'];?>" class="form-control" maxlength="200" type="text" id="note<?php echo @$item['id_desu'];?>" placeholder="Note">
              <button onClick="editPw(<?php echo @$item['id_desu'];?>)" class="btn btn-primary">Edit password ID: <?php echo @$item['id_desu'];?></button>
                  </div>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!--end res table--> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end container-->
<?php include ("footer.php");?>
<?php include ("modal.php");?>
</body>
</html>