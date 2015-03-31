	<?php
	$pub = $_GET['p'];
	if($pub=="p_profil" 
		OR $pub=="p_profil_team_info"
		OR $pub=="p_profil_manage_team" 
		OR $pub=="p_profil_publisher_payout"){echo "<body id='prt-account' class='partner'>";
	}elseif($pub=="p_sites"
			OR $pub=="p_sites_manage_site"
			OR $pub=="p_sites_manage_niche" 
			OR $pub=="p_sites_manage_category"){echo "<body id='sites' class='partner'>";
	}elseif($pub=="p_job"
			OR $pub=="p_job_new_job"
			OR $pub=="p_job_pending_publish" 
			OR $pub=="p_job_job_done"
			OR $pub=="p_job_manage_job"){echo "<body id='products' class='partner'>";
			
	}elseif($pub=="p_art"
			OR $pub=="p_art_job_articles"
			OR $pub=="p_art_articles_pending" 
			OR $pub=="p_art_articles_done"
			OR $pub=="p_art_articles_payment"){	echo "<body id='affiliate' class='partner'>";
	}elseif($pub=="p_cust"
			OR $pub=="p_cust_manage_customer"){
				echo "<body id='reports' class='partner'>";
	}elseif($pub=="p_report"
			OR $pub=="p_report_job_payout"
			OR $pub=="p_report_report"){echo "<body id='tools' class='partner'>";
				
//--Khusus Customer				
	}elseif($pub=="p_order"
			OR $pub=="p_order_new_job"
			OR $pub=="p_order_pending_publish" 
			OR $pub=="p_order_job_done"
			OR $pub=="p_order_payment"){echo "<body id='affiliate' class='partner'>";	
//-----------------		
	
	
	}else{
			if($_SESSION['nm_bag']=="Customer"){echo "<body id='affiliate' class='partner'>";}
			else{echo "<body id='prt-account' class='partner'>";}
								
	};
		?>