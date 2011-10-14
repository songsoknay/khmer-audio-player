<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audio:</title>
	<script src="build/jquery.js"></script>	
	<script src="build/mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="build/mediaelementplayer.min.css" />
</head>
<style type="text/css">
body {
	background:url(images/bg.jpg)
	}
/* CONTENT */
#content.box { float:left; width:984px; margin:0; padding:0; clear:both; background:url(images/bg_stripe.png) 0 0 repeat-y; }
#content.box .cap { width:985px; height:5px; top:0; background:url(images/bg_cap.png) 0 0 no-repeat; }
#content.box .boot { width:985px; height:63px; bottom:0; background:url(images/bg_boot.png) 0 0 no-repeat; }

#content.nosidebar { float:left; width:984px; margin:0; padding:0; clear:both; background:url(images/bg_stripe_nosidebar.png) 0 0 repeat-y; }
#content.nosidebar .cap { width:985px; height:5px; top:0; background:url(images/bg_cap_nosidebar.png) 0 0 no-repeat; }
#content.nosidebar .boot { width:985px; height:63px; bottom:0; background:url(images/bg_boot_nosidebar.png) 0 0 no-repeat; }
</style>
<body>
<div style="width:984px; margin:20px auto 0 auto; ">
    <div style="background:url(images/search_cap.png); height:5px;"></div>
	<div style="background:url(images/search_bg.png); height:30px;">
    	
    </div>
    <div style="background:url(images/search_boot.png); height:7px;"></div>
    <br />
    
    <div id="content" class="box">
		<div class="cap"></div>
        Xserve (Early 2009) - Setup Guide<br />
		Separate 480 megabit per second (Mbit/s) USB channel for each port Â 500 milliamperes <br />( mA ) at 5 V available per port for a total of 2.5 ampere (A) Â Any one port can supply 1.5 W (the other two ports then supply 500 mW) Â
		http://manuals.info.apple.com/en_US/Xserve_Setup_Guide.pdf<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div class="boot"></div>
	</div>
    
</div>
<div style="margin:20px auto; width:width:984px;">
<audio id="player2" src="song/痴心绝对.mp3" type="audio/mp3" controls="controls"></audio>
</div>
<script>
$('audio,video').mediaelementplayer();
</script>
</body>
</html>
