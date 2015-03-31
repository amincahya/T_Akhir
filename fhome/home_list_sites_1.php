<?php
					    
 						include 'connect.php';
/*						
						echo"	<ul class='clearfix'>
									 <li id='tab-featured-linkads'><div onclick='javascript:getAccountActivityTabData('featured-linkads')'>Tab 1</div></li>
									 <li id='tab-pending'><div onclick='javascript:getAccountActivityTabData('pending')'>Tab 2</div></li>
									 <li id='tab-approved'><div onclick='javascript:getAccountActivityTabData('approved')'>Tab 3</div></li>
									 <li id='tab-declined'><div onclick='javascript:getAccountActivityTabData('declined')'>Tab 4</div></li>
									 <li id='tab-cancelled'><div onclick='javascript:getAccountActivityTabData('cancelled')'>Tab 5</div></li>
									 <li id='tab-expired'><div onclick='javascript:getAccountActivityTabData('expired')'>Tab 6</div></li>
								 </ul>
								 <div class='conLeft' id=''>
								  
							
								      <div id='search_results'>
											<div class='prtfaq'>";
						
						
						$sql = "SELECT * FROM tb_domain";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) 
						{ //start if 1
						
							echo "<table>
									
										<tr class='tabletop'>
											<td class='category'>No</td>
											<td class='category'>Name Site</td>
											<td class='gpr'>Niche</td>
											<td class='username'>Site Title</td>
											<td class='username'>DA</td>
											<td class='username'>PR</td>
											<td class='username'>PA</td>
											<td class='username'>AR</td>
											<td class='username'>IP Address</td>
											<td class='username'>Status</td>
										</tr>";
						
						// output data of each row
						while($row = $result->fetch_assoc()) 
						{ //start whell 1
							
							   echo "<tr class='hilight noclick' id='row1'>
										<td class='weblink clickable'><div class='nofollow_website'>" . $row["kd_dom"]. "</div></td>
										<td class='category clickable'>" . $row["nm_dom"]. "</td>";
										
										
									
										$sql2 = "SELECT * FROM tb_niche WHERE kd_niche LIKE '" . $row["kd_niche"]. "'  ";
										$result2 = $conn->query($sql2);
										
										if ($result2->num_rows > 0) 
										{ //start if 2
										
														while($row2 = $result2->fetch_assoc()) 
														{ //start while 2
														
															echo"<td class='category clickable'>" . $row2["nm_niche"]. "</td>";
														
														}; //end while 2
										
										
										} else { //else if 2
						
															echo"<td class='category clickable'>Null</td>";
										
										}; //end if 2
										
										
																			
										
								  echo "<td class='category clickable'>" . $row["jdl_dom"]. "</td>
										<td class='category clickable'>" . $row["DA"]. "</td>
										<td class='category clickable'>" . $row["PR"]. "</td>
										<td class='category clickable'>" . $row["PA"]. "</td>
										<td class='category clickable'>" . $row["AR"]. "</td>
										<td class='category clickable'>" . $row["IPS"]. "</td>
										<td class='category clickable'>" . $row["st_dom"]. "</td>
										
									</tr>";
							
						 }; // end while 1
						 
							 
							echo "</table>";
						
						} else {  //else if 1
						
							echo "0 results";
						
						}; //end if 1
						
						
						$conn->close();


								echo"	</div>
								</div>";
 */


						



echo"


<script type='text/javascript' src='js/open_popup.js'></script>
<script type='text/javascript'>
// <![CDATA[
	function show_more_subpages()
	{
		document.frm.action='https://act.linkworth.com/partner/info_pages/add_more_subpages.php';
		document.frm.target='popUpWindow';

		my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
	}
	function show_more_bb_subpages()
	{
		document.frm.action='https://act.linkworth.com/partner/info_pages/add_more_bb_subpages.php';
		document.frm.target='popUpWindow';

		my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
	}
	function show_more_zones()
	{
		document.frm.action='https://act.linkworth.com/partner/info_pages/add_more_zones.php';
		document.frm.target='popUpWindow';

		my_openPopup('','popUpWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=430,top=50,left=50');
	}
	function fix_action()
	{
		document.frm.action='https://act.linkworth.com/index.php';
		document.frm.target='';
	}
// ]]>
</script>
	<form method='post' action='/index.php'>
	<table class='sortingTableOrange' cellpadding='2' cellspacing='2'>
		<tbody><tr>
			<td>
				<table cellpadding='2' cellspacing='2'>
					<tbody><tr>
						<td style='text-align:right; font-weight:bold;'>Sort by:</td>
						<td>
							<select name='sort_by' class='longer'>
									<option value='0' selected='selected'>Partner URL: A-Z</option>
									<option value='1'>Partner URL: Z-A</option>
									<option value='2'>Category: A-Z</option>
									<option value='3'>Category: Z-A</option>
									<option value='4'>Date Created: oldest first</option>
									<option value='5'>Date Created: newest first</option>
							</select>
						</td>
						<td style='text-align:right; font-weight:bold;'>Find URL:</td>
						<td><input name='search_url' value='' type='text'></td>
						<td style='text-align:center;' rowspan='2'><input name='submitted_sort_options' value='Sort' class='submit' type='submit'></td>
					</tr>
					<tr>
						<td style='text-align:right; font-weight:bold;'>Status:</td>
						<td>
							<select name='prt_website_status' class='longer'>
								<option value=''>All</option>
									<option value='1' selected='selected'>Approved</option>
									<option value='2'>Declined</option>
									<option value='3'>Pending</option>
									<option value='6'>Partner Deleted</option>
									<option value='12'>Offline by Admin</option>
									<option value='14'>Offline by Partner</option>
							</select>
						</td>
						<td colspan='2'>&nbsp;</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
	<input name='prt_menu_selection' value='prt_manage_sites' type='hidden'>
	</form>";

	$sql = "SELECT * FROM tb_domain";
	$result = $conn->query($sql);
		
	if ($result->num_rows > 0) 
	{ //start if 1
		
	echo "
		
	<table class='overtable' cellpadding='0' cellspacing='0'>
		<tbody><tr class='tabletop header_nowrap'>
			<td class='centered_cell'>No</td>
			<td>Website</td>
			<td class='centered_cell'>Niche</td>
			<td class='centered_cell'>Domain Authority</td>
			<td class='centered_cell'>Page Rank</td>
			<td class='centered_cell'>Alexa Rank</td>
			<td class='centered_cell'>Ip Address</td>
			<td class='centered_cell'>Status</td>
		</tr>";
		
		
	
		
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{ //start whell 1
							
		echo "
			
		<tr class='regular_nowrap' style='background-color:#EDF6FF; '>
			<td class='centered_cell'>" . $row["kd_dom"]. "</td>
			<td><div class='nofollow_website'><a href='http://www." . $row["nm_dom"]. "' target='_blank'><strong>" . $row["nm_dom"]. "</strong></a></div></td>";
			
				$sql2 = "SELECT * FROM tb_niche WHERE kd_niche LIKE '" . $row["kd_niche"]. "'  ";
				$result2 = $conn->query($sql2);
				
				if ($result2->num_rows > 0) 
				{ //start if 2
				
								while($row2 = $result2->fetch_assoc()) 
								{ //start while 2
								
									echo"<td class='centered_cell'>" . $row2["nm_niche"]. "</td>";
								}; //end while 2
										
										
										} else { //else if 2
						
											echo"<td class='centered_cell'>-</td>";
										
										}; //end if 2
				
				echo "	<td class='centered_cell'>" . $row["DA"]. "</td>
						<td class='centered_cell'>" . $row["PR"]. "</td>
						<td class='centered_cell'>" . $row["AR"]. "</td>
						<td class='centered_cell'>" . $row["IPS"]. "</td>
						<td class='centered_cell'><span style='color:#008000;'>" . $row["st_dom"]. "</span></td>
						
		</tr>";
		
		}; // end while 1
	 } else {  //else if 1
						
							echo "0 results";
						
						}; //end if 1
						
						
						$conn->close();


								echo"
	</tbody></table>
	


	<table class='overtable' cellpadding='0' cellspacing='0'>
		<tbody><tr class='tabletop header_nowrap'>
			<td class='centered_cell'>*Actions:</td>
			<td class='centered_cell'><img src='images/edit_website.gif' title='Edit Website' alt='Edit Website'>&nbsp;Edit Website</td>
			<td class='centered_cell'><img src='images/linkbanner_settings.gif' title='LinkBanner Settings' alt='LinkBanner Settings'>&nbsp;LinkBanner Settings</td>
			<td class='centered_cell'><img src='images/take_offline.gif' title='Take Website Offline' alt='Take Website Offline'>&nbsp;Take Website Offline</td>
			<td class='centered_cell'><img src='images/set_to_online.gif' title='Website Back to Online' alt='Website Back to Online'>&nbsp;Website Back to Online</td>
			<td class='centered_cell'><img src='images/delete_website.gif' title='Delete Website' alt='Delete Website'>&nbsp;Delete Website</td>
		</tr>
	</tbody></table>";
						
?>						
						
						
						
						