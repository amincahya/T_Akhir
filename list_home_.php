<?php

	include 'connect.php';
	$sql = "SELECT * FROM tb_domain";
	$result = $conn->query($sql);
		
	if ($result->num_rows > 0) 
	{ //start if 1
		
echo "
<table width='947' height='0' border='0'>
  <tr class='tabletop header_nowrap'>
    <td width='23'><div align='center' class='style1'>No</div></td>
    <td colspan='9'><div align='center' class='style1'>Websites Information</div></td>
  </tr>";

// output data of each row
		while($row = $result->fetch_assoc()) 
		{ //start whell 1
							
		echo "
  
		  <tr>
			<td height='21' bgcolor='#FFCC99'>&nbsp;</td>
			<td colspan='3' bgcolor='#EDF6FF'><div align='center'><strong>Site</strong></div></td>
			<td bgcolor='#E4F1FF'><div align='center'><strong>Title</strong></div></td>
			<td width='275' bgcolor='#EDF6FF'><div align='center'><strong>Niche</strong></div></td>
			<td width='31' bgcolor='#E4F1FF'><div align='center'><strong>PR</strong></div></td>
			<td width='32' bgcolor='#E4F1FF'><div align='center'><strong>DA</strong></div></td>
			<td width='30' bgcolor='#E4F1FF'><div align='center'><strong>PA</strong></div></td>
			<td width='101' bgcolor='#EDF6FF'><div align='center'><strong>Actions*</strong></div></td>
		  </tr>
		  <tr>
			<td height='26' bgcolor='#FFCC99'><div align='center' class='style1'>" . $row["kd_dom"]. "</div></td>
			<td colspan='3' bgcolor='#EDF6FF'><div align='center'><strong>" . $row["nm_dom"]. "</strong></div></td>
			<td bgcolor='#E4F1FF'><div align='center'>Home Improvement</div></td>
			
			<!------Buka Tabel Niche----->
			
			<td bgcolor='#EDF6FF'><div align='center'>";
			
			$sql2 = "SELECT * FROM tb_niche WHERE kd_niche LIKE '" . $row["kd_niche"]. "'  ";
				$result2 = $conn->query($sql2);
				
				if ($result2->num_rows > 0) 
				{ //start if 2
				
								while($row2 = $result2->fetch_assoc()) 
								{ //start while 2
			
			
									echo"" . $row2["nm_niche"]. "";
								}; //end while 2
										
										
										} else { //else if 2
						
											echo"0 results";
										
										}; //end if 2
				
			echo "	
			
			
			
			</div></td>
			
			<!-----End Buka Tabel Niche---->
			
			
			<td bgcolor='#E4F1FF'><div align='center'>" . $row["PR"]. "</div></td>
			<td bgcolor='#E4F1FF'><div align='center'>" . $row["DA"]. "</div></td>
			<td bgcolor='#E4F1FF'><div align='center'>" . $row["PA"]. "</div></td>
			<td bgcolor='#EDF6FF'><div align='center'>
				<img src='images/take_offline.gif' width='19' height='17' alt='Add Site' /></div>
			</td>
		  </tr>
		  <tr>
			<td rowspan='10' bgcolor='#FFCC99'>&nbsp;</td>
			<td colspan='3' bgcolor='#EDF6FF'><div align='center'>" . $row["IPS"]. "</div></td>
			<td rowspan='10' valign='top' bgcolor='#E4F1FF'><div align='center'>
			  <p align='left'><strong>Description :</strong></p>
				<textarea name='prt_website_description2' cols='20' class='general' style='width: 245px; height: 161px;'>
					" . $row["desk_dom"]. "
				</textarea>
			<td rowspan='2' valign='bottom' bgcolor='#EDF6FF'><div align='center'><strong>Category</strong></div></td>
			<td colspan='3' rowspan='2' valign='bottom' bgcolor='#E4F1FF'>
					<div align='center'>
							<strong>AR</strong>
					</div>
			</td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan='3' rowspan='3' bgcolor='#EDF6FF'><div align='center'><img src='images/wp.png' width='78' height='73' /></div></td>
			<td bgcolor='#EDF6FF'><div align='center'><img src='images/edit_website.gif' alt='Edit' width='22' height='20' /></div></td>
		  </tr>
		  
		  <!--Perlu buka tabel kategori---->
		  <tr>
			<td rowspan='8' valign='top' nowrap='nowrap' bgcolor='#EDF6FF'>      
				<div align='center'>
					<textarea name='prt_website_description2' cols='20' class='general' style='width: 245px; height: 161px;'>";
					
				$sql3 = "SELECT * FROM tb_niche WHERE kd_niche LIKE '" . $row["kd_niche"]. "'  ";
				$result3 = $conn->query($sql3);
				
				if ($result3->num_rows > 0) 
				{ //start if 2
				
								while($row3 = $result2->fetch_assoc()) 
								{ //start while 2
			
			
										echo"" . $row3["nm_kat"]. "";
											}; //end while 2
										
										
										} else { //else if 2
						
											echo"0 results";
										
										}; //end if 2
				
			echo "	
			
					
				  
				  
				  
				  
					</textarea>
				</div>      
			<p align='center'>&nbsp;</p>
			</td>
			<!--End Kategori-->
			<td height='28' colspan='3' bgcolor='#E4F1FF'><div align='center'>" . $row["AR"]. "</div></td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td height='28' colspan='3' bgcolor='#E4F1FF'><div align='center'><strong>Status</strong></div></td>
			<td bgcolor='#EDF6FF'><div align='center'><img src='images/delete_website.gif' alt='Delete' width='17' height='19' /></div></td>
		  </tr>
		  <tr>
			<td width='68' bgcolor='#EDF6FF'><div align='left'><strong>Username</strong></div></td>
			<td width='4' bgcolor='#EDF6FF'><div align='center'>:</div></td>
			<td width='95' bgcolor='#EDF6FF'>" . $row["us_dom"]. "</td>
			<td colspan='3' rowspan='6' bgcolor='#E4F1FF'><div align='center' class='style2'>" . $row["st_dom"]. "</div></td>
			<td rowspan='2' bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td bgcolor='#EDF6FF'><div align='left'><strong>Password</strong></div></td>
			<td bgcolor='#EDF6FF'><div align='center'>:</div></td>
			<td bgcolor='#EDF6FF'>" . $row["ps_dom"]. "</td>
		  </tr>
		  <tr>
			<td height='24' colspan='3' bgcolor='#EDF6FF'>&nbsp;</td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan='3' bgcolor='#EDF6FF'><div align='center'><strong>Registran Name</strong></div></td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan='3' bgcolor='#EDF6FF'><div align='center'>" . $row["reg_dom"]. "</div></td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan='3' bgcolor='#EDF6FF'>&nbsp;</td>
			<td bgcolor='#EDF6FF'>&nbsp;</td>
		  </tr>";
  
		}; // end while 1
	 } else {  //else if 1
						
							echo "0 results";
						
						}; //end if 1
						
						
							$conn->close();
echo"
</table>

</body>
";











					    
 					/*	include 'connect.php';
						
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

//----------------------------------------------------------------------------------------------------------batas
						


/* 
echo"

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
			<td class='centered_cell'>&nbsp;Since</td>
			<td>Website</td>
			<td class='centered_cell'>LinkRank</td>
			<td class='centered_cell'>Category</td>
			<td class='centered_cell'>Active Links</td>
			<td class='centered_cell'>Status</td>
			<td class='centered_cell'>Actions*</td>
		</tr>";
		
		
		
		
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{ //start whell 1
							
		echo "
			
		<tr class='regular_nowrap' style='background-color:#EDF6FF; '>
			<td class='centered_cell'>" . $row["kd_dom"]. "</td>
			<td style='background-color:#E4F1FF; '>
				<div class='nofollow_website' >
					<a href='http://www." . $row["nm_dom"]. "' target='_blank'><strong>" . $row["nm_dom"]. "</strong></a>
				</div>
			</td>";
			
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
				
				echo "	<td class='centered_cell'>" . $row["jdl_dom"]. "</td>
						<td class='centered_cell'>" . $row["tgl_dom"]. "</td>
						<td>
							<textarea style='width: 245px; height: 161px;' name='prt_website_description' rows='4' cols='20' class='general'>
							" . $row["desk_dom"]. "
							</textarea>
						</td>
						<td class='centered_cell'><span style='color:#008000;'>1</span></td>
						
						<!--action-->
						<td class='centered_cell'><a href='#'><img src='images/edit_website.gif' title='Edit Website' alt='Edit Website'></a>&nbsp;<a href='/index.php?prt_menu_selection=prt_manage_sites&amp;action=linkbanner_settings&amp;prt_website_id=178250'><img src='images/linkbanner_settings.gif' title='LinkBanner Settings' alt='LinkBanner Settings'></a>
						&nbsp;<a href='#'><img src='images/take_offline.gif' title='Take Website Offline' alt='Take Website Offline'></a>
						&nbsp;<a href='#'><img src='images/delete_website.gif' title='Delete Website' alt='Delete Website'></a>
						</td>
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
	</tbody></table>";*/
						
?>						 
						
						
						
						