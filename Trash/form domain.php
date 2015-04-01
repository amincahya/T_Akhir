<?php
echo"

<div id='contentWrapper'><!----------Wrapper 2------------------>
	<div class='conFull clearfix'>
		<div class='conHead'><h1>Container 1</h1></div>
		<div class='conBody' id='mainBox' >

		<script type='text/javascript' src='js/prt_account_home.js'></script>
		<script type='text/javascript' src='js/adv_hyperlink_tooltip.js'></script>

<div class='clearfix'></div>";
//----------------------------------------------------------------------------------------------------------------------------------------




echo"
<form method='post' action='/index.php' enctype='multipart/form-data' name='frm'>
<div style='width:100%; text-align:center;'>
<table style='background-color:#E4F1FF; margin:0 auto 10px auto;' cellpadding='0' cellspacing='0'>
	<tbody><tr>
		<td colspan='3' class='tabletop' style='font-weight:bold;'>Website Information</td>
	</tr>
	<tr>
		<td colspan='3'>&nbsp;</td>
	</tr>
	<tr>
		<td style='width:35%; text-align:right; font-weight:bold;'>Site Title:</td>
		<td><input name='prt_website_title' size='30' maxlength='80' value='' type='text'></td>
		<td style='font-style:italic'>(short name of site)</td>
	</tr>
	<tr>
		<td style='text-align:right; font-weight:bold;'>Site Address:</td>
		<td><input name='url_http' value='http://' size='5' style='color: #FF0000;' readonly='readonly' type='text'><input name='prt_website_url' size='30' maxlength='255' value='' type='text'></td>
		<td style='font-style:italic'>(domain name) (ex: www.my-domain-name.com)</td>
	</tr>
	<tr>
		<td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Site Description:</td>
		<td><textarea name='prt_website_description' rows='4' cols='20' class='general'></textarea></td>
		<td style='font-style:italic'>(short explanation of site content)</td>
	</tr>
	<tr>
		<td height='37' style='text-align:right; font-weight:bold;'>Niche:</td>
  <td>	<select name='website_subcategory_id' id='website_subcategory_id' class='longer'> 
			<option value='1'>Arts &amp; Humanities</option>
					<option value='114'>&nbsp;&nbsp;- Animation</option>
					<option value='115'>&nbsp;&nbsp;- Antiques</option>
					<option value='116'>&nbsp;&nbsp;- Architecture</option>
					<option value='117'>&nbsp;&nbsp;- Body Art</option>
					<option value='132'>&nbsp;&nbsp;- Comics</option>

	</select></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td height='30' style='text-align:right; font-weight:bold; vertical-align:text-top;'>Domain Buy:</td>
	  <td><input name='prt_website_title2' size='30' maxlength='80' value='' type='text'></td>
		<td style='font-style:italic'>&nbsp;</td>
	</tr>
	<tr>
		<td height='30' style='text-align:right; font-weight:bold; vertical-align:text-top;'>Host Server Name:</td>
	  <td><input name='prt_website_title3' size='30' maxlength='80' value='' type='text'></td>
		<td style='font-style:italic'>&nbsp;</td>
	</tr>
	<tr>
		<td style='text-align:right; font-weight:bold;'>WP Username :</td>
		<td><input name='prt_website_title4' size='30' maxlength='80' value='' type='text'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style='text-align:right; font-weight:bold;'>WP Password :</td>
		<td><input name='prt_website_title5' size='30' maxlength='80' value='' type='text'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Registrant Name :</td>
	  <td><input name='prt_website_title6' size='30' maxlength='80' value='' type='text'></td>
	  <td style='font-style:italic'>&nbsp;</td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Publisher Creator :</td>
	  <td><select name='website_subcategory_id2' id='website_subcategory_id2' class='longer'>
        <option value='1'>Arts &amp; Humanities</option>
        <option value='114'>&nbsp;&nbsp;- Animation</option>
        <option value='115'>&nbsp;&nbsp;- Antiques</option>

      </select></td>
	  <td style='font-style:italic'>&nbsp;</td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Date Release :</td>
	  <td><input name='prt_website_title7' size='30' maxlength='80' value='' type='text'></td>
	  <td style='font-style:italic'>&nbsp;</td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>&nbsp;</td>
	  <td><span style='font-style:italic'>Site Statistics</span></td>
	  <td rowspan='5' style='font-style:italic'><div align='left'><img src='images/wp.png' width='214' height='190'></div></td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Page Rank :</td>
	  <td><input name='prt_website_title9' size='30' maxlength='80' value='' type='text'></td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Domain Authority :</td>
	  <td><input name='prt_website_title10' size='30' maxlength='80' value='' type='text'></td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Page Authority :</td>
	  <td><input name='prt_website_title11' size='30' maxlength='80' value='' type='text'></td>
	  </tr>
	<tr>
	  <td height='22' style='text-align:right; font-weight:bold; vertical-align:text-top;'>IP Address Server :</td>
	  <td><input name='prt_website_title12' size='30' maxlength='80' value='' type='text'></td>
	  </tr>
	<tr>
	  <td style='text-align:right; font-weight:bold; vertical-align:text-top;'>Status Active :</td>
	  <td><select name='website_subcategory_id3' id='website_subcategory_id3' class='longer'>
        <option value='1'>&nbsp;&nbsp;- Active</option>
        <option value='114'>&nbsp;&nbsp;- Deactive</option>
        <option value='115'>&nbsp;&nbsp;- Pending</option>
      </select>      </td>
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
</div>
</form>";




//------------------------------------------------------------------------------------------------------------------------------------------------
	
	echo"
	  </div>
								  <div class='conScrollBar'></div>
				
							<script type='text/javascript'>
							init();
							</script>
							<div class='conFoot'></div>	
              </div>
			  </div>";
	

?>
