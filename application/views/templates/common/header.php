<table border="0" width="100%" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="38%" align="right"> 
          <? //$param = serialize($Z_USER["user_login"]);
             $type = serialize("properties");
                  
             if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
              echo "Welcome to ".htmlspecialchars($Z_USER["user_login"]);?>
              | <a href="<?=site_url("users/logout")?>">Logout</a>
          <? }else {?> <a href="<?=site_url("users")?>">Sign in</a> | <a href="<?=site_url("users/signup")?>">Sign up</a>
          <? } ?>
      </td>
    </tr>
    <tr><td align="left"><img src="<?=base_url();?>images/logo.png" width="252" height="40" /></td></tr>
</table>
