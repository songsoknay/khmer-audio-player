	<?php 
	    $browser = getBrowser();
	    $style = $browser["name"] != 'Internet Explorer' ? "mask" : "mask_ie";
	?>
	<div class="<?=$style?>">
    	
        	<div class="second-mask"></div>      
            <div class="rd-mask">
            
                PROPETIES SEARCH
               
                     <input name="neighborhood" type="text" class="textbox" id="neighborhood" onfocus="if(this.value=='Neighborhood, City or ZIP code')this.value='';autocompleteLoadList(AUTOCOMPLETE_LIST_URL);" value="Neighborhood, City or ZIP code" tabindex="201" accesskey="s" style="background:#fff; height:21px; margin-top:8px; width:235px; padding-left:6px;" />
                     <!--<input name="specify" type="text" class="textbox" id="specify"  onfocus="if(this.value=='Specify Property Address')this.value='';autocompleteLoadList(AUTOCOMPLETE_LIST_URL);" value="Specify Property Address" style="background:#fff; height:21px; margin-top:8px; width:235px; padding-left:6px;" />-->
                     <select name="specify" id="specify" class="select textboxSH" style="width:245px;height:26px; margin-top:8px;">
                     
                     	<? foreach($get_loc->result_array() as $rowLoc){?>
							<? $select = $rowLoc["location_name"]=="Phnom Penh" ? "Selected" : "";?>
                        	<option value="'<?=$rowLoc["location_name"]?>'" <?=$select;?>><?=$rowLoc["location_name"]?></option>
                        <? }?>
                     </select>
                     <table border="0" cellpadding="0" cellspacing="3" align="center">
                         <tbody>
                                <tr>
                                    <td height="20" colspan="4" align="center">
                                        <input name="radioSearchType" class="radio"  id="radioSearchType1" value="Rentals" style="" type="radio"> 
                                        For Rent
                                        <input name="radioSearchType" class="radio" id="radioSearchType2" value="Sale" style="" type="radio"> 
                                        For Sale
                                        <input name="radioSearchType" class="radio" id="radioSearchType3" value="All" style="" checked="checked" type="radio"> 
                                        All
                                    </td>
                                  </tr>
                                <tr>
                            <td width="16%" height="20">Price</td>
                        <td width="30%">
                            <input id="minprice" name="minprice" maxlength="10" class="TextBoxNormal" style="width: 97px; font-family: Arial; color: rgb(116, 116, 116);" onblur="javascript:keyDown(event,this);roundPrice(this.id);" type="text">									</td>
                        <td width="22%" align="center">to</td>
                        <td width="32%" align="left">
                            <input id="maxprice" name="maxprice" class="TextBoxNormal" maxlength="10" style="width: 90px; font-family: Arial; color: rgb(116, 116, 116);" onblur="javascript:keyDown(event,this);roundPrice(this.id);" type="text">									</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td colspan="3" height="15" align="left">		
                            <select name="searchType" id="searchType" class="select textboxSH" style="width:220px;*width:231px;">
                                <option selected="selected" value="'Condo','Townhouse','Vintage','Duplex','Loft','Mobile Homes','Multi Units','Single Family'">Any</option>
                                <option value="'Condo','Townhouse','Vintage','Duplex','Loft'">Condo</option>
                                <option value="'Loft'">Loft</option>
                                <option value="'Townhouse'">Townhouse</option>
                                <option value="'Duplex'">Duplex</option>
                                <option value="'Single Family'">Single Family</option>
                                <option value="'Multi Units'">Multi-Unit (2-4 Units)</option>
                                <option value="'Multi Family'">Multi-Unit (5+ Units)</option>
                                <option value="'Vacant Land'">Vacant Land</option>
                                <option value="'Vintage'">Vintage</option>
                                <option value="'Condominium/Co-op'">Co-op</option>
                                <option value="'Deeded Parking'">Deeded Parking</option>
                                <option value="'Business','Industrial','Institutional','Mixed Usage','Office','Retail Space'">Commercial/Investment</option>
                            </select>									
                         </td>
                    </tr>                               		
                    <tr>
                        <td style="padding-right: 5px;" align="right"><input name="chkOpnHome" id="chkOpnHome" style="margin-left: 20px;" type="checkbox"></td>
                        <td colspan="2"><img src="<?=base_url();?>images/openhomes_icon.gif" style="margin-top: 1px;"><span style="position:relative;top:-3px;left:5px;">Select Houses Only </span> </td>
                        <td style="padding-right: 15px; padding-top:6px;" align="right"><input name="" type="button" value="Search" class="btn_search_pro" onclick="cmdsearch()" /></td>
                    </tr>
                    </tbody>
                    </table>
                            
                </div>
          </div>