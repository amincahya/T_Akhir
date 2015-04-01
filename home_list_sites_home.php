<html xmlns='http://www.w3.org/1999/xhtml'>
	
<?php    
	include 'connect.php';
	include 'home_header.php'; 
	?>
    <body id="prt-account" class="partner">
			<!----Start Menu----->
            <div id="mainNav">
				<ul>
                    <li class="account"><a href="index.php" class='account'>Home</a></li>
					<li class="sites"><a href="advertise.php" class='sites'>Advertise Here</a></li>
					<li class="products"><a href="contact_us.php" class='products'>Contact Us</a></li>
			   </ul>
			</div>
			<div id="subNav">
			</div>
		
			<!----End Menu----->
            
 			
<div id="contentWrapper">
            <link rel='stylesheet' type='text/css' media='all' href='css/overlib.css' />

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
		<div class="conHead"><h1>List Sites</h1></div>
		<div class="conBody" id="mainBox" >

		<script type="text/javascript" src="js/prt_account_home.js"></script>
		<script type="text/javascript" src="js/adv_hyperlink_tooltip.js"></script>

<div class="clearfix">

   

</div>


								  
							<!-------------------Isi Tabel Bawah------------------------>
											
													<?php include 'home_list_sites.php'; ?>	
											
										
							<!-------------------End Isi Tabel Bawah------------------------>			
								  
								  </div>
								  <div class="conScrollBar"></div>
						    

							<script type="text/javascript">
							init();
							</script>
							<div class="conFoot"></div>		
		</div>
												
	</div>
				
		
				
				
				
</div>
<!-- End Container 1-->



</div><!-- End Wrapper -->


<!----------------FOOTER----------------------------->
<?php 
		include "header-footer/footer.php"; 
?>		
</html>