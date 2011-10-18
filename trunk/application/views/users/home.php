 <script language="javascript">
	function goback(){
		document.forms[0].action='<?=site_url("misc/homepage")?>';
		document.forms[0].submit();
	}
	function goaddnew(){
		document.forms[0].action='<?=site_url("users/gotoregister")?>';
		document.forms[0].submit();
	}
	function gotodeleteuser(deleteid){
		if(confirm("Do you want to delete?","Delete data")){
			document.forms[0].action='<?=site_url("users/deleteuser")?>/'+ deleteid ;
			document.forms[0].submit();
		}
		
	}
</script>
	<h3 class="capture">Administrator Management</h3>
    <div id="wrap">
    <div id="tdd_selected">
    	<div class="dd_selected">users</div>
        <div class="dd_view"><br />
        <form action="" method="post">
        	<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="userview">
        		<tr>
        			<th>user login</th>
        			<th>first name</th>
        			<th>last name</th>
        			<th>user group</th>
        			<th>email</th>
        			<th>delete</th>
        		</tr>
        		 
        		<?php foreach($all_users->result() as $users): ?>
                  <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td><a href="<?=site_url("users/gotoupdateuser/$users->user_id")?>"><?=htmlspecialchars($users->user_login);?></a></td>
                    <td><?=htmlspecialchars($users->user_fname);?></td>
                    <td><?=htmlspecialchars($users->user_lname);?></td>
                    <td><?=htmlspecialchars($users->user_group_desc);?></td>
                    <td><?=htmlspecialchars($users->user_email);?></td>
                    <?php if($users->user_login==htmlspecialchars($Z_USER["user_login"])){//when user='admin' , disable recycle bin ?>
                    <td></td>
                  	<?php }else{ ?>
                  		<td align="center"><img src="<?=base_url(); ?>images/recyclebin.png" onclick="gotodeleteuser('<?=htmlspecialchars($users->user_id);?>')" width="20px" height="20px" /></td>
                  	<?php } ?>
                  </tr>
              	<?php endforeach; ?>
            </table><br />
           <div align="center">
	           <input type="button" name="btnback" value="Back" class="bottom" onclick="goback()" />
	           <input type="button" name="btnaddnew" class="bottom" value="Add New" onclick="goaddnew()" />
	       </div><br />
        </form>
		</div>
        
    </div> 
      
  </div>


