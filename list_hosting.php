<?php
					    
						include 'connect.php';
						
						$sql = "SELECT * FROM tb_host";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) 
						{
						
							echo "<table>
									
										<tr class='tabletop'>
											<td class='url'>ID Hosting</td>
											<td class='category'>Nama Hosting</td>
											<td class='gpr'>Username</td>
											<td class='username'>Password</td>
											<td class='username'>Status</td>
											<td class='username'>Edit</td>
											<td class='username'>Delete</td>
											<td class='deals'>#
											<sup class='tooltip_trigger' onmouseover='showToolTip('deals_tip',false);' onmouseout='hideTooltip('deals_tip')' onclick='stickyTooltip('deals_tip')'>?</sup><img src='images/icons/sort_default.gif' class='icon clickable' alt='Sort by' title='Sort by' onclick='sortBy('deals')' onmouseover='this.src='images/icons/sort_current.gif'' onmouseout='this.src='images/icons/sort_default.gif''><span class='tooltip' style='display:none' id='deals_tip' onclick='killTooltip('deals_tip')'><div class='tooltip_pos'><div class='sticky'><img src='images/icons/sticky.gif' alt='sticky' title='sticky'></div><div class='tooltip_content'>Number of Ads Sold</div></div></span></td>
										</tr>";
						
						// output data of each row
						while($row = $result->fetch_assoc()) 
						{
							
							   echo "<tr class='hilight noclick' id='row1'>
										<td class='weblink clickable'><div class='nofollow_website'>00" . $row["kd_host"]. "</div></td>
										<td class='category clickable'>" . $row["nm_host"]. "</td>
										<td class='category clickable'>" . $row["us_host"]. "</td>
										<td class='category clickable'>" . $row["ps_host"]. "</td>
										<td class='category clickable'>" . $row["st_host"]. "</td>
										<td onclick='toggleActions(1,56406,0)' class='clickable'>Edit</td>
										
										<td class='username clickable'>Delete</td>
										<td class='active_deals clickable'>5</td>
									</tr>";
							
						 };
						 
							 
							echo "</table>";
						
						} else { 
						
							echo "0 results";
						
						};
						
						
						$conn->close();
						?>