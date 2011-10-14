 
    <h2>Administrator Management</h2><br>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Add Productions</div>
        <div class="dd_view">
        <form action="<?=site_url("songs/add_productions");?>" method="post" enctype="multipart/form-data">

        <?php if(isset($message_errors)){?><div class="error_message" style="color:#BD2031; font-size:11px; line-height:20px;"><?=$message_errors;?></div><? }?>
        <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" id="addSong">
              <tr>
                <td width="200">&nbsp;</td>
                <td width="233">&nbsp;</td>
                <td width="87">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Production name: <span class="require">*</span></td>
                <td>
                <input name="txtProduction" type="text" class="textbox" id="txtProduction" value="<?php if(isset($_POST['txtTitle']))echo set_value('txtTitle'); ?>" >
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Album picture:</td>
                <td><input type="file" name="image1" id="image1"></td>
                <td>&nbsp;</td>

              </tr> 
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>              
              <tr>
                <td>&nbsp;</td>
                <td>
                <br>
                <input type="button" name="btnback" value="Back" class="bottom" onclick="window.location='<?=site_url("misc/homepage");?>'" />
           		<input type="submit" name="btnaddPro" value="Ready add production" class="bottom" />
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </form>
	  </div>
        
    </div> 
      
</div>