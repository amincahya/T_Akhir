/*global window, document, XMLHttpRequest, ActiveXObject, setTimeout, alert, clearTimeout, self */
/*global getResults, currentProduct, sessionTimedOutMsg, unknownAjaxErrorMsg, zonePlacementMsg, cartAddOKMsg, cartAddExistsMsg, cartAddErrorMsg, previousRequestProcessingMsg, noAdSelectedMsg, noLocationSelectedMsg, previousRequestProcessingMsg, wishListAddOKMsg, wishListAddExistsMsg, wishListAddErrorMsg, noWishListSelectedMsg, hideMsg, clearMsg, moreOptionsMsg, basicOptionsMsg */
/*global overlib, STICKY, CAPTION, MOUSEOFF, WIDTH, HEIGHT */
var currentPage = 1;

function setSession ( theValue )
{
	new Ajax.Request
	(
		'ajax/set_session.php',
		{
			method: 'post',
			parameters: theValue + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				if ( transport.responseText.length )
				{
					eval( transport.responseText );
				}
			}
		}
	);
}

function elementHasClass ( element_to_modify, class_name ) {
	if ( typeof element_to_modify == 'string' )
	{
		element_to_modify = document.getElementById( element_to_modify );
	}

	if ( element_to_modify.className == '' )
	{
		return false;
	}
	else
	{
		return new RegExp( '\\b' + class_name + '\\b' ).test( element_to_modify.className );
	}
}

function elementAddClass ( element_to_modify, class_name )
{
	if ( typeof element_to_modify == 'string' )
	{
		element_to_modify = document.getElementById( element_to_modify );
	}

	if ( !elementHasClass( element_to_modify, class_name ) )
	{
		element_to_modify.className += ( element_to_modify.className ? ' ' : '' ) + class_name;
	}
}

function elementRemoveClass ( element_to_modify, class_name )
{
	if ( typeof element_to_modify == 'string' )
	{
		element_to_modify = document.getElementById( element_to_modify );
	}
	if ( elementHasClass( element_to_modify, class_name ) )
	{
		element_to_modify.className = element_to_modify.className.replace( ( element_to_modify.className.indexOf( ' ' + class_name ) >= 0 ? ' ' + class_name : class_name ), '' );
	}
}

function discardElement ( el )
{
	var bin = document.getElementById( 'LeakGarbageBin' );

	if ( !bin )
	{
		bin = document.createElement( 'div' );
		bin.id = 'LeakGarbageBin';
		document.body.appendChild( bin );
	}

	bin.appendChild( el );

	bin.innerHTML = '';
}

// this is creating a fair amount of overhead - disabled the looping, etc, in order to speed this up.
function removeChildSafe ( el )
{
	/*
	if ( el.childNodes )
	{
		while ( el.childNodes.length > 0 )
		{
			removeChildSafe( el.childNodes[el.childNodes.length - 1] );
		}
	}
	*/

	el.parentNode.removeChild( el );
	// discardElement( el );
}

/* fading code */

function fadeIt ( lastTS, uID )
{
	var currentTS = new Date().getTime();
	var elapsedTime = 0;

	if ( lastTS )
	{
		elapsedTime = currentTS - lastTS;
	}

	var theElement = document.getElementById( uID );

	// set to max if time is up and complete
	if ( theElement.fadeTimeLeft <= elapsedTime )
	{
		theElement.style.opacity = ( theElement.fadeState == 'fadingIn' ) ? '1' : '0';
		theElement.style.filter = 'alpha(opacity=' + ( theElement.fadeState == 'fadingIn' ? '100' : '0' ) + ')';

		if ( theElement.fadeState == 'fadingIn')
		{
			if ( theElement.fadeOutAuto )
			{
				theElement.fadeState = 'fadingOut';
				theElement.fadeTimeLeft = theElement.fadeOutTime;

				theElement.currentFadeTimeout = setTimeout( 'fadeIt(0,\'' + uID + '\')', theElement.fadeOutAuto ); // leave it for a second then fade it out
			}
		}
		else if ( theElement.fadeOutAction == 'remove' ) // it's faded out, we can remove it.
		{
			removeChildSafe( theElement );
		}
		else // default it to hiding it
		{
			theElement.style.display = 'none';
		}

		return;
	}

	theElement.fadeTimeLeft -= elapsedTime;

	var newOpVal = theElement.fadeTimeLeft / ( theElement.fadeState == 'fadingIn' ? theElement.fadeInTime : theElement.fadeOutTime );

	if ( theElement.fadeState == 'fadingIn' )
	{
		if ( theElement.style.display == 'none' ) // doesn't seem to be working right
		{
			theElement.style.display = 'block'; // if it should be span (or non-block element) then caller should set it as such before calling fadein
		}
		newOpVal = 1 - newOpVal;
	}

	theElement.style.opacity = newOpVal;
	theElement.style.filter = 'alpha(opacity = ' + ( newOpVal * 100 ) + ')';

	theElement.currentFadeTimeout = setTimeout( 'fadeIt(' + currentTS + ',\'' + uID + '\')', 35 );
}

function fadeEle ( theDirection, theElement, fadeInTime, fadeOutAuto, fadeOutTime, fadeOutAction )
{
	var uID;

	if ( typeof theElement == 'string' )
	{
		uID = theElement;
		theElement = document.getElementById( theElement );
	}
	else if ( theElement.id )
	{
		uID = theElement.id;
	}
	else
	{
		var alphaChars = 'ABCDEFGHIJKLMNOPQRSTUVWXTZ';
		var randomString = '';
		for ( var i = 0; i < 8; i++ )
		{
			var randomNum = Math.floor( Math.random() * alphaChars.length );
			randomString += alphaChars.substring( randomNum, randomNum + 1 );
		}

		theElement.id = randomString;
		uID = randomString;
	}

	if ( !theElement || typeof theElement != 'object' )
	{
		alert( 'Fade: No element' );
		return;
	}

	if ( theElement.currentFadeTimeout )
	{
		clearTimeout( theElement.currentFadeTimeout );
	}

	theElement.fadeInTime = fadeInTime;
	theElement.fadeOutTime = fadeOutTime;
	theElement.fadeOutAction = fadeOutAction; // remove element when it fades out

	if ( theDirection == 'in' )
	{
		theElement.style.opacity = '0';
		theElement.style.filter = 'alpha(opacity=0)';
		theElement.fadeState = 'fadingIn';
		theElement.fadeOutAuto = fadeOutAuto; // auto fade out after x time
		theElement.fadeTimeLeft = theElement.fadeInTime;
	}
	else
	{
		theElement.style.opacity = '1';
		theElement.style.filter = 'alpha(opacity=100)';
		theElement.fadeState = 'fadingOut';
		theElement.fadeTimeLeft = theElement.fadeOutTime;
	}

	fadeIt( 0, uID );
}

function fadeInEle ( theElement, fadeInTime, fadeOutAuto, fadeOutTime, fadeOutAction )
{
	fadeEle( 'in', theElement, fadeInTime, fadeOutAuto, fadeOutTime, fadeOutAction );
}

function fadeOutEle ( theElement, fadeOutTime, fadeOutAction )
{
	fadeEle( 'out', theElement, 0, 0, fadeOutTime, fadeOutAction );
}

function fadeMessage ( uID, theMessage, theClass )
{
	// create messageBox
	var messageBox = document.createElement( 'span' );

	messageBox.innerHTML = theMessage;
	messageBox.fadeState = -1;
	messageBox.id = 'mbr_' + uID;
	messageBox.onclick = function() { clearTimeout( this.currentFadeTimeout ); this.style.opacity = '0'; this.style.filter = 'alpha(opacity=0)'; this.style.display = 'none'; this.parentNode.removeChild( this ); };

	if ( !theClass || !theClass.length )
	{
		messageBox.className = 'message_box';
	}
	else
	{
		messageBox.className = 'message_box ' + theClass;
	}

	document.body.appendChild( messageBox );

	var messageWidth = messageBox.offsetWidth;
	var messageHeight = messageBox.offsetHeight;

	// position box
	messageBox.style.position = 'absolute';
	messageBox.style.display = 'block';

	// screen scroll
	var scrolledX, scrolledY;

	if ( self.pageYoffset )
	{
		scrolledX = self.pageXoffset;
		scrolledY = self.pageYoffset;
	}
	else if ( document.documentElement && document.documentElement.scrollTop )
	{
		scrolledX = document.documentElement.scrollLeft;
		scrolledY = document.documentElement.scrollTop;
	}
	else if ( document.body )
	{
		scrolledX = document.body.scrollLeft;
		scrolledY = document.body.scrollTop;
	}

	// viewport dimensions
	var centerX, centerY;

	if ( self.innerHeight )
	{
		centerX = self.innerWidth;
		centerY = self.innerHeight;
	}
	else if ( document.documentElement && document.documentElement.clientHeight )
	{
		centerX = document.documentElement.clientWidth;
		centerY = document.documentElement.clientHeight;
	}
	else if ( document.body )
	{
		centerX = document.body.clientWidth;
		centerY = document.body.clientHeight;
	}

	var leftoffset = scrolledX + ( centerX - messageWidth ) / 2;
	var topoffset = scrolledY + ( centerY - messageHeight ) / 2;
	messageBox.style.top = topoffset + 'px';
	messageBox.style.left = leftoffset + 'px';

	fadeInEle( messageBox, 500, 1000, 1000, 'remove' );
}

/* end fading code */

function setInnerHTML ( el, theHTML )
{
	if ( el )
	{
		if ( el.childNodes )
		{
			while ( el.childNodes.length > 0 )
			{
				removeChildSafe( el.childNodes[el.childNodes.length - 1] );
			}
		}

		el.innerHTML = theHTML;
	}
}

function getValueByID ( eleID )
{
	var theEle = document.getElementById( eleID );
	if ( theEle )
	{
		if ( theEle.type == 'select-one' )
		{
			if ( theEle.selectedIndex >= 0 )
			{
				return theEle.options[theEle.selectedIndex].value;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return theEle.value;
		}
	}
}

function changeProduct ( theSelect )
{
	var theProduct = theSelect.options[theSelect.selectedIndex].value;

	var websitesOnly = document.getElementById( 'filter_websites_only' );
	if ( theProduct == 5 )
	{
		websitesOnly.className = 'search_filter';
	}
	else
	{
		websitesOnly.className = 'hidden';
	}

	var quickPubOnly = document.getElementById( 'filter_quick_publishers_only' );
	var permFilter = document.getElementById( 'filter_perm' );
	if ( theProduct == 1 || theProduct == 4 )
	{
		quickPubOnly.className = 'search_filter';
		permFilter.className = 'search_filter';
	}
	else
	{
		quickPubOnly.className = 'hidden';
		permFilter.className = 'hidden';
	}

	if ( theProduct == 1 )
	{
		var emdeddedOnly = document.getElementById( 'filter_embedded_only' );
		if ( emdeddedOnly )
		{
			embeddedOnly.className = 'search_filter';
		}
	}
	else
	{
		quickPubOnly.className = 'hidden';
	}

	var hideLiveDeals = document.getElementById( 'filter_hide_live_deals' );
	var hideNonresponding = document.getElementById( 'filter_hide_nonresponding' );
	if ( theProduct == 5 )
	{
		hideLiveDeals.className = 'hidden';
		hideNonresponding.className = 'hidden';
	}
	else
	{
		hideLiveDeals.className = 'search_filter';
		hideNonresponding.className = 'search_filter';
	}

	var disableLiveOutlines = document.getElementById( 'filter_disable_live_outlines' );
	if ( theProduct == 6 )
	{
		disableLiveOutlines.className = 'search_filter';
	}
	else
	{
		disableLiveOutlines.className = 'hidden';
	}
}

Ajax.Responders.register
(
	{
		on403: function ( )
		{
			alert( sessionTimedOutMsg );
		},
		onFailure: function()
		{
			alert( unknownAjaxErrorMsg );
		}
	}
);

function getCart ( )
{
	new Ajax.Request
	(
		'ajax/get_cart.php',
		{
			method: 'get',
			parameters: 'contents&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				var theCart = document.getElementById( 'full_cart' );
				setInnerHTML( document.getElementById( 'cart_content' ), transport.responseText );
				theCart.style.display = 'block';
				fadeInEle( theCart, 500, 0, 0, false );
			}
		}
	);
}

function closeCart ( )
{
	var theCart = document.getElementById( 'full_cart' );
	fadeOutEle( theCart, 500, 'hide' );
}

function updateCartOverview ( )
{
	new Ajax.Request
	(
		'ajax/get_cart.php',
		{
			method: 'get',
			parameters: 'overview&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				setInnerHTML( document.getElementById( 'cart_link' ), transport.responseText );
			}
		}
	);
/*
	new Ajax.Updater
	(
		'cart_link',
		'ajax/get_cart.php',
		{
			method: 'get',
			parameters: 'overview&account_id=' + account_id
		}
	);
*/
}

var advBanners = [];
var webZones = [];
function previewBanner ( rowID )
{
	var theAdSelect = document.getElementById( 'ad_id_' + rowID );
	var currentAd = theAdSelect.options[theAdSelect.selectedIndex].value;
	if ( !advBanners[rowID] )
	{
		alert( 'no advBanners[rowID] for ' + rowID );
	}
	var theAd = advBanners[rowID][currentAd];
	return overlib( "<a href='http://" + theAd.adv_banner_target_url + "' target='_blank'><img src='" + theAd.image_path + "' border='0' width='" + theAd.banner_size_width + "' height='" + theAd.banner_size_height + "'></a>", STICKY, CAPTION, theAd.adv_banner_name, MOUSEOFF );
}

function updateZones ( rowID )
{
	var theAdSelect = document.getElementById( 'ad_id_' + rowID );
	var currentAd = theAdSelect.options[theAdSelect.selectedIndex].value;
	var theAd = advBanners[rowID][currentAd];

	var zoneSelect = document.getElementById( 'website_placement_id_' + rowID );
	var theZones = webZones[rowID];

	var availableZone = -1;

	for ( var i = 0; i < zoneSelect.options.length; i++ )
	{
		if ( theAd.banner_size_id == theZones[zoneSelect.options[i].value] )
		{
			if ( availableZone < 0 || zoneSelect.selectedIndex == i )
			{
				availableZone = i;
			}
			zoneSelect.options[i].disabled = false;
			zoneSelect.options[i].className = '';
		}
		else
		{
			zoneSelect.options[i].disabled = 'disabled';
			zoneSelect.options[i].className = 'disabled';
		}
	}

	if ( availableZone >= 0 )
	{
		zoneSelect.selectedIndex = availableZone;
	}

	updateBannerTooltip( rowID );
}

function updateBannerLocPreview ( rowID )
{
	var theSelect = document.getElementById( 'website_placement_id_' + rowID );

	var locationLabel = theSelect.options[theSelect.selectedIndex].text;

	// names are in format: name - price zone | width x height
	var theParts = locationLabel.split( '|' );
	var zoneName = locationLabel.substr( theParts[0].length - 2, 1 ).toLowerCase();

	var imageName = '';

	if ( zoneName === 0 )
	{
		imageName = 'banner-zones-small';
	}
	else
	{
		imageName = 'banner-zone-' + zoneName + '-small';
	}

	document.getElementById( 'bloc_zone_img_' + rowID ).src = 'images/zones/' + imageName + '.jpg';
}

function updateBannerTooltip ( rowID )
{
	var theSelect = document.getElementById( 'ad_id_' + rowID );
	if ( theSelect.options )
	{
		var theToolTipHeading = document.getElementById( 'banner_preview_heading_' + rowID );
		var theToolTipImg = document.getElementById( 'banner_preview_img_' + rowID );

		theToolTipHeading.innerHTML = advBanners[rowID][theSelect.options[theSelect.selectedIndex].value]['adv_banner_name'];
		theToolTipImg.src = advBanners[rowID][theSelect.options[theSelect.selectedIndex].value]['image_path'];
		theToolTipImg.width = advBanners[rowID][theSelect.options[theSelect.selectedIndex].value]['banner_size_width'];
		theToolTipImg.height = advBanners[rowID][theSelect.options[theSelect.selectedIndex].value]['banner_size_height'];
	}
}

function disableProduct ( rowID, adID )
{
	var theSelect = document.getElementById( 'ad_id_' + rowID );

	for ( var i in theSelect.options )
	{
		if ( theSelect.options[i].value == adID )
		{
			theSelect.options[i].disabled = 'disabled';
		}
	}
}

function processUpdateCartIcon ( responseText, prtWebsiteID, rowID )
{
	var isSingle = true;
	var theOutput = '';

	if ( currentProduct == 5 )
	{
		theOutput = document.getElementById( 'search_results' );
		isSingle = false;
	}
	else
	{
		theOutput = document.getElementById( 'row' + rowID );
	}
	var iconSpans = theOutput.getElementsByTagName( 'span' );
	for ( var i in iconSpans )
	{
		if ( iconSpans[i].className == 'in_cart_img_' + prtWebsiteID )
		{
			iconSpans[i].innerHTML = responseText;
			if ( isSingle )
			{
				return;
			}
		}
	}
}

function updateCartIconCall ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	new Ajax.Request
	(
		'ajax/update_cart_icon.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&row_id=' + rowID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processUpdateCartIcon( transport.responseText, prtWebsiteID, rowID );
			}
		}
	);
}

function updateCartIcon ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	if ( rowID >= 1000 )
	{
		rowID = Math.floor( rowID / 1000 );
	}

	var theImg = document.getElementById( 'ic' + rowID );

	var classPattern = /.*ic([0-9]+)id([0-9]+)r([0-9]+)l([0-9]*)/;

	var theParts = theImg.className.match( classPattern );

	var imgArray = document.getElementById( 'search_results' ).getElementsByTagName( 'img' );

	if ( theParts && parseInt( theParts[1], 10 ) )
	{
		for ( var i = 0; i < imgArray.length; i++ )
		{
			if ( imgArray[i].className && imgArray[i].className.indexOf( 'ic' + theParts[1] ) >= 0 )
			{
				imgArray[i].src = 'images/icons/working.gif';

				var tmpParts = imgArray[i].className.match( classPattern );

				updateCartIconCall( tmpParts[2], tmpParts[4], tmpParts[3] );
			}
		}
	}
	else
	{
		updateCartIconCall( prtWebsiteID, linkintxtWebpageKeywordID, rowID );
	}
}

function toggleCartPackageRenew ( cartItemID )
{
	var theCheckbox = document.getElementById( 'item_package_renew_' + cartItemID );

	new Ajax.Request
	(
		'ajax/set_renew.php',
		{
			method: 'post',
			parameters: 'account_id=' + account_id + '&cart_item_id=' + cartItemID + '&value=' + ( theCheckbox.checked ? 1 : 0 ),
			onSuccess: function ( transport )
			{
				if ( transport.responseText.length )
				{
					eval( transport.responseText );
				}
			}
		}
	);
}

var actionSet = [];

function hideActionRow ( rowID )
{
	document.getElementById( 'actions_' + rowID ).style.display = 'none';
	document.getElementById( 'action_icon_' + rowID ).src = 'images/icons/zipper.gif';
}

function processAddToCart ( responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID )
{
	var success = false;
	var existed = false;
	var addMessage = '';

	eval( responseText );

	if ( !addMessage.length )
	{
		if ( success )
		{
			addMessage = cartAddOKMsg;
		}
		else if ( existed )
		{
			addMessage = cartAddExistsMsg;
		}
		else
		{
			addMessage = cartAddErrorMsg;
		}
	}

	if ( success )
	{
		updateCartIcon( prtWebsiteID, linkintxtWebpageKeywordID, rowID );
		fadeMessage( rowID + 'cart', addMessage, '' );

		hideActionRow( rowID );
		actionSet[rowID] = false;

		updateCartOverview();
		disableProduct( rowID, adID );
	}
	else if ( existed )
	{
		fadeMessage( rowID + 'cart', addMessage, 'warning' );
	}
	else
	{
		fadeMessage( rowID + 'cart', addMessage, 'error' );
	}

	theButton.className = 'submit';
}

function addToCartGeneral ( theButton, prtWebsiteID, rowID, isPerm )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	var websitePlacementID = getValueByID( 'website_placement_id_' + rowID );

	if ( !parseInt( websitePlacementID, 10 ) )
	{
		alert( noLocationSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_to_cart.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&website_placement_id=' + websitePlacementID + '&account_id=' + account_id + ( isPerm ? '&perm=1' : '' ),
			onSuccess: function ( transport )
			{
				processAddToCart( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

function confirmBuyNow ( linkintxtWebpageKeywordID, prtWebsiteID, adID, websitePlacementID, rowID, isPerm )
{
	var b1 = document.getElementById( 'bn_payment_1' );
	var b2 = document.getElementById( 'bn_payment_2' );
	var b3 = document.getElementById( 'bn_payment_3' );
	var b4 = document.getElementById( 'bn_payment_4' );
	
	var paymentType = ( b1 && b1.checked ? 1 : ( b2 && b2.checked ? 2 : ( b3 && b3.checked ? 3 : ( b4 && b4.checked ? 4 : 0 ) ) ) );

	var custom_price = document.getElementById( 'custom_price' );
	var advCreditActivityNoteType = document.getElementById( 'adv_credit_activity_note_type' );

	if ( !paymentType )
	{
		alert( selectBuyMowPaymentMethod );
		return;
	}

	var tmp = new Ajax.Request
	(
		'ajax/buy_now.php',
		{
			method: 'post',
			parameters: 'payment_type=' + paymentType + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&website_placement_id=' + websitePlacementID + '&row_id=' + rowID + '&adv_credit_activity_note_type=' + ( advCreditActivityNoteType ? '&adv_credit_activity_note_type=' + advCreditActivityNoteType.value : '' ) + '&account_id=' + account_id + ( isPerm ? '&perm=1' : '' ) + ( custom_price ? '&custom_price=' + custom_price.value : '' ),
			onSuccess: function ( transport )
			{
				processBuyNow( transport.responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, false, rowID );
			}
		}
	);
}

function cancelBuyNow ( )
{
	var confirmBox = document.getElementById( 'confirm_box' );
	confirmBox.style.opacity = '0';
	confirmBox.style.filter = 'alpha(opacity=0)';
	confirmBox.style.display = 'none';
}

function processBuyNow ( responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID )
{
	var confirmation = false;
	var purchase = false;
	var theType = '';

	var theParts = extractScript( responseText );
	var theHTML = theParts.html;

	if ( theParts.javascript )
	{
		eval( theParts.javascript );
	}

	if ( confirmation )
	{
		var confirmBox = document.getElementById( 'confirm_box' );
		confirmBox.innerHTML = theHTML;
		confirmBox.style.display = '';

		fadeInEle( confirmBox, 1000, 0, 0, false );
	}
	else
	{
		if ( purchase )
		{
			cancelBuyNow();
			updateActiveIcon( prtWebsiteID, linkintxtWebpageKeywordID, rowID );
		}
		fadeMessage( rowID + 'buynow', theHTML, theType );
	}

	if ( theButton )
	{
		theButton.className = 'submit buy_now';
	}
}

function buyNowGeneral ( theButton, prtWebsiteID, rowID, isPerm )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	var websitePlacementID = getValueByID( 'website_placement_id_' + rowID );

	if ( !parseInt( websitePlacementID, 10 ) )
	{
		alert( noLocationSelectedMsg );
		return;
	}

	theButton.className = 'submit buy_now working';

	var tmp = new Ajax.Request
	(
		'ajax/buy_now.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&website_placement_id=' + websitePlacementID + '&row_id=' + rowID + '&account_id=' + account_id + ( isPerm ? '&perm=1' : '' ),
			onSuccess: function ( transport )
			{
				processBuyNow( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit buy_now';
			}
		}
	);
}

function processUpdateWishListIcon ( responseText, prtWebsiteID, rowID )
{
	var isSingle = true;
	var theOutput = '';

	if ( currentProduct == 5 )
	{
		theOutput = document.getElementById( 'search_results' );
		isSingle = false;
	}
	else
	{
		theOutput = document.getElementById( 'row' + rowID );
	}
	var iconSpans = theOutput.getElementsByTagName( 'span' );
	for ( var i in iconSpans )
	{
		if ( iconSpans[i].className == 'wish_list_img_' + prtWebsiteID )
		{
			iconSpans[i].innerHTML = responseText;
			if ( isSingle )
			{
				return;
			}
		}
	}
}

function updateWishListIconCall ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	new Ajax.Request
	(
		'ajax/update_wish_list_icon.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&row_id=' + rowID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processUpdateWishListIcon( transport.responseText, prtWebsiteID, rowID );
			}
		}
	);
}

function updateWishListIcon ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	if ( rowID >= 1000 )
	{
		rowID = Math.floor( rowID / 1000 );
	}

	var theImg = document.getElementById( 'wl' + rowID );

	var classPattern = /.*wl([0-9]+)id([0-9]+)r([0-9]+)l([0-9]*)/;

	var theParts = theImg.className.match( classPattern );
	var imgArray = document.getElementById( 'search_results' ).getElementsByTagName( 'img' );

	if ( parseInt( theParts[1], 10 ) )
	{
		for ( var i = 0; i < imgArray.length; i++ )
		{
			if ( imgArray[i].className && imgArray[i].className.indexOf( 'wl' + theParts[1] ) >= 0 )
			{
				var tmpParts = imgArray[i].className.match( classPattern );

				imgArray[i].src = 'images/icons/working.gif';

				updateWishListIconCall( tmpParts[2], tmpParts[4], tmpParts[3] );
			}
		}
	}
	else
	{
		updateWishListIconCall ( prtWebsiteID, linkintxtWebpageKeywordID, rowID );
	}
}

function processAddToWishList ( responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID )
{
	var success = false;
	var existed = false;
	var addMessage = '';

	eval( responseText );

	if ( !addMessage.length )
	{
		if ( success )
		{
			addMessage = wishListAddOKMsg;
		}
		else if ( existed )
		{
			addMessage = wishListAddExistsMsg;
		}
		else
		{
			addMessage = wishListAddErrorMsg;
		}
	}
	if ( success )
	{
		fadeMessage( rowID + 'wl', addMessage, '' );
		updateWishListIcon( prtWebsiteID, linkintxtWebpageKeywordID, rowID );

		hideActionRow( rowID );
		actionSet[rowID] = false;
	}
	else if ( existed )
	{
		fadeMessage( rowID + 'wl', addMessage, 'warning' );
	}
	else
	{
		fadeMessage( rowID + 'wl', addMessage, 'error' );
	}
	theButton.className = 'submit';
}

function toggleNewWishlist ( rowID )
{
	var theSelect = document.getElementById( 'adv_wish_list_id_' + rowID );
	var theValue = theSelect.options[theSelect.selectedIndex].value;
	var theInput = document.getElementById( 'adv_wish_list_new_' + rowID );

	if ( theValue == 'create_new_wishlist_xxx' )
	{
		theInput.className = ( theInput.value == 'enter name' ? 'grey' : '' );
	}
	else
	{
		theInput.className = 'hidden' + ( theInput.value == 'enter name' ? ' grey' : '' );
	}
}

function addToWishListGeneral ( theButton, prtWebsiteID, rowID, isPerm )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	var websitePlacementID = getValueByID( 'website_placement_id_' + rowID );

	if ( !parseInt( websitePlacementID, 10 ) )
	{
		alert( noLocationSelectedMsg );
		return;
	}

	var advWishListID = getValueByID( 'adv_wish_list_id_' + rowID );
	var advWishListNewName = getValueByID( 'adv_wish_list_new_name_' + rowID );

	if ( advWishListID == 'create_new_wishlist_xxx' )
	{
		if ( !advWishListNewName.length || advWishListNewName == 'enter name' )
		{
			alert( noWishListNameMsg );
			return;
		}
	}
	else if ( !parseInt( advWishListID, 10 ) && advWishListID != 'default' )
	{
		alert( noWishListSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_to_wishlist.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&website_placement_id=' + websitePlacementID + '&adv_wish_list_id=' + advWishListID + '&account_id=' + account_id + '&name=' + advWishListNewName + ( isPerm ? '&perm=1' : '' ),
			onSuccess: function ( transport )
			{
				processAddToWishList( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

function addToCartLinkInTxt ( theButton, prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_to_cart.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&ad_id=' + adID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processAddToCart( transport.responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

function processUpdateActiveIcon ( responseText, prtWebsiteID, rowID )
{
	var isSingle = true;
	var theOutput = '';

	if ( currentProduct == 5 )
	{
		theOutput = document.getElementById( 'search_results' );
		isSingle = false;
	}
	else
	{
		theOutput = document.getElementById( 'row' + rowID );
	}
	var iconSpans = theOutput.getElementsByTagName( 'span' );
	for ( var i in iconSpans )
	{
		if ( iconSpans[i].className == 'active_img_' + prtWebsiteID )
		{
			iconSpans[i].innerHTML = responseText;
			if ( isSingle )
			{
				return;
			}
		}
	}
}

function updateActiveIconCall ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	new Ajax.Request
	(
		'ajax/update_active_icon.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&row_id=' + rowID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processUpdateActiveIcon( transport.responseText, prtWebsiteID, rowID );
			}
		}
	);
}

function updateActiveIcon ( prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	if ( rowID >= 1000 )
	{
		rowID = Math.floor( rowID / 1000 );
	}

	var theImg = document.getElementById( 'ac' + rowID );

	var classPattern = /.*ac([0-9]+)id([0-9]+)r([0-9]+)l([0-9]*)/;

	var theParts = theImg.className.match( classPattern );
	var imgArray = document.getElementById( 'search_results' ).getElementsByTagName( 'img' );

	if ( parseInt( theParts[1], 10 ) )
	{
		for ( var i = 0; i < imgArray.length; i++ )
		{
			if ( imgArray[i].className && imgArray[i].className.indexOf( 'ac' + theParts[1] ) >= 0 )
			{
				var tmpParts = imgArray[i].className.match( classPattern );

				imgArray[i].src = 'images/icons/working.gif';

				updateActiveIconCall( tmpParts[2], tmpParts[4], tmpParts[3] );
			}
		}
	}
	else
	{
		updateActiveIconCall ( prtWebsiteID, linkintxtWebpageKeywordID, rowID );
	}
}

function buyNowLinkInTxt ( theButton, prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	theButton.className = 'submit buy_now working';

	var tmp = new Ajax.Request
	(
		'ajax/buy_now.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&ad_id=' + adID + '&row_id=' + rowID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processBuyNow( transport.responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit buy_now';
			}
		}
	);
}

function addToWishListLinkInTxt ( theButton, prtWebsiteID, linkintxtWebpageKeywordID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	var advWishListID = getValueByID( 'adv_wish_list_id_' + rowID );
	var advWishListNewName = getValueByID( 'adv_wish_list_new_name_' + rowID );

	if ( advWishListID == 'create_new_wishlist_xxx' )
	{
		if ( !advWishListNewName.length || advWishListNewName == 'enter name' )
		{
			alert( noWishListNameMsg );
			return;
		}
	}
	else if ( !parseInt( advWishListID, 10 ) && advWishListID != 'default' )
	{
		alert( noWishListSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_to_wishlist.php',
		{
			method: 'post',
			parameters: '&adv_wish_list_id=' + advWishListID + '&prt_website_id=' + prtWebsiteID + '&linkintxt_webpage_keyword_id=' + linkintxtWebpageKeywordID + '&ad_id=' + adID + '&account_id=' + account_id + '&name=' + advWishListNewName,
			onSuccess: function ( transport )
			{
				processAddToWishList( transport.responseText, linkintxtWebpageKeywordID, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

function addToCartLinkPost ( theButton, prtWebsiteID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_to_cart.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processAddToCart( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

function buyNowLinkPost ( theButton, prtWebsiteID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	theButton.className = 'submit buy_now working';

	var tmp = new Ajax.Request
	(
		'ajax/buy_now.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&row_id=' + rowID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processBuyNow( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit buy_now';
			}
		}
	);
}

function addToWishListLinkPost ( theButton, prtWebsiteID, rowID )
{
	var adID = getValueByID( 'ad_id_' + rowID );
	if ( !parseInt( adID, 10 ) )
	{
		alert( noAdSelectedMsg );
		return;
	}

	var advWishListID = getValueByID( 'adv_wish_list_id_' + rowID );
	var advWishListNewName = getValueByID( 'adv_wish_list_new_name_' + rowID );

	if ( advWishListID == 'create_new_wishlist_xxx' )
	{
		if ( !advWishListNewName.length || advWishListNewName == 'enter name' )
		{
			alert( noWishListNameMsg );
			return;
		}
	}
	else if ( !parseInt( advWishListID, 10 ) && advWishListID != 'default' )
	{
		alert( noWishListSelectedMsg );
		return;
	}

	theButton.className = 'submit working';

	new Ajax.Request
	(
		'ajax/add_to_wishlist.php',
		{
			method: 'post',
			parameters: 'adv_wish_list_id=' + advWishListID + '&prt_website_id=' + prtWebsiteID + '&ad_id=' + adID + '&account_id=' + account_id + '&name=' + advWishListNewName,
			onSuccess: function ( transport )
			{
				processAddToWishList( transport.responseText, false, prtWebsiteID, adID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

// here 
function processMoveToWishList ( responseText, theSelect, cartItemID, productID )
{
	var success = false;
	var isRestore = false;
	var isDeleted = false;
	var theMessage = '';
	var totalProductCount = '';
	var totalCount = '';
	var productPrice = '';
	var productProratedTotal = '';
	var productSavingsTotal = '';
	var totalPrice = '';
	var proratedTotal = '';
	var monthlyTotal = '';
	var savingsTotal = '';
	var grandTotal = '';

	theSelect.className = 'wishlist';

	eval( responseText ); // all vars populated via ajax return

	if ( success )
	{
		fadeMessage( 'wlmv' + cartItemID, theMessage, '' );

		if ( !isDeleted )
		{
			setInnerHTML( document.getElementById( 'product_prorated_' + productID ), productProratedTotal );
			var productSavingsTotalCell = document.getElementById( 'product_savings_' + productID );
			if ( productSavingsTotalCell )
			{
				setInnerHTML( productSavingsTotalCell, productSavingsTotal );
				setInnerHTML( document.getElementById( 'product_package_' + productID ), productPackageTotal );
			}
			setInnerHTML( document.getElementById( 'product_monthly_' + productID ), productMonthlyTotal );
			setInnerHTML( document.getElementById( 'total_prorated' ), proratedTotal );
			var savingsTotalCell = document.getElementById( 'total_savings' );
			if ( savingsTotalCell )
			{
				setInnerHTML( savingsTotalCell, savingsTotal );
				setInnerHTML( document.getElementById( 'total_package' ), packageTotal );
			}
			setInnerHTML( document.getElementById( 'total_monthly' ), monthlyTotal );
			var grandTotalCell = document.getElementById( 'grand_total' );
			if ( grandTotalCell )
			{
				setInnerHTML( grandTotalCell, grandTotal );
			}
			var paymentOption2 = document.getElementById( 'payment_option_2_amount' );
			if ( paymentOption2 )
			{
				setInnerHTML( paymentOption2, grandTotal.replace( '$', '' ) );
			}
			var paymentOption3 = document.getElementById( 'payment_option_3_amount' );
			if ( paymentOption3 )
			{
				setInnerHTML( paymentOption3, grandTotal.replace( '$', '' ) );
			}
			var paymentOption4 = document.getElementById( 'payment_option_4_amount' );
			if ( paymentOption4 )
			{
				setInnerHTML( paymentOption4, grandTotal.replace( '$', '' ) );
			}
			var paymentOption5 = document.getElementById( 'payment_option_5_amount' );
			if ( paymentOption5 )
			{
				setInnerHTML( paymentOption5, grandTotal.replace( '$', '' ) );
			}
			var paymentOption2sub = document.getElementById( 'payment_option_2_subscription' );
			if ( paymentOption2sub )
			{
				setInnerHTML( paymentOption2sub, productMonthlyTotal.replace( '$', '' ) );
			}
			var paymentOption3sub = document.getElementById( 'payment_option_3_subscription' );
			if ( paymentOption3sub )
			{
				setInnerHTML( paymentOption3sub, productMonthlyTotal.replace( '$', '' ) );
			}
			var totalProdctCell = document.getElementById( 'total_product_num_' + productID );
			if ( totalProdctCell )
			{
				setInnerHTML( totalProdctCell, totalProductCount );
			}
			var totalCountCell = document.getElementById( 'total_num' );
			if ( totalCountCell )
			{
				setInnerHTML( totalCountCell, totalCount );
			}

		}

		var theRow = document.getElementById( 'row_' + cartItemID );

		theRow.parentNode.removeChild( theRow );
	}
	else if ( theMessage )
	{
		fadeMessage( 'wlmv' + cartItemID, theMessage, 'error' );
	}
	else
	{
		alert( unknownAjaxErrorMsg );
	}
}

function moveToWishList ( theSelect, cartItemID, productID )
{
	if ( theSelect.selectedIndex )
	{
		theSelect.className = 'wishlist working';

		new Ajax.Request
		(
			'ajax/move_to_wish_list.php',
			{
				method: 'post',
				parameters: 'adv_wish_list_id=' + theSelect.options[theSelect.selectedIndex].value + '&cart_item_id=' + cartItemID + '&account_id=' + account_id,
				onSuccess: function ( transport )
				{
					processMoveToWishList( transport.responseText, theSelect, cartItemID, productID );
				},
				onFailure: function ( )
				{
					theSelect.className = 'wishlist';
				}
			}
		);
	}
}

function moveDeletedToWishList ( theSelect, cartItemID, productID )
{
	if ( theSelect.selectedIndex )
	{
		theSelect.className = 'wishlist working';

		new Ajax.Request
		(
			'ajax/move_to_wish_list.php',
			{
				method: 'post',
				parameters: 'adv_wish_list_id=' + theSelect.options[theSelect.selectedIndex].value + '&cart_item_id=' + cartItemID + '&account_id=' + account_id + '&deleted=1',
				onSuccess: function ( transport )
				{
					processMoveToWishList( transport.responseText, theSelect, cartItemID, productID );
				},
				onFailure: function ( )
				{
					theSelect.className = 'wishlist';
				}
			}
		);
	}
}

var optionalStrings = [];

function setOptional ( theCustom, cartItemID, theValue )
{
	if ( !optionalStrings[cartItemID] )
	{
		optionalStrings[cartItemID] = [];
	}

	optionalStrings[cartItemID][theCustom] = theValue;
}

function getOptional ( theCustom, cartItemID )
{
	if ( optionalStrings[cartItemID] )
	{
		return optionalStrings[cartItemID][theCustom];
	}

	return '';
}

function saveAdvAdTitle(cartItemID)
{
	var advAdTitle = document.getElementById( 'adv_ad_title_' + cartItemID ).value;
	
	if ( advAdTitle.length < 3 )
	{
		alert('Please provide at least 3 characters for your anchor text');
	}
	else
	{
		document.getElementById( 'new_adv_ad_title_' + cartItemID ).style.display = 'none';
		document.getElementById( 'new_adv_ad_url_' + cartItemID ).style.display = 'inline';
	}
}

function createTextAd(cartItemID)
{
	var discountCode = '';

	if ( discount_code )
	{
		discountCode = '&code=' + discount_code;
	}
	
	var advAdTitle = document.getElementById( 'adv_ad_title_' + cartItemID ).value;
	var advAdUrl = document.getElementById( 'adv_ad_url_' + cartItemID ).value;

	if ( advAdUrl.length < 5 )
	{
		alert('Please provide at least 5 characters for your url');
	}
	else
	{
		new Ajax.Request
		(
			'ajax/update_cart.php',
			{
				method: 'post',
				parameters: 'cart_item_id=' + cartItemID + '&create_text_ad=1' + '&adv_ad_title=' + escape( advAdTitle ) + '&adv_ad_url=' + advAdUrl + '&account_id=' + account_id + discountCode,
				onSuccess: function ( transport )
				{
					processUpdateCart( transport.responseText, cartItemID, 'ad_id', 1 );
				}
			}
		);
	}	
}

function saveOptional ( theCustom, cartItemID, theInput )
{
	var theValue = theInput.value;

	theInput.className = 'working';

	new Ajax.Request
	(
		'ajax/update_optional.php',
		{
			method: 'post',
			parameters: 'custom=' + theCustom + '&cart_item_id=' + cartItemID + '&value=' + escape( theValue ) + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				var success = false;
				eval( transport.responseText );
				if ( success )
				{
					setOptional( theCustom, cartItemID, theValue );
					theInput.className = 'saved';
				}
				else
				{
					theInput.className = 'changed';
					// alert( 'Error' );
				}
			},
			onFailure: function ( )
			{
				theInput.className = 'changed';
			}
		}
	);
}

function updateOptional ( theCustom, cartItemID, theInput )
{
	var theValue = theInput.value;
	if ( theValue.length > 250 )
	{
		theInput.value = theValue.substring( 0, 250 );
		alert( maxChar250Msg );
	}
	if ( theValue != getOptional( theCustom, cartItemID ) )
	{
		theInput.className = 'changed';
	}
}

function toggleOptional ( cartItemID )
{
	var theRow = document.getElementById( 'optional_' + cartItemID );
	var theIcon = document.getElementById( 'optional_icon_' + cartItemID );

	if ( theRow.style.display == 'none' )
	{
		theRow.style.display = '';
		theIcon.src = 'images/icons/optional_text_open.gif';
	}
	else
	{
		// gonna need to make this clear out the existing value from session
		theRow.style.display = 'none';
		theIcon.src = 'images/icons/optional_text.gif';
	}
}

var haveHidden = true; // should be some hidden on first load.
if ( !defaultFields )
{
	var defaultFields = [];
}

function setClearFields ( theField, clearCheck, clearValue, isDefault )
{
	var theImage = document.getElementById( 'clear_' + theField );
	if ( clearCheck.length )
	{
		var hasContent;
		eval( 'hasContent = ( ' + clearCheck + ' )' );
		if ( !isDefault && ( !hasContent || !clearValue.length ) )
		{
			// field is empty and can be removed
			theImage.alt = hideMsg;
			theImage.src = 'images/icons/hide.gif';
		}
		else if ( clearValue.length )
		{
			theImage.alt = clearMsg;
			theImage.src = 'images/icons/clear.gif';
		}
	}
	else if ( clearValue.length )
	{
		theImage.alt = clearMsg;
		theImage.src = 'images/icons/clear.gif';
	}
	theImage.title = theImage.alt;
}

function setHaveHidden ( newValue )
{
	haveHidden = newValue;
	var toggleForm = document.getElementById( 'toggle_form' );
	if ( haveHidden )
	{
		toggleForm.innerHTML = moreOptionsMsg;
	}
	else
	{
		toggleForm.innerHTML = basicOptionsMsg;
	}
}

function hideBox ( theField, clearCheck, clearValue, isDefault )
{
	var theFieldDiv = document.getElementById( 'filter_' + theField );
	if ( clearCheck.length )
	{
		var hasContent;
		eval( 'hasContent = ( ' + clearCheck + ' )' );
		if ( !isDefault && ( !hasContent || !clearValue.length ) )
		{
			theFieldDiv.className = 'search_filter_hidden';
			setHaveHidden( true );
		}
		else if ( clearValue.length )
		{
			eval( clearValue );
		}
	}
	else if ( clearValue.length )
	{
		eval( clearValue );
	}

	setClearFields( theField, clearCheck, clearValue, isDefault );
}

function toggleForm ( )
{
	var searchFields = document.getElementById( 'search_filters' ).getElementsByTagName( 'div' );
	for ( var i in searchFields )
	{
		if ( haveHidden && searchFields[i].className == 'search_filter_hidden' )
		{
			searchFields[i].className = 'search_filter';
		}
		else if ( !haveHidden && searchFields[i].className == 'search_filter' && !defaultFields[searchFields[i].id] )
		{
			searchFields[i].className = 'search_filter_hidden';
		}
	}
	setHaveHidden( !haveHidden );
}

function extractScript ( theHTML )
{
	var startScript = theHTML.indexOf( "<script type='text/javascript'>" );
	var endScript = theHTML.indexOf( "</script>" );
	var newHTML = '';
	var theScript = '';
	if ( startScript >= 0 && endScript > 0 )
	{
		theScript = theHTML.substring( startScript + 31, endScript );
		newHTML = theHTML.substring( 0, startScript ) + theHTML.substring( endScript + 9 );
		if ( newHTML.indexOf( "<script type='text/javascript'>" ) >= 0 )
		{
			var subProcess = extractScript( newHTML );
			newHTML = subProcess.html;
			theScript += subProcess.javascript;
		}
	}
	else
	{
		newHTML = theHTML;
	}

	return {'html':newHTML,'javascript':theScript};
}

function processActions ( responseText, rowID )
{
	var theParts = extractScript( responseText );
	var theHTML = theParts.html;

	setInnerHTML( document.getElementById( 'action_data_' + rowID ), theHTML );

	actionSet[rowID] = true;

	if ( theParts.javascript )
	{
		eval( theParts.javascript );
	}
}

function toggleActions ( rowID, websiteID, keywordID )
{
	var theRow = document.getElementById( 'actions_' + rowID );
	if ( theRow.style.display == 'none' )
	{
		theRow.style.display = '';
		document.getElementById( 'action_icon_' + rowID ).src = 'images/icons/zipper_up.gif';

		new Ajax.Request
		(
			'ajax/search_action.php',
			{
				method: 'post',
				parameters: 'row_id=' + rowID + '&prt_website_id=' + websiteID + '&linkintxt_webpage_keyword_id=' + keywordID + '&account_id=' + account_id,
				onSuccess: function ( transport )
				{
					processActions( transport.responseText, rowID );
				}
			}
		);
	}
	else
	{
		hideActionRow( rowID );
	}
}

function getSubaccountIcons ( rowID, websiteID, keywordID )
{
	var theRow = document.getElementById( 'sub_acct_icon_' + rowID );
	
	theRow.style.display = 'none';

	document.getElementById( 'sub_acct_loading_' + rowID ).className = '';

	new Ajax.Request
	(
		'ajax/get_subaccount_icons.php',
		{
			method: 'post',
			parameters: 'row_id=' + rowID + '&prt_website_id=' + websiteID + '&linkintxt_webpage_keyword_id=' + keywordID + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				document.getElementById( 'sub_acct_loading_' + rowID ).className = 'hidden';
				
				setInnerHTML( document.getElementById( 'sub_acct_content_' + rowID ), transport.responseText);
			}
		}
	);
}

var searchResults;
var searchResultsResponse;

function processSearchResults ( responseText )
{
	searchResultsResponse = responseText;

	for ( var i = 0; i < actionSet.length; i++ )
	{
		actionSet[i] = false;
	}

	if ( !searchResults )
	{
		searchResults = document.getElementById( 'search_results' );
	}
	fadeOutEle( searchResults, 250, 'hide' );
	setTimeout( 'showSearchResults()', 250 );
}

function sortBy ( sortByType )
{
	var newSort;

	switch ( sortByType )
	{
		case 'url':
			if ( currentSort == 1 )
			{
				newSort = 2;
			}
			else
			{
				newSort = 1;
			}
			break;
		case 'linkrank':
			if ( currentSort == 11 )
			{
				newSort = 12;
			}
			else
			{
				newSort = 11;
			}
			break;
		case 'gpr':
			// 7, 8
			if ( currentSort == 7 )
			{
				newSort = 8;
			}
			else
			{
				newSort = 7;
			}
			break;
		case 'price':
			// 21, 22
			if ( currentSort == 21 )
			{
				newSort = 22;
			}
			else
			{
				newSort = 21;
			}
			break;
		case 'deals':
			// 19, 20
			if ( currentSort == 19 )
			{
				newSort = 20;
			}
			else
			{
				newSort = 19;
			}
			break;
	}

	var sortByEle = document.getElementById( 'sort_by' );
	sortByEle.selectedIndex = newSort;
	getResults();
}

function showSearchResults ( )
{
	setInnerHTML( searchResults, searchResultsResponse );
	fadeInEle( searchResults, 500, 0, 0, false );
}

/* Autocompleter */
var arr_autocompleters = [];
var last_autocompleter = 0;

// this is called whenever we either a) don't have a list, or b) need more new words (and expect to get them)
function getWordList ( )
{
	if ( this.list_type == 'sub_accounts' )
	{
		if ( !this.word_list )
		{
			this.word_list = [];
		}

		if(this.input.id == 'sub_search2')
		{
			var theSelect = document.getElementById( 'transfer_to' );
		}
		else
		{
			var theSelect = document.getElementById( 'managed_account_id' );
		}

		var i;
		var x;

		for ( var i = 0; i < theSelect.options.length; i++ )
		{
			var the_word = theSelect.options[i].text;
			var the_value = theSelect.options[i].value;

			// lets see if we already had this word, as we don't want it in the list twice
			var pre_exist = false;
			for ( x = 0; x < this.word_list.length; x++ )
			{
				if ( the_word === this.word_list[x] )
				{
					pre_exist = true;
				}
			}

			if ( !pre_exist )
			{ // new word, add it (and if it has a comment, that too) to our list(s)
				if ( !this.value_list )
				{
					this.value_list = [];
				}
				this.value_list[the_word] = the_value;

				this.word_list[this.word_list.length] = the_word;
			}
		}

		// ok, we asked for 10 times the max in new words. if we got less than that, then we've no reason to ask for more
		this.no_more_suggestions = true;

		// store our value as last value, as we've processed it as such.
		this.last_value = this.input.value;
		// refilter our list now we have new words
		this.filterWordList();
		// and display our filtered list.
		// note: the previous filter may have decided we didn't have enough words and gone back for more. if so we'll be back here as soon as ajax
		// returns. Assuming this might take more than the split second it usually does, we'll show what we can now:
		this.displaySuggest();
		return;
	}

	// make sure our ajax is available (either finished or unused)
	if ( this.ajax.readyState == 4 || this.ajax.readyState === 0 )
	{
		// this was probably called via a timeout, which we've tracked. As this has been called, that timeout is now gone, so we'll clear our record of it
		this.getting_wordlist_timeout = false;

		// as we are on a timeout, the value may have been emptied. if so, we don't need to check.
		if ( this.input.value )
		{
			// format up our request. we have one ajax script handler for this, that takes the type of list we want, the search term, and the number of
			// results we want.
			// We ask for 10 times the results, ad this will hopefully prevent us asking every time this changes. Basically a form of precache with somewhere better than 1/26th accuracy.

			var get_request = '/advertiser/ajax/autocomplete.php?t=' + this.list_type + '&s=' + this.input.value + '&n=' + ( this.max_suggestions * 10 );
			// as we are using current value, which may not be the value at time this was set to call, we'll make sure to set it as the last value processed
			this.last_value = this.input.value;

			// open up our ajax for preperation
			this.ajax.open( "GET", get_request, true );

			// when this request comes back we want it to be handled with this function, and to reference our autocompleter so it can process properly
			this.ajax.onreadystatechange = new Function ( "handleCallback( " + this.num + " )" );

			// send the actual request, which we set up when we opened.
			this.ajax.send( null );
		}
	}
	else
	{
		// we're unable to use the ajax atm as it is busy, so let's retry in 10 milliseconds
		// we could figure out a way to cancel the current ajax request I guess, but this will do the trick nicely.
		this.getting_wordlist_timeout = setTimeout( "arr_autocompleters[" + this.num + "].getWordList()", 10 );
	}
}

// run each time the value changes
function filterWordList ( )
{
	// if we don't have a list, we'll go get one.
	if ( !this.word_list )
	{
		this.getWordList();
		return;
	}

	// toss any previous filtered list, we're filtering for something new.
	this.filtered_list = [];
	this.filtered_comment_list = [];
	var x = 0;
	var i = 0;

	// go through our list of words, which will be sorted (from ajax) with the more important matches for any given string at the top.
	for ( i = 0; i < this.word_list.length; i++ )
	{
		// does the word contain our current value at the start of it?
		if ( ( this.list_type != 'sub_accounts' && !this.word_list[i].toLowerCase().indexOf( this.input.value.toLowerCase() ) ) || ( this.list_type == 'sub_accounts' && this.word_list[i].toLowerCase().indexOf( this.input.value.toLowerCase() ) >= 0 ) )
		{
			// add word to filtered list
			this.filtered_list[x] = this.word_list[i];

			// if there is a corrosponding comment for this word, we'll put it in the matching slot on our comment list
			if ( this.comment_list && this.comment_list[x] && this.comment_list[x].length )
			{
				this.filtered_comment_list[x] = this.comment_list[i];
			}

			// increment our filtered list position
			x++;
		}
	}

	// if there is only one option and it's the one that is already in the text box, don't show any.
	if ( this.filtered_list.length == 1 && this.filtered_list[0].toLowerCase() == this.input.value.toLowerCase() )
	{
		this.filtered_list = [];
	}

	// we've finished refiltering our list, set the amount of suggestions we got:
	this.suggestions = this.filtered_list.length;

	// if we don't have enough suggestions to fill out our list, and we didn't get the max amount of possible words on our last call, we'll get more
	if ( this.suggestions < this.max_suggestions && !this.no_more_suggestions )
	{
		// just in case we already queued a list request, we need to clear it as we're searching for something new now
		if ( this.getting_wordlist_timeout )
		{
			clearTimeout( this.getting_wordlist_timeout );
		}

		// get more words
		this.getWordList();
	}

}

function removeSuggestions ( )
{
	// clean out old values

	while ( this.suggest_options.firstChild )
	{
		this.suggest_options.removeChild( this.suggest_options.firstChild );
	}

	this.suggestions = 0;
}

function selectOption ( selection )
{
	if ( this.list_type == 'sub_accounts' )
	{
		if(this.input.id == 'sub_search2')
		{
			var theSelect = document.getElementById( 'transfer_to' );
		}
		else
		{
			var theSelect = document.getElementById( 'managed_account_id' );
		}

		for ( var i = 0; i < theSelect.options.length; i++ )
		{
			var tmp_val = theSelect.options[i].value;
			var tmp_nod = selection.firstChild.firstChild.nodeValue;
			var tmp_chk = this.value_list[selection.firstChild.firstChild.nodeValue];
			
			if ( theSelect.options[i].value == this.value_list[selection.firstChild.firstChild.nodeValue] )
			{
				if(this.input.id == 'sub_search2')
				{
					theSelect.selectedIndex = i;
					
					theSelect.style.display = '';
					this.input.style.display = 'none';
				}
				else
				{
					theSelect.selectedIndex = i;
					theSelect.form.submit();
				}
				
				return;
			}
		}

		alert( 'error' );
	}
	else
	{
		this.input.value = selection.firstChild.firstChild.nodeValue;
	}
	this.removeSuggestions();
}

function displaySuggest ( )
{
	// if we are displaying anything old, lets get rid of it
	this.removeSuggestions();

	var pos = 0;
	var i;
	for ( i = 0; i < this.filtered_list.length; i++ )
	{
		if ( pos++ < this.max_suggestions )
		{
			var the_word = this.filtered_list[i];
			var suggestion = document.createElement( 'li' );
			var value_span = document.createElement( 'span' );
			value_span.className = 'hidden';
			suggestion.appendChild( value_span );
			var the_value = document.createTextNode( the_word );
			value_span.appendChild( the_value );
			var startPos = 0;
			if ( this.list_type == 'sub_accounts' )
			{
				var startPos = the_word.toLowerCase().indexOf( this.input.value.toLowerCase() );
				if ( startPos > 0 )
				{
					var pre_suggest = document.createTextNode( the_word.substring( 0, startPos ) );
					suggestion.appendChild( pre_suggest );
				}
			}
			var the_span = document.createElement( 'span' );
			the_span.className = 'hilite';
			suggestion.appendChild( the_span );
			var the_keyword = document.createTextNode( the_word.substring( startPos, startPos + this.input.value.length ) );
			the_span.appendChild( the_keyword );
			var the_suggest = document.createTextNode( the_word.substring( startPos + this.input.value.length ) );
			suggestion.appendChild( the_suggest );
			if ( this.filtered_comment_list[i] && this.filtered_comment_list[i].length )
			{
				var comment_div = document.createElement( 'div' );
				comment_div.innerHTML = this.filtered_comment_list[i];
				suggestion.appendChild( comment_div );
			}
			this.suggest_options.appendChild( suggestion );
			suggestion.auto_complete = this;
			suggestion.onclick = function() { this.auto_complete.selectOption( this ); };
			suggestion.onmouseover = function() { this.className = 'hover'; };
			suggestion.onmouseout = function() { this.className = ''; };
			this.suggestions++;
		}
	}

	// attach the suggest options after the input
	this.wrapper.appendChild( this.suggest_options );
}

function handleUpdate( )
{
	if ( this.list_type == 'sub_accounts' )
	{
		this.input.className = 'text_input';

		if ( this.input.value == defaultSubValue )
		{
			this.input.value = '';
		}
	}

	if ( this.input.value )
	{
		// if the value is not an extension of our last value, then we want to reset the words.
		if ( !this.last_value.length || this.input.value.indexOf( this.last_value ) )
		{
			this.no_more_suggestions = false;
		}

		// if the value has changed (usually the case, but this might be an on-focus) then lets re-filter.
		if ( this.value !== this.last_value )
		{
			this.filterWordList();
		}

		// if we have any suggestions, show them
		if ( this.suggestions )
		{
			this.displaySuggest();
		}
	}
	else if ( this.suggestions ) // if no value we want no suggestions, obviously
	{
		this.removeSuggestions();
	}

	// after we're done here, we have taken the appropriate action for the current word, whatever it may be. so we store it to prevent re-processing.
	this.last_value = this.input.value;
}

function getXmlHttpRequestObject ( )
{
	if ( window.XMLHttpRequest )
	{
		return new XMLHttpRequest();
	}
	else if ( window.ActiveXObject )
	{
		return new ActiveXObject( 'Microsoft.XMLHTTP' );
	}
	else
	{
		return false;
	}
}


// needs to be rewritten to work in ie6, but that's not critical.
function autoCompleter ( the_input, list_type, max_suggestions, num_autocompleter )
{
	if ( window.XMLHttpRequest )
	{
		this.ajax = new XMLHttpRequest();
	}
	else
	{
		return;
	}
	this.num = num_autocompleter;
	// prep ajax
	this.ajax.autocomplete = this;
	// get input width
	var input_width = the_input.offsetWidth;
	var input_height = the_input.offsetHeight;
	// make a wrapper div
	var wrapper_div = document.createElement( 'DIV' );
	// make the wrapper display same width as the input
	wrapper_div.style.width = input_width + 'px';
	// set wrapper class for rest of values
	if ( list_type == 'sub_accounts' )
	{
		wrapper_div.className = 'autocomplete_wrapper';
	}
	else
	{
		wrapper_div.className = 'autocompleter';
	}
	// put the wrapper right before the input
	the_input.parentNode.insertBefore( wrapper_div, the_input );
	// store the wrapper
	this.wrapper = wrapper_div;
	// remove the input
	the_input.parentNode.removeChild( the_input );
	// and put it in the wrapper
	wrapper_div.appendChild( the_input );
	// make a display container
	var suggest_options = document.createElement( 'ul' );
	suggest_options.className = 'suggest_options';
	// set it's position
	suggest_options.style.top = input_height + 'px';
	// note: don't attach the list jhere.
	// keep a pointer to the suggest options
	this.suggest_options = suggest_options;
	// turn of browser autocomplete
	the_input.autocomplete = 'off';
	// initialise output tracking
	this.last_value = '';
	// configure max suggestions (could be a passed var)
	this.max_suggestions = Math.max( 1, max_suggestions );
	// initiliase available selections
	this.suggestions = 0;
	// set up methods
	this.handleUpdate = handleUpdate;
	this.list_type = list_type;
	this.getWordList = getWordList;
	this.filterWordList = filterWordList;
	this.displaySuggest = displaySuggest;
	this.selectOption = selectOption;
	this.removeSuggestions = removeSuggestions;
	// assign the input
	this.input = the_input;
	// we want to handleUpdate in case there is a pre-existing value in the input (ie ff prefill)
	// we cant run it just yet, however, as we're in the middle of creating the autocompleter object. thus we'll delay it a split second.
	the_input.onfocus = new Function ( "arr_autocompleters[" + this.num + "].handleUpdate()" );
	the_input.onkeyup = new Function ( "arr_autocompleters[" + this.num + "].handleUpdate()" );
	the_input.onblur = new Function ( "setTimeout( \"arr_autocompleters[" + this.num + "].removeSuggestions()\", 500 )" );
	if ( this.list_type != 'sub_accounts' )
	{
		setTimeout( "arr_autocompleters[" + this.num + "].handleUpdate();", 10 );
		setTimeout( "arr_autocompleters[" + this.num + "].input.focus()", 10 );
	}
}

function autoComplete ( the_input, list_type, max_suggestions )
{
	if ( !ajaxSupported )
	{
		return;
	}
	if ( typeof the_input == 'string')
	{
		the_input = document.getElementById( the_input );
	}

	if ( !the_input || the_input.type != 'text' )
	{
		alert( 'AutoComplete: Input is invalid' );
		return;
	}

	if ( the_input.auto_complete )
	{
		return;
	}

	last_autocompleter++;
	the_input.auto_complete = last_autocompleter;
	arr_autocompleters[last_autocompleter] = new autoCompleter( the_input, list_type, max_suggestions, last_autocompleter );
}

// our ajax calls use this when they come back.
function handleCallback ( autocompleter_num )
{
	// make sure we're using teh right ajax, and right autocompleter
	var autocompleter = arr_autocompleters[autocompleter_num];

	// check if we're back and finished.
	if ( autocompleter.ajax.readyState == 4 )
	{
		// our response text is just a plaintext of options seperated by newlines
		var new_options = autocompleter.ajax.responseText.split( "\n" );

		// if we don't have a list yet, we better initialise
		if ( !autocompleter.word_list )
		{
			autocompleter.word_list = [];
		}

		var i;
		var x;
		// go through all the (new?) words we got. should be 10 times as many as we need, so we're prepped a little in advance.
		// out list can be sorted in any way by the php script, but is probably some sort of popularity, this means that the extras
		// words returned are more likely to be the ones we'll want next anyway.
		for ( i = 0; i < new_options.length; i++ )
		{
			var the_word = new_options[i];
			var the_comment = '';

			// using a basic method of tagging comments into word lines. We could(should?) use XML, but this is so much simpler, and
			// as it is for inhouse use, not worried about compability for others to use.
			if ( the_word.indexOf( '<>' ) > -1 ) {
				// we have a comment, lets chop it off and store it.
				var arr_parts = the_word.split( '<>', 2 );
				the_word = arr_parts[0];
				the_comment = arr_parts[1];
			}

			if ( the_word.indexOf( '::' ) > -1 ) {
				// we have a comment, lets chop it off and store it.
				var arr_parts = the_word.split( '::', 2 );
				the_word = arr_parts[1];
				the_value = arr_parts[0];
			}

			// lets see if we already had this word, as we don't want it in the list twice
			var pre_exist = false;
			for ( x = 0; x < autocompleter.word_list.length; x++ )
			{
				if ( the_word === autocompleter.word_list[x] )
				{
					pre_exist = true;
				}
			}

			if ( !pre_exist )
			{ // new word, add it (and if it has a comment, that too) to our list(s)
				if ( the_comment.length ) {
					if ( !autocompleter.comment_list )
					{
						autocompleter.comment_list = [];
					}
					autocompleter.comment_list[autocompleter.word_list.length] = the_comment;
				}
				if ( the_value.length ) {
					if ( !autocompleter.value_list )
					{
						autocompleter.value_list = [];
					}
					autocompleter.value_list[the_word] = the_value;
				}
				autocompleter.word_list[autocompleter.word_list.length] = the_word;
			}
		}

		// ok, we asked for 10 times the max in new words. if we got less than that, then we've no reason to ask for more
		autocompleter.no_more_suggestions = ( new_options.length < autocompleter.max_suggestions * 10 );

		// store our value as last value, as we've processed it as such.
		autocompleter.last_value = autocompleter.input.value;
		// refilter our list now we have new words
		autocompleter.filterWordList();
		// and display our filtered list.
		// note: the previous filter may have decided we didn't have enough words and gone back for more. if so we'll be back here as soon as ajax
		// returns. Assuming this might take more than the split second it usually does, we'll show what we can now:
		autocompleter.displaySuggest();
	}
}

function addMessage ( the_message )
{
	var message_div = document.createElement( 'DIV' );
	message_div.innerHTML = the_message;
	document.getElementsByTagName( 'body' )[0].appendChild( message_div );
}

/* end autocompleter */

var helpIcon;
var helpInput;
var helpDiv;

function getHelpStatus ( )
{
	if ( !helpIcon )
	{
		helpIcon = document.getElementById( 'help_icon' );
	}

	if ( !helpInput )
	{
		helpInput = document.getElementById( 'show_search_help' );
	}

	if ( !helpDiv )
	{
		helpDiv = document.getElementById( 'help_div' );
	}

	return ( helpInput.value == 'true' || helpInput.value == 1 ) ? 1 : 0;
}

function helpIconOver ( )
{
	var helpStatus = getHelpStatus();

	if ( helpStatus )
	{
		helpIcon.src = 'images/icons/help_active_over.gif';
	}
	else
	{
		helpIcon.src = 'images/icons/help_over.gif';
	}
}

function helpIconOut ( )
{
	var helpStatus = getHelpStatus();

	if ( helpStatus )
	{
		helpIcon.src = 'images/icons/help_active.gif';
	}
	else
	{
		helpIcon.src = 'images/icons/help.gif';
	}
}

function toggleHelp ( )
{
	var helpStatus = !getHelpStatus();

	helpInput.value = helpStatus ? 1 : 0;

	setSession( 'show_search_help=' + helpInput.value );

	helpIconOut();

	if ( helpStatus )
	{
		fadeInEle( helpDiv, 1000, 0, 0, false );
		helpDiv.className = '';
	}
	else
	{
		fadeOutEle( helpDiv, 1000, 'hide' );
	}
}

function displayHelp ( theField )
{
	if ( getHelpStatus() )
	{
		helpDiv.innerHTML = helpTexts[theField];
	}
}

function changeAd ( rowID )
{
	document.getElementById( 'ad_name_' + rowID ).style.display = 'none';
	document.getElementById( 'ad_select_' + rowID ).style.display = 'inline';
}

function changeLoc ( rowID )
{
	document.getElementById( 'location_' + rowID ).style.display = 'none';
	document.getElementById( 'loc_select_' + rowID ).style.display = 'inline';
}

function showCustomMonthlyPriceDropDown ( rowID )
{
	document.getElementById( 'outter_span_cart_item_custom_price_' + rowID ).style.display = 'none';
	document.getElementById( 'dropdown_span_cart_item_custom_price_' + rowID ).style.display = 'inline';
}

function restoreAd ( rowID )
{
	document.getElementById( 'ad_name_' + rowID ).style.display = 'inline';
	document.getElementById( 'ad_select_' + rowID ).style.display = 'none';
	
	var theEle1 = document.getElementById( 'new_adv_ad_title_' + rowID );
	
	if ( theEle1 )
	{
		document.getElementById( 'new_adv_ad_title_' + rowID ).style.display = 'none';
	}

	var theEle2 = document.getElementById( 'new_adv_ad_url_' + rowID );
	
	if ( theEle2 )
	{
		document.getElementById( 'new_adv_ad_url_' + rowID ).style.display = 'none';
	}
}

function restoreLoc ( rowID )
{
	document.getElementById( 'location_' + rowID ).style.display = 'inline';
	document.getElementById( 'loc_select_' + rowID ).style.display = 'none';
}

function restoreCustomMonthlyPrice ( rowID )
{
	document.getElementById( 'outter_span_cart_item_custom_price_' + rowID ).style.display = 'inline';
	document.getElementById( 'dropdown_span_cart_item_custom_price_' + rowID ).style.display = 'none';
}

function processUpdateCart ( responseText, cartItemID, theType, productID )
{
	var newLine = responseText.indexOf( '\n' );
	if ( newLine < 0 )
	{
		alert( unknownAjaxErrorMsg );
		return;
	}

	var theStatus = parseInt( responseText.substring( 0, newLine ), 10 );
	var theHTML = responseText.substring( newLine + 1 );

	if ( !theStatus )
	{
		fadeMessage( cartItemID + theType, theHTML, 'warning' );

		if ( theType == 'ad_id' )
		{
			restoreAd( cartItemID );
		}
		else if ( theType == 'website_placement_id' && productID != 6 )
		{
			restoreLoc( cartItemID );
		}
		else if ( theType == 'cart_item_custom_price' )
		{
			restoreCustomMonthlyPrice( cartItemID );
		}

		return;
	}

	newLine = theHTML.indexOf( '\n' );
	if ( newLine < 0 )
	{
		alert( unknownAjaxErrorMsg );
		return;
	}

	var theMessage = theHTML.substring( 0, newLine );
	theHTML = theHTML.substring( newLine + 1 );

	var targetCell;

	if ( theType == 'ad_id' )
	{
		targetCell = 'ad_cell_' + cartItemID;
	}
	else if ( theType == 'website_placement_id' && productID != 6 )
	{
		targetCell = 'loc_cell_' + cartItemID;

		newLine = theHTML.indexOf( '\n' );
		var itemProratedPrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemPackagePrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemSavingsAmount = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemMonthlyPrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productProratedTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productPackageTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productSavingsTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productMonthlyTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var proratedTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var packageTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var savingsTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var monthlyTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		if ( newLine < 0 )
		{
			alert( unknownAjaxErrorMsg );
			return;
		}
		var grandTotal = theHTML.substring( 0, newLine );

		theHTML = theHTML.substring( newLine + 1 );

		setInnerHTML( document.getElementById( 'item_prorated_' + cartItemID ), itemProratedPrice );
		var savingsCell = document.getElementById( 'item_savings_' + cartItemID );
		if ( savingsCell )
		{
			setInnerHTML( savingsCell, itemSavingsAmount );
			setInnerHTML( document.getElementById( 'item_package_' + cartItemID ), itemPackagePrice );
		}
		setInnerHTML( document.getElementById( 'item_monthly_' + cartItemID ), itemMonthlyPrice );
		setInnerHTML( document.getElementById( 'product_prorated_' + productID ), productProratedTotal );
		var productSavingsTotalCell = document.getElementById( 'product_savings_' + productID );
		if ( productSavingsTotalCell )
		{
			setInnerHTML( productSavingsTotalCell, productSavingsTotal );
			setInnerHTML( document.getElementById( 'product_package_' + productID ), productPackageTotal );
		}
		setInnerHTML( document.getElementById( 'product_monthly_' + productID ), productMonthlyTotal );
		setInnerHTML( document.getElementById( 'total_prorated' ), proratedTotal );
		var savingsTotalCell = document.getElementById( 'total_savings' );
		if ( savingsTotalCell )
		{
			setInnerHTML( savingsTotalCell, savingsTotal );
			setInnerHTML( document.getElementById( 'total_package' ), packageTotal );
		}
		setInnerHTML( document.getElementById( 'total_monthly' ), monthlyTotal );
		
		var grandTotalCell = document.getElementById( 'grand_total' );
		if ( grandTotalCell )
		{
			setInnerHTML( grandTotalCell, grandTotal );
		}
		
		var paymentOption2 = document.getElementById( 'payment_option_2_amount' );
		if ( paymentOption2 )
		{
			setInnerHTML( paymentOption2, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption3 = document.getElementById( 'payment_option_3_amount' );
		if ( paymentOption3 )
		{
			setInnerHTML( paymentOption3, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption4 = document.getElementById( 'payment_option_4_amount' );
		if ( paymentOption4 )
		{
			setInnerHTML( paymentOption4, grandTotal.replace( '$', '' ) );
		}

		var paymentOption5 = document.getElementById( 'payment_option_5_amount' );
		if ( paymentOption5 )
		{
			setInnerHTML( paymentOption5, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption2sub = document.getElementById( 'payment_option_2_subscription' );
		if ( paymentOption2sub )
		{
			setInnerHTML( paymentOption2sub, productMonthlyTotal.replace( '$', '' ) );
		}
		
		var paymentOption3sub = document.getElementById( 'payment_option_3_subscription' );
		if ( paymentOption3sub )
		{
			setInnerHTML( paymentOption3sub, productMonthlyTotal.replace( '$', '' ) );
		}
	}
	else if ( theType == 'cart_item_custom_price' )
	{
		targetCell = false;

		newLine = theHTML.indexOf( '\n' );
		var itemProratedPrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemPackagePrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemSavingsAmount = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var itemMonthlyPrice = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productProratedTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productPackageTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productSavingsTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var productMonthlyTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var proratedTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var packageTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var savingsTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		var monthlyTotal = theHTML.substring( 0, newLine );
		theHTML = theHTML.substring( newLine + 1 );
		newLine = theHTML.indexOf( '\n' );
		if ( newLine < 0 )
		{
			alert( unknownAjaxErrorMsg );
			return;
		}
		var grandTotal = theHTML.substring( 0, newLine );

		setInnerHTML( document.getElementById( 'item_prorated_' + cartItemID ), itemProratedPrice );
		
		var savingsCell = document.getElementById( 'item_savings_' + cartItemID );
		if ( savingsCell )
		{
			setInnerHTML( savingsCell, itemSavingsAmount );
			setInnerHTML( document.getElementById( 'item_package_' + cartItemID ), itemPackagePrice );
		}
		setInnerHTML( document.getElementById( 'item_monthly_' + cartItemID ), itemMonthlyPrice );
		
		setInnerHTML( document.getElementById( 'product_prorated_' + productID ), productProratedTotal );

		var productSavingsTotalCell = document.getElementById( 'product_savings_' + productID );
		if ( productSavingsTotalCell )
		{
			setInnerHTML( productSavingsTotalCell, productSavingsTotal );
			setInnerHTML( document.getElementById( 'product_package_' + productID ), productPackageTotal );
		}
		
		setInnerHTML( document.getElementById( 'product_monthly_' + productID ), productMonthlyTotal );

		setInnerHTML( document.getElementById( 'total_prorated' ), proratedTotal );
		
		var savingsTotalCell = document.getElementById( 'total_savings' );
		if ( savingsTotalCell )
		{
			setInnerHTML( savingsTotalCell, savingsTotal );
			setInnerHTML( document.getElementById( 'total_package' ), packageTotal );
		}
		
		setInnerHTML( document.getElementById( 'total_monthly' ), monthlyTotal );
		
		var grandTotalCell = document.getElementById( 'grand_total' );
		if ( grandTotalCell )
		{
			setInnerHTML( grandTotalCell, grandTotal );
		}
		
		var paymentOption2 = document.getElementById( 'payment_option_2_amount' );
		if ( paymentOption2 )
		{
			setInnerHTML( paymentOption2, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption3 = document.getElementById( 'payment_option_3_amount' );
		if ( paymentOption3 )
		{
			setInnerHTML( paymentOption3, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption4 = document.getElementById( 'payment_option_4_amount' );
		if ( paymentOption4 )
		{
			setInnerHTML( paymentOption4, grandTotal.replace( '$', '' ) );
		}

		var paymentOption5 = document.getElementById( 'payment_option_5_amount' );
		if ( paymentOption5 )
		{
			setInnerHTML( paymentOption5, grandTotal.replace( '$', '' ) );
		}
		
		var paymentOption2sub = document.getElementById( 'payment_option_2_subscription' );
		if ( paymentOption2sub )
		{
			setInnerHTML( paymentOption2sub, productMonthlyTotal.replace( '$', '' ) );
		}
		
		var paymentOption3sub = document.getElementById( 'payment_option_3_subscription' );
		if ( paymentOption3sub )
		{
			setInnerHTML( paymentOption3sub, productMonthlyTotal.replace( '$', '' ) );
		}
	}

	if ( targetCell )
	{
		setInnerHTML( document.getElementById( targetCell ), theHTML );
	}

	fadeMessage( cartItemID + theType, theMessage, '' );
}

var discount_code;

function updateCartItem ( cartItemID, theType, theValue, productID )
{
	var discountCode = '';

	if ( discount_code )
	{
		discountCode = '&code=' + discount_code;
	}

	new Ajax.Request
	(
		'ajax/update_cart.php',
		{
			method: 'post',
			parameters: 'cart_item_id=' + cartItemID + '&' + theType + '=' + theValue + '&account_id=' + account_id + discountCode,
			onSuccess: function ( transport )
			{
				processUpdateCart( transport.responseText, cartItemID, theType, productID );
			}
		}
	);
}

function selectAd ( cartItemID )
{
	var theSelect = document.getElementById( 'ad_id_' + cartItemID );
	if ( theSelect.selectedIndex )
	{
		if( theSelect.options[theSelect.selectedIndex].value == -8 )
		{
			document.getElementById( 'new_adv_ad_title_' + cartItemID ).style.display = 'inline';
			document.getElementById( 'new_adv_ad_url_' + cartItemID ).style.display = 'none';
			document.getElementById( 'ad_select_' + cartItemID ).style.display = 'none';
		}
		else
		{
			updateCartItem( cartItemID, 'ad_id', theSelect.options[theSelect.selectedIndex].value, false );
		}
	}
}

function selectLoc ( cartItemID, productID )
{
	var theSelect = document.getElementById( 'website_placement_id_' + cartItemID );
	if ( theSelect.selectedIndex )
	{
		updateCartItem( cartItemID, 'website_placement_id', theSelect.options[theSelect.selectedIndex].value, productID );
	}
}

function selectCustomMonthlyPrice ( cartItemID, productID )
{
	var theSelect = document.getElementById( 'cart_item_custom_price_' + cartItemID );

	if ( theSelect.options[theSelect.selectedIndex].value >= 6 )
	{
		updateCartItem( cartItemID, 'cart_item_custom_price', theSelect.options[theSelect.selectedIndex].value, productID );
	}
}

function selectLPD ( cartItemID, theDate )
{
	var use_ts = theDate.getTime();

	var now_date = new Date;
	var now_ts = now_date.getTime();
	now_ts -= now_ts % 86400000;

	var offset = Math.floor( ( use_ts - now_ts ) / 86400000 );

	updateCartItem( cartItemID, 'website_placement_id', offset, 6 );
}

var itemsRemoved = [];

function processRemoveFromCart ( responseText, cartItemID, productID )
{
	var success = false;
	var isRestore = false;
	var theMessage = '';
	var totalProductCount = '';
	var totalCount = '';
	var productPrice = '';
	var productProratedTotal = '';
	var productSavingsTotal = '';
	var totalPrice = '';
	var proratedTotal = '';
	var savingsTotal = '';
	var grandTotal = '';
	var linkMsg = '';

	eval( responseText ); // all vars populated via ajax return

	if ( success )
	{
		fadeMessage( 'rmv' + cartItemID, theMessage, '' );

		setInnerHTML( document.getElementById( 'product_prorated_' + productID ), productProratedTotal );
		var productSavingsTotalCell = document.getElementById( 'product_savings_' + productID );
		if ( productSavingsTotalCell )
		{
			setInnerHTML( productSavingsTotalCell, productSavingsTotal );
			setInnerHTML( document.getElementById( 'product_package_' + productID ), productPackageTotal );
		}
		setInnerHTML( document.getElementById( 'product_monthly_' + productID ), productMonthlyTotal );
		setInnerHTML( document.getElementById( 'total_prorated' ), proratedTotal );
		var savingsTotalCell = document.getElementById( 'total_savings' );
		if ( savingsTotalCell )
		{
			setInnerHTML( savingsTotalCell, savingsTotal );
			setInnerHTML( document.getElementById( 'total_package' ), packageTotal );
		}
		setInnerHTML( document.getElementById( 'total_monthly' ), monthlyTotal );
		var grandTotalCell = document.getElementById( 'grand_total' );
		if ( grandTotalCell )
		{
			setInnerHTML( grandTotalCell, grandTotal );
		}
		var paymentOption2 = document.getElementById( 'payment_option_2_amount' );
		if ( paymentOption2 )
		{
			setInnerHTML( paymentOption2, grandTotal.replace( '$', '' ) );
		}
		var paymentOption3 = document.getElementById( 'payment_option_3_amount' );
		if ( paymentOption3 )
		{
			setInnerHTML( paymentOption3, grandTotal.replace( '$', '' ) );
		}
		var paymentOption4 = document.getElementById( 'payment_option_4_amount' );
		if ( paymentOption4 )
		{
			setInnerHTML( paymentOption4, grandTotal.replace( '$', '' ) );
		}
		var paymentOption5 = document.getElementById( 'payment_option_5_amount' );
		if ( paymentOption5 )
		{
			setInnerHTML( paymentOption5, grandTotal.replace( '$', '' ) );
		}
		var paymentOption2sub = document.getElementById( 'payment_option_2_subscription' );
		if ( paymentOption2sub )
		{
			setInnerHTML( paymentOption2sub, productMonthlyTotal.replace( '$', '' ) );
		}
		var paymentOption3sub = document.getElementById( 'payment_option_3_subscription' );
		if ( paymentOption3sub )
		{
			setInnerHTML( paymentOption3sub, productMonthlyTotal.replace( '$', '' ) );
		}

		var totalProdctCell = document.getElementById( 'total_product_num_' + productID );
		if ( totalProdctCell )
		{
			setInnerHTML( totalProdctCell, totalProductCount );
		}

		var totalCountCell = document.getElementById( 'total_num' );
		if ( totalCountCell )
		{
			setInnerHTML( totalCountCell, totalCount );
		}

		var removeLink = document.getElementById( 'remove_' + cartItemID );

		removeLink.parentNode.innerHTML = linkMsg;

		var isDimmed = false;
		if ( isRestore )
		{
			itemsRemoved[cartItemID] = false;
		}
		else
		{
			isDimmed = true;
			itemsRemoved[cartItemID] = true;
		}

		var theRow = document.getElementById( 'row_' + cartItemID );

		var theCells = theRow.getElementsByTagName( 'td' );

		for ( var i  = 0; i < theCells.length; i++ )
		{
			if ( theCells[i].className != 'remove' )
			{
				if ( isDimmed )
				{
					elementAddClass( theCells[i], 'dimmed' );
				}
				else
				{
					elementRemoveClass( theCells[i], 'dimmed' );
				}
			}

			theSelect = document.getElementById( 'wl_select_' + cartItemID );
			if ( theSelect )
			{
				if ( isDimmed )
				{
					elementAddClass( theSelect, 'dimmed' );
					theSelect.disabled = 'disabled';
				}
				else
				{
					elementRemoveClass( theSelect, 'dimmed' );
					theSelect.disabled = '';
				}
			}
		}

	}
	else if ( theMessage )
	{
		fadeMessage( 'rmv' + cartItemID, theMessage, 'error' );
	}
	else
	{
		alert( unknownAjaxErrorMsg );
	}
}

function removeItem ( cartItemID, productID )
{
	var postFields = 'cart_item_id=' + cartItemID;

	if ( itemsRemoved[cartItemID] )
	{
		postFields += '&restore=1';
	}

	new Ajax.Request
	(
		'ajax/remove_from_cart.php',
		{
			method: 'post',
			parameters: postFields + '&account_id=' + account_id,
			onSuccess: function ( transport )
			{
				processRemoveFromCart( transport.responseText, cartItemID, productID );
			}
		}
	);
}

function getDiscount ( discountCodeID )
{
	window.location = '?adv_menu_selection=adv_cart&discount_id=' + discountCodeID;
}

var blockAjax;

function processBlock ( responseText, rowID, blockType )
{
	var successMsg = '';
	var errorMsg = '';

	eval( responseText );

	if ( successMsg.length )
	{
		fadeMessage( rowID + 'block', successMsg, '' );
		if ( blockType == 1 )
		{
			getResults( currentPage );
		}
		else // 2
		{
			hideActionRow( rowID );
			document.getElementById( 'row' + rowID ).style.display = 'none';
		}
	}
	else if ( errorMsg.length )
	{
		fadeMessage( rowID + 'block', errorMsg, 'warning' );
	}
	else
	{
		fadeMessage( rowID + 'block', blockFailedMsg, 'warning' );
	}
}

function blockPartner ( rowID, websiteID )
{
	if ( confirm( blockPartnerMsg ) )
	{
		var postFields = 'type=1&prt_website_id=' + websiteID;

		new Ajax.Request
		(
			'ajax/block.php',
			{
				method: 'post',
				parameters: postFields + '&account_id=' + account_id,
				onSuccess: function ( transport )
				{
					processBlock( transport.responseText, rowID, 1 );
				}
			}
		);
	}
}

function blockWebsite ( rowID, websiteID )
{
	if ( confirm( blockWebsiteMsg ) )
	{
		var postFields = 'type=2&prt_website_id=' + websiteID;

		new Ajax.Request
		(
			'ajax/block.php',
			{
				method: 'post',
				parameters: postFields + '&account_id=' + account_id,
				onSuccess: function ( transport )
				{
					processBlock( transport.responseText, rowID, 2 );
				}
			}
		);
	}
}

function toggleFeatured ( )
{
	var featuredInfo = document.getElementById( 'featured_info' );
	var featuredRow = document.getElementById( 'featured' );

	if ( featuredInfo.style.display == 'none' )
	{
		featuredInfo.style.display = '';
		featuredRow.className = 'opened';
	}
	else
	{
		featuredInfo.style.display = 'none';
		featuredRow.className = '';
	}
}

var toolTips = [];

Object.prototype.getElementWidth = function ()
{
	if ( typeof this.clip !== 'undefined' )
	{
		return this.clip.width;
	}
	else
	{
		if ( this.style && this.style.pixelWidth )
		{
			return this.style.pixelWidth;
		}
		else
		{
			return this.offsetWidth;
		}
	}
}

function showToolTip ( tipID, toLeft )
{
	var theTip = document.getElementById( tipID );

	theTip.style.display = 'inline';

	if ( toLeft && !theTip.widthSet )
	{
		var theWidth = theTip.firstChild.getElementWidth() + 20;

		theTip.style.left = '-' + theWidth + 'px';
		theTip.widthSet = theWidth;
	}
}

function stickyTooltip ( tipID )
{
	var theTip = document.getElementById( tipID );

	if ( theTip )
	{
		if ( toolTips[tipID] )
		{
			killTooltip( tipID );
		}
		else
		{
			if ( theTip.className == 'tooltip' )
			{
				theTip.className = 'tooltip sticky';
			}
			else if ( theTip.className == 'tooltip_alternate' )
			{
				theTip.className = 'tooltip_alternate sticky';
			}

			toolTips[tipID] = true;
			theTip.style.display = '';
		}
	}
}

function hideTooltip ( tipID )
{
	var theTip = document.getElementById( tipID );

	if ( theTip )
	{
		if ( !toolTips[tipID] )
		{
			theTip.style.display = 'none';
		}
	}
}

function killTooltip ( tipID )
{
	var theTip = document.getElementById( tipID );

	if ( theTip )
	{
		toolTips[tipID] = false;
		if ( theTip.className == 'tooltip sticky' )
		{
			theTip.className = 'tooltip';
		}
		else if ( theTip.className == 'tooltip_alternate sticky' )
		{
			theTip.className = 'tooltip_alternate';
		}
		theTip.style.display = 'none';
	}
}

function addClassToClasses ( theElement, classToAdd, classesRequired, deniedClasses )
{
	for ( var i = 0; i < classesRequired.length; i++ )
	{
		for ( var x = 0; x < deniedClasses.length; x++ )
		{
			if ( elementHasClass( theElement, deniedClasses[x] ) )
			{
				return;
			}
		}
		if ( !elementHasClass( theElement, classesRequired[i] ) )
		{
			return;
		}
	}

	elementAddClass( theElement, classToAdd );
}

function removeClassFromClasses ( theElement, classToAdd, classesRequired, deniedClasses )
{
	for ( var i = 0; i < classesRequired.length; i++ )
	{
		for ( var x = 0; x < deniedClasses,length; x++ )
		{
			if ( elementHasClass( theElement, deniedClasses[x] ) )
			{
				return;
			}
		}
		if ( !elementHasClass( theElement, classesRequired[i] ) )
		{
			return;
		}
	}

	elementRemoveClass( theElement, classToAdd );
}

function toggleClasses ( theElements, theClass, requiredClasses, deniedClasses, turnOn )
{
	if ( turnOn )
	{
		for ( var i = 0; i < theElements.length; i++ )
		{

			addClassToClasses( theElements[i], theClass, requiredClasses, deniedClasses );
		}
	}
	else
	{
		requiredClasses[requiredClasses.length] = theClass;

		for ( var i = 0; i < theElements.length; i++ )
		{
			removeClassFromClasses( theElements[i], theClass, requiredClasses, deniedClasses );
		}
	}
}

function hlTotal ( turnOn )
{
//	toggleClasses( document.getElementById( 'cart_table' ).getElementsByTagName( 'td' ), 'col_hilite', ['monthly'], ['dimmed'], turnOn );
	toggleClasses( document.getElementById( 'cart_table' ).getElementsByTagName( 'td' ), 'col_hilite', ['package'], ['dimmed'], turnOn );
	toggleClasses( document.getElementById( 'cart_table' ).getElementsByTagName( 'td' ), 'col_hilite', ['one_time'], ['dimmed'], turnOn );
}

function emptyCart ( emptyToken )
{
	if ( confirm( emptyCartConfirmMsg ) )
	{
		window.location = '?adv_menu_selection=adv_cart&empty_cart=' + emptyToken;
	}
}

// for cancelling deals from status pages
function cancelDeal ( productID, dealID )
{
	new Ajax.Request
	(
		'ajax/cancel_deal.php',
		{
			method: 'post',
			parameters: 'product_id=' + productID + '&deal_id=' + dealID,
			onSuccess: function ( transport )
			{
				showCancel( productID, dealID, transport.responseText );
			}
		}
	);
}

var cancelFrame = false;
var cancelContent = false;

function showCancel ( productID, dealID, theHTML )
{
	if ( !cancelFrame )
	{
		cancelFrame = document.createElement( 'div' );
		cancelFrame.id = 'cancel_frame';
		cancelFrame.className = 'cancel_frame';
		cancelFrame.style.display = 'none';

		var cancelWrapper = document.createElement( 'div' );
		cancelWrapper.id = 'cancel_wrapper';

		var cancelClose = document.createElement( 'div' );
		cancelClose.id = 'cancel_close';
		cancelClose.onmouseover = function () { this.className = 'cancel_close_over' };
		cancelClose.onmouseout = function () { this.className = '' };
		cancelClose.onclick = function () { abortCancel() };
		cancelWrapper.appendChild( cancelClose );

		cancelContent = document.createElement( 'div' );
		cancelContent.id = 'cancel_content';
		cancelContent.className = 'cancel_content';
		cancelWrapper.appendChild( cancelContent );

		cancelFrame.appendChild( cancelWrapper );

		document.getElementsByTagName( 'body' )[0].appendChild( cancelFrame );

	}

	cancelContent.innerHTML = theHTML;

	fadeInEle( cancelFrame, 1000, 0, 0, false );

	cancelFrame.productID = productID;
	cancelFrame.dealID = dealID;
}

function abortCancel ( )
{
	fadeOutEle( cancelFrame, 1000, 'hide' )
}

function provideFeedbackShow ( )
{
	var feedbackToggle = document.getElementById( 'feedback_toggle' );
	var feedbackForm = document.getElementById( 'feedback_form' );
	var feedbackText = document.getElementById( 'feedback_text' );

	feedbackToggle.style.display = 'none';
	feedbackForm.style.display = '';
	feedbackText.value = feedbackMsg;
}

function focusFeedback ( )
{
	var feedbackText = document.getElementById( 'feedback_text' );

	if ( feedbackText.value == feedbackMsg )
	{
		feedbackText.value = '';
	}

	feedbackText.className = 'feedback_text';
}

function blurFeedbackText ( )
{
	var feedbackText = document.getElementById( 'feedback_text' );

	if ( feedbackText.value == '' || feedbackText.value == feedbackMsg )
	{
		feedbackText.value = feedbackMsg;

		feedbackText.className = 'feedback_text empty';
	}
}

function confirmCancel ( productID, dealID )
{
	var feedbackText = '';

	var feedbackArea = document.getElementById( 'feedback_text' );

	if ( feedbackArea )
	{
		var feedbackText = document.getElementById( 'feedback_text' ).value;

		if ( feedbackText == feedbackMsg )
		{
			feedbackText = false;
		}
	}

	var deleteOption = false;

	var deleteOptionCheckbox = document.getElementById( 'delete_option' );

	if ( deleteOptionCheckbox && deleteOptionCheckbox.checked )
	{
		deleteOption = true;
	}

	// hide the cancel box as we're processing...
	abortCancel();

	new Ajax.Request
	(
		'ajax/cancel_deal.php',
		{
			method: 'post',
			parameters: 'confirm=1&product_id=' + productID + '&deal_id=' + dealID + '&delete_option=' + ( deleteOption ? 1 : '0' ) + '&feedback_text=' + feedbackText,
			onSuccess: function ( transport )
			{
				cancelResult( productID, dealID, transport.responseText );
			}
		}
	);
}

function cancelResult ( productID, dealID, responseText )
{
	var isSuccess = false;
	var theHTML = 'error';
	var nlPos;

	if ( ( nlPos = responseText.indexOf( "\n" ) ) > -1 )
	{
		var arr_parts = responseText.split( "\n", 2 );
		isSuccess = responseText.substr( 0, nlPos );
		theHTML = responseText.substr( nlPos + 1 );
	}

	if ( isSuccess )
	{
		var theRows = document.getElementsByTagName( 'tr' );

		for ( var i in theRows )
		{
			if ( theRows[i].className )
			{
				if ( theRows[i].className.indexOf( 'deal' + dealID ) > -1 )
				{
					if ( theRows[i].className.indexOf( 'options_deal' ) > -1 )
					{
						theRows[i].style.display = 'none';
					}
					else
					{
						var cellCount = theRows[i].children.length;
						theRows[i].innerHTML = "<td colspan='" + cellCount + "'>&nbsp;</td>";
						theRows[i].className = 'deleted_row';
					}
				}
			}
		}
	}

	fadeMessage( 'pdm' + productID + '_' + dealID, theHTML, ( isSuccess ? 'error' : '' ) );
}

function processAddTagsToWebsite ( responseText, prtWebsiteID, theButton, rowID )
{
	var success = false;
	var existed = false;
	var addMessage = '';

	eval( responseText );

	if ( !addMessage.length )
	{
		if ( success )
		{
			addMessage = tagsAddOKMsg;
		}
		else if ( existed )
		{
			addMessage = tagsAddExistsMsg;
		}
		else
		{
			addMessage = tagsAddErrorMsg;
		}
	}

	if ( success )
	{
		fadeMessage( rowID + 'cart', addMessage, '' );
	}
	else if ( existed )
	{
		fadeMessage( rowID + 'cart', addMessage, 'warning' );
	}
	else
	{
		fadeMessage( rowID + 'cart', addMessage, 'error' );
	}

	theButton.className = 'submit';
}

function addTagsToWebsite ( theButton, prtWebsiteID, rowID )
{
	var theTags = document.getElementById( 'tags_' + prtWebsiteID ).value;

	if ( theTags.length < 2 )
	{
		alert( noTagsMsg );
		return;
	}

	theButton.className = 'submit working';

	var tmp = new Ajax.Request
	(
		'ajax/add_tags_to_website.php',
		{
			method: 'post',
			parameters: 'prt_website_id=' + prtWebsiteID + '&tags=' + theTags,
			onSuccess: function ( transport )
			{
				processAddTagsToWebsite( transport.responseText, prtWebsiteID, theButton, rowID );
			},
			onFailure: function ( )
			{
				theButton.className = 'submit';
			}
		}
	);
}

var globalAjax;

function addGlobal ( theImg, websiteID )
{
	theImg.className = 'hidden';
	document.getElementById( 'global_ajax_' + websiteID ).className = 'icon2';

	new Ajax.Request
	(
		'ajax/global.php',
		{
			method: 'post',
			parameters: 'add=1&website_id=' + websiteID,
			onSuccess: function ( transport )
			{
				var success = false;

				eval( transport.responseText );

				document.getElementById( 'global_ajax_' + websiteID ).className = 'hidden';

				if ( success )
				{
					document.getElementById( 'globaled_' + websiteID ).className = 'clickable icon2';
				}
				else
				{
					document.getElementById( 'global_' + websiteID ).className = 'clickable icon2';
				}
			}
		}
	);
}

function removeGlobal ( theImg, websiteID )
{
	theImg.className = 'hidden';
	document.getElementById( 'global_ajax_' + websiteID ).className = 'icon2';

	new Ajax.Request
	(
		'ajax/global.php',
		{
			method: 'post',
			parameters: 'remove=1&website_id=' + websiteID,
			onSuccess: function ( transport )
			{
				var success = false;

				eval( transport.responseText );

				document.getElementById( 'global_ajax_' + websiteID ).className = 'hidden';

				if ( success )
				{
					document.getElementById( 'global_' + websiteID ).className = 'clickable icon2';
				}
				else
				{
					document.getElementById( 'globaled_' + websiteID ).className = 'clickable icon2';
				}
			}
		}
	);
}

function offlineWebsite ( websiteID, rowID )
{
	new Ajax.Request
	(
		'ajax/offline.php',
		{
			method: 'post',
			parameters: 'website_id=' + websiteID,
			onSuccess: function ( transport )
			{
				var success = false;

				eval( transport.responseText );

				if ( success )
				{
					document.getElementById( 'row' + rowID ).className = 'hidden';
					document.getElementById( 'actions_' + rowID ).className = 'hidden';
				}
			}
		}
	);
}

function clearRemoved ( accountID, cartItemID )
{
	new Ajax.Request
	(
		'ajax/clear_removed.php',
		{
			method: 'post',
			parameters: 'account_id=' + accountID + '&cart_item_id=' + cartItemID,
			onSuccess: function ( transport )
			{
				if ( transport.responseText.length )
				{
					eval( transport.responseText );
				}
			}
		}
	);
}

function restoreToCart ( accountID, cartItemID )
{
	new Ajax.Request
	(
		'ajax/clear_removed.php',
		{
			method: 'post',
			parameters: 'account_id=' + accountID + '&restore=' + cartItemID,
			onSuccess: function ( transport )
			{
				if ( transport.responseText.length )
				{
					eval( transport.responseText );
				}
			}
		}
	);
}

function updateSemRush(prt_website_id)
{
	if(!prt_website_id )
	{
		alert('No Website Specified');
		return;
	}

	$('#semrush'+prt_website_id).removeClass();
	$('#semrush'+prt_website_id).addClass('pr_loading');

	$.ajax({
		url:'ajax/get_semrush.php?prt_website_id=' + prt_website_id,
		dataType: 'text',
		success: semRushUpdateCompleted
	});
}

function semRushUpdateCompleted(resp, textStatus, jqXHRobj)
{
	if(resp.length)
	{
		var theParts = resp.split("|");
		var prt_website_id = theParts[0];
		var value = theParts[1];

		if(isNaN(value))
		{
			$('#semrush'+prt_website_id).removeClass();
			$('#semrush'+prt_website_id).addClass('pr_novalue');
			$('#semrush'+prt_website_id).html('E');
		}
		else
		{
			var semrush = parseInt(value);

			if(semrush > 0)
			{
				$('#semrush'+prt_website_id).removeClass();
				$('#semrush'+prt_website_id).addClass('pr_just_updated');
				semrush = 'Yes';
			}
			else // 0 or -1 means no semrush organic keywords
			{
				$('#semrush'+prt_website_id).removeClass();
				$('#semrush'+prt_website_id).addClass('pr_just_updated');
				semrush = 'No';
			}

			$('#semrush'+prt_website_id).html(semrush);
		}
			
		$('#semrush'+prt_website_id).prop( 'onclick', null ); // don't want to run it again
	}
}
