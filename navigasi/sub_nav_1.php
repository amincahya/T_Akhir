<?php
		
						 

	$pub = $_GET['p'];
				
	if($pub=="p_profil")
	{
		
				 echo "<ul>
                            <li><a href='act.php?p=p_profil' name='team_info' class='active'>Team Info</a></li>
                            <li><a href='act.php?p=p_profil' name='team_info' >Manage Team</a></li>
                            
                       </ul>";
				echo  "</li>
						<li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
						<li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
						<li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
						<li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
						<li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
						<li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
					
			
	}	
	elseif($pub=="p_sites")
	{
	
				  echo "<ul>
                            <li><a href='#' >Manage Site</a></li>
                            <li><a href='#' class='active'>Manage Niche</a></li>
                            <li><a href='#' >Manage Category</a></li>
                       </ul>";
			echo "</li>
				  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
				  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
				  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}	
	elseif($pub=="p_job")
	{		
			
				  echo "<ul>
                            <li><a href='#' class='active'>New Job</a></li>
                            <li><a href='#' >Pending Publish</a></li>
                            <li><a href='#' >Job Done</a></li>
                            <li><a href='#' >Manage Job Type</a></li>
                            
                       </ul>";
					
			echo "</li>
				  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
				  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
	}		
	elseif($pub=="p_art")
	{		
			
				  echo "<ul>
                            <li><a href='#' class='active'>Job Articles</a></li>
                            <li><a href='#' >Articles Pending</a></li>
                            <li><a href='#' >Articles Done</a></li>
                            <li><a href='#' >Payment</a></li>
                       </ul>";
					   
				echo "</li>
					  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				      <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a>
					  </li>";
			
	}
	elseif($pub=="p_cust")
	{	
				echo "<ul>
                            <li><a href='#' class='active'>Manage Customer</a></li>
                       </ul>";
				echo "</li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
	}
	elseif($pub=="p_report")
	{		
			
				echo "<ul>
                            <li><a href='#' class='active'>Job Payout</a></li>
                            <li><a href='#' >Report</a></li>
                            
                       </ul>";
				echo "</li>
					  <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
					  <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}	
	elseif($pub=="p_logout")/* Mbalik nang home */
	{		
			
				echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
					  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
					  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
					  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
					  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				      <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a>";
         		
				echo "Mbalik Nang Home</li>";		
			
	}
	else
	{
				echo "<li class='account'><a href='act.php?p=p_profil' class='account'>Profil</a></li>
							<ul>
                            <li><a href='#' class='active'>Sub Nav 1</a></li>
                            <li><a href='#' >Sub Nav 2</a></li>
                            <li><a href='#' >Sub Nav 3</a></li>
                            <li><a href='#' >Sub Nav 4</a></li>
                            <li><a href='#'	>Sub Nav 5</a></li>
                            <li><a href='#'	>Sub Nav 6</a></li>
                            <li><a href='#' >Sub Nav 7</a></li>
                            <li><a href='#' >Sub Nav 8</a></li>
                            <li><a href='#' >Sub Nav 9</a></li>
                            <li><a href='#' >Sub Nav 10</a></li>
                       </ul>
					  <li class='sites'><a href='act.php?p=p_sites' class='sites'>Sites</a></li>
					  <li class='products'><a href='act.php?p=p_job' class='products'>Job</a></li>
					  <li class='affiliate'><a href='act.php?p=p_art' class='affiliate'>Articles</a></li>
					  <li class='reports'><a href='act.php?p=p_cust' class='reports'>Customer</a></li>
				      <li class='tools'><a href='act.php?p=p_report' class='tools'>Report</a></li>
				      <li class='logout'><a href='logout.php' class='logout'>logout</a></li>";
			
	}
						 
						 
						 
						 
						 
						 

?>