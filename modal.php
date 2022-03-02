<!-- arrow button --
<div class="bmp-arrow">
          <bmp-short-key id="chevron-up"><i class="fa fa-chevron-up" aria-hidden="true"></i></bmp-short-key><br>
          <bmp-short-key id="chevron-down"><i class="fa fa-chevron-down" aria-hidden="true"></i></bmp-short-key>
</div>-->
  <!-- Modal 2.0 -->
  <div class="bmp-modal-menu">
  	<div class="bmp-modal-content">
      <div class="bmp-row bmp-modal-list">
      
      <div class="bmp-col-12 bmp-col-m-12 bmp-col-s-12">
      	<img src="images/system-img/bmp-black-bg.png" class="bmp-logo" alt="bmp-black-bg.png"/>
      </div>
      
      <div class="bmp-col-6 bmp-col-m-6 bmp-col-s-12">
        <h2>About</h2>
        <bmp-li><a href="home" id="a" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>A</bmp-short-key>bout</a></bmp-li>
        <bmp-li><a href="project" id="p" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>P</bmp-short-key>roject</a></bmp-li>
        <bmp-li><a href="lab" id="l" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>L</bmp-short-key>ab</a></bmp-li>
        <bmp-li><a href="blog" id="b" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>B</bmp-short-key>log</a></bmp-li>
         <bmp-li><a href="books" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>B</bmp-short-key>ooks</a></bmp-li>
        
		</div>
        <div class="bmp-col-6 bmp-col-m-6  bmp-col-s-12 bmp-modal-r">
        <h2>Contact</h2>
        <bmp-li><a target="_blank" href="mailto:minhphuc1511one@gmail.com" id="e" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>E</bmp-short-key>mail</a></bmp-li>
        <bmp-li><a target="_blank" href="https://www.youtube.com/channel/UCrCUu5Q2ouyudqaR5YMRj1w" id="y" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>Y</bmp-short-key>outube</a></bmp-li>
        <bmp-li><a target="_blank" href="https://www.instagram.com/phucsnef/" id="i" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>I</bmp-short-key>nstagram</a></bmp-li>
        <bmp-li><a target="_blank" href="https://www.facebook.com/site.phucbm.com/buiminhphuc.tk" id="f" class="bmp-sh-key-hvr bmp-letter-spacing-fx"><bmp-short-key>F</bmp-short-key>acebook</a></bmp-li>
      	</div>
      </div>
      <div class="bmp-col-12 bmp-col-m-12   bmp-col-s-12" style="text-align:center">
      <p class="bmp-txt-italic" id="bmp-tips">Chúc một ngày tốt lành! Have a nice day!</p>
      <?php 
	  	if(@$_SESSION['admin']=='admin'){
			echo "<p><a href='Fire-To-The-Hole?sign=out'>SIGN OUT ADMIN</a></p>";	
		}
	  ?>
      <button type="button" class="bmp-btn-close bmp-btn-trans"><i class="bmp-icon-close fa fa-2x fa-times" aria-hidden="true"></i></button></div>
  	</div>
  </div> <!-- end modal --> 