
arr_zone_names = new Array("none", "A", "B", "C", "D", "E", "F", "G");

function swapZoneImage(zone)
{
	var hostName = window.location.host;
	image_source = 'https://' + hostName + '/images/zones/banner-zone-'+zone+'-big.jpg';

	document.getElementById("banner_zones").src = image_source;
}

function saveZoneSelection(zone)
{
	document.frm.prt_website_zone_placement.value = zone;

	document.getElementById("zone_placement").innerHTML = arr_zone_names[zone];

	return nd();
}

function getZoneToolTip()
{
	zone = document.frm.prt_website_zone_placement.value;
	var hostName = window.location.host;

	if(zone == 0)
	{
		image_source = 'https://' + hostName + '/images/zones/banner-zones.jpg';
	}
	else
	{
		image_source = 'https://' + hostName + '/images/zones/banner-zone-'+zone+'-big.jpg';
	}

	content = '<img id=\'banner_zones\' src=\'' + image_source + '\' border=\'0\' width=\'350\' height=\'263\' usemap=\'#zones_map\'>';

	return overlib(content, STICKY, CAPTION, 'Zone Placement', MOUSEOFF, WIDTH, 350, HEIGHT, 263);
}

function getSmallZoneToolTip(zone_id)
{
	if(zone_id == 0)
	{
		image_name = 'banner-zones-small.jpg';
	}
	else
	{
		image_name = 'banner-zone-'+zone_id+'-small.jpg';
	}

	content = '<img src=\'/images/zones/'+image_name+'\' border=\'0\' width=\'200\' height=\'150\'>';

	return overlib(content, STICKY, CAPTION, 'Zone Placement', MOUSEOFF, WIDTH, 200, HEIGHT, 150);
}

function getSmallZoneToolTipFromDropDown(drop_down_name)
{
	selected_zone = document.frm[drop_down_name].selectedIndex;

	location_label = document.frm[drop_down_name].options[selected_zone].text;

	zone_name = location_label.substr(location_label.length-1,1).toLowerCase();

	if(zone_name == 0)
	{
		image_name = 'banner-zones-small.jpg';
	}
	else
	{
		image_name = 'banner-zone-'+zone_name+'-small.jpg';
	}

	content = '<img src=\'images/zones/'+image_name+'\' border=\'0\' width=\'200\' height=\'150\'>';

	return overlib(content, STICKY, CAPTION, 'Zone Placement', MOUSEOFF, WIDTH, 200, HEIGHT, 150);
}
