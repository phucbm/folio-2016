/*      ******       **        **   ******       
        **    **     ****    ****   **    **     
        **    **     ** **  ** **   **    **     
        ********     **  ****  **   ******       
        **      **   **        **   **           
        **      **   **        **   **           
        ********     **  2016  **   **         */
		
$(document).ready(function() {

	/* click next post fx */
	$("bmp-nav-next a").click(function(e) {
    	$("div#next-box").animate({height: $(document).height()}, 400);
		$("div.bmp-inside-container").animate({ padding: '0'}, 400);
		$("html, body").animate({ scrollTop: $(document).height() }, 400);
    });
	
	/* menu 2 cap: admin page */
	$(".menu-toggle").click(function(e) {
            $(this).next().slideToggle();
        });
	
	/* center align instagram frame */
	$("blockquote").css("margin","2vw auto");
	$(".bmp-inside-container").css("margin-top",function(){return $(window).height()-90});
	
	/* my map */
	var myCenter=new google.maps.LatLng(10.761167, 106.682194);
	function initialize()
	{
	var myMap = {
	  center:myCenter,
	  zoom:15,
	  mapTypeId:google.maps.MapTypeId.roadmap
	  };
	
	var map=new google.maps.Map(document.getElementById("googleMap"),myMap);
	
	var marker=new google.maps.Marker({
	  position:myCenter,
	  });
	
	marker.setMap(map);
	
	var infowindow = new google.maps.InfoWindow({
	  content:"My university's here"
	  });
	
	infowindow.open(map,marker);
	
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
	/* scroll up to open menu button */
	var lastScrollTop = 0;
	$(window).scroll(function(event){
	   var st = $(this).scrollTop();
	   if (st > lastScrollTop){
		   // downscroll code
		   $("button.bmp-btn-menu").slideUp();
	   } else {
		  // upscroll code
		  $("button.bmp-btn-menu").slideDown();
	   }
	   lastScrollTop = st;
	});

	/* toggle night mode */
	var isCtrl = false;
	$(document).keyup(function (e) {
		if(e.which == 17) isCtrl=false;
	}).keydown(function (e) {
		if(e.which == 17) isCtrl=true;
		if(e.which == 18 && isCtrl == true) {
			//run code for CTRL+ALT -- ie!
			window.location.href="Headquater-Of-Big-Boss";
			return false;
		}
	});

/* responsive for modal column */
$(window).resize(function(e) {
    if($(window).innerWidth()<600){
		$("div#contact").css("width","95%");
		$(".bmp-noti-bar").css("width","95%");
		$("chapter").css("font-size","30px");
		$(".bmp-inside-container h1").css("font-size","40px");
		$(".bmp-content").css({"padding":"0 1vw","font-size":"20px"});
		$("#bmp-tips").css("display","none");
		$(".bmp-arrow").css("display","none");
		$("div.bmp-sec-content img").css("display","none");
		$(".bmp-modal-r").css("text-align","left");
		$(".bmp-modal-content").css("width","95%");
	} else {
		$("div#contact").css("width","60%");
		$(".bmp-noti-bar").css("width","60%");
		$("chapter").css("font-size","40px");
		$(".bmp-inside-container h1").css("font-size","90px");
		$(".bmp-content").css({"padding":"0 15vw","font-size":"28px"});
		$("#bmp-tips").css("display","block");
		$(".bmp-arrow").css("display","block");
		$("div.bmp-sec-content img").css("display","block");
		$(".bmp-modal-r").css("text-align","right");
		$(".bmp-modal-content").css("width","70%");}
});
if($(window).innerWidth()<600){
	$("div#contact").css("width","95%");
	$(".bmp-noti-bar").css("width","95%");
	$("chapter").css("font-size","30px");
	$(".bmp-content").css({"padding":"0 1vw","font-size":"20px"});
	$(".bmp-inside-container h1").css("font-size","40px");
	$(".bmp-content").css("padding","0 1vw");
	$("#bmp-tips").css("display","none");
	$(".bmp-arrow").css("display","none");
	$("div.bmp-sec-content img").css("display","none");
	$(".bmp-modal-r").css("text-align","left");
	$(".bmp-modal-content").css("width","95%");
	} else {
		$("div#contact").css("width","60%");
		$(".bmp-noti-bar").css("width","60%");
		$("chapter").css("font-size","40px");
		$(".bmp-inside-container h1").css("font-size","90px");
		$(".bmp-content").css({"padding":"0 15vw","font-size":"28px"});
		$("#bmp-tips").css("display","block");
		$(".bmp-arrow").css("display","block");
		$("div.bmp-sec-content img").css("display","block");
		$(".bmp-modal-r").css("text-align","right");
		$(".bmp-modal-content").css("width","70%");}

	/* PRESS TO OPEN LINK */
	var n=$("#a")[0],
	p=$("#p")[0],
	w=$("#w")[0],
	t=$("#l")[0],
	c=$("#b")[0],
	e=$("#e")[0],
	y=$("#y")[0],
	i=$("#i")[0],
	f=$("#f")[0];//level!="admin"
	var level =$("body").attr("id");
	$(document).keydown(function(){
		var state = $(".bmp-modal-menu").attr('display');
		var hidden = $(".bmp-modal-menu").is(":hidden");//kiem tra modal dang visible hay hidden
		if (!hidden) {switch(event.which){
			case 65:
			window.location.href=a.href;break;
			case 80:
			window.location.href=p.href;break;
			case 87:
			window.location.href=w.href;break;
			case 231:
			window.location.href=w.href;break;
			case 76:
			window.location.href=l.href;break;
			case 66:
			window.location.href=b.href;break;
			case 69:
			window.location.href=e.href;break;
			case 89:
			window.location.href=y.href;break;
			case 73:
			window.location.href=i.href;break;
			case 70:
			window.location.href=f.href;
			}}
	});
			
	/* MENU BUTTON */
		/* click to open menu */
		$(".bmp-btn-menu").click(function() {
            $(".bmp-modal-menu").fadeToggle(300);
			$(".main").toggleClass("bmp-blur");
        });
		
		/* click close noti bar */
		if($("p#noti-content").html()==""){
			$("div.bmp-noti-bar").css("display","none");
		}
		$(".bmp-noti-bar a#noti-close").click(function() {
            $("div.bmp-noti-bar").slideUp();
        });
		
		/* click outside to close */
		$(".bmp-modal-menu").click(function(e) {
            $(".bmp-modal-menu").fadeOut(300);
			$(".main").toggleClass("bmp-blur");
        });
				
		/*hover close button*/
		$(".bmp-btn-close").hover(function(){
			$(".bmp-icon-close").transition({rotate:'90deg'});
			},function(){
				$(".bmp-icon-close").transition({rotate:'0deg'});
				});
		
		/* press ESC to close */
		$(document).keydown(function(){
			if(event.which==27){
					$(".bmp-modal-menu").fadeToggle(300);
					$(".main").toggleClass("bmp-blur");
			}
			});
			
		/* press up down */
		$(document).keydown(function(){
			switch(event.which){
				case 38:
						$("bmp-short-key#chevron-up").addClass("bmp-chevron-press");
					$(this).keyup(function(){
						$("bmp-short-key#chevron-up").removeClass("bmp-chevron-press");
					});break;
				case 40:
				$("bmp-short-key#chevron-down").addClass("bmp-chevron-press");
					$(this).keyup(function(){
						$("bmp-short-key#chevron-down").removeClass("bmp-chevron-press");
					});
			}
			});
		
    });