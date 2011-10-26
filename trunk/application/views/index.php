<table width="100%" border="0">
    <tr>
      <td colspan="2" height="50">  
         <div class="menu" style="border:#D1D1D1 1px solid;background:#F8F8F8;border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;font-family: 'Hanuman', 'Khmer OS System', 'Khmer OS', 'Tahoma', 'sans-serif';">
          <ul>
            <li id="projects" class="notification-menu-item "><a href="index.html#">ទំព័រដែម</a></li>
            <li id="tasks" class="notification-menu-item "><a href="index.html#">ស្តាប់ចំរៀង</a>
              <ul>
              <?php foreach($song_cat->result_array() as $rowCat){?>
                  <li><a href="<?=site_url("job_wanted/job_wanted_list")?>"><?=$rowCat["song_cat_name"];?></a></li>
              <?php }?>
              </ul>
            </li>
            <li id="messages" class="notification-menu-item "><a href="index.html#">ទំព័រសំនូមពរ</a></li>
            <li id="clients" class="notification-menu-item last-item"><a href="index.html#">អំពីយើង</a></li>
          </ul>
          </div>
      </td>
    </tr>	
    <tr>
      <td width="36%" valign="top" style="background:url(<?=base_url();?>images/bg_b.jpg);">
      <div class="music-player">
          <div class="album-cover">
            <span class="img" style="opacity: 1; ">
                <img src="<?=base_url();?>song/Audio-Vol12-F.jpg" height="125" width="125" alt="album cover">
             </span>            
            <span class="highlight"></span>        
          </div>
          <div style="font-size:12px; padding-left:18px; text-align:left; float:left; width:135px;">
            <div style="color:#fff">ភាសាខែ្មរ</div>
            <div style="color:#666; margin:5px 0;"><i>By</i> អ្នកចំរៀងចំរុះ</div>
            <div><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-off.png" width="15" height="16"></div>
            <div style="color:#fff">( 46 ratings )</div>
          </div>            
          <ul>
            <?php foreach($song_cat->result_array() as $rowCat){?>
            <li><a href="<?=site_url("#")?>"><?=$rowCat["song_cat_name"];?></a></li>
            <?php }?>
          </ul>
       </div>
      </td>
      
      <td width="64%" class="right_content" style="padding-right:5px;">    
          <div id="player">
            <?php
			//setting the variables
			$safari = stripos($_SERVER['HTTP_USER_AGENT'],"Safari");
			$chrome = stripos($_SERVER['HTTP_USER_AGENT'],"chrome");
			
			//detecting device
			if($chrome==true) {?>
            	<style type="text/css">audio {width:518px;}</style>
				<div onclick="nextSong()" style="height:30px; width:35px; float:right; cursor:pointer;"><img src="<?=base_url();?>images/next.png" width="35" height="32" /></div>
			<? }else {?> 
            	<style type="text/css">audio {width:518px;}</style>
            	<div onclick="nextSong()" style="height:30px; width:35px; float:right; cursor:pointer;"><img src="<?=base_url();?>images/next.png" height="25" /></div>
            <? }?>	
          </div>
		  <div id="playpause" onclick="playPause()">&nbsp;</div>
		  <div id="mute" onclick="mute()">&nbsp;mute</div>
          <div id="playlist">

              <script type="text/javascript">
			  var urls = new Array();				  
              <?php $key=0;
              foreach($songs->result_array() as $key => $rowSongs){?>
                 urls[<?=$key;?>] = '<?=base_url();?><?=$rowSongs["file_path"].$rowSongs["file_name"];?>';
              <? }?>
			  var next = 0;
              </script>
              <ul>
              <?php $key=0;
			  $i=1;
              foreach($songs->result_array() as $key => $rowSongs){?>
                <li onclick="pickSong(<?=$key;?>)" id="listsong"><?=$i++;?>. <?=$rowSongs["song_title"];?></li>
              <? }?> 
              </ul> 
              
          </div>
      </td>
    </tr>
  </table>
<style type="text/css"></style>
