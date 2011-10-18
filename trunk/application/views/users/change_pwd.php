 <script language="javascript">
	function goback(){
		document.forms[0].action='<?=site_url("admin/homeuser")?>';
		document.forms[0].submit();
	}
	function gotochangepwd(){
		document.forms[0].action='<?=site_url("admin/savechangepwd")?>';
		document.forms[0].submit();
	}
</script>
	<h3 class="capture">Administrator Management</h3>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Change Password</div>
        <div class="dd_view">
        <form action="" method="post">
        <table width="420" border="0" align="center" cellpadding="0" cellspacing="0" id="addUser">
              <tr>
                <td width="200">&nbsp;</td>
                <td width="233">&nbsp;</td>
                <td width="87">&nbsp;</td>
              </tr>
              <tr>
                <td>Login name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtloginname" name="txtloginname" class="textbox" value="<?=htmlspecialchars($uloginname);?>" readonly="readonly" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Old Password:</td>
                <td><div class="bordrTextbox"><input type="password" id="txtoldpwd" name="txtoldpwd" class="textbox" value="<?=htmlspecialchars($txtoldpwd);?>" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>New Password:</td>
                <td><div class="bordrTextbox"><input type="password" id="txtnewpwd" name="txtnewpwd" class="textbox" value="<?=htmlspecialchars($txtnewpwd);?>" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Confirm New Password:</td>
                <td><div class="bordrTextbox"><input type="password" id="txtconfirmpwd" name="txtconfirmpwd" class="textbox" value="<?=htmlspecialchars($txtconfirmpwd);?>" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                <font color="#FF0000"><?php echo $error_message;?></font><br><br>
                <input type="button" name="btnback" value="Back" class="bottom" onclick="goback()" />
           		<input type="button" name="btnsave" value="Save" class="bottom" onclick="gotochangepwd()" />
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </form>
		</div>
        
    </div> 
      
</div>

