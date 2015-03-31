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
<!--// <![CDATA[
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
// ]]>-->
</script>
<table style='border-collapse:collapse; border:1px solid #F4F4F4; background-color:#F4F4F4;' cellpadding='3' cellspacing='1'>
				<tbody><tr>
					<td colspan='2' style='background:transparent url(images/bg1.gif) repeat-x top left; height:22px; color:#FFFFFF; font-weight:bold; font-family:Verdana;'>Sent Email to Us</td>
				</tr>
				
				<tr>
					<td colspan='2' style='font-family:Verdana;'>Please enter the required information in the following fields to submit a ticket.</td>
				</tr>
				<tr>
					<td style='width:32%; text-align:right; font-family:Verdana;'>Subject:</td>
					<td style='width:68%;'><input name='ticketsubject' size='50' maxlength='255' value='' type='text'>
					</td>
				</tr>
				<tr>
					<td style='text-align:right; vertical-align:top; font-family:Verdana;'>Message:</td>
					<td><textarea name='ticketmessage' cols='30' rows='7' class='copy_paste'>Account ID: 126503
Account Username: helenj.gay@hotmail.com
------------------------------
</textarea></td>
				</tr>
				<tr>
					<td style='text-align:right; font-family:Verdana;'>Priority:</td>
					<td>
						<select name='ticketpriorityid'>
							<option value='7' style='color:#8A8A8A;' selected='selected'>Low</option>
							<option value='8' style='color:#000000;'>Medium</option>
							<option value='9' style='color:#F07D18;'>High</option>
							<option value='10' style='color:#E826C6;'>Urgent</option>
							<option value='11' style='color:#E06161;'>Emergency</option>
							<option value='12' style='color:#FF0000;'>Critical</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan='2' style='text-align:center;'><input name='button' value='Submit' class='submit' type='submit'></td>
				</tr>
				
			</tbody></table>";
						
?>						
						
						
						
						