<div id="homepage">
   <table width="100%">
      <tr>
         <td class="home_block" align="center">
             <table><tr><td>
             <div class="back-end-icon"><img src="<?=base_url()?>images/user.png" width="32" height="32" align="left" />User<br />Management</div>
             <ul>
                <li><a href="<?=site_url("users/homeuser")?>">Users</a></li>
             </ul> 
             <td></tr></table>  
         </td>
         <td class="home_block" align="center">
           <table><tr><td>
             <div class="back-end-icon"><img src="<?=base_url()?>images/1309407100_free-for-job.png" width="32" height="32" align="left" />Songs<br />Management</div>
             <ul style="padding-left:36px">
             	<li><a href="<?=site_url("songs/all")?>">Songs</a></li>
                <li><a href="<?=site_url("songs/addsongs")?>">add Songs</a></li>
             	<li><a href="<?=site_url("songs/add_productions")?>">Productions</a></li>
                <li><a href="<?=site_url("job_management/Addalbumw")?>">Albums</a></li>
             </ul>            
             <td></tr></table>  
         </td>
         <td class="home_block" align="center">
             <table><tr><td>
             <div class="back-end-icon"><img src="<?=base_url()?>images/Home.png" width="38" height="38" align="left" />Voting<br />Systemt</div>
             <ul>
				<li><a href="<?=site_url('vote_management/itemCategory')?>">Voting Item Categories</a></li>
                <li><a href="<?=site_url('vote_management/voteItem')?>">Voting Items</a></li>
                <li><a href="<?=site_url('vote_management/voteTopic')?>">Voting Topics</a></li>
                <li><a href="<?=site_url('vote_management/voteEvent')?>">Voting Events</a></li>
             </ul>
             <td></tr></table>
         </td>
      </tr>
   </table>
</div>
