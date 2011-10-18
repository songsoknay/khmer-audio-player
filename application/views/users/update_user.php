 <script language="javascript">
	function goback(){
		document.forms[0].action='<?=site_url("users/homeuser")?>';
		document.forms[0].submit();
	}
	function gotoupdate(id){
		document.forms[0].action='<?=site_url("users/updateuser")?>/'+id;
		document.forms[0].submit();
	}
</script>
	<h3 class="capture">Administrator Management</h3>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Update User</div>
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
                <td><div class="bordrTextbox"><input type="text" id="txtfname" class="textbox" name="txtfname" maxlength="100" value="<?=htmlspecialchars($userdata['user_fname']); ?>" ></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Last name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtlname" class="textbox" name="txtlname" maxlength="100" value="<?=htmlspecialchars($userdata["user_lname"]); ?>"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Login name:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtloginname" class="textbox" name="txtloginname" maxlength="50" value="<?=htmlspecialchars($userdata["user_login"]); ?>"></div></td>
                <td><div class="require">*</div></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><div class="bordrTextbox"><input type="text" id="txtemail" class="textbox" name="txtemail" maxlength="100" value="<?=htmlspecialchars($userdata["user_email"]); ?>"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>User group:</td>
                <td>        	
                <div class="bordrTextbox">
                <select name="cbousergroup" class="textbox">
        		<?php foreach($usergroup->result() as $ugroup): 
        					if($userdata["user_group_desc"]==$ugroup->user_group_desc){
								$selecteditem= 'selected=/"selected/"';
							}else{
								$selecteditem='';
							}
        		?>
              <option value="<?=$ugroup->user_group_id;?>"  <?=$selecteditem;?> ><?=htmlspecialchars($ugroup->user_group_desc); ?></option>
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
            <input type="button" name="btnsave" value="Save" class="bottom" onclick="gotoupdate('<?=$userdata['user_id'];?>')" />
            	
                </td>
               <td>&nbsp;</td>
              </tr>
            </table>
        </form>
		</div>
        
    </div> 
      
  </div>


