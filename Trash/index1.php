<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
	<?php 
	include'connect.php';
	?>
        <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
        <title>LinkWorth - Control Center</title><!-- Control Center -->
        <link rel='stylesheet' href='css/controlCenter.css' type='text/css' />
        <link rel='stylesheet' href='style.css' type='text/css' />
        <!--[if lt ie 6.9000]><link rel='stylesheet' type='text/css' href='css/ie6.css' /><![endif]-->
        <!--[if IE 6]>
        <link rel='stylesheet' href='css/controlCenterIE6.css' type='text/css' />
        <![endif]-->
        <!--[if IE 7]>
            <link rel='stylesheet' href='css/controlCenterIE7.css' type='text/css' />
        <![endif]-->

        <link rel='stylesheet' href='css/controlCenter_Chrome.css' type='text/chrome' />

        <script type='text/javascript'>
        <!--
        /* <![CDATA[ */
            function MM_openBrWindow ( theURL, winName, features )
            {
                window.open(theURL,winName,features);
            }

            var account_id = 126503;

            var noAdSelectedMsg='No Ad Selected';var noLocationSelectedMsg = 'No Location Selected';var noWishListSelectedMsg = 'No Wish List Selected';var noWishListNameMsg = 'No name provided for new Wish List';var cartAddOKMsg = 'Item Added To Cart';var cartAddExistsMsg = 'Item already in Cart';var cartAddErrorMsg = 'Could not add to cart.';var wishListAddOKMsg = 'Item Added To Wish List';var wishListAddExistsMsg = 'Item already in Wish List';var wishListAddErrorMsg = 'Could not add to Wish List.';var zonePlacementMsg = 'Zone Placement';var clearMsg = 'Clear';var hideMsg = 'Hide';var moreOptionsMsg = 'More Options' + "<img class='icon' src='images/icons/sort_reverse.gif' alt='' />";var basicOptionsMsg = 'Basic Options' + "<img class='icon' src='images/icons/sort_current.gif' alt='' />";var previousRequestProcessingMsg = 'Previous request still processing.';var sessionTimedOutMsg = 'You Session appears to have timed out. Please reload this page';var unknownAjaxErrorMsg = 'An unknown error occurred';var blockPartnerMsg = 'Are you sure you want to block all this partners sites for 30 days?';var blockWebsiteMsg = 'Are you sure you want to block this website for 30 days?';var blockFailedMsg = 'Block failed to process.';var emptyCartConfirmMsg = 'Are you sure you wish to empty the cart?';var maxChar250Msg = 'Maximim length is 250 characters.';var selectBuyMowPaymentMethod = 'Select a Payment Method';var nowMsg = 'now';var feedbackMsg = 'Please enter your feedback here, then submit';var pleaseSelectWishListMsg = 'Please Select a Wish List';var noTagsMsg = 'No Tag(s) Entered';var tagsAddOKMsg = 'Tags Added To Website';var tagsAddExistsMsg = 'Tags already on Website';var tagsAddErrorMsg = 'Error adding tags to website.';        /* ]]> */
        //-->
        </script>
        <script type='text/javascript' src='feedback/feedback.js'></script>
        <link rel='stylesheet' href='feedback/feedback.css' type='text/css' />
        <link rel='stylesheet' href='css/autocomplete.css' type='text/css' />
        <script type='text/javascript' src='js/browser_detect.js'></script>
        <script type='text/javascript' src='js/prototype.js'></script>
        <script type='text/javascript' src='js/product_search.js'></script>
    </head>
    <body id="prt-account" class="partner">
        <div id="wrapper">
            <div id="accountSwitch" class="clearfix">  
                <div style="width:100%; display:inline; margin:0 5px 0 0;">
                    <div style="float:left; margin:4px 0 0 0;">
                    <span class="smallWhite">username:</span><span class="smallYellow">Panggone jeneng</span>
                    <span class="smallWhite">account id:</span><span class="smallYellow"> 126503</span>
                    &nbsp;
                    </div>
                    <ul style="margin:4px 0 0 5px;">
                        <li class="partner"><a href="/index.php?prt_menu_selection=prt_account_home" class="partner">partners</a></li>
                    </ul>
                </div>
            </div>
            <div id="branding"><img src="images/branding.gif" alt="LinkWorth Control Center" /></div>
            <div id="mainNav">
                <ul>
                    <li class='account'><a href='#' class='account'>my account</a>                     
					<ul>
                            <li><a href='#' class='active'>home</a></li>
                            <li><a href='#'>setup</a></li>
                            <li><a href='#'>profile</a></li>
                            <li><a href='#'>acct settings</a></li>
                            <li><a href='#'>payment settings</a></li>
                            <li><a href='#'>listing settings</a></li>
                            <li><a href='#'>tax info</a></li>
                            <li><a href='#'>transfer funds</a></li>
                            <li><a href='#'>messages</a></li>
                            <li><a href='#'>emails</a></li>
                        </ul>
</li>
                    <li class='sites'><a href='#' class='sites'>my sites</a></li>
                    <li class='products'><a href='#' class='products'>my products</a></li>
                    <li class='affiliate'><a href='#' class='affiliate'>my affiliates</a></li>
                    <li class='reports'><a href='#' class='reports'>my reports</a></li>
                    <li class='tools'><a href='#' class='tools'>my tools</a></li>
                    <li class='help'><a href='#' class='help'>help</a></li>
                    <li class='logout'><a href='#' class='logout'>logout</a></li>
                </ul>
            </div>
            <div id="subNav">
            </div>
            <div id="subNav2">
            </div>
            <link rel='stylesheet' type='text/css' media='all' href='css/overlib.css' />

            <script type='text/javascript' src='js/product_offers.js'></script>
            <script type='text/javascript' src='js/product_search.js'></script>
            <script type='text/javascript' src='js/overlib.js'></script>
            <script type="text/javascript" src="js/open_popup.js"></script>
            <script type='text/javascript'>
            //<![CDATA[
                var prtBillforRate = 50;
                var youWillEarnText = "You&#039;ll Earn";

                function show_more_bb_subpages()
                {
                    document.offer_product_form.action='https://act.linkworth.com/partner/info_pages/add_more_bb_subpages.php';
                    document.offer_product_form.target='popUpWindow';

                    my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
                }

                function show_more_subpages()
                {
                    document.offer_product_form.action='https://act.linkworth.com/partner/info_pages/add_more_subpages.php';
                    document.offer_product_form.target='popUpWindow';

                    my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
                }

                function show_more_zones()
                {
                    document.offer_product_form.action='https://act.linkworth.com/partner/info_pages/add_more_zones.php';
                    document.offer_product_form.target='popUpWindow';

                    my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
                }

                function fix_action()
                {
                    document.offer_product_form.action='ajax/process_product_offers.php';
                    document.offer_product_form.target='upload_target';
                }
            //]]>
            </script>

            <div id='offer_product_wrapper' style='opacity:0; filter:alpha(opacity=0);'>
                <div id='offer_product_content'>
                    <div id='offer_product_head'>Would You Like To Offer LinkBBs?</div>
                    <div id='offer_product_body'>
                        <div style='border:1px solid #F5DEB3; background-color:#FFFBE7; margin-bottom:20px; padding:8px;'><img src="https://act.linkworth.com/images/dollar_sign48px.png"" alt="tip" class="updateWarning" />
                            <p>We noticed you do not offer <b>LinkBBs</b> on your site <b>www.dts-electric.com</b>. Why miss an opportunity to make money using your site? Fill in the information below to begin offering <b>LinkBBs</b> on your site now.</p>
                        </div>
                        <form id='offer_product_form' name='offer_product_form' action='ajax/process_product_offers.php' method='post' enctype='multipart/form-data' target='upload_target'>
                        <table id='offer_products_form_table'>
                            <tr>
                                <td colspan='3' class='tabletop'><strong>Offer LinkBB</strong> <span style='font-style:italic;'>(full page ads hosted on your site)</span></td>
                            </tr>
                            <tr>
                                <td colspan='3'>
                                    <input type='radio' name='linkbb_opt_in' value='2' /> Yes, I want to offer LinkBB and I will set at least one location price below.                             </td>
                            </tr>
                            <tr>
                                <td style='width:35%; text-align:right; vertical-align:top;'>Set Home Page Price:</td>
                                <td style='width:35%; white-space:nowrap;'>
                                        <select name="bb_home_page_price" id="bb_home_page_price" onchange="showHidePriceAndUrl(this, 'bb_home_page_price')">
        <option value="">Not Available</option>
        <option value="custom_price">Custom Price</option>
        <option value="1">$15.00 /month</option>
        <option value="2">$40.00 /month</option>
        <option value="7">$100.00 /month</option>
        <option value="3">$200.00 /month</option>
        <option value="4">$350.00 /month</option>
        <option value="5">$500.00 /month</option>
        <option value="6">$750.00 /month</option>
    </select>
                                    <div id='div_bb_home_page_price' style='margin-left:20px;display:none;'>
                                        $<input type='text' id='bb_home_page_price_custom' name='bb_home_page_custom_price' size='5' value='' onkeyup='setCustomerPrice(this.id,this.value,true)' />
                                    </div>
                                    <br />
                                    <div id='bb_home_page_price_earning' style='display:inline-block;'></div>
                                </td>
                                <td style='width:30%; font-style:italic;'>(link to LinkBB appears on home page)</td>
                            </tr>
                            <tr>
                                <td style='text-align:right;'>Add/Edit Sub-Pages:</td>
                                <td>
                                    <select name='num_new_bb_subpages' class='short'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                    </select> <input type='submit' class='submit_small' name='submitted_more_bb_subpages' value='  Go  ' onclick='show_more_bb_subpages()' />
                                </td>
                                <td colspan='2' style="font-style:italic;">(link to LinkBB appears on specific subpages of your site)</td>
                            </tr>
                            <tr>
                                <td style='text-align:right; vertical-align:top;'>Set Site Run Price:</td>
                                <td style='white-space:nowrap;'>
                                        <select name="bb_every_page_price" id="bb_every_page_price" onchange="showHidePriceAndUrl(this, 'bb_every_page_price')">
        <option value="">Not Available</option>
        <option value="custom_price">Custom Price</option>
        <option value="1">$15.00 /month</option>
        <option value="2">$40.00 /month</option>
        <option value="7">$100.00 /month</option>
        <option value="3">$200.00 /month</option>
        <option value="4">$350.00 /month</option>
        <option value="5">$500.00 /month</option>
        <option value="6">$750.00 /month</option>
    </select>
                                    <div id='div_bb_every_page_price' style='margin-left:20px;display:none;'>
                                        $<input type='text' id='bb_every_page_price_custom' name='bb_every_page_custom_price' size='5' value='' onkeyup='setCustomerPrice(this.id,this.value,true)' />
                                    </div>
                                    <br />
                                    <div id='bb_every_page_price_earning' style='display:inline-block;'></div>
                                </td>
                                <td style='font-style:italic;'>(link to LinkBB appears on all pages)</td>
                            </tr>
                            <tr>
                                <td style='text-align:right;'>Custom Site Template:</td>
                                <td><input type='file' name='bb_template_file' /></td>
                                <td style='font-style:italic;'>(Upload HTML Page: must be properly formed.)</td>
                            </tr>
                            <tr>
                                <td colspan='3' style='text-align:center;'>or paste in HTML:</td>
                            </tr>
                            <tr>
                                <td colspan='2'><textarea id='bb_template' name='bb_template' rows='15' cols='60' style='width:100%'>Type Template Here.</textarea></td>
                                <td>
                                    <span style='font-style:italic;'>HTML, uploaded or pasted, must be properly formed HTML.<br />
                                    Additionally, it must contain a comment where you wish the billboard content to appear:</span><br />
                                    <strong>&lt;!-- LINKWORTH BILLBOARD CONTENT --&gt;</strong><br />
                                    <span style='font-style:italic;'>Optionally, you may also add a position for the Logo:</span><br />
                                    <strong>&lt;!-- LINKWORTH BILLBOARD LOGO --&gt;</strong><br />
                                    <span style='font-style:italic;'>The title and any metatagcontent will be automatically replaced with the billboard&#039;s data.</span>
                                </td>
                            </tr>
                        </table>

                        <table id='offer_products_submit_table'>
                            <tr>
                                <td><input id="noThanksBTN"  type='submit' name='submit_offer_no_thanks' value='No Thanks' onclick='fix_action()' /></td>
                                <td><input id="askLaterBTN" type='submit' name='submit_offer_ask_later' value='Ask Later' onclick='fix_action()' /></td>
                                <td><input id="showAnotherBTN"  type='submit' name='submit_offer_show_another' value='Show Another' onclick='fix_action()' /></td>
                                <td><input id="yesAcceptBTN"  type='submit' name='submit_offer_yes_accept' value='Yes &amp; Accept' onclick='fix_action()' /></td>
                            </tr>
                            <tr>
                                <td colspan='4' class='offer_products_spacer_row'>- OR -</td>
                            </tr>
                            <tr>
                                <td colspan='4'>
                                    I wish to edit my website's information to add LinkBBs and other products as well.
                                    <a href='https://act.linkworth.com/index.php?prt_menu_selection=prt_manage_sites&amp;action=edit&amp;prt_website_id=178248&amp;viewed_product_offer=1'>Click Here</a>
                                </td>
                            </tr>
                        </table>

                        <input type='hidden' name='product_id' value='3' />
                        <input type='hidden' name='prt_website_id' value='178248' />
                        </form>
                    </div>
                </div>          </div>
            
            <iframe id='upload_target' name='upload_target' src='' style='width:0;height:0;border:0px solid #fff;'></iframe> 

            <script type='text/javascript'>
            //<![CDATA[
                fadeInProductOffer();
            //]]>
            </script>
            <div id="contentWrapper">
                <div class="conFull clearfix">
                    <div class="conHead"><h1>Home</h1></div>
                    <div class="conBody" id="mainBox" >

<script type="text/javascript" src="js/prt_account_home.js"></script>
<script type="text/javascript" src="js/adv_hyperlink_tooltip.js"></script>

<div class="clearfix">

<!-- Start Container -->   
<div class="conSmall clearfix" id="conQuickTools">
   <div class="conHead"><h1>Account Info</h1></div>
   <div class="conBody">
      <ul class="clearfix">
         <li id="tab-stats-overview"><div onclick="javascript:getQuickToolsTabData('stats-overview')">Stats Overview</div></li>
         <li id="tab-partner-tools"><div onclick="javascript:getQuickToolsTabData('partner-tools')">Partner Tools</div></li>
         <li id="tab-deal-stats"><div onclick="javascript:getQuickToolsTabData('deal-stats')">Deal Stats</div></li>
         <li id="tab-partner-faq"><div onclick="javascript:getQuickToolsTabData('partner-faq')">F.A.Q.</div></li>
      </ul>
      <div class="conLeft" id="">
			<br>wis ketemu maneh loro</br>	
	  
	  
	  </div>
   </div>
   <div class="conFoot"></div>
</div>
<!-- End Container -->     

<!-- Start Container -->   
<div class="conSmall clearfix" id="conMessageCenter">
   <div class="conHead"><h1>Message Center</h1></div>
   <div class="conBody">
      <ul class="clearfix">
         <li id="tab-alerts"><div onclick="javascript:getMessageCenterTabData('alerts')">Alerts</div></li>
         <li id="tab-emails"><div onclick="javascript:getMessageCenterTabData('emails')">Emails</div></li>
         <li id="tab-messages"><div onclick="javascript:getMessageCenterTabData('messages')">Messages</div></li>
         <!--<li id="tab-blog"><div onclick="javascript:getMessageCenterTabData('blog')">--><!--</div></li>-->
         <li id="tab-reqs"><div onclick="javascript:getMessageCenterTabData('reqs')">Reqs</div></li>
      </ul>
      <div class="conLeft" id="">
	  <br>wis ketemu maneh telu</br>
	  
	  </div>
   </div>
   <div class="conFoot"></div>
</div><!-- End Container -->     

</div>

<!-- Start Container -->   
<div class="conFull" id="conMyAccount">
   <div class="conHead"><h1>Featured Partner Listings &amp; Current Month Account Activity</h1></div>
   <div class="conBody">
      <ul class="clearfix">
         <li id="tab-featured-linkads"><div onclick="javascript:getAccountActivityTabData('featured-linkads')">Sites</div></li>
         <li id="tab-pending"><div onclick="javascript:getAccountActivityTabData('pending')">Pending</div></li>
		 <li id="tab-approved"><div onclick="javascript:getAccountActivityTabData('approved')">Approved</div></li>
         <li id="tab-declined"><div onclick="javascript:getAccountActivityTabData('declined')">Declined</div></li>
         <li id="tab-cancelled"><div onclick="javascript:getAccountActivityTabData('cancelled')">Cancelled</div></li>
         <li id="tab-expired"><div onclick="javascript:getAccountActivityTabData('expired')">Expired</div></li>
      </ul>
      <div class="conLeft" id="">
<!-------------------Isi Tabel Bawah------------------------>
			<div id="search_results">
					<?php
						$sql = "SELECT * FROM tb_host";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<table>
									<tbody>
										<tr class="tabletop">
											<td class="url">ID Hosting</td>
											<td class="category">Nama Hosting</td>
											<td class="gpr">Username</td>
											<td class="username">Password</td>
											<td class="username">Status</td>
											<td class="username">Edit</td>
											<td class="username">Delete</td>
											<td class="deals">#<sup class="tooltip_trigger" onmouseover="showToolTip('deals_tip',false);" onmouseout="hideTooltip('deals_tip')" onclick="stickyTooltip('deals_tip')">?</sup><img src="images/icons/sort_default.gif" class="icon clickable" alt="Sort by" title="Sort by" onclick="sortBy('deals')" onmouseover="this.src='images/icons/sort_current.gif'" onmouseout="this.src='images/icons/sort_default.gif'"><span class="tooltip" style="display:none" id="deals_tip" onclick="killTooltip('deals_tip')"><div class="tooltip_pos"><div class="sticky"><img src="images/icons/sticky.gif" alt="sticky" title="sticky"></div><div class="tooltip_content">Number of Ads Sold</div></div></span></td>
										</tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr class="hilight noclick" id="row1">
									<td class="weblink clickable"><div class="nofollow_website">" . $row["kd_host"]. "</div></td>
									<td class="category clickable">" . $row["nm_host"]. "</td>
									<td class="category clickable">" . $row["us_host"]. "</td>
									<td class="category clickable">" . $row["ps_host"]. "</td>
									<td class="category clickable">" . $row["st_host"]. "</td>
									<td onclick="toggleActions(1,56406,0)" class="clickable">Edit</td>
									
									<td class="username clickable">Delete</td>
									<td class="active_deals clickable">5</td>
								</tr>";
							 }
							 echo "</tbody></table>";
						} else {
							 echo "0 results";
						}

						$conn->close();
						?>  	
							
						
					</div>
<!-------------------End Isi Tabel Bawah------------------------>			
	  
	  </div>
      <div class="conScrollBar"></div>
</div>
<div class="conFoot"></div>
</div><!-- End Container -->        

<script type="text/javascript">
init();
</script>
                    </div>
                    <div class="conFoot"></div>
                </div>
            </div><!-- End Container -->
        </div><!-- End Wrapper -->

        <p class="footer">Copyright &copy; 2015 LinkWorth All Rights Reserved</p>
        
        <p class="footer"><script type="text/javascript" src="https://sealserver.trustwave.com/seal.js?style=invert&code=7f3f82080ca511e0b34b005056b201e5"></script></p>
    </body>
</html>
