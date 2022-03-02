<?php
session_start();
include_once("function.php");
$noti = get_content('noti','');
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}

save_guest_info();
$name = "Home";
count_view("child_lab",$name);
?>
<!doctype html>
<html>
<head>
<meta name="google-site-verification" content="J3rzchRNOYjyKxC42Mo1O1-mSeqwGyt5kMK_oZ7MH8o" />
<title>Bui Minh Phuc</title>
<!-- GG Maps API -->

<?php include ("linkref.php");?>
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N75X64"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N75X64');</script>
<!-- End Google Tag Manager -->

<button type="button" class="bmp-btn-flo-right bmp-btn-menu bmp-btn-trans"><i class="bmp-icon-bar fa fa-bars fa-3x" aria-hidden="true"></i></button>
  <div class="main">
  <div class="bmp-noti-bar">
  	<p id="noti-content"><?php foreach($noti as $item){echo $item['noti_content'];};?></p>
  	<p><a id="noti-close">Close</a>
  </div>
      <bmp-name>
        <bmp-name-word>
            <bmp-name-charac style="animation-delay:0">B</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.1s">Ù</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.8s">I </bmp-name-charac>
        </bmp-name-word>
        <bmp-name-word>
            <bmp-name-charac style="animation-delay:0s">M</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.8s">I</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.2s">N</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.15s">H </bmp-name-charac>
        </bmp-name-word>
        <bmp-name-word style="margin-right:0vw;">
            <bmp-name-charac style="animation-delay:0">P</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.15s">H</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.1s">Ú</bmp-name-charac>
            <bmp-name-charac style="animation-delay:0.8s">C</bmp-name-charac>
        </bmp-name-word>
        <bmp-imakewebsite>A•WEB•MAKER</bmp-imakewebsite>
      </bmp-name>

<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#F5F5F5;margin:0;padding:10px">
<p>minhphuc1511one@gmail.com (+84 906 680 492)</p>
</div>
</div>
     
<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#EEEEEE;margin:0;padding:10px">
<p>I'm a senior student from Ho Chi Minh University of Education</p>
<p>My specialization is software engineer.</p>
</div>
</div>

<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#E0E0E0;margin:0;padding:20px">
<p>I can use Japanese at beginning level with regular conversation.</p>
<p>英語の日常会話を話すことができます。</p>
</div>
</div>
 
<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#BDBDBD;margin:0;padding:20px">
<p>I'm good at using Google Search Engine.</p>
<p>The enumerated list below is some of my made projects.</p>

<iframe-border-porfolio>
  <a href="http://samatoz.tk" target="_blank">
  <img src="images/porfolio/samatoz-showcase.gif" alt="samatoz-showcase.gif" width="600px"></a>
  <ten-anh-porfolio>SamAtoZ - Samsung from A to Z - May, 2016<br>Using Bootstrap Twitter</ten-anh-porfolio>
</iframe-border-porfolio>

<iframe-border-porfolio>
  <a href="http://site.phucbm.com/buiminhphuc.tk" target="_blank">
  <img src="images/porfolio/buiminhphuc-showcase.gif" alt="buiminhphuc-showcase.gif" width="600px"></a>
  <ten-anh-porfolio>My online home - Autumn, 2016<br>My bare code without using any UI library.</ten-anh-porfolio>
</iframe-border-porfolio>

<iframe-border-porfolio>
  <a href="http://baaloo.tk" target="_blank">
  <img src="images/porfolio/baaloo-showcase.gif" alt="cotichsaigon-showcase.gif" width="600px"></a>
  <ten-anh-porfolio>Baaloo - eCommerce's project - August, 2017<br>Bootstrap, plugins for eCommerce</ten-anh-porfolio>
</iframe-border-porfolio>

</div>
</div>

<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#9E9E9E;margin:0;padding:20px">
<p>And these are my other skills.</p>

<iframe-border-porfolio>
<iframe src="https://www.youtube.com/embed/5rj_2xjsK48?rel=0" frameborder="0" allowfullscreen width="600px" height="338px"></iframe>
    <span>Animation - Adobe After Effect</span>
</iframe-border-porfolio>
<div style="margin:0 auto;width:600px">
<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BAUHR2WRdTc/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">@yonieber - WPAP Art #wpap #illustrator #failcoloring #art #wpapart #design</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by Bùi Minh Phúc (@ph._.uc) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-01-09T10:04:40+00:00">Jan 9, 2016 at 2:04am PST</time></p></div></blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script></div>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>

</div></div>

<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#757575;margin:0;padding:20px">
<p>That's almost about me. Feel free to contact me at</p>
<p>minhphuc1511one@gmail.com or +84906680492</p>
</div>
</div>

<div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
<div style="text-align:center;background-color:#616161;margin:0;padding:5px">
<h1>Thanks.</h1>
</div>
</div>

<?php include ("footer.php");?>
      
      
</div>

<?php include ("modal.php");?>
 
</body>
</html>