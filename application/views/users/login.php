
<div id="border">
<form id='login-form' method='post' action="<?=site_url("users/authentication")?>">
  <table width="480" border="0" align="center" id="usertitle">
      <tr>
        <td><h2>Administrator</h2></td>
        <td align="right"><img src="<?=base_url();?>images/Secure_connection.gif" alt="" width="116" height="22" /></td>
    </tr>
    </table>
  <div id="login">
	<div class="user_line_border_top">&nbsp;</div>        
	<? if (isset($error_message) && $error_message != "") {?>
       <div class="error_message"><?=$error_message?><br />Forgot your password? <a href="<?=site_url('users/signup');?>" style="color:#BD2031">Request a new one.</a></div>
    <? }else { echo "<div style=\"margin-top:38px;\"></div>";} ?>
    <div style="width:50%; margin:20px auto 0 auto;">
        <div style='color: #333; font-size: 12px; color: #555; padding-bottom: 5px;' >Username</div>
        <input type='text' name='userlogin' id="userlogin" value="<? if(isset($_REQUEST["userlogin"])) echo $_REQUEST["userlogin"];?>" style='padding: 5px; font-size: 16px; width: 250px; '/><br/><br/>
        <div style='color: #333; font-size: 12px; color: #555; padding-bottom: 5px;'>Password</div>
        <input name='userpwd' type='password' id="userpwd" value="" style='padding: 5px; font-size: 16px; width: 250px; ' size=30  />
        <br/><br/>
        
        <input type='submit' name="btnlogin" onclick="gologin()" value='Login' style="background:#BD2031; width:86px; height:28px; color:#fff; border:0;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px; cursor:pointer;" />
        
     </div>
  </div>
</form>
</div>