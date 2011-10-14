 
    <h2>Administrator Management</h2><br>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">Edit songs</div>
        <div class="dd_view">
        <form action="<?=site_url("songs/editsongs/".$song_id["song_id"]);?>" method="post" enctype="multipart/form-data">
		
        <?php if(isset($message_errors)){?><div class="error_message" style="color:#BD2031; font-size:11px; line-height:20px;"><?=$message_errors;?></div><? }?>
        <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" id="cpanel_Songs">
              <tr>
                <td width="395">&nbsp;</td>
                <td width="296">&nbsp;</td>
                <td width="349">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Title: <span class="require">*</span></td>
                <td>
                <input name="txtTitle" type="text" class="textbox" id="txtTitle" value="<?=(isset($_POST['txtTitle']) ? set_value('txtTitle') : $song_id["song_title"])?>" >
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Artist</td>
                <td>
                <select name="cboArtist" id="cboArtist" class="combox">
                <option value="null"></option>
                	<?php foreach($artist->result_array() as $rowArtist){
                        //$selected = isset($rowArtist["song_artist_id"]) && ($rowArtist["song_artist_id"]== set_value('cboArtist')) ? "selected" : "";
                        
						$art_id = isset($_POST['cboArtist']) ? set_value("cboArtist") : $song_id["song_artist_id"];
                        $selected = $rowArtist["song_artist_id"]==$art_id ? "selected" : "";?>
                    	<option value="<?=$rowArtist["song_artist_id"]?>" <?=$selected?>><?=$rowArtist["song_artist_name"]?></option>
                	<? } ?>
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Album name: <span class="require">*</span></td>
                <td>
                <input name="txtAlbum" type="text" class="textbox" id="txtAlbum" value="<?=(isset($_POST['txtAlbum']) ? set_value('txtAlbum') : $song_id["album_id"])?>">
                </td>
                <td>Type Other if you don't known album</td>
              </tr>

              <tr>
                <td align="right">Language song: <span class="require">*</span></td>
                <td>
                <select name="cboLang" id="cboLang" class="combox">
                <option value="null"></option>
                	<?php foreach($language->result_array() as $rowLang){
						$lang_id = isset($_POST['cboLang']) ? set_value("cboLang") : $song_id["song_lang_id"];
                        $selected = $rowLang["song_lang_id"]==$lang_id ? "selected" : "";?>
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
					$pro_id = isset($_POST['cboPro']) ? set_value("cboPro") : $song_id["production_id"];
                    $selected = $rowPro["production_id"]==$pro_id ? "selected" : "";?>
                  <option value="<?=$rowPro["production_id"]?>" <?=$selected?>><?=$rowPro["production_name"]?></option>
                <? } ?>	
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Album picture:</td>
                <td><input type="file" name="image1" id="image1">&nbsp;<?=$song_id["album_pic"];?></td>
                <td>&nbsp;</td>

              </tr> 
              <tr>
                <td align="right">Upload song:</td>
                <td><input type="file" name="image2" id="image2">&nbsp;<?=$song_id["file_name"];?></td>
                <td>&nbsp;</td>
              </tr>             
              <tr>
                <td>&nbsp;</td>
                <td>
                <br>
                <input type="button" name="btnback" value="Back" class="bottom" onclick="window.location='<?=site_url("misc/homepage");?>'" />
           		<input type="submit" name="btnedit" value="Ready update song" class="bottom" id="btnedit" />
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </form>
	  </div>
        
    </div> 
      
</div>