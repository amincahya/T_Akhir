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


<form method='post' action='#'>
				
				<table>
				<tr>
					<td></td>
					<td colspan='2'>
					<br align='center'>If You Interested to Advertise with us, Please go to <a href='contact.php'>Contact Us</a> and tell your offer. We received Link Post, Links Ads and Banner ads.</br>
					</td>
					<td></td>
				</tr>
				<tr>
				
				</tr>
				</table>
</form>";
						
?>						
						
						
						
						