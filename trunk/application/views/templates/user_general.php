<?php 
    $Z_USER = Zsession::getUserFromSession();
    echo doctype();
?>
<html>
<head>
<title><?=$z_page_title?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=CHAR_SET?>" />
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/general.css" />

<script language="javascript">

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
<div class="container" style="width:99%;">
   <div class="header"><?php include APPPATH."views/templates/common/header.php"; ?></div>
   <div class="body"><?php include APPPATH."views/".$z_main_body_view.".php"; ?></div>
   <div class="push_footer"></div>
</div>
<div class="footer"><?php include APPPATH."views/templates/common/footer.php"; ?></div>
</body>
</html>
