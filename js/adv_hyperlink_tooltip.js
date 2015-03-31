function InitializeTimer(current,e, action, product_id, hash, ml)
{
	secs = 1

	test_current = current
	test_e = e
	test_action = action
	current_product_id = product_id
	current_hash = hash
	show_email = ml

	StopTheClock()
	StartTheTimer()
}

function StopTheClock()
{
    if(timerRunning)
        clearTimeout(timerID)
    timerRunning = false
}

function StartTheTimer()
{
    if (secs==0)
    {
        StopTheClock()

		if(test_action == 'showtip')
		{
			showtip(test_current,test_e)
		}
		else
		{
			hidetip()
		}
    }
    else
    {
        secs = secs - 1
        timerRunning = true
        timerID = self.setTimeout("StartTheTimer()", delay)
    }
}

function DL_GetElementLeft(eElement)
{
    var nLeftPos = eElement.offsetLeft;          // initialize var to store calculations
    var eParElement = eElement.offsetParent;     // identify first offset parent element  
    while (eParElement != null)
    {                                            // move up through element hierarchy
        nLeftPos += eParElement.offsetLeft;      // appending left offset of each parent
        eParElement = eParElement.offsetParent;  // until no more offset parents exist
    }
    return nLeftPos;                             // return the number calculated
}

function DL_GetElementTop(eElement)
{
    var nTopPos = eElement.offsetTop;            // initialize var to store calculations
    var eParElement = eElement.offsetParent;     // identify first offset parent element  
    while (eParElement != null)
    {                                            // move up through element hierarchy
        nTopPos += eParElement.offsetTop;        // appending top offset of each parent
        eParElement = eParElement.offsetParent;  // until no more offset parents exist
    }
    return nTopPos;                              // return the number calculated
}

function ietruebody()
{
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function showtip(current,e)
{
	updateContent();

	hidetip();

	if (document.layers) // Netscape 4.0+
	{
		document.tooltip.document.close()
		document.tooltip.left=e.pageX+14
		document.tooltip.top=e.pageY+2
		document.tooltip.visibility="show"
	}
	else
	{
		if(document.getElementById) // Netscape 6.0+ and Internet Explorer 5.0+
		{
			elm=document.getElementById("AdvUrlToolTip")

			elml=current
			elm.style.height=elml.style.height

			//elml.offsetTop doesn't work inside tables - returns 0
			//elm.style.top=parseInt(elml.offsetTop-elml.offsetHeight) 
			//next line displays tooltip always on the same position
			//elm.style.top=parseInt(DL_GetElementTop(elml)-elml.offsetHeight-132)

			//elml.offsetLeft doesn't work inside tables - returns 0
			//elm.style.left=parseInt(elml.offsetLeft+elml.offsetWidth+5)
			//next line displays tooltip always on the same position
			//elm.style.left=parseInt(DL_GetElementLeft(elml)+elml.offsetWidth+5-232)

			//NEW (displays tooltip depending on link position)
			browser_width = ietruebody().clientWidth
			browser_height = ietruebody().clientHeight
			tooltip_width = elm.offsetWidth

			tooltip_height = elm.offsetHeight

			//overwrite value to fix first tooltip
			if(link_type == 'website')
			{
				if(show_email == 1)
				{
					tooltip_height = 83
				}
				else
				{
					tooltip_height = 68
				}
			}
			else if(link_type == 'linkintxt_webpage')
			{
				if(show_email == 1)
				{
					tooltip_height = 68
				}
				else
				{
					tooltip_height = 46
				}
			}
			else
			{
				tooltip_height = 46
			}

			event_abs_posX = DL_GetElementLeft(elml)
			event_abs_posY = DL_GetElementTop(elml)
			event_rel_posX = DL_GetElementLeft(elml) - ietruebody().scrollLeft;
			event_rel_posY = DL_GetElementTop(elml) - ietruebody().scrollTop;

			//show tooltip above link
			if(event_rel_posY > tooltip_height)
			{
				elm.style.top=parseInt(event_abs_posY-tooltip_height-10)+"px"
			}
			else
			{
				elm.style.top=parseInt(event_abs_posY+tooltip_offsetY)+"px"
			}

			//move tooltip to the left
			if((event_abs_posX + tooltip_width) > browser_width)
			{
				elm.style.left=parseInt(browser_width - tooltip_width - 5)+"px"
			}
			else
			{
				elm.style.left=parseInt(event_abs_posX)+"px"
			}
			//END NEW

			elm.style.visibility = "visible"
		}
	}
}

function hidetip()
{
	if(document.layers) // Netscape 4.0+
	{
		document.tooltip.visibility="hidden"
	}
	else
	{
		if(document.getElementById) // Netscape 6.0+ and Internet Explorer 5.0+
		{
			elm=document.getElementById("AdvUrlToolTip")
			elm.style.visibility="hidden"
		}
	} 
}

function updateContent()
{
	var rand = Math.random(9999);

	if(link_type == 'linkintxt_webpage')
	{
		var url = 'advertiser/ajax/adv_linkintxt_webpage_info.inc.php';
		var pars = 'account_id=' + account_id + '&linkintxt_webpage_id=' + current_product_id + '&show_email=' + show_email + '&hash=' + current_hash + '&rand=' + rand;
	}
	else if(link_type == 'outline')
	{
		var url = 'partner/ajax/prt_outline_info.inc.php';
		var pars = 'linkpost_outline_id=' + current_product_id + '&rand=' + rand;
	}
	else if(link_type == 'banner')
	{
		var url = 'advertiser/ajax/adv_banner_info.inc.php';
		var pars = 'account_id=' + account_id + '&adv_banner_id=' + current_product_id + '&hash=' + current_hash + '&rand=' + rand;
	}
	else
	{
		var url = 'advertiser/ajax/adv_website_info.inc.php';
		var pars = 'account_id=' + account_id + '&prt_website_id=' + current_product_id + '&show_email=' + show_email + '&hash=' + current_hash + '&rand=' + rand;
	}

	var myAjax = new Ajax.Request( url, {method: 'get', parameters: pars, onLoading: showTooltipLoad, onComplete: showTooltipResponse} );
}

function showTooltipLoad ()
{
	var newData = '';
	newData += '<table style="width:150px; border: 1px solid #ff9933;" bgcolor="#FFFFFF" margin-bottom: 0px;>';
	newData += '<tr><td align="center"><img src="images/loading_ajax.gif" border="0" /></td></tr>';
	newData += '</table>';

	$('AdvUrlToolTip').innerHTML = newData;
}

function showTooltipResponse (originalRequest)
{
	var newData = originalRequest.responseText;
	$('AdvUrlToolTip').innerHTML = newData;
}


var secs
var timerID = null
var timerRunning = false
var delay = 1000

var test_current
var test_e
var test_action

var tooltip_offsetY = 25;
var tooltip_offsetX = 0;

var prt_website_id;
var current_product_id;
var show_email;

var current_hash;

var link_type;

function clickWebsite ( event, prt_website_id, hash, ignoreModifier )
{
	// as this is only called by websites (currently), link_type will be website.
	modifiers = getModifiers( event );

	if ( !ignoreModifier && modifiers['ctrl'] )
	{
		var new_window = window.open( '/?go_to_site=' + prt_website_id, '_blank' );
	}
	else
	{
		var new_window = window.open( '/advertiser/info_pages/adv_partner_info.php?prt_website_id=' + prt_website_id + '&hash=' + hash, 'WebsiteStats' + hash, 'status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,scrollbars=1,height=650,width=735' );
	}

	new_window.focus();
}

function clickLinkInTxtPage ( event, prt_website_id, linkintxt_website_keyword_id, hash, ignoreModifier )
{
	// as this is only called by websites (currently), link_type will be website.
	modifiers = getModifiers( event );

	if ( !ignoreModifier && modifiers['ctrl'] )
	{
		var new_window = window.open( '/?go_to_lsite=' + linkintxt_website_keyword_id, '_blank' );
	}
	else
	{
		var new_window = window.open( '/advertiser/info_pages/adv_partner_info.php?prt_website_id=' + prt_website_id + '&hash=' + hash, 'WebsiteStats' + hash, 'status=0,toolbar=0,location=0,menubar=0,directories=0,resizable=1,scrollbars=1,height=650,width=735' );
	}

	new_window.focus();
}

function getModifiers ( the_event )
{
	var modifiers = new Array();

	the_event = ( the_event ) ? the_event : ( window.event ) ? window.event : '';

	if ( the_event )
	{
		modifiers['element'] = ( the_event.target ) ? the_event.target : the_event.srcElement;

		if ( the_event.modifiers )
		{
			modifiers['alt'] = the_event.modifiers & Event.ALT_MASK
			modifiers['ctrl'] = the_event.modifiers & Event.CONTROL_MASK
			modifiers['shift'] = the_event.modifiers & Event.SHIFT_MASK
			modifiers['meta'] = the_event.modifiers & Event.META_MASK
		}
		else
		{
			modifiers['alt'] = the_event.altKey
			modifiers['ctrl'] = the_event.ctrlKey
			modifiers['shift'] = the_event.shiftKey
			modifiers['meta'] = false
		}
	}

	return modifiers;
}