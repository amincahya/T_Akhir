<?php
			/* echo"<div id='mainNav'>
				<ul>
                    <li class='account'><a href='main_nav.php?p=p_profil' class='account'>Profil</a>";
					include 'sub_nav_1.php';
			echo"			</li>
					</li>
					<li class='products'><a href='main_nav.php?p=p_sites' class='products'>Sites</a></li>
					<li class='affiliate'><a href='main_nav.php?p=p_job' class='affiliate'>Job</a></li>
					<li class='reports'><a href='main_nav.php?p=p_cust' class='reports'>Customer</a></li>
					<li class='tools'><a href='main_nav.php?p=p_report' class='tools'>Report</a></li>
					
					<!--<li class='help'><a href='#' class='help'>Main Nav 7</a></li>
					<li class='logout'><a href='#' class='logout'>logout</a></li>-->
                </ul>
			</div>";
 */


	$pub = $_GET['p'];
	
	
		 echo"<div id='mainNav'>
				<ul>";
	if($pub=="p_profil")
	{
			if($page=="p_profil")
			{
				echo "<li class='account'><a href='main_nav.php?p=p_profil' class='account'>Profil</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
					
			};
	}	
	elseif($pub=="p_sites")
	{
	
			if($page=="p_sites")
			{
				echo "<li class='products'><a href='main_nav.php?p=p_sites' class='products'>Sites</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
			};
	}	
	elseif($pub=="p_job")
	{		
			if($page=="p_job")
			{
				echo "<li class='affiliate'><a href='main_nav.php?p=p_job' class='affiliate'>Job</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
			};
	}	
	elseif($pub=="p_cust")
	{		
			if($page=="p_cust")
			{
				echo "<li class='reports'><a href='main_nav.php?p=p_cust' class='reports'>Customer</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
			};
	}	
	elseif($pub=="p_report")
	{		
			if($page=="p_report")
			{
				echo "<li class='tools'><a href='main_nav.php?p=p_report' class='tools'>Report</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
			};
	}	
	elseif($pub=="p_logout")
	{		
			if($page=="p_logout")
			{
				echo "<li class='logout'><a href='main_nav.php?p=p_logout' class='logout'>logout</a>";
         		include 'sub_nav_1.php';
				echo "</li>";
			};
			
			
			
	};

       	echo"			
					
					
					
					
					
					<!--<li class='help'><a href='#' class='help'>Main Nav 7</a></li>
					-->
                </ul>
			</div>";
?>