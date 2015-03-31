<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
	<?php 
		include 'connect.php';
		include 'header-footer/header.php'; 
	
    
	
	
	$pub = $_GET['p'];
	if($pub=="p_profil"){
						echo "<body id='prt-account' class='partner'>";
	}elseif($pub=="p_sites"){
						echo "<body id='sites' class='partner'>";
	}elseif($pub=="p_job"){
						echo "<body id='products' class='partner'>";
	}elseif($pub=="p_art"){
						echo "<body id='affiliate' class='partner'>";
	}elseif($pub=="p_cust"){
						echo "<body id='reports' class='partner'>";
	}elseif($pub=="p_report"){
						echo "<body id='tools' class='partner'>";
	}else{
						echo "<body id='prt-account' class='partner'>";
	};
	?>
	
    
	
	
	<!--------Start Navigasi----------->
			
            <?php include 'navigasi/main_nav.php'; ?>
			
	<!--------End Navigasi------------->				
          
			
			
		<div id="contentWrapper">
            <link rel='stylesheet' type='text/css' media='all' href='css/overlib.css' />

            <script type='text/javascript' src='js/product_offers.js'></script>
            <script type='text/javascript' src='js/product_search.js'></script>
            <script type='text/javascript' src='js/overlib.js'></script>
            <script type="text/javascript" src="js/open_popup.js"></script>
            

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

   

</div>


								  
							<!-------------------Isi Tabel Bawah------------------------>

							
												<?php include 'sub_page/list_home.php'?>;
												
										
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
												
	</div><!-- End Wrapper -->
				
		
	</div>	<!-- End Wrapper -->		
				
	</div>			
</div>
<!-- End Container 1-->
</div>


<!----------------FOOTER----------------------------->
<?php include "header-footer/footer.php"; ?>
</html>
