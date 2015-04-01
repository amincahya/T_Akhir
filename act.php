<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
	<?php 
		include 'connect.php';
		include 'header-footer/header.php'; 
		include 'navigasi/nav_control.php';
	?>
	
    
	
	
	<!--------Start Navigasi----------->
			
            <?php include 'navigasi/main_nav.php'; ?>
			
	<!--------End Navigasi------------->				
          
			
			
		<div id="contentWrapper"><!--------Wrapper 1-------------->
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

							<!----------Start Wrapper 2------------------>

								  
							<!-------------------Isi Tabel Bawah------------------------>

							
												<?php //include 'sub_page/list_home.php';
												      //include ("Trash/form domain.php");
													  include 'contain/contain.php';
												?>
												
										
							<!-------------------End Isi Tabel Bawah------------------------>			
								  
								<!----------End Wrapper 2------------------>
		</div> <!-- End Wrapper 1 -->
												
	</div>
				
		
	</div>	<!-- End Wrapper -->		
				
	</div>			
</div>
<!-- End Container 1-->
</div>


<!----------------FOOTER----------------------------->
<?php include "header-footer/footer.php"; ?>
</html>
