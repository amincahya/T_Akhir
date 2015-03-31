<?php
	echo"<div id='mainNav'>
					<ul>";
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	
	
	
	$pub = $_GET['p'];
	if($_SESSION['nm_bag']=="Publisher")
	{
		// Menu Publisher					
			
					
//------Menu Profil
		if($pub=="p_profil" 
			OR $pub=="p_profil_team_info"
			OR $pub=="p_profil_manage_team" 
			OR $pub=="p_profil_publisher_payout")
		{
			
				echo   "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a>";
						include 'sub_nav_1.php';
				
		}

//------Menu SItes		
		elseif($pub=="p_sites"
			OR $pub=="p_sites_manage_site"
			OR $pub=="p_sites_manage_niche" 
			OR $pub=="p_sites_manage_category")
		{
		
				echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
					  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a>";
					include 'sub_nav_1.php';
				
		}	
		
//-------Menu Job
		elseif($pub=="p_job"
			OR $pub=="p_job_new_job"
			OR $pub=="p_job_pending_publish" 
			OR $pub=="p_job_job_done"
			OR $pub=="p_job_manage_job")
		{		
			
				echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
					  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
					  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a>";
						include 'sub_nav_1.php';
				
		}
		
		
//-------Menu Job		
		elseif($pub=="p_art"
			OR $pub=="p_art_job_articles"
			OR $pub=="p_art_articles_pending" 
			OR $pub=="p_art_articles_done"
			OR $pub=="p_art_articles_payment")
		{		
				
					echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
						  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
						  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
						  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a>";
					include 'sub_nav_1.php';
				
		}
		
		
//-------Menu Customer
		elseif($pub=="p_cust"
			OR $pub=="p_cust_manage_customer")
		{	
					echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
						  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
						  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
						  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a>";
					include 'sub_nav_1.php';
					
		}
		elseif($pub=="p_report"
			OR $pub=="p_report_job_payout"
			OR $pub=="p_report_report")
		{		
				
					echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
						  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
						  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
						  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a>
						  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a>";
					include 'sub_nav_1.php';
							
		}	
		else
		{		
				
					echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a>";
							include 'sub_nav_1.php';		
				
		}
			
	// END Publisher
	}
	elseif($_SESSION['nm_bag']=="Keuangan")
	{
			echo"<div id='mainNav'>
				<ul>
                    <li class='account'><a href='index.php' class='account'>Home</a></li>
					<li class='sites'><a href='advertise.php' class='sites'>Advertise Here</a></li>
					<li class='products'><a href='contact_us.php' class='products'>Contact Us</a></li>
					 <li class='logout'><a href='logout.php' class='logout'>logout</a></li>
			   </ul>
			</div>
			";
	}
	elseif($_SESSION['nm_bag']=="Writer")
	{
	
	
	
	
	}
	elseif($_SESSION['nm_bag']=="Customer")
	{
	
	
	
	
	
	
	}
	elseif($_SESSION['nm_bag']=="Admin")
	{
	
	
	
	
	
	}
	
	
	
	
	
	
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	echo"			
						
						<!--<li class='help'><a href='#' class='help'>Main Nav 7</a></li>
						-->
					</ul>
				</div>
				<div id='subNav'>
				</div>
				<div id='subNav2'>
				</div>";
	
	
?>