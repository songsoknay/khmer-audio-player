 
    <h2>Administrator Management</h2><br>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Add songs</div>
        <div class="dd_view">
        <form action="<?=site_url("songs/addsongs");?>" method="post" enctype="multipart/form-data">

        <?php if(isset($message_errors)){?><div class="error_message" style="color:#BD2031; font-size:11px; line-height:20px;"><?=$message_errors;?></div><? }?>
        <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" id="cpanel_Songs">
              <tr>
                <td width="200">&nbsp;</td>
                <td width="233">&nbsp;</td>
                <td width="87">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Title: <span class="require">*</span></td>
                <td>
                <input name="txtTitle" type="text" class="textbox" id="txtTitle" value="<?php if(isset($_POST['txtTitle']))echo set_value('txtTitle'); ?>" >
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Artist</td>
                <td>
                <select name="cboArtist" id="cboArtist" class="combox">
                <option value="null"></option>
                	<?php foreach($artist->result_array() as $rowArtist){
                        $selected = isset($rowArtist["song_artist_id"]) && ($rowArtist["song_artist_id"]== set_value('cboArtist')) ? "selected" : "";?>
                    	<option value="<?=$rowArtist["song_artist_id"]?>" <?=$selected?>><?=$rowArtist["song_artist_name"]?></option>
                	<? } ?>
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Album name: <span class="require">*</span></td>
                <td>
                <input name="txtAlbum" type="text" class="textbox" id="txtAlbum" value="<?php if(isset($_POST['txtAlbum']))echo set_value('txtAlbum'); ?>">
                </td>
                <td>
                <select name="cboAlbumname" size="1" id="cboAlbumname">
                	<?php foreach($album->result_array() as $rowAlbum){
						$selected = isset($rowAlbum["album_id"]) && ($rowAlbum["album_id"]== set_value('cboAlbumname')) ? "selected" : "";?>
                    	<option value="<?=$rowAlbum["album_id"]?>" <?=$selected?>><?=$rowAlbum["album_name"]?></option>
                	<? } ?>
                </select>
                </td>
              </tr>

              <tr>
                <td align="right">Language song: <span class="require">*</span></td>
                <td>
                <select name="cboLang" id="cboLang" class="combox">
                <option value="null"></option>
                	<?php foreach($language->result_array() as $rowLang){
						$selected = isset($rowLang["song_lang_id"]) && ($rowLang["song_lang_id"]== set_value('cboLang')) ? "selected" : "";?>
                    	<option value="<?=$rowLang["song_lang_id"]?>" <?=$selected?>><?=$rowLang["song_lang_name"]?></option>
                	<? } ?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Production:</td>
                <td>
                <select name="cboPro" id="cboPro" class="combox">
                <option value="null"></option>
                <?php foreach($production->result_array() as $rowPro){
					$selected = isset($rowPro["production_id"]) && ($rowPro["production_id"]== set_value('cboPro')) ? "selected" : "";?>
                  <option value="<?=$rowPro["production_id"]?>" <?=$selected?>><?=$rowPro["production_name"]?></option>
                <? } ?>	
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Album picture:</td>
                <td><input type="file" name="image1" id="image1"></td>
                <td>&nbsp;</td>
              </tr> 
              <tr>
                <td align="right">Upload song:</td>
                <td><input type="file" name="image2" id="image2"></td>
                <td>&nbsp;</td>
              </tr>              
              <tr>
                <td>&nbsp;</td>
                <td>
                <br>
                <input type="button" name="btnback" value="Back" class="bottom" onclick="window.location='<?=site_url("misc/homepage");?>'" />
           		<input type="submit" name="btnadd" value="Ready add song" class="bottom" />
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </form>
	  </div>
        
    </div> 
      
</div>