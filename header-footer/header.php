<?php
		session_start();
		echo"<head>
					
						<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
						<title>LOGO-Tugas Akhir</title><!-- Control Center -->
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

							var noAdSelectedMsg='No Ad Selected';var noLocationSelectedMsg = 'No Location Selected';var noWishListSelectedMsg = 'No Wish List Selected';var noWishListNameMsg = 'No name provided for new Wish List';var cartAddOKMsg = 'Item Added To Cart';var cartAddExistsMsg = 'Item already in Cart';var cartAddErrorMsg = 'Could not add to cart.';var wishListAddOKMsg = 'Item Added To Wish List';var wishListAddExistsMsg = 'Item already in Wish List';var wishListAddErrorMsg = 'Could not add to Wish List.';var zonePlacementMsg = 'Zone Placement';var clearMsg = 'Clear';var hideMsg = 'Hide';var moreOptionsMsg = 'More Options' + '<img class='icon' src='images/icons/sort_reverse.gif' alt='' />';var basicOptionsMsg = 'Basic Options' + '<img class='icon' src='images/icons/sort_current.gif' alt='' />';var previousRequestProcessingMsg = 'Previous request still processing.';var sessionTimedOutMsg = 'You Session appears to have timed out. Please reload this page';var unknownAjaxErrorMsg = 'An unknown error occurred';var blockPartnerMsg = 'Are you sure you want to block all this partners sites for 30 days?';var blockWebsiteMsg = 'Are you sure you want to block this website for 30 days?';var blockFailedMsg = 'Block failed to process.';var emptyCartConfirmMsg = 'Are you sure you wish to empty the cart?';var maxChar250Msg = 'Maximim length is 250 characters.';var selectBuyMowPaymentMethod = 'Select a Payment Method';var nowMsg = 'now';var feedbackMsg = 'Please enter your feedback here, then submit';var pleaseSelectWishListMsg = 'Please Select a Wish List';var noTagsMsg = 'No Tag(s) Entered';var tagsAddOKMsg = 'Tags Added To Website';var tagsAddExistsMsg = 'Tags already on Website';var tagsAddErrorMsg = 'Error adding tags to website.';        /* ]]> */
						//-->
						</script>
						<script type='text/javascript' src='feedback/feedback.js'></script>
						<link rel='stylesheet' href='feedback/feedback.css' type='text/css' />
						<link rel='stylesheet' href='css/autocomplete.css' type='text/css' />
						<script type='text/javascript' src='js/browser_detect.js'></script>
						<script type='text/javascript' src='js/prototype.js'></script>
						<script type='text/javascript' src='js/product_search.js'></script>
						
						
						
						<div id='wrapper'>
							<div id='accountSwitch' class='clearfix'>  
								<div style='width:100%; display:inline; margin:0 5px 0 0;'>
									<div style='float:left; margin:4px 0 0 0;'>";
									
									
							echo "<span class='smallWhite'>username: </span><span class='smallYellow'>" .$_SESSION['username']. "</span>
								  <span class='smallWhite'>account id: </span><span class='smallYellow'>00" .$_SESSION['kd_kary']. "</span>
									&nbsp;
									</div>
									<ul style='margin:4px 0 0 5px;'>";
																																	
												echo"<li class='partner'><a href='#' class='partner'>" .$_SESSION['nm_bag']. "</a></li>";										
									
							echo"								
									</ul>
								</div>
							</div>
							<div id='branding'><img src='images/branding.gif' alt='LinkWorth Control Center' /></div>";
							
						
	$conn->close();
						
						
		echo "</head>";
?>