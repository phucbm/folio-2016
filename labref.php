<!--<base href="http://localhost:8080/site.phucbm.com/buiminhphuc.tk/"/>-->
<base href="http://site.phucbm.com/buiminhphuc.tk/"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Bui Minh Phuc" />
<meta name="copyright" content="Bui Minh Phuc" />
<meta name="designer" content="Bui Minh Phuc" />
<META HTTP-EQUIV="Content-Language" CONTENT="vi">

<!-- GG Maps API-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFvnhmHbOnjnMb93yrcS9u3i6OARu-4Us"></script>

<!-- font -->
<link href='https://fonts.googleapis.com/css?family=Maitree&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lalezar&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>

<!-- jQuery -->
<script src="css/jquery-1.12.4.min.js"></script>

<!-- boostrap css js -->
<script src="css/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- copy -->
<script src="css/clipboard.min.js"></script>

<!-- Font awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!-- BMP CSS -->
<link rel="stylesheet" type="text/css" href="css/style.min.css">

<!-- BMP Javascript -->
<script src="css/bmp.min.js"></script>

<!-- icon -->
<link rel="shortcut icon" href="images/system-img/logo-black.ico">

<script>
window.setInterval(
	function(){
		var count = $("#ct_mess").val().trim().length;
		//alert(count)
		var ct_mess = document.getElementById('ct_mess').value;
		if(ct_mess=="" || count<20){$("input#ct_submit").attr("disabled", true);}
		else {$("input#ct_submit").attr("disabled", false);}
}
,100);
function sendReport() {
	var ct_mess = document.getElementById('ct_mess').value;
	var ct_name = document.getElementById('ct_name').value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "labref.php?q=report&ct_name=" + ct_name +"&ct_mess=" + ct_mess, true);
		xmlhttp.send();
		$("#report").modal("hide");
		alert("Your report has been sent. Thank you for your support!")
}
</script>
<?php
if(isset($_REQUEST['q'])){
	if($_REQUEST['q']=='report'){
		include_once("function.php");
		send_report($_REQUEST['ct_name'],$_REQUEST['ct_mess']);
	}	
}
?>
<!-- report btn -->
<div class="bmp-arrow">
<?php
if(isset($actual_link)){
	@$_SESSION['admin']=='admin' ? $show_faces = 'true' : $show_faces = 'false';
	echo '<div class="fb-like" data-href="'.$actual_link.'" data-layout="box_count" data-action="like" data-size="small" data-show-faces="'.$show_faces.'" data-share="true"></div>';
}
?>

<?php
if(isset($github_link))
echo '<a href="'.$github_link.'" style="background:#EC686A;color:white;display:block;margin: 3px 0;" target="_blank" class="btn btn-sm">Github</a>';
?>

<button type="button" style="background:#8A8888;display:block;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#report">Report</button>

</div>
<!-- report Modal -->
<div id="report" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="post">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report</h4>
        </div>
        <div class="modal-body">
          <label>Your Name (optional)</label>
          <input type="text" class="form-control" id="ct_name" maxlength="20"/>
          <label>Your Message (required)</label>
          <textarea class="form-control" rows="5" id="ct_mess" maxlength="250" placeholder="Report content must be more than 20 characters."></textarea>
        </div>
        <div class="modal-footer">
          <input class="btn btn-info" type="button" onClick="sendReport()" id="ct_submit" name="ct_submit" value="Send"/>
        </div>
      </div>
    </form>
  </div>
</div>
