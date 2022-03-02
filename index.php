<?php
session_start();
include_once("function.php");
$noti = get_content('noti','');
if(isset($_GET['bmp'])){header("location:Headquater-Of-Big-Boss");exit();}
//check captcha
if(isset($_POST['ct_submit'])){
	check_captcha($_POST['g-recaptcha-response'],$_POST['ct_name'],$_POST['ct_mail'],$_POST['ct_abt'],$_POST['ct_mess']);
}
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
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
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
        <bmp-freelancer>FREELANCER</bmp-freelancer>
      </bmp-name>
      <!-- about -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      	<div class="bmp-sec-title">i am</div>
        	<div class="bmp-sec-content bmp-row">
            	<div class="bmp-col-6 bmp-col-m-6 bmp-col-s-12">
                <img src="images/system-img/bmp-black-bg.png" alt="bmp-black-bg"/>
                    <p>My name is Bui Minh Phuc, I’m a student at <a href="http://fit.hcmup.edu.vn/" target="_blank">HCMUP</a>, and my passion lies in animation, technology and basically everything digital. My life revolves around animation and web-based projects (and travelling). My technical skills include web development, animation, visual effect and more. Most recently I have been obsessed with JS-based web applications and the world of JS-framework. I'm excited about new knowledge, new experiences and new challenges. Let’s work together.</p>
				</div>
                <div class="bmp-col-6 bmp-col-m-6 bmp-col-s-12 bmp-map-contain">
                	<div class="bmp-map-home" id="googleMap"></div>
                </div>
            </div>
      </div>
      <!-- skill -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      	<div class="bmp-sec-title">Skills</div>
        	<div class="bmp-sec-content bmp-row">
            	<div class="bmp-col-6 bmp-col-m-6 bmp-col-s-12">
                    <div class="bmp-skill-icon"><i class="fa fa-code" aria-hidden="true"></i></div>
                    <div class="bmp-skill-name">Freelance Web Developer</div>
                    <div class="bmp-skill-box">
                        <div class="bmp-skill">HTML</div>
                        <div class="bmp-skill-bar bmp-skill-60"></div>
                        <div class="bmp-skill">CSS</div>
                        <div class="bmp-skill-bar bmp-skill-60"></div>
                        <div class="bmp-skill">JavaScript</div>
                        <div class="bmp-skill-bar bmp-skill-50"></div>
                        <div class="bmp-skill">PHP</div>
                        <div class="bmp-skill-bar bmp-skill-40"></div>
                    </div>
				</div>
                <div class="bmp-col-6 bmp-col-m-6 bmp-col-s-12">
                    <div class="bmp-skill-icon"><i class="fa fa-braille" aria-hidden="true"></i></div>
                    <div class="bmp-skill-name">Animation &amp; Film</div>
                    <div class="bmp-skill-box">
                        <div class="bmp-skill">After Effect</div>
                        <div class="bmp-skill-bar bmp-skill-50"></div>
                        <div class="bmp-skill">Photoshop</div>
                        <div class="bmp-skill-bar bmp-skill-70"></div>
                    </div>
                </div>
            </div>
      </div>
      <!-- contact -->
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      	<div class="bmp-sec-title">Contact</div>
        	<div class="bmp-sec-content bmp-row">
                <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
                <div id="contact">
                    
                    <form method="post">
                    	<label>Your Name (required)</label>
                    	<input type="text" name="ct_name" maxlength="20" required/>
                        <label>Your Email (required)</label>
                        <input type="email" name="ct_mail" maxlength="30" required/>
                        <label>What's This About? (required)</label>
                        <select name="ct_abt" required>
                        	<option value="empty">---</option>
                        	<option value="web">Web Development</option>
                            <option value="animation">Animation</option>
                            <option value="vfx">Visual FX</option>
                            <option value="other">Other</option>
                        </select>
                        <label>Your Message</label>
                    	<textarea rows="5"name="ct_mess" maxlength="499"></textarea>
                        <div class="g-recaptcha" data-sitekey="6LfafyYTAAAAAE3pRdldLDw8BmwavLoxlZMa0XY8"></div>
                        <p id="fail-capt"></p>
                        <input type="submit" name="ct_submit" value="Submit"/>
                    
                    </form>
                </div><!-- end id contact -->
                </div>
            </div>
      </div>
      
<?php include ("footer.php");?>
      
      
</div>

<?php include ("modal.php");?>
 
</body>
</html>