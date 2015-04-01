<?php


echo"
<form method='post' action='/index.php' enctype='multipart/form-data' name='frm'>
<div style='width:100%; text-align:center;'>";
						
						
						include'connect.php';
						$sql1 = "SELECT * FROM tb_domain WHERE nm_dom LIKE '".$_POST['dom_nm']."'";
						$result = $conn->query($sql1);
						if ($result->num_rows > 0) 
						{
							while($row = $result->fetch_assoc()) 
						{
								echo"<table style='background-color:#E4F1FF; margin:0 auto 10px auto;' cellpadding='0' cellspacing='0'>
										<tbody><tr>
											<td colspan='3' class='tabletop' style='font-weight:bold;'>Website Information</td>
											
										</tr>
										<tr>
											<td colspan='3'>&nbsp;</td>
										</tr>
										<tr>
											<td style='width:35%; text-align:right; font-weight:bold;'>Site Title :</td>
											<td><input name='prt_website_title' size='30' maxlength='80' value='". $row['jdl_dom']."' type='text'></td>
											<td style='font-style:italic'>(short name of site)</td>
										</tr>
										<tr>
											<td style='text-align:right; font-weight:bold;'>Site Address :</td>
											<td><input name='url_http' value='http://' size='5' style='color: #FF0000;' readonly='readonly' type='text'><input name='prt_website_url' size='30' maxlength='255' value='".$row['nm_dom']."'' type='text'></td>
											<td style='font-style:italic'>(rowain name) (ex: www.my-rowain-name.com)</td>
										</tr>
										<tr>
											<td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Site Description :</td>
											<td><textarea name='prt_website_description' rows='4' cols='20' class='general'>". $row['desk_dom'] ."</textarea></td>
											<td style='font-style:italic'>(short explanation of site content)</td>
										</tr>
										<tr>
											<td height='37' style='text-align:right; font-weight:bold;'>Niche :</td>
									  <td>	";
									  
							$sql4 = "SELECT * FROM tb_niche WHERE kd_niche LIKE '".$row['kd_niche']."'";
							$result4 = $conn->query($sql4);				
							if ($result4->num_rows > 0) 
								{
									while($row4 = $result4->fetch_assoc()) 
										{		  
									echo"<input name='prt_website_title2' size='30' maxlength='80' value='". $row4['nm_niche'] ."' type='text'></td>";
											
									}
								}else{echo"<input name='prt_website_title2' size='30' maxlength='80' value='' type='text'></td>";}			
											
											
											
								echo"			<td>&nbsp;</td>
										</tr>
										<tr>
											<td height='22' style='text-align:right; font-weight:bold; vertical-align:text-top;'>Domain Buy :</td>
										  <td><input name='prt_website_title2' size='30' maxlength='80' value='". $row['asl_row'] ."' type='text'></td>
											<td style='font-style:italic'>&nbsp;</td>
										</tr>
										<tr>
											<td height='30' style='text-align:right; font-weight:bold; vertical-align:text-top;'>Host Server Name :</td>
										  <td>";
										  
										  
										  
										  
							
							$sql3 = "SELECT * FROM tb_host WHERE kd_host LIKE '".$row['kd_host']."'";
							$result3 = $conn->query($sql3);				
							if ($result3->num_rows > 0) 
							{
								while($row3 = $result4->fetch_assoc()) 
									{		  
								echo"<input name='prt_website_title3' size='30' maxlength='80' value='". $row3['us_host'] ."' type='text'>";
										
								}
							}else{echo"<<input name='prt_website_title3' size='30' maxlength='80' value='' type='text'>";}			
											  
										  
										  
										  
										  
										  
									echo"	  </td>
											<td style='font-style:italic'>&nbsp;</td>
										</tr>
										<tr>
											<td style='text-align:right; font-weight:bold;'>WP Username :</td>
											<td><input name='prt_website_title4' size='30' maxlength='80' value='". $row['us_dom'] ."' type='text'></td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style='text-align:right; font-weight:bold;'>WP Password :</td>
											<td><input name='prt_website_title5' size='30' maxlength='80' value='". $row['ps_dom'] ."' type='text'></td>
											<td>&nbsp;</td>
										</tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Registrant Name :</td>
										  <td><input name='prt_website_title6' size='30' maxlength='80' value='". $row['reg_dom'] ."' type='text'></td>
										  <td style='font-style:italic'>&nbsp;</td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Publisher Creator :</td>
										  <td>";
										  
								
								$sql2 = "SELECT * FROM tb_kary WHERE kd_kary LIKE '".$row['kd_kary']."'";
								$result2 = $conn->query($sql2);				
								if ($result2->num_rows > 0) 
								{
								while($row2 = $result2->fetch_assoc()) 
									{		  
								echo"<input name='prt_website_title3' size='30' maxlength='80' value='". $row2['nm_kary'] ."' type='text'>";
										
								}
								}else{echo"<input name='prt_website_title3' size='30' maxlength='80' value='' type='text'>";}
										  
										  
										  
								echo"		  </td>
										  <td style='font-style:italic'>&nbsp;</td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Date Release :</td>
										  <td><input name='prt_website_title7' size='30' maxlength='80' value='". $row['tgl_dom'] ."' type='text'></td>
										  <td style='font-style:italic'>&nbsp;</td>
										  </tr>
										<tr>
										  <td height='19' style='text-align:right; font-weight:bold; vertical-align:text-top;'><span style='font-style:italic'>Site Statistics</span></td>
										  <td>&nbsp;</td>
										  <td rowspan='5' style='font-style:italic'><div align='left'><img src='images/wp.png' width='214' height='190'></div></td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Page Rank :</td>
										  <td><input name='prt_website_title9' size='30' maxlength='80' value='". $row['PR'] ."' type='text'></td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>rowain Authority :</td>
										  <td><input name='prt_website_title10' size='30' maxlength='80' value='". $row['DA'] ."' type='text'></td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Page Authority :</td>
										  <td><input name='prt_website_title11' size='30' maxlength='80' value='". $row['PA'] ."' type='text'></td>
										  </tr>
										<tr>
										  <td height='22' style='text-align:right; font-weight:bold; vertical-align:text-top;'>IP Address Server :</td>
										  <td><input name='prt_website_title12' size='30' maxlength='80' value='". $row['IPS'] ."' type='text'></td>
										  </tr>
										<tr>
										  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Status Active :</td>
										  <td><input name='prt_website_title12' size='30' maxlength='80' value='". $row['st_dom'] ."' type='text'></td>
										  <td style='font-style:italic'>&nbsp;</td>
										  </tr>
										<tr>
											<td colspan='3'>&nbsp;</td>
										</tr>
									</tbody></table>
									<table style='background-color:#E4F1FF;' cellpadding='0' cellspacing='0'>
												<tbody><tr>
													<td align='center'><input name='submitted' value='Add New Website' class='submit' type='submit'></td>
												</tr>
											</tbody></table>
									</div>";
						
						} 
						
						}else { 
						
							echo "0 results";
						
						}
						$conn->close();

echo"
</form>";






?>
