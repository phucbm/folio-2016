<?php
session_start();
if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	$record = count_by($_GET['col'],$_GET['by']);
	disconnect_db();
	$tips = "<a href='Fire-To-The-Hole?sign=out'>Sign Out Admin</a>";
} else {
	$tips = "Tips: Use shortcut to imrprove your experience ;)";
	header("location:Fire-To-The-Hole");exit();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Counter</title>

<?php include ("linkref.php");?>
</head>

<body>
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
	<?php include ("logo-top.php");?>
      <!-- counter -->
      <h1><i class="fa fa-users" aria-hidden="true"></i> Found <?php echo count($record);?> records</h1>
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
            <?php $stt=count($record); foreach($record as $item){?>
            <tr>
              <td><?php echo $stt--;?></td>
              <td><?php echo @$item['g_time'];?></td>
              <td><?php echo @$item['g_name'];?>-<?php echo @$item['g_ip'];?></td>
              <td><?php echo @$item['g_url'];?></td>
              <td><div style="overflow-y: hidden;overflow-x: scroll; width:200px;"><?php echo @$item['g_refer'];?></div></td>
              <td><div style="overflow-x: hidden;overflow-y: scroll; height:50px;"><?php echo @$item['g_brs'];?></div></td>
              <td><?php echo @$item['g_loc'];?></td>
              <td><?php echo @$item['g_mang'];?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      <!-- end counter -->
</div>

<?php include ("footer.php");?>
<?php include ("modal.php");?>
</body>
</html>