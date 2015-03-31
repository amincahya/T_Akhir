function my_openPopup( url, name, widgets, openerUrl )
{
	var host = location.hostname;
	var popupWin = window.open( url, name, widgets );

	if ( popupWin && popupWin.opener ) {
		if ( openerUrl )
		{
			popupWin.opener.location = openerUrl;
			popupWin.focus();
		}
		popupWin.opener.top.name = "opener";
	}
}