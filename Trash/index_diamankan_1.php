<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
	<?php 
		include 'connect.php';
		include 'header.php'; 
	?>
    
	
	
	
    <body id="prt-account" class="partner">

            <?php include 'main_nav.php'; ?>
			
			
			
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

            <!----------------offer product--------------------->
            
            <iframe id='upload_target' name='upload_target' src='' style='width:0;height:0;border:0px solid #fff;'></iframe> 

            <script type='text/javascript'>
            //<![CDATA[
                fadeInProductOffer();
            //]]>
            </script>
			
<!-- Start Container 1 -->
<div id="contentWrapper">
	<div class="conFull clearfix">
		<div class="conHead"><h1>Container 1</h1></div>
		<div class="conBody" id="mainBox" >

		<script type="text/javascript" src="js/prt_account_home.js"></script>
		<script type="text/javascript" src="js/adv_hyperlink_tooltip.js"></script>

<div class="clearfix">

<!-- Start Sub Container 1-->   
							<div class="conSmall clearfix" id="conQuickTools">
							   <div class="conHead"><h1>Sub Container 1</h1></div>
							   <div class="conBody">
								  <ul class="clearfix">
									 <li id="tab-stats-overview"><div onclick="javascript:getQuickToolsTabData('stats-overview')">Tab 1</div></li>
									 <li id="tab-partner-tools"><div onclick="javascript:getQuickToolsTabData('partner-tools')">Tab 2</div></li>
									 <li id="tab-deal-stats"><div onclick="javascript:getQuickToolsTabData('deal-stats')">Tab 3</div></li>
									 <li id="tab-partner-faq"><div onclick="javascript:getQuickToolsTabData('partner-faq')">Tab 4</div></li>
								  </ul>
								  <div class="conLeft" id="">
										<br>wis ketemu maneh loro</br>	
								  
								  
								  </div>
							   </div>
							   <div class="conFoot"></div>
							</div>
<!-- End Sub Container 1 -->     

<!-- Start Sub Container 2 -->   
							<div class="conSmall clearfix" id="conMessageCenter">
							   <div class="conHead"><h1>Sub Container 2</h1></div>
							   <div class="conBody">
								  <ul class="clearfix">
									 <li id="tab-alerts"><div onclick="javascript:getMessageCenterTabData('alerts')">Tab 1</div></li>
									 <li id="tab-emails"><div onclick="javascript:getMessageCenterTabData('emails')">Tab 2</div></li>
									 <li id="tab-messages"><div onclick="javascript:getMessageCenterTabData('messages')">Tab 3</div></li>
									 <!---<li id="tab-blog"><div onclick="javascript:getMessageCenterTabData('blog')">Tab 4</div></li>--->
									 <li id="tab-reqs"><div onclick="javascript:getMessageCenterTabData('reqs')">Tab 4</div></li>
								  </ul>
								  <div class="conLeft" id="">
									<br>wis ketemu maneh telu</br>
								  
								  </div>
							   </div>
							   <div class="conFoot"></div>
							</div>
<!-- End Sub Container 2-->     

</div>

<!-- Start Sub Container 3-->   
							<div class="conFull" id="conMyAccount">
							   <div class="conHead"><h1>Sub Container 3</h1></div>
							   <div class="conBody">
								  <ul class="clearfix">
									 <li id="tab-featured-linkads"><div onclick="javascript:getAccountActivityTabData('featured-linkads')">Tab 1</div></li>
									 <li id="tab-pending"><div onclick="javascript:getAccountActivityTabData('pending')">Tab 2</div></li>
									 <li id="tab-approved"><div onclick="javascript:getAccountActivityTabData('approved')">Tab 3</div></li>
									 <li id="tab-declined"><div onclick="javascript:getAccountActivityTabData('declined')">Tab 4</div></li>
									 <li id="tab-cancelled"><div onclick="javascript:getAccountActivityTabData('cancelled')">Tab 5</div></li>
									 <li id="tab-expired"><div onclick="javascript:getAccountActivityTabData('expired')">Tab 6</div></li>
								  </ul>
								  <div class="conLeft" id="">
								  
							<!-------------------Isi Tabel Bawah------------------------>
										<div id="search_results">
											<div class="prtfaq">
												<?php include 'list_hosting.php'; ?>			
											</div>
										</div>
							<!-------------------End Isi Tabel Bawah------------------------>			
								  
								  </div>
								  <div class="conScrollBar"></div>
							</div>
							<div class="conFoot"></div>
							</div>
<!-- End Sub Container 3 -->        

							<script type="text/javascript">
							init();
							</script>
		</div>
												<div class="conFoot"></div>
	</div>
				
				
				
				
				
</div>
<!-- End Container 1-->
</div><!-- End Wrapper -->

        <p class="footer">Copyright &copy; 2015 Amin All Rights Reserved</p>
        
        <p class="footer"><script type="text/javascript" src="https://sealserver.trustwave.com/seal.js?style=invert&code=7f3f82080ca511e0b34b005056b201e5"></script></p>
    </body>
</html>
