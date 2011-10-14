
   <table width="100%" border="0">
    <tr>
      <td colspan="2" height="50">  
         <div class="menu" style="border:#D1D1D1 1px solid;background:#F8F8F8;border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;">
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
      <td width="39%" valign="top" style="background:url(<?=base_url();?>images/bg_b.jpg);">
      <div class="music-player">
          <div class="album-cover">
            <span class="img" style="opacity: 1; ">
                <img src="<?=base_url();?>song/other/1.jpg" height="125" width="125" alt="album cover">
             </span>            
            <span class="highlight"></span>        
          </div>
          <div style="font-size:12px; padding-left:30px; text-align:left; float:left; width:175px;">
            <div style="color:#fff">Love The Way You Lie</div>
            <div style="color:#666"><i>By</i> Eminem</div>
            <div><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-on.png" width="15" height="16"><img src="<?=base_url();?>images/rating-off.png" width="15" height="16"></div>
            <div style="color:#fff">( 46 ratings )</div>
          </div>
       </div>
      </td>
      
      <td width="61%" class="right_content" style="padding-right:5px;">
      
          <div class="media-player">
          <span class="media-label">audioplayer <span class="media-name"></span></span>
          <div class="player-errors ui-state-error">
              Turn on your JavaScript
          </div>
          <audio autoplay="autoplay"></audio>
          
          <div class="media-controls">
              <a class="play-pause"><span class="ui-icon"> </span><span class="button-text">play / pause</span></a>
              <span class="current-time player-display">00:00</span>
              <div class="timeline-slider">
                  <span class="handle-label">play position</span>
                  <div class="progressbar"></div>
              </div>
              <span class="duration player-display">00:00</span>
              <a class="mute-unmute"><span class="ui-icon"> </span><span class="button-text">mute / unmute</span></a>
              <div class="volume-slider"><span class="handle-label">volume control</span></div>
          </div>
          
          <div class="playlist loop autoplay-next">
              <div style="width:99%;height:480px;overflow:auto;">
              <ul>
                <?php foreach($songs->result_array() as $rowSongs){?>
                  <li data-srces="<?=base_url();?><?=$rowSongs["file_path"].$rowSongs["file_name"];?>,<?=base_url();?>song/chefsachesketch.ogg"><?=$rowSongs["song_title"];?></li>
                <?php }?>
              </ul>
              </div>
          </div>
      </div>
      </td>
    </tr>
  </table>
