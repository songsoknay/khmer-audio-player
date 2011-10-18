 <script language="javascript">
	function goback(){
		document.forms[0].action='<?=site_url("users/homeuser")?>';
		document.forms[0].submit();
	}
	function addnewuser(){
		document.forms[0].action='<?=site_url("users/addnewUser")?>';
		document.forms[0].submit();
	}
</script>

	<h3 class="capture">Administrator Management</h3>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Add New User</div>
        <div class="dd_view">
        <form action="" method="post">
   			<table width="420" border="0" align="center" cellpadding="0" cellspacing="0" id="addUser">
              <tr>
                <td width="100">&nbsp;</td>
                <td width="233">&nbsp;</td>
                <td width="87">&nbsp;</td>
              </tr>
              <tr>
                <td>First name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtfname" name="txtfname" maxlength="100" class="textbox" value="<?=htmlspecialchars($txtfname);?>"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Last name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtlname" name="txtlname" value="<?=htmlspecialchars($txtlname);?>" class="textbox" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Login name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtloginname" name="txtloginname" value="<?=htmlspecialchars($txtloginname);?>" class="textbox" maxlength="50"></div></td>
                <td><div class="require">*</div></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtemail" name="txtemail" value="<?=htmlspecialchars($txtemail);?>" class="textbox" maxlength="100"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Password:</td>
                <td><div class="bordrTextbox"><input type="password" id="txtpwd" name="txtpwd" value="<?=htmlspecialchars($txtpwd);?>" class="textbox" maxlength="100"></div></td>
                <td><div class="require">*</div></td>
              </tr>
              <tr>
                <td>Confirm Password:</td>
                <td><div class="bordrTextbox"><input type="password" id="txtconfirmpwd" name="txtconfirmpwd" value="<?=htmlspecialchars($txtconfirmpwd);?>" class="textbox" maxlength="100"></div></td>
                <td><div class="require">*</div></td>
              </tr>
              <tr>
                <td>User group:</td>
                <td>        	
                <div class="bordrTextbox">
                <select name="cbousergroup" class="textbox">
        		<?php foreach($usergroup->result() as $ugroup): ?>
                  <option value="<?=$ugroup->user_group_id;?>"><?=htmlspecialchars($ugroup->user_group_desc); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
            	</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                <font color="#FF0000"><?php echo $error_message;?></font><br><br>
                <input type="button" name="btnback" value="Back" class="bottom" onclick="goback()" />
           		<input type="button" name="btnsave" value="Save" class="bottom" onclick="addnewuser()" />
            	
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
        	
        </form>
		</div>
        
    </div> 

</div>

