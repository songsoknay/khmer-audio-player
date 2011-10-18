<?php 
    $Z_USER = Zsession::getUserFromSession();
    echo doctype();
?>
<html>
<head>
<title><?=$z_page_title?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=CHAR_SET?>" />
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/general.css" />
<link class="ui-theme" rel="stylesheet" href="<?=base_url();?>css/jquery-ui.css"/>
<link rel="stylesheet" href="<?=base_url();?>css/player-controls.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>

<!-- ui-components -->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.js"></script>
<!-- END:  ui-components -->
<!-- optional for a11y-slider -->
<script src="<?=base_url();?>js/utils/a11y-slider.ext.js"></script>
<!-- END: for a11y-slider -->

<!-- full jme script -->
<!-- configure path to swf-fallback: script.jwPlayer[src] -->

<script src="<?=base_url();?>js/src/mm.base-embed.js"></script>
<script src="<?=base_url();?>js/src/mm.base-api.js"></script>
<script src="<?=base_url();?>js/src/mm.base-controls.js"></script>
<script src="<?=base_url();?>js/src/mm.jwplayer-embed.js"></script>
<script src="<?=base_url();?>js/src/mm.jwplayer-api.js"></script>

<!-- adds playlist markup- and dom-api -->
<script src="<?=base_url();?>js/plugins/playlist.js"></script>

<script language="javascript">

$('html').addClass('js-on');
$(function(){
	$('div.media-player').jmeControl();
});

function onlyNumbers(evt)
{
	var e = event || evt; // for trans-browser compatibility
	var charCode = e.which || e.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}
</script>
</head>
<body>
<div class="container">
   <div class="header"><?php include APPPATH."views/templates/common/header.php"; ?></div>
   <div class="body"><?php include APPPATH."views/".$z_main_body_view.".php"; ?></div>
   <div class="push_footer"></div>
</div>
<div class="footer"><?php include APPPATH."views/templates/common/footer.php"; ?></div>
</body>
</html>
