 
    <h2>Administrator Management</h2><br>
    <div id="wrap">
    
    <div id="tdd_selected">
    	<div class="dd_selected">All songs</div>
        <div class="dd_view" style="overflow:auto">
        <form action="<?=site_url("songs/addsongs");?>" method="post" enctype="multipart/form-data">
            <table width="99%" border="0" class="userview" align="center">
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Album</th>
                <th width="85">Album pic</th>
                <th>File path</th>
                <th width="85">File play</th>
                <th width="120">File name</th>
                <th>File size</th>
                <th>Length</th>
                <th>Bitrate</th>
                <th>Song lang</th>
                <th width="85">Production</th>
                <th width="85">Date</th>
                <th>Hit</th>
                <th width="70">Action</th>
              </tr>
              <?php foreach($songs->result_array() as $rowSongs){?>
              <tr>
                <td align="center"><?=$rowSongs["song_id"];?></td>
                <td><?=$rowSongs["song_title"];?></td>
                <td><?=$rowSongs["song_artist_id"];?></td>
                <td><?=$rowSongs["album_id"];?></td>
                <td width="85"><?=$rowSongs["album_pic"];?></td>
                <td><?=$rowSongs["file_path"];?></td>
                <td width="85"><?=$rowSongs["file_play"];?></td>
                <td width="120"><?=$rowSongs["file_name"];?></td>
                <td><?=$rowSongs["file_size"];?></td>
                <td><?=$rowSongs["length"];?></td>
                <td><?=$rowSongs["bit_rate"];?></td>
                <td><?=$rowSongs["song_lang_id"];?></td>
                <td width="85"><?=$rowSongs["production_id"];?></td>
                <td width="85"><?=$rowSongs["date_post"];?></td>
                <td><?=$rowSongs["hit_id"];?></td>
                <td width="70" align="center"><a href="<?=site_url("songs/editsongs/".$rowSongs["song_id"]);?>">Edit</a> <a href="">Delete</a></td>
              </tr>
              <? }?>
            </table>
        </form>
	  </div>
        
    </div> 
      
</div>