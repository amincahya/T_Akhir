<?php
					   error_reporting(0);
						include 'connect.php';
						
						echo"<form method='post' action='act.php?p=p_sites_manage_site'>
							<table class='sortingTableOrange' cellpadding='2' cellspacing='2'>
								<tbody><tr>
									<td>
										<table cellpadding='2' cellspacing='2'>
											<tbody><tr>
												<td style='text-align:right; font-weight:bold;'>Status:</td>
												<td><select name='status' class='longer'>
                                                  <option value=''>All</option>
                                                  <option value='active'>Active</option>
                                                  <option value='deactive'>Deactive</option>
												  <option value='Deindexed'>Deindexed</option>
                                                  <option value='pending'>Pending</option>
                                              
                                                </select></td>
												<td style='text-align:right; font-weight:bold;'>Find URL:</td>
												<td><input name='url' value='' type='text'></td>
												<td style='text-align:center;' rowspan='2'>
													<input name='submitted_sort_options' value='Sort' class='submit' type='submit'>
												</td>
												<td style='text-align:center;' rowspan='2'>
													<input name='submitted_sort_options' value='Sort' class='submit' type='submit'>
												</td>
											</tr>
											
										</tbody></table>
									</td>
								</tr>
							</tbody></table>
							<input name='prt_menu_selection' value='prt_manage_sites' type='hidden'>
							</form>";
						
						include'control-post.php';
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
											<td width='69' class='username' align='center'>Detail</td>
										</tr>
															
						";
						
						// output data of each row
						while($dom = $result->fetch_assoc()) 
						{
							
							   echo "<form method='post' action='act.php?p=p_sites_manage_site'>
									 <tr class='hilight noclick' id='row1'>
										
										<td width='115' class='weblink clickable'>
											<div class='nofollow_website'>
												<div align='left'  style='font-weight:bold;'>". $dom['nm_dom'] ."</div>
											</div>
										</td>";
										
										$sql1 = "SELECT tb_niche.nm_niche FROM tb_niche WHERE kd_niche LIKE '" . $dom["kd_niche"]. "'";
										$result1 = $conn->query($sql1);
										if ($result1->num_rows > 0){
										while($niche = $result1->fetch_assoc()){
								    echo"<td width='116' class='category clickable'><div align='center'>". $niche['nm_niche'] ."</div></td>";
										}
										}else{
								   echo"<td width='116' class='category clickable'><div align='center'>-</div></td>";
										}
								   echo"<td width='110' class='category clickable'><div align='center'>". $dom['jdl_dom'] ."</div></td>";
								   
										$sql2 = "SELECT tb_host.nm_host FROM tb_host WHERE kd_host LIKE '" . $dom["kd_host"]. "'";
										$result2 = $conn->query($sql2);
										if ($result2->num_rows > 0){
										while($host = $result2->fetch_assoc()){
								   echo"<td width='109' class='category clickable'><div align='center'>". $host['nm_host'] ."</div></td>";
										}
										}else{
								   echo"<td width='109' class='category clickable'><div align='center'>-</div></td>";
										}
								   echo"<td width='108' class='category clickable'><div align='center'>". $dom['us_dom'] ."</div></td>
										 <td width='109' class='category clickable'><div align='center'>". $dom['ps_dom'] ."</div></td>
										 <td width='79' class='category clickable'><div align='center'>". $dom['PR'] ."</div></td>
										 <td width='82' class='category clickable'><div align='center'>". $dom['DA'] ."</div></td>
										 <td width='85' class='category clickable'><div align='center'>". $dom['PA'] ."</div></td>
										 <td width='68' class='category clickable'><div align='center'>". $dom['st_dom'] ."</div></td>
										 <td width='68' class='category clickable'><div align='center'>
											<input type='checkbox' value='". $dom['nm_dom'] ."' name='dom_nm' id=''/>
											<input type='image' value='detail'></input>
										 </div></td>
									</tr>
							</form>";
							
						 };
						 
							 
							echo "</table>
								</div>
							</div>
						</div>";
						
						} else { 
						
							echo "0 results";
						
						}
						
						
						$conn->close();
						
						
						
						/* echo"<table style='background-color:#E4F1FF;' cellpadding='0' cellspacing='0'>
								<tbody><tr>
									<td align='center'><input name='submitted' value='Add New Website' class='submit' type='submit'></td>
								</tr>
							</tbody></table>"; */
						
						
						
						
						
						?>