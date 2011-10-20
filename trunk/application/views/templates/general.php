<?php 
    $Z_USER = Zsession::getUserFromSession();
    echo doctype();
?>
<html>
<head>
<title><?=$z_page_title?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=CHAR_SET?>" />
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/general.css" />
</head>
<script type="text/javascript">

  function loadPlayer() {
	  var audioPlayer = new Audio();
	  audioPlayer.controls="controls";
	  audioPlayer.autoplay="autoplay";
	  //audioPlayer.style.backgroundColor = "#20C1F2";
	  //audioPlayer.style.borderColor = "";
	  audioPlayer.addEventListener('ended',nextSong,false);
	  audioPlayer.addEventListener('error',errorFallback,true);
	  document.getElementById("player").appendChild(audioPlayer);
	  nextSong();
  }
  function nextSong() {
	  if(urls[next]!=undefined) {
		  var audioPlayer = document.getElementsByTagName('audio')[0];
		  if(audioPlayer!=undefined) {
			  audioPlayer.src=urls[next];
			  //document.write(urls[next]);document.getElementById('listsong').style.color = "blue";
			  audioPlayer.load();
			  audioPlayer.play();
			  	  
			  next++;
		  } else {
			  loadPlayer();
		  }
	  } else {
		  //alert('the end!');
		  pickSong(0);
	  }
  }
  function errorFallback() {
		  nextSong();
  }
  function playPause() {
	  var audioPlayer = document.getElementsByTagName('audio')[0];
	  if(audioPlayer!=undefined) {
		  if (audioPlayer.paused) {
			  audioPlayer.play();
		  } else {
			  audioPlayer.pause();
		  }
	  } else {
		  loadPlayer();
	  }
  }
  function pickSong(num) {
	  next = num;
	  nextSong();
  }
	
  function init() {
    var audioPlayer = document.getElementsByTagName("audio")[0];
    audioPlayer.addEventListener('ended', loopAudio, false);
	document.getElementsByTagName("audio").style.borderColor
  }
	
  window.onload = function() {

	  setTimeout("pickSong(0);",200);
	  
  };

</script>
<body>
<div class="container">
   <div class="header"><?php include APPPATH."views/templates/common/header.php"; ?></div>
   <div class="body"><?php include APPPATH."views/".$z_main_body_view.".php"; ?></div>
   <div class="push_footer"></div>
</div>
<div class="footer"><?php include APPPATH."views/templates/common/footer.php"; ?></div>
</body>
</html>
