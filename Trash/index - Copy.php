<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<?php 
		include 'connect.php';
		include 'header.php'; 
	?>
	
	
	
	<body id="sites" class="partner">
	
	
	<!--------Start Navigasi----------->
			
            <?php include 'main_nav.php'; ?>
			
	<!--------End Navigasi------------->
			 
		
			
			
			
			
			<div id="contentWrapper">
				<div class="conFull clearfix">
					<div class="conHead"><h1>Submit One Site</h1></div>
					<div class="conBody" id="mainBox">

<link rel="stylesheet" type="text/css" media="all" href="https://act.linkworth.com/css/overlib.css">
<script type="text/javascript" src="https://act.linkworth.com/js/overlib.js"></script>
<script type="text/javascript" language="javascript" src="https://act.linkworth.com/js/website_zones.js"></script>
<script language="javascript" type="text/javascript">
//<![CDATA[
	show_home_page_price = false;
	show_sub_page_price1 = false;
	show_sub_page_price2 = false;
	show_sub_page_price3 = false;
	show_sub_page_price4 = false;
	show_sub_page_price5 = false;
	show_every_page_price = false;

	show_sub_page_url1 = false;
	show_sub_page_url2 = false;
	show_sub_page_url3 = false;
	show_sub_page_url4 = false;
	show_sub_page_url5 = false;

	show_bb_home_page_price = false;
	show_bb_sub_page_price1 = false;
	show_bb_sub_page_price2 = false;
	show_bb_sub_page_price3 = false;
	show_bb_sub_page_price4 = false;
	show_bb_sub_page_price5 = false;
	show_bb_every_page_price = false;

	show_bb_sub_page_url1 = false;
	show_bb_sub_page_url2 = false;
	show_bb_sub_page_url3 = false;
	show_bb_sub_page_url4 = false;
	show_bb_sub_page_url5 = false;

	show_linkads_section = false;
	show_linkpost_section = false;
	show_linkintxt_section = false;
	show_linkbb_section = false;
	show_linkbanner_section = false;
	show_linkwords_section = false;
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
var priceArray = new Array();
priceArray[0] = 0; 
priceArray[1] = 15; 
priceArray[2] = 40;
priceArray[3] = 200; 
priceArray[4] = 350; 
priceArray[5] = 500; 
priceArray[6] = 750; 
priceArray[7] = 100;

function showHideDivTag(div_name, show_div)
{
	if(show_div)
	{
		document.getElementById(div_name).style.display = "";
	}
	else
	{
		document.getElementById(div_name).style.display = "none";
	}
}
function showHidePriceAndUrl(obj_drop_down, drop_down_name)
{
	div_price = 'div_' + drop_down_name;

	if(drop_down_name.substring(0,3) == 'sub')
	{
		show_hide_url = true;
		div_url = 'div_sub_page_url' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
		earningID = 'sub_page_earning' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
		customValueID = 'sub_page_custom' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
	}
	else
	{
		if(drop_down_name.substring(0,6) == 'bb_sub')
		{
			show_hide_url = true;
			div_url = 'div_bb_sub_page_url' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
			earningID = 'bb_sub_earning' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
			customValueID = 'bb_sub_custom' + drop_down_name.substring(drop_down_name.length-1,drop_down_name.length);
		}
		else
		{
			show_hide_url = false;

			elementIdArray = drop_down_name.split(/[_]{1}/);
			idNameBeginning = '';
			for(i=0;i<2;i++)
			{
				idNameBeginning += elementIdArray[i] + '_';
			}

			customValueID = idNameBeginning + 'custom'
			earningID = idNameBeginning + 'earning';
		}
	}

	if(obj_drop_down.value == 'custom_price')
	{
		document.getElementById(div_price).style.display = "";

		moneyValue = document.getElementById(customValueID).value;
		setCustomerPrice(earningID,moneyValue);

		if(show_hide_url)
		{
			document.getElementById(div_url).style.display = "";
		}
	}
	else
	{
		if(obj_drop_down.value == '')
		{
			document.getElementById(div_price).style.display = "none";
			document.getElementById(earningID).innerHTML = '\&nbsp\;';

			if(show_hide_url)
			{
				document.getElementById(div_url).style.display = "none";
			}
		}
		else
		{
			document.getElementById(div_price).style.display = "none";
			setCustomerPrice(earningID, priceArray[obj_drop_down.value]);

			if(show_hide_url)
			{
				document.getElementById(div_url).style.display = "";
			}
		}
	}
}

function setCustomPrice(theElement, theValue, theNumber)
{
	elementIdArray = theElement.split(/[_]{1}/);
	theElement = '';
	for(i=0;i<2;i++)
	{
		theElement += elementIdArray[i] + '_';
	}
	theElement += 'earning';

	if(theNumber > 0)
	{
		theElement += theNumber;
	}

	setCustomerPrice(theElement, theValue)
}

function setCustomerPrice(theElement, theValue)
{
	prtBillforRate = 0.5;
	partnerEarning = theValue * prtBillforRate;

	if(partnerEarning > 0)
	{
		theElement = document.getElementById(theElement);
		theElement.innerHTML = "\<span class=\'earning_label\'\>You&#039;ll Earn \$ " + partnerEarning.toFixed(2) + '\<\/span\>';
	}
	else
	{
		theElement = document.getElementById(theElement)
		theElement.innerHTML = '\&nbsp\;';
	}
}
//]]>
</script>


<!-----start Form------->
		<form method="post" action="/index.php" enctype="multipart/form-data" name="frm">
<div style="width:100%; text-align:center;">


<!----Container 1-------->
<table style="background-color:#E4F1FF; margin:0 auto 10px auto;" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td colspan="3" class="tabletop" style="font-weight:bold;">Website Information</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td style="width:35%; text-align:right; font-weight:bold;">Site Title:</td>
		<td><input name="prt_website_title" size="30" maxlength="80" value="" type="text"></td>
		<td style="font-style:italic">(short name of site)</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold;">Site Address:</td>
		<td><input name="url_http" value="http://" size="5" style="color: #FF0000;" readonly="readonly" type="text"><input name="prt_website_url" size="30" maxlength="255" value="" type="text"></td>
		<td style="font-style:italic">(domain name) (ex: www.my-domain-name.com)</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold; vertical-align:text-top;">Site Description:</td>
		<td><textarea name="prt_website_description" rows="4" cols="20" class="general"></textarea></td>
		<td style="font-style:italic">(short explanation of site content)</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold;">Main Category:</td>
		<td>	
		<select name="website_subcategory_id" id="website_subcategory_id" class="longer"> 
		
		
			
					<?php
					include 'connect.php';
						$sql = "SELECT * FROM tb_niche";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) 
						{while($row = $result->fetch_assoc()) 
						{					
							echo "<option value='114'><font color='black'>" . $row["niche"]. "</font></option>";
							
						};
						 
													
						} else { 
						
							echo "0 results";
						
						};
						
						
						$conn->close();
						?>
				
	</select>
</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold; vertical-align:text-top;">Category Tags:</td>
		<td>
		 <select name="prt_website_category_tags[]" id="prt_website_category_tags" size="6" multiple="multiple" class="longer"> 
		 
			<option value="1">Arts &amp; Humanities</option>
				<option value="114">&nbsp;-&nbsp;Animation</option>
				<option value="115">&nbsp;-&nbsp;Antiques</option>
				<option value="116">&nbsp;-&nbsp;Architecture</option>
				<option value="117">&nbsp;-&nbsp;Body Art</option>
				<option value="132">&nbsp;-&nbsp;Comics</option>
				<option value="118">&nbsp;-&nbsp;Costumes</option>
				<option value="119">&nbsp;-&nbsp;Dance</option>
				<option value="120">&nbsp;-&nbsp;Design</option>
				<option value="121">&nbsp;-&nbsp;Entertainment</option>
				<option value="123">&nbsp;-&nbsp;Movies</option>
				<option value="122">&nbsp;-&nbsp;Music</option>
				<option value="124">&nbsp;-&nbsp;Photography</option>
			<option value="2">Business &amp; Economy</option>
				<option value="125">&nbsp;-&nbsp;Accounting</option>
				<option value="101">&nbsp;-&nbsp;Adult Related</option>
				<option value="133">&nbsp;-&nbsp;Business Services</option>
				<option value="126">&nbsp;-&nbsp;Customer Service</option>
				<option value="127">&nbsp;-&nbsp;E-Commerce</option>
				<option value="128">&nbsp;-&nbsp;Education and Training</option>
				<option value="129">&nbsp;-&nbsp;Employment</option>
				<option value="106">&nbsp;-&nbsp;Finance and Investment</option>
				<option value="102">&nbsp;-&nbsp;Gambling</option>
				<option value="134">&nbsp;-&nbsp;Healthcare</option>
				<option value="135">&nbsp;-&nbsp;Hospitality</option>
				<option value="130">&nbsp;-&nbsp;Human Resources</option>
				<option value="136">&nbsp;-&nbsp;Information Technology</option>
				<option value="261">&nbsp;-&nbsp;Legal</option>
				<option value="131">&nbsp;-&nbsp;Marketing and Advertising</option>
				<option value="108">&nbsp;-&nbsp;Real Estate</option>
				<option value="170">&nbsp;-&nbsp;Shopping</option>
			<option value="17">Clothing &amp; Accessories</option>
				<option value="257">&nbsp;-&nbsp;Apparel &amp; Accessories</option>
				<option value="258">&nbsp;-&nbsp;Jewelry &amp; Watches</option>
				<option value="259">&nbsp;-&nbsp;Shoes</option>
			<option value="3">Computers &amp; Internet</option>
				<option value="103">&nbsp;-&nbsp;Blogs</option>
				<option value="137">&nbsp;-&nbsp;Data Communications</option>
				<option value="138">&nbsp;-&nbsp;E-Books</option>
				<option value="139">&nbsp;-&nbsp;Games</option>
				<option value="140">&nbsp;-&nbsp;Graphics</option>
				<option value="144">&nbsp;-&nbsp;Hardware</option>
				<option value="109">&nbsp;-&nbsp;Hosting</option>
				<option value="105">&nbsp;-&nbsp;Message Forums</option>
				<option value="141">&nbsp;-&nbsp;Multimedia</option>
				<option value="142">&nbsp;-&nbsp;Open Source</option>
				<option value="143">&nbsp;-&nbsp;Programming</option>
				<option value="145">&nbsp;-&nbsp;Security</option>
				<option value="146">&nbsp;-&nbsp;Software</option>
			<option value="4">Education</option>
				<option value="253">&nbsp;-&nbsp;Adult Education</option>
				<option value="255">&nbsp;-&nbsp;Colleges &amp; Universities</option>
				<option value="254">&nbsp;-&nbsp;Distance Learning</option>
				<option value="256">&nbsp;-&nbsp;K-12</option>
			<option value="5">Entertainment</option>
				<option value="248">&nbsp;-&nbsp;Actors</option>
				<option value="252">&nbsp;-&nbsp;Comics &amp; Animation</option>
				<option value="251">&nbsp;-&nbsp;Humor</option>
				<option value="249">&nbsp;-&nbsp;Movies &amp; Film</option>
				<option value="247">&nbsp;-&nbsp;Music</option>
				<option value="250">&nbsp;-&nbsp;TV Shows</option>
			<option value="6">Government</option>
				<option value="242">&nbsp;-&nbsp;Countries</option>
				<option value="243">&nbsp;-&nbsp;Law</option>
				<option value="244">&nbsp;-&nbsp;Military</option>
				<option value="245">&nbsp;-&nbsp;Politics</option>
				<option value="246">&nbsp;-&nbsp;U.S. Government</option>
			<option value="7">Health &amp; Fitness</option>
				<option value="149">&nbsp;-&nbsp;Addictions</option>
				<option value="110">&nbsp;-&nbsp;Alternatives</option>
				<option value="150">&nbsp;-&nbsp;Beauty</option>
				<option value="147">&nbsp;-&nbsp;Conditions and Diseases</option>
				<option value="151">&nbsp;-&nbsp;Dentistry</option>
				<option value="155">&nbsp;-&nbsp;Men's Health</option>
				<option value="148">&nbsp;-&nbsp;Mental Health</option>
				<option value="104">&nbsp;-&nbsp;Pharmacy Related</option>
				<option value="152">&nbsp;-&nbsp;Reproductive Health</option>
				<option value="153">&nbsp;-&nbsp;Services</option>
				<option value="154">&nbsp;-&nbsp;Weight Loss</option>
				<option value="156">&nbsp;-&nbsp;Women's Health</option>
			<option value="8">Home &amp; Family</option>
				<option value="157">&nbsp;-&nbsp;Apartment Living</option>
				<option value="158">&nbsp;-&nbsp;Cooking</option>
				<option value="159">&nbsp;-&nbsp;Gardening</option>
				<option value="160">&nbsp;-&nbsp;Home Improvement</option>
				<option value="161">&nbsp;-&nbsp;Moving and Relocating</option>
				<option value="162">&nbsp;-&nbsp;Pets</option>
				<option value="260">&nbsp;-&nbsp;Wedding</option>
			<option value="18">Insurance</option>
				<option value="262">&nbsp;-&nbsp;Auto</option>
				<option value="267">&nbsp;-&nbsp;Commercial</option>
				<option value="263">&nbsp;-&nbsp;Dental</option>
				<option value="264">&nbsp;-&nbsp;Health</option>
				<option value="265">&nbsp;-&nbsp;Home</option>
				<option value="266">&nbsp;-&nbsp;Life</option>
				<option value="268">&nbsp;-&nbsp;Medicare</option>
			<option value="9">News &amp; Media</option>
				<option value="163">&nbsp;-&nbsp;Internet Broadcasts</option>
				<option value="240">&nbsp;-&nbsp;Journalism</option>
				<option value="164">&nbsp;-&nbsp;Journals</option>
				<option value="165">&nbsp;-&nbsp;Magazines and E-zines</option>
				<option value="166">&nbsp;-&nbsp;Newspapers</option>
				<option value="241">&nbsp;-&nbsp;Radio</option>
				<option value="167">&nbsp;-&nbsp;Television</option>
				<option value="169">&nbsp;-&nbsp;Weather</option>
				<option value="168">&nbsp;-&nbsp;Weblogs</option>
			<option value="10">Recreation &amp; Sports</option>
				<option value="107">&nbsp;-&nbsp;Automotive</option>
				<option value="234">&nbsp;-&nbsp;Aviation</option>
				<option value="235">&nbsp;-&nbsp;Gambling</option>
				<option value="236">&nbsp;-&nbsp;Games</option>
				<option value="237">&nbsp;-&nbsp;Hobbies</option>
				<option value="238">&nbsp;-&nbsp;Outdoors</option>
				<option value="239">&nbsp;-&nbsp;Sports</option>
			<option value="11">Reference</option>
				<option value="232">&nbsp;-&nbsp;Calendars</option>
				<option value="229">&nbsp;-&nbsp;Dictionaries</option>
				<option value="231">&nbsp;-&nbsp;Encyclopedias</option>
				<option value="228">&nbsp;-&nbsp;Libraries</option>
				<option value="226">&nbsp;-&nbsp;Phone Numbers &amp; Addresses</option>
				<option value="233">&nbsp;-&nbsp;Postal References</option>
				<option value="227">&nbsp;-&nbsp;Quotations</option>
				<option value="230">&nbsp;-&nbsp;Thesauri</option>
			<option value="12">Regional</option>
				<option value="214">&nbsp;-&nbsp;Africa</option>
				<option value="215">&nbsp;-&nbsp;Asia</option>
				<option value="216">&nbsp;-&nbsp;Carribean</option>
				<option value="217">&nbsp;-&nbsp;Central America</option>
				<option value="218">&nbsp;-&nbsp;Europe</option>
				<option value="219">&nbsp;-&nbsp;Latin America</option>
				<option value="220">&nbsp;-&nbsp;Mediterranean</option>
				<option value="221">&nbsp;-&nbsp;Middle East</option>
				<option value="222">&nbsp;-&nbsp;North America</option>
				<option value="223">&nbsp;-&nbsp;Oceania</option>
				<option value="224">&nbsp;-&nbsp;Pacific Rim</option>
				<option value="225">&nbsp;-&nbsp;South America</option>
			<option value="13">Science</option>
				<option value="202">&nbsp;-&nbsp;Agriculture</option>
				<option value="203">&nbsp;-&nbsp;Astronomy</option>
				<option value="204">&nbsp;-&nbsp;Biology</option>
				<option value="205">&nbsp;-&nbsp;Chemistry</option>
				<option value="206">&nbsp;-&nbsp;Computer Science</option>
				<option value="207">&nbsp;-&nbsp;Earth Sciences</option>
				<option value="208">&nbsp;-&nbsp;Ecology</option>
				<option value="209">&nbsp;-&nbsp;Engineering</option>
				<option value="210">&nbsp;-&nbsp;Geography</option>
				<option value="211">&nbsp;-&nbsp;Mathematics</option>
				<option value="212">&nbsp;-&nbsp;Physics</option>
				<option value="213">&nbsp;-&nbsp;Space</option>
			<option value="14">Social Science</option>
				<option value="194">&nbsp;-&nbsp;Area Studies</option>
				<option value="195">&nbsp;-&nbsp;Communications</option>
				<option value="196">&nbsp;-&nbsp;Economics</option>
				<option value="197">&nbsp;-&nbsp;Ethnic Studies</option>
				<option value="198">&nbsp;-&nbsp;Human Languages</option>
				<option value="199">&nbsp;-&nbsp;Political Science</option>
				<option value="200">&nbsp;-&nbsp;Psychology</option>
				<option value="201">&nbsp;-&nbsp;Sociology</option>
			<option value="15">Society &amp; Culture</option>
				<option value="182">&nbsp;-&nbsp;Advice</option>
				<option value="183">&nbsp;-&nbsp;Crimes</option>
				<option value="184">&nbsp;-&nbsp;Cultures &amp; Groups</option>
				<option value="185">&nbsp;-&nbsp;Death &amp; Dying</option>
				<option value="186">&nbsp;-&nbsp;Environment &amp; Nature</option>
				<option value="187">&nbsp;-&nbsp;Food &amp; Drink</option>
				<option value="188">&nbsp;-&nbsp;Holidays &amp; Observances</option>
				<option value="189">&nbsp;-&nbsp;Issues &amp; Causes</option>
				<option value="190">&nbsp;-&nbsp;Museums &amp; Exhibits</option>
				<option value="111">&nbsp;-&nbsp;Online Dating</option>
				<option value="191">&nbsp;-&nbsp;People</option>
				<option value="192">&nbsp;-&nbsp;Religion &amp; Spriituality</option>
				<option value="193">&nbsp;-&nbsp;Sexuality</option>
			<option value="16">Travel</option>
				<option value="171">&nbsp;-&nbsp;Backpacking</option>
				<option value="172">&nbsp;-&nbsp;Business Travel</option>
				<option value="173">&nbsp;-&nbsp;Cruises</option>
				<option value="175">&nbsp;-&nbsp;Family Travel</option>
				<option value="113">&nbsp;-&nbsp;Flights</option>
				<option value="112">&nbsp;-&nbsp;Hotels</option>
				<option value="176">&nbsp;-&nbsp;Luggage and Accessories</option>
				<option value="177">&nbsp;-&nbsp;Maps</option>
				<option value="179">&nbsp;-&nbsp;Resorts</option>
				<option value="180">&nbsp;-&nbsp;Transportation</option>
				<option value="174">&nbsp;-&nbsp;Travel Directories</option>
				<option value="178">&nbsp;-&nbsp;Travel Photos</option>
				<option value="181">&nbsp;-&nbsp;Travelogues</option>
	</select>
</td>
		<td style="font-style:italic">(categories to describe site)<br>(ctrl + click to select more than one)<br>(up to three)</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold; vertical-align:text-top;">Tags:</td>
		<td><textarea name="prt_website_tags" rows="4" cols="20" class="general"></textarea></td>
		<td style="font-style:italic">(keywords to describe site)<br>(separate them by comma)</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold;">Site's Language:</td>
		<td>	<select name="language_id" id="language_id" class="longer">
			<option value="">Select Language...</option>
				<option value="1">Afrikaans</option>
				<option value="2">Albanian</option>
				<option value="3">Arabic</option>
				<option value="4">Armenian</option>
				<option value="5">Azerbaijani</option>
				<option value="6">Basque</option>
				<option value="7">Belarusian</option>
				<option value="8">Bulgarian</option>
				<option value="9">Catalan</option>
				<option value="10">Cherokee</option>
				<option value="11">Chinese - Simplified</option>
				<option value="12">Chinese - Traditional</option>
				<option value="13">Cornish</option>
				<option value="14">Croatian</option>
				<option value="15">Czech</option>
				<option value="16">Danish</option>
				<option value="17">Dhivehi</option>
				<option value="18">Dutch</option>
				<option value="19">English</option>
				<option value="20">Esperanto</option>
				<option value="21">Estonian</option>
				<option value="22">Farsi</option>
				<option value="23">Finnish</option>
				<option value="24">French</option>
				<option value="25">Galician</option>
				<option value="26">Georgian</option>
				<option value="27">German</option>
				<option value="28">Greek</option>
				<option value="29">Gujarati</option>
				<option value="30">Haitian Creole</option>
				<option value="31">Hebrew</option>
				<option value="32">Hindi</option>
				<option value="33">Hungarian</option>
				<option value="34">Icelandic</option>
				<option value="35">Ido</option>
				<option value="36">Indonesian</option>
				<option value="37">Irish Gaelic</option>
				<option value="38">Italian</option>
				<option value="39">Japanese</option>
				<option value="40">Javanese</option>
				<option value="41">Khmer</option>
				<option value="42">Korean</option>
				<option value="43">Latin</option>
				<option value="44">Latvian</option>
				<option value="45">Lithuanian</option>
				<option value="46">Low German</option>
				<option value="47">Macedonian</option>
				<option value="48">Maltese</option>
				<option value="49">Maori</option>
				<option value="50">Mongolian</option>
				<option value="51">Norwegian</option>
				<option value="52">Occitan</option>
				<option value="53">Other...</option>
				<option value="54">Pashto</option>
				<option value="55">Plautdietsch</option>
				<option value="56">Polish</option>
				<option value="57">Portuguese</option>
				<option value="58">Pulaar</option>
				<option value="59">Romanian</option>
				<option value="60">Russian</option>
				<option value="61">Serbian</option>
				<option value="62">Slovak</option>
				<option value="63">Slovenian</option>
				<option value="64">Spanish</option>
				<option value="65">Swahili</option>
				<option value="66">Swedish</option>
				<option value="67">Swiss</option>
				<option value="68">Tagalog</option>
				<option value="69">Tatarish</option>
				<option value="70">Thai</option>
				<option value="71">Turkish</option>
				<option value="72">Turkmen</option>
				<option value="73">Ukrainian</option>
				<option value="74">Uzbek</option>
				<option value="75">Vietnamese</option>
				<option value="76">Welsh</option>
				<option value="77">Wolof</option>
				<option value="78">Yiddish - transliterated</option>
				<option value="79">Yiddish - unicode</option>
		<option value="53">Other...</option>
	</select>
</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold;">Monthly Visits:</td>
		<td>	<select name="website_traffic_id">
		<option value="1">0-1K</option>
		<option value="2">1K-5K</option>
		<option value="3">5K-10K</option>
		<option value="4">10K-20K</option>
		<option value="5">20K-50K</option>
		<option value="6">50K-100K</option>
		<option value="7">100K-500K</option>
		<option value="8">Over 500K</option>
	</select>
</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:right; font-weight:bold; vertical-align:text-top;">Additional Info:</td>
		<td><textarea name="prt_website_comment" rows="4" cols="20" class="general"></textarea></td>
		<td style="font-style:italic">(site stats important for a buyer)</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</tbody>

</table>
<!------End Container 1------->


		<table style="background-color:#E4F1FF;" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td align="center"><input name="submitted" value="Add New Website" class="submit" type="submit"></td>
			</tr>
		</tbody></table>
		<div style="display:none;">
			<input name="prt_menu_selection" value="prt_submit_one_site" type="hidden">
		</div>
		</form>
		<!-----End Form---------->

					
					</div>
					
				</div>
				<div class="conFoot"></div>
			</div><!-- End Container -->
		</div><!-- End Wrapper -->

		<?php include "footer.php"; ?>
</html></html>