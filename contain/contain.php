	<?php
echo"

<div id='contentWrapper'><!----------Wrapper 2------------------>
	<div class='conFull clearfix'>
		<div class='conHead'><h1>Container 1</h1></div>
		<div class='conBody' id='mainBox' >

		<script type='text/javascript' src='js/prt_account_home.js'></script>
		<script type='text/javascript' src='js/adv_hyperlink_tooltip.js'></script>

<div class='clearfix'></div>";
//----------------------------------------------------------------------------------------------------------------------------------------

 error_reporting(0);





//---Container Dimulai



	$pub = $_GET['p'];
	if($pub=="p_profil" 
		OR $pub=="p_profil_team_info"){echo"1";
	}elseif($pub=="p_profil_manage_team"){ echo"2";
	}elseif($pub=="p_profil_publisher_payout"){echo"3";
	
	
	
	}elseif($pub=="p_sites" 
		OR $pub=="p_sites_manage_site")
	{
		
						//
					If ($_POST['dom_nm']!=''){include 'contain/p_sites_manage_site_detail.php';
					}elseif($_POST['dom_nm']=='' Or $_POST['url']==''){include 'contain/p_sites_manage_site.php';}
					
											
	}elseif($pub=="p_sites_manage_niche"){echo"5";
	}elseif($pub=="p_sites_manage_category"){echo"6";
	
	
	
	}elseif($pub=="p_job" 
		OR $pub=="p_job_new_job"){echo"7";
	}elseif($pub=="p_job_pending_publish"){echo"8";
	}elseif($pub=="p_job_job_done"){echo"9";
	}elseif($pub=="p_job_manage_job"){echo"10";
			
			
			
	}elseif($pub=="p_art" 
		OR $pub=="p_art_job_articles"){echo"11";
	}elseif($pub=="p_art_articles_pending"){echo"12";
	}elseif($pub=="p_art_articles_done"){echo"13";
	}elseif($pub=="p_art_articles_payment"){echo"14";
	
	
	
	}elseif($pub=="p_cust"){echo"15";
	}elseif($pub=="p_cust_manage_customer"){echo"16";
	
	
	
	}elseif($pub=="p_report"
		OR $pub=="p_report_job_payout"){echo"17";
	}elseif($pub=="p_report_report"){echo"18";
				
				
				
//--Khusus Customer				
	}elseif($pub=="p_order"
			OR $pub=="p_order_new_job"){echo"19";
	}elseif($pub=="p_order_pending_publish" ){echo"20";
	}elseif($pub=="p_order_job_done"){echo"21";
	}elseif($pub=="p_order_payment"){echo"23";	
//-----------------		
	
	
	}else{
			if($_SESSION['nm_bag']=="Customer"){echo"Customer";}
			else{echo"Other";}
								
	};
	
	
/* 	
	
	$pub = $_GET['p'];
if($_SESSION['nm_bag']=="Publisher")
{
// Sub Menu Publisher					
			
//-------------Start Menu Profil	
	if($pub=="p_profil" 
		OR $pub=="p_profil_team_info"
		OR $pub=="p_profil_manage_team" 
		OR $pub=="p_profil_publisher_payout")
	{
				$a=0;$b=0;$c=0;
				if($pub=="p_profil_team_info"){$a='active';}
				elseif($pub=="p_profil_manage_team"){$b='active';}
				elseif($pub=="p_profil_publisher_payout"){$c='active';}
				elseif($pub=="p_profil"){$a='active';}
//-------------Sub Menu Publisher
				
				
				 echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class='".$a."'>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class='".$b."'>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class='".$c."'>Publisher Payout</a></li>
						
							
                       </ul>";
					   
				echo  "</li>
						<li class='sites'><a href='act.php?p=p_sites' class='".$a."'>Sites</a></li>
						<li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
						<li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						<li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
						<li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
						<li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
				
					
			
	}
//-------------End Menu Profil	
	
	
	
//-------------Start Menu Sites	
	elseif($pub=="p_sites"
			OR $pub=="p_sites_manage_site"
			OR $pub=="p_sites_manage_niche" 
			OR $pub=="p_sites_manage_category")
		{
					$a=0;$b=0;$c=0;
					if($pub=="p_sites_manage_site"){$a='active';}
					elseif($pub=="p_sites_manage_niche"){$b='active';}
					elseif($pub=="p_sites_manage_category"){$c='active';}
					elseif($pub=="p_sites"){$a='active';}
//------------Menu Sites

				
				  echo "<ul>
                            <li><a href='act.php?p=p_sites_manage_site' class='".$a."'>Manage Site</a></li>
                            <li><a href='act.php?p=p_sites_manage_niche' class='".$b."'>Manage Niche</a></li>
                            <li><a href='act.php?p=p_sites_manage_category' class='".$c."'>Manage Category</a></li>
                       </ul>";
			echo "</li>
				  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
				  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
				  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
//-------------End Menu Sites



//-------------Start Menu Job	
	elseif($pub=="p_job"
			OR $pub=="p_job_new_job"
			OR $pub=="p_job_pending_publish" 
			OR $pub=="p_job_job_done"
			OR $pub=="p_job_manage_job")
		{
					$a=0;$b=0;$c=0;$d=0;
					if($pub=="p_job_new_job"){$a='active';}
					elseif($pub=="p_job_pending_publish"){$b='active';}
					elseif($pub=="p_job_job_done"){$c='active';}
					elseif($pub=="p_job_manage_job"){$d='active';}
					elseif($pub=="p_job"){$a='active';}
//--------------Menu Job				
			
				  echo "<ul>
                            <li><a href='act.php?p=p_job_new_job' class='".$a."'>New Job</a></li>
                            <li><a href='act.php?p=p_job_pending_publish' class='".$b."'>Pending Publish</a></li>
                            <li><a href='act.php?p=p_job_job_done' class='".$c."'>Job Done</a></li>
                            <li><a href='act.php?p=p_job_manage_job' class='".$d."'>Manage Job Type</a></li>
                            
                       </ul>";
					
			echo "</li>
				  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
				  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
	}	
//---------End Menu Job

//---------Start Menu Articles
	
	elseif($pub=="p_art"
		OR $pub=="p_art_job_articles"
		OR $pub=="p_art_articles_pending" 
		OR $pub=="p_art_articles_done"
		OR $pub=="p_art_articles_payment")
	{
				$a=0;$b=0;$c=0;$d=0;
				if($pub=="p_art_job_articles"){$a='active';}
				elseif($pub=="p_art_articles_pending"){$b='active';}
				elseif($pub=="p_art_articles_done"){$c='active';}
				elseif($pub=="p_art_articles_payment"){$d='active';}
				elseif($pub=="p_art"){$a='active';}
//--------------Menu Articles	
			
				  echo "<ul>
                            <li><a href='act.php?p=p_art_job_articles' class='".$a."'>Job Articles</a></li>
                            <li><a href='act.php?p=p_art_articles_pending' class='".$b."'>Articles Pending</a></li>
                            <li><a href='act.php?p=p_art_articles_done' class='".$c."'>Articles Done</a></li>
                            <li><a href='act.php?p=p_art_articles_payment' class='".$d."'>Payment</a></li>
                       </ul>";
					   
				echo "</li>
					  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				      <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a>
					  </li>";
			
	}
//---------End Menu Articles



//---------Start Menu Customer
	elseif($pub=="p_cust"
		OR $pub=="p_cust_manage_customer")
	{
				$a=0;
				if($pub=="p_cust_manage_customer"){$a='active';}
				elseif($pub=="p_cust"){$a='active';}
//--------------Menu Customer
	
				echo "<ul>
                            <li><a href='act.php?p=p_cust_manage_customer' class='".$a."'>Manage Customer</a></li>
                       </ul>";
				echo "</li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
	}
	
//---------End Menu Customer



//---------Start Menu Report
	elseif($pub=="p_report"
			OR $pub=="p_report_job_payout"
			OR $pub=="p_report_report")
		{
					$a=0;$b=0;
					if($pub=="p_report_job_payout"){$a='active';}
					elseif($pub=="p_report_report"){$b='active';}
					elseif($pub=="p_report"){$a='active';}
//--------------Menu Report	
				echo "<ul>
                            <li><a href='act.php?p=p_report_job_payout' class='".$a."'>Job Payout</a></li>
                            <li><a href='act.php?p=p_report_report' class='".$b."'>Report</a></li>
                            
                       </ul>";
				echo "</li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
		

//--------------End Menu Report			
			
	}
	else
	{
				echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class=''>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class=''>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class=''>Publisher Payout</a></li>
						
							
                       </ul>
						</li>
					  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
					  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
					  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
					  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				      <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
	
	
	
// END Publisher
}
elseif($_SESSION['nm_bag']=="Keuangan")
{	
// Sub Menu Keuangan				
			
//-------------Start Menu Profil	
	if($pub=="p_profil" 
		OR $pub=="p_profil_team_info"
		OR $pub=="p_profil_manage_team" 
		OR $pub=="p_profil_publisher_payout")
	{
				$a=0;$b=0;$c=0;
				if($pub=="p_profil_team_info"){$a='active';}
				elseif($pub=="p_profil_manage_team"){$b='active';}
				elseif($pub=="p_profil_publisher_payout"){$c='active';}
				elseif($pub=="p_profil"){$a='active';}
//-------------Sub Menu Publisher
				
				
				 echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class='".$a."'>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class='".$b."'>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class='".$c."'>Publisher Payout</a></li>
						
							
                       </ul>";
					   
				echo  "</li>
						<li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						<li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
						<li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
				
					
			
	}
//-------------End Menu Profil	
	


//---------Start Menu Articles
	
	elseif($pub=="p_art"
		OR $pub=="p_art_job_articles"
		OR $pub=="p_art_articles_pending" 
		OR $pub=="p_art_articles_done"
		OR $pub=="p_art_articles_payment")
	{
				$a=0;$b=0;$c=0;$d=0;
				if($pub=="p_art_job_articles"){$a='active';}
				elseif($pub=="p_art_articles_pending"){$b='active';}
				elseif($pub=="p_art_articles_done"){$c='active';}
				elseif($pub=="p_art_articles_payment"){$d='active';}
				elseif($pub=="p_art"){$a='active';}
//--------------Menu Articles	
			
				  echo "<ul>
                            <li><a href='act.php?p=p_art_job_articles' class='".$a."'>Job Articles</a></li>
                            <li><a href='act.php?p=p_art_articles_pending' class='".$b."'>Articles Pending</a></li>
                            <li><a href='act.php?p=p_art_articles_done' class='".$c."'>Articles Done</a></li>
                            <li><a href='act.php?p=p_art_articles_payment' class='".$d."'>Payment</a></li>
                       </ul>";
					   
				echo "</li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a>
					  </li>";
			
	}
//---------End Menu Articles



//---------Start Menu Report
	elseif($pub=="p_report"
			OR $pub=="p_report_job_payout"
			OR $pub=="p_report_report")
		{
					$a=0;$b=0;
					if($pub=="p_report_job_payout"){$a='active';}
					elseif($pub=="p_report_report"){$b='active';}
					elseif($pub=="p_report"){$a='active';}
//--------------Menu Report	
				echo "<ul>
                            <li><a href='act.php?p=p_report_job_payout' class='".$a."'>Job Payout</a></li>
                            <li><a href='act.php?p=p_report_report' class='".$b."'>Report</a></li>
                            
                       </ul>";
				echo "</li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
		

//--------------End Menu Report			
			
	}
	else
	{
				echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class=''>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class=''>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class=''>Publisher Payout</a></li>
						
							
                       </ul>
						</li>
					  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
	
	
	
// END KEUANGAN




}
elseif($_SESSION['nm_bag']=="Writer")
{
// Sub Menu Keuangan				
			
//-------------Start Menu Profil	
	if($pub=="p_profil" 
		OR $pub=="p_profil_team_info"
		OR $pub=="p_profil_manage_team" 
		OR $pub=="p_profil_publisher_payout")
	{
				$a=0;$b=0;$c=0;
				if($pub=="p_profil_team_info"){$a='active';}
				elseif($pub=="p_profil_manage_team"){$b='active';}
				elseif($pub=="p_profil_publisher_payout"){$c='active';}
				elseif($pub=="p_profil"){$a='active';}
//-------------Sub Menu Publisher
				
				
				 echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class='".$a."'>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class='".$b."'>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class='".$c."'>Publisher Payout</a></li>
						
							
                       </ul>";
					   
				echo  "</li>
						<li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						<li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
						<li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
				
					
			
	}
//-------------End Menu Profil	
	


//---------Start Menu Articles
	
	elseif($pub=="p_art"
		OR $pub=="p_art_job_articles"
		OR $pub=="p_art_articles_pending" 
		OR $pub=="p_art_articles_done"
		OR $pub=="p_art_articles_payment")
	{
				$a=0;$b=0;$c=0;$d=0;
				if($pub=="p_art_job_articles"){$a='active';}
				elseif($pub=="p_art_articles_pending"){$b='active';}
				elseif($pub=="p_art_articles_done"){$c='active';}
				elseif($pub=="p_art_articles_payment"){$d='active';}
				elseif($pub=="p_art"){$a='active';}
//--------------Menu Articles	
			
				  echo "<ul>
                            <li><a href='act.php?p=p_art_job_articles' class='".$a."'>Job Articles</a></li>
                            <li><a href='act.php?p=p_art_articles_pending' class='".$b."'>Articles Pending</a></li>
                            <li><a href='act.php?p=p_art_articles_done' class='".$c."'>Articles Done</a></li>
                            <li><a href='act.php?p=p_art_articles_payment' class='".$d."'>Payment</a></li>
                       </ul>";
					   
				echo "</li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a>
					  </li>";
			
	}
//---------End Menu Articles

	else
	{
				echo "<ul>
                            <li><a href='act.php?p=p_profil_team_info'name='team_info' class=''>Team Info</a></li>
                            <li><a href='act.php?p=p_profil_manage_team' name='team_info' class=''>Manage Team</a></li>
							<li><a href='act.php?p=p_profil_publisher_payout' name='team_info' class=''>Publisher Payout</a></li>
						
							
                       </ul>
						</li>
					  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
	
	
	
// END KEUANGAN



}
elseif($_SESSION['nm_bag']=="Customer")
{

	if($pub=="p_cust"
		OR $pub=="p_cust_manage_customer")
	{
				$a=0;
				if($pub=="p_cust_manage_customer"){$a='active';}
				elseif($pub=="p_cust"){$a='active';}
//--------------Menu Customer
	
				echo "<ul>
							
                            <li><a href='act.php?p=p_cust_manage_customer' class='".$a."'>Manage Customer</a></li>
                       </ul>";
				echo "</li>
							
							<li class='logout'><a href='logout.php' class='logout'>logout</a>
					</li>";
	}
	
//-------------Start Menu Job	
	elseif($pub=="p_order"
			OR $pub=="p_order_new_job"
			OR $pub=="p_order_pending_publish" 
			OR $pub=="p_order_job_done"
			OR $pub=="p_order_payment")
		{
					$a=0;$b=0;$c=0;$d=0;
					if($pub=="p_order_new_job"){$a='active';}
					elseif($pub=="p_order_pending_publish"){$b='active';}
					elseif($pub=="p_order_job_done"){$c='active';}
					elseif($pub=="p_order_payment"){$d='active';}
					elseif($pub=="p_order"){$a='active';}
//--------------Menu Job				
			
				  echo "<ul>
                            <li><a href='act.php?p=p_order_new_job' class='".$a."'>New Order</a></li>
                            <li><a href='act.php?p=p_order_pending_publish' class='".$b."'>Pending Publish</a></li>
                            <li><a href='act.php?p=p_order_job_done' class='".$c."'>Order Done</a></li>
                            <li><a href='act.php?p=p_order_payment' class='".$d."'>Payment</a></li>
                            
                       </ul>";
					
			echo "</li>
				    <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
	}	
//---------End Menu Job
	
//---------End Menu Customer



	else
	{
				echo "<ul>
                           <li><a href='act.php?p=p_cust_manage_customer' class='active'>Manage Customer</a></li>
							
                       </ul>
						</li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
	
	
	
// END Publisher




}
elseif($_SESSION['nm_bag']=="Admin")
{
	
	
}	
	
	 */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
//------------------------------------------------------------------------------------------------------------------------------------------------
	
	echo"
	  </div>
								  <div class='conScrollBar'></div>
				
							<script type='text/javascript'>
							init();
							</script>
							<div class='conFoot'></div>	
              </div>
			  </div>";
		?>