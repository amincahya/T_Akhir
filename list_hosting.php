<?php
					    
						include 'connect.php';
						
						$sql = "SELECT * FROM tb_domain";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) 
						{
						
							echo "<div class='conLeft' id='account_activity_content'>					
									<div id='search_results'>
										<div class='prtfaq'>
									<table>
									
										
										<tr class='tabletop'>
											<td width='150' class='url' align='center'>Sites</td>
											<td width='80' class='category' align='center'>Niche</td>
											<td width='100' class='gpr' align='center'>Title</td>
											<td width='107' class='username' align='center'>Hosting</td>
											<td width='107' class='username' align='center'>WP User</td>
											<td width='113' class='username' align='center'>WP Pass</td>
											<td width='50' class='username' align='center'>PR</td>
											<td width='50' class='username' align='center'>DA</td>
											<td width='50' class='username' align='center'>PA</td>
											<td width='69' class='username' align='center'>Status</td>
										</tr>
															
						";
						
						// output data of each row
						while($dom = $result->fetch_assoc()) 
						{
							
							   echo "<form>
									 <tr class='hilight noclick' id='row1'>
										<td width='115' class='weblink clickable'>
											<div class='nofollow_website'>
										  <div align='left'>". $dom['nm_dom'] ."</div>
											</div>
										</td>";
										
										$sql1 = "SELECT tb_niche.nm_niche FROM tb_niche WHERE kd_niche LIKE '" . $dom["kd_niche"]. "'";
										$result1 = $conn->query($sql1);
										if ($result1->num_rows > 0){
										while($niche = $result1->fetch_assoc()){
								    echo"<td width='116' class='category clickable'><div align='center'>". $niche['nm_niche'] ."</div></td>";
										{
								   echo"<td width='116' class='category clickable'><div align='center'>-</div></td>";
										}};
								   echo"<td width='110' class='category clickable'><div align='center'>". $dom['jdl_dom'] ."</div></td>";
								   
										$sql2 = "SELECT tb_host.nm_host FROM tb_host WHERE kd_host LIKE '" . $dom["kd_host"]. "'";
										$result2 = $conn->query($sql2);
										if ($result2->num_rows > 0){
										while($host = $result2->fetch_assoc()){
								   echo"<td width='109' class='category clickable'><div align='center'>". $host['nm_host'] ."</div></td>";
										}else{
								   echo"<td width='109' class='category clickable'><div align='center'>-</div></td>";
										}};
								   echo"<td width='108' class='category clickable'><div align='center'>". $dom['us_dom'] ."</div></td>
										 <td width='109' class='category clickable'><div align='center'>". $dom['ps_dom'] ."</div></td>
										 <td width='79' class='category clickable'><div align='center'>". $dom['PR'] ."</div></td>
										 <td width='82' class='category clickable'><div align='center'>". $dom['DA'] ."</div></td>
										 <td width='85' class='category clickable'><div align='center'>". $dom['PA'] ."</div></td>
										 <td width='68' class='category clickable'><div align='center'>". $dom['st_dom'] ."</div></td>
									
									</tr>
									</form>";
							
						 };
						 
							 
							echo "</table>
								</div>
							</div>
						</div>";
						
						} else { 
						
							echo "0 results";
						
						};
						
						
						$conn->close();
						?>