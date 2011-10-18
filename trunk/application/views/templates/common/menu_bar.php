<div id="header">
  <div style="margin:0 auto; width:980px;"><a href="<?=site_url("main")?>"><img src="<?=base_url();?>images/zuka-logo.gif" width="115" height="35" border="0" align="top"/></a> <span style="padding:10px 0 0 50px;"><img src="<?=base_url();?>images/sabaycall.gif" width="650" height="80" style="margin-top:10px;""/></span></div>
	<div class="menu">
		<ul>
			<li><a href="<?=site_url("main")?>" id="">Home</a></li>
			<li><a href="<?=site_url("classify/goto_classify_view_all")?>">Classified ads</a>
		  </li>
			<li><a href="#">Jobs</a>
                <ul>
				<li><a href="<?=site_url("job_wanted/job_wanted_list")?>">Job wanted</a></li>
                <li><a href="<?=site_url("front_job_announ/goto_job_page")?>">Job announcement</a></li>
                </ul>
          </li>
        	<li><a href="<?=site_url('property');?>">Properties</a></li>
          <li><a href="<?=site_url("vote")?>">Voting</a>
          </li>
          <li>
        <form action="" method="post">
          <table width="170" border="0" align="right" style="margin-top:3px; margin-left:150px; display:none">
              <tr>
                <td><input name="" type="text" onfocus="if(this.value=='Quick search')this.value='';autocompleteLoadList(AUTOCOMPLETE_LIST_URL);" value="Quick search" tabindex="201" accesskey="s" style="height:20px; border:0; width:136px; padding-left:3px;"/></td>
                <td>
                     <select name="" style="height:23px; border:#FFF; font:12px Arial, Helvetica, sans-serif;">
                      <option value="1">Classified ads</option>
                      <option value="2">Jobs</option>
                      <option value="3">jobs wanted</option>
                      <option value="4">Voting</option>
                      <option value="5">Property</option>
                     </select>
                </td>
                <td><input name="" type="submit" value="Search"  class="btn_search_main"/></td>
              </tr>
            </table>
          </form>
          </li>
		</ul>

	</div>
  <div style="background:#E8E8E8; height:4px;"></div>
</div>