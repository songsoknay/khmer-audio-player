<div class="menu_header">
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2">&nbsp;</td>
        <td width="38%" align="right">
        	   <? $param = serialize($Z_USER["user_login"]);      
        	   if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
        		echo "Welcome ".htmlspecialchars($Z_USER["user_login"]);?> | <a href="<?=site_url("users/profiles")?>?e=<?=Zencryption::encrypt($param)?>&type=properties">Profile</a> | 
        		<a href="<?=site_url("users/resetPassword")?>?e=<?=Zencryption::encrypt($param)?>">Change password</a> | <a href="<?=site_url("users/logout")?>">Logout</a>
    			<?}else{?> <a href="<?=site_url("users")?>">Sign in</a> | <a href="<?=site_url("users/signup")?>">Sign up</a><?}?>
        </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td align="right"><ul><li><a href=""><img src="<?=base_url();?>images/kh.png" width="16" height="11" border="0" /></a></li><li><a href=""><img src="<?=base_url();?>images/United Kingdom(Great Britain).png" width="16" border="0" /></a></li></ul></td>
      </tr>
    </table>
</div>