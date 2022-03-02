<!-- footer -->

<div class="bmp-footer bmp-col-12 bmp-col-m-12 bmp-col-s-12">
  <bmp-line-footer></bmp-line-footer>
  <ul>
    <li><a target="_blank" id="ft-mail" href="mailto:minhphuc1511one@gmail.com"> <i class="fa fa-envelope" aria-hidden="true"></i></a></li>
    <li><a target="_blank" id="ft-fb" href="https://www.facebook.com/bu1m1nhphuc"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
    <li><a target="_blank" id="ft-ig" href="https://www.instagram.com/phucsnef/"> <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    <li><a target="_blank" id="ft-yt" href="https://www.youtube.com/channel/UCrCUu5Q2ouyudqaR5YMRj1w"> <i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
    
    <li <?php /* 
	//hien view trong child lab cho admin
	if(@$_SESSION['admin']=='admin'){echo 'style="display:inline"';} else {echo 'style="display:none"';}?>>Views <span style="font-size:20px" class="badge">
		<?php isset($child_lab) ? $child_lab=$child_lab : $child_lab=[]; 
		foreach(@$child_lab as $item){echo @$item['view'];}*/?></span>
    </li>
    <li id="copyright">&copy; Copyright 2016 - <a id="ft-home" href="home">Bui Minh Phuc</a></li>
  </ul>
</div>
