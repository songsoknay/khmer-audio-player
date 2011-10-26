<?php 
    $Z_USER = Zsession::getUserFromSession();
    echo doctype();
?>
<?php
//setting the variables
$ipod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iphone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
?>
<html>
<head>
<title><?=$z_page_title?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=CHAR_SET?>" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<? if ($ipod == true || $iphone == true || $ipad == true){?>
<link href="<?=base_url()?>css/styles.css" rel="stylesheet" media="screen" type="text/css" /> 
<? }else{?>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/general.css" />
<? }?>
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
	  var playpause = document.getElementById('playpause');
	  
	  if(audioPlayer!=undefined) {
		  if (audioPlayer.paused) {
			  audioPlayer.play();
			  document.getElementById('playpause').className='pause';
		  } else {
			  audioPlayer.pause();
			  document.getElementById('playpause').className='play';
		  }
	  } else {
		  loadPlayer();
	  }
  }
  function pickSong(num) {
	  next = num;
	  nextSong();
	  document.getElementById('playpause').className='pause';
  }
	
  function init() {
    var audioPlayer = document.getElementsByTagName("audio")[0];
    audioPlayer.addEventListener('ended', loopAudio, false);
	document.getElementsByTagName("audio").style.borderColor
  }
  
  function mute(){
	  var audioPlayer = document.getElementsByTagName("audio")[0];
	  audioPlayer.muted =  true;
  }
  window.onload = function() {

	  setTimeout("pickSong(0);",200);
	  document.getElementById('playpause').style.cursor ='pointer';
  };

</script>
<body>
<?
if ($ipod == true || $iphone == true || $ipad == true){?>

	<div id="topbar">
	<div id="leftbutton">
		<a href="<?=site_url("main");?>"><img alt="home" src="<?=base_url()?>images/home-ios.png" /></a></div>
	<div id="rightnav">
		<a href="<?=site_url("");?>" class="noeffect">How to add Play</a> </div>

	 <div id="title">sovan.com</div>
	</div>
    <div class="menu" style="border:#D1D1D1 1px solid; margin:10px 0 20px 0;background:#F8F8F8;border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;font-family: 'Hanuman', 'Khmer OS System', 'Khmer OS', 'Tahoma', 'sans-serif';">
    <ul>
      <li id="projects" class="notification-menu-item "><a href="index.html#">ទំព័រដែម</a></li>
      <li id="tasks" class="notification-menu-item "><a href="index.html#">ស្តាប់ចំរៀង</a>
        <ul>
        <?php foreach($song_cat->result_array() as $rowCat){?>
            <li><a href="<?=site_url("job_wanted/job_wanted_list")?>"><?=$rowCat["song_cat_name"];?></a></li>
        <?php }?>
        </ul>
      </li>
      <li id="messages" class="notification-menu-item "><a href="index.html#">ទំព័រសំនូមពរ</a></li>
      <li id="clients" class="notification-menu-item last-item"><a href="index.html#">អំពីយើង</a></li>
    </ul>
    </div>
    <div id="player">
      <style type="text/css">audio {width:96%;}</style>
      <div onClick="nextSong()" style="height:30px; width:35px; float:right; cursor:pointer; margin-top:-7px"><img src="<?=base_url();?>images/next.png" height="24" /></div>
    </div>
    <div id="playlist-ios">
	<style type="text/css">body {background: #c7ced5 url(http://iphonekhmer.com/cydia/images/background.png);}</style>
      <script type="text/javascript">
      var urls = new Array();				  
      <?php $key=0;
      foreach($songs->result_array() as $key => $rowSongs){?>
         urls[<?=$key;?>] = '<?=base_url();?><?=$rowSongs["file_path"].$rowSongs["file_name"];?>';
      <? }?>
      var next = 0;
      </script>
      <ul>
      <?php $key=0;
      $i=1;
      foreach($songs->result_array() as $key => $rowSongs){?>
        <li onClick="pickSong(<?=$key;?>)" id="listsong"><?=$i++;?>. <?=$rowSongs["song_title"];?></li>
      <? }?> 
      </ul>   
    </div>

<? }else {?>
<div class="container">
   <div class="header"><?php include APPPATH."views/templates/common/header.php"; ?></div>
   <div class="body"><?php include APPPATH."views/".$z_main_body_view.".php"; ?></div>
   <div class="push_footer"></div>
</div>
<div class="footer"><?php include APPPATH."views/templates/common/footer.php"; ?></div>
<? }?>
</body>
</html>
