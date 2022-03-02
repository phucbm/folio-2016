<?php
session_start();
if(@$_SESSION['admin']=='admin'){
	include_once("function.php");
	// Nếu người dùng submit form
	$post = get_content($_GET['type'],$_GET['id']);
	if (!empty($_POST['submit_post']))
	{
		// Neu ko co loi thi update
		update_post($_GET['id'], $_POST['type'], $_POST['title'], $_POST['content'], $_POST['icon'], $_POST['color'], $_POST['status']);		
	}
	disconnect_db();
} else {
	header("location:Fire-To-The-Hole");exit();
}
?>
<!doctype html>
<html>
<head>
<title>Bui Minh Phuc | Update Post</title>
<?php include ("linkref.php");?>
<!--<script src="ckeditor/ckeditor.js"></script>-->
</head>

<body id="admin">
<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main bmp-project-page">
<?php include ("logo-top.php");?>
      <?php foreach ($post as $item){?>
      <!-- add frame -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      <div class="bmp-add-project">
      	<h1>Update post <?php echo @$item['post_title'];?></h1>
        <form method="post">
        	<!-- select type -->
            <label>Type</label>
        	<select name="type" required autofocus>
            	<option value="blog" <?php if(@$item['type']=='blog')echo 'selected';?>>Blog</option>
                <option value="lab" <?php if(@$item['type']=='lab')echo 'selected';?>>Lab</option>
            </select>  
            <!-- select status -->   
            <label>Status</label>
        	<select name="status" required autofocus>
            	<option value="show">Show</option>
                <option value="hide">Hide</option>
            </select>       
            <label>Color <a href="https://material.google.com/style/color.html#color-color-palette" target="new">here</a></label>
            <input type="text" name="color" value="<?php echo @$item['color'];?>" maxlength="15" required/>
            <label>Icon <a href="http://fontawesome.io/icons/" target="new">here</a></label>
            <input type="text" name="icon" value="<?php echo @$item['post_icon'];?>" maxlength="200" required/>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo @$item['post_title'];?>" maxlength="50" required/>
            <!-- khung nhap van ban -->
            <label>Content</label>
            <div class="bmp-col-8 bmp-col-m-8 bmp-col-s-12">
            	<textarea id="ckeditor" rows="40" name="content" required><?php echo @$item['post_content'];?></textarea>
            </div>
            <!--<script>    CKEDITOR.replace( 'ckeditor' );</script>-->
            <!-- huong dan -->
            <div id="bmp-tips" class="bmp-col-4 bmp-col-m-4 bmp-col-s-12">
                <label>Format</label>

                <div style='height:550px;'><pre>
<label>iframe for youtube, soundcloud, image</label>
&ltiframe-border&gt
	&ltbmp-iframe-wrap&gt
    	&ltimg src='#' alt='#'/&gt
	&lt/bmp-iframe-wrap&gt
    &ltten-anh&gt#
    &lt/ten-anh&gt
&lt/iframe-border&gt

<label>Format text</label>
&ltchapter&gt#&lt/chapter&gt
&lttab&gt&lt/tab&gt#
&lta href='#'&gt#&lt/a&gt
&ltbmp-tag&gt&lt/bmp-tag&gt

<label>Link button</label>
&lta href='#' class='bmp-link-btn' target='_blank' &gt#&lt/a&gt

<label>Blockquote</label>
&ltbmp-blockquote style='padding:2vw'&gt
	&ltdiv&gt
    	&ltpre&gt#
        &lt/pre&gt
    &lt/div&gt
&lt/bmp-blockquote&gt
                </pre></div>
            </div>
            <input onclick="return confirm('Update this one?')" type="submit" class="submit-btn" name="submit_post" value="Update">
        </form>
      </div>
      </div>
      <!-- end add frame -->
      <?php }?>
     
</div>
<?php include ("footer.php");?>
<?php include ("modal.php");?>
 
</body>
</html>