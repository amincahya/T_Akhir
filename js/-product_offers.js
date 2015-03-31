	function fadeInProductOffer()
	{
		setTimeout("fadeInEle('offer_product_wrapper', 1000, 0, 0, false)", 3000);
	}

	// UPDATE OFFER FORM
	function updateProductOfferForm(theHTML)
	{
		var parentToAppend = document.getElementById('offer_product_wrapper');
		var childToRemove = document.getElementById('offer_product_content');

		if(childToRemove)
		{
			fadeOutEle( childToRemove, 1000, 'remove' );
		}

		updateOfferHTML = theHTML;
		setTimeout("showResponse()", 1000);
	}

	function showResponse()
	{
		var parentToAppend = document.getElementById('offer_product_wrapper');
		var browserName = navigator.appName;
		var nAgt = navigator.userAgent;
		var nameOffset,verOffset,ix;

		offerUpdateFrame = document.createElement('div');

		if(browserName=="Microsoft Internet Explorer")
		{
			// In MSIE, the true version is after "MSIE" in userAgent
			if ((verOffset=nAgt.indexOf("MSIE"))!=-1)
			{
				fullVersion = nAgt.substring(verOffset+5);

				// trim the fullVersion string at semicolon/space if present
				if ((ix=fullVersion.indexOf(";"))!=-1) fullVersion=fullVersion.substring(0,ix);
				if ((ix=fullVersion.indexOf(" "))!=-1) fullVersion=fullVersion.substring(0,ix);

				majorVersion = parseInt(''+fullVersion,10);

				if (isNaN(majorVersion))
				{
					majorVersion = parseInt(navigator.appVersion,10);
				}
			}

			if(majorVersion <= 8)
			{
				var offerUpdateFrameID = 'offer_product_update_secondary';
			}
			else
			{
				var offerUpdateFrameID = 'offer_product_update';
			}
		}
		else
		{
			var offerUpdateFrameID = 'offer_product_update';
		}

		offerUpdateFrame.id = offerUpdateFrameID;
		offerUpdateFrame.style.opacity = 0;

		parentToAppend.appendChild(offerUpdateFrame);

		offerUpdateFrame.innerHTML = updateOfferHTML;

		fadeInEle( offerUpdateFrameID, 500, 2000, 1000, 'remove' );

		setTimeout("removeOfferProduct()", 3600);
	}

	function removeOfferProduct()
	{
		var parentToAppend = document.getElementById('offer_product_wrapper');

		parentToAppend.parentNode.removeChild(parentToAppend);
	}
	// END UPDATE OFFER FORM

	var newOfferHTML;
	// SHOW ANOTHER OFFER FORM
	function showAnotherProductOfferForm(theHTML, websiteCount)
	{
		var parentToAppend = document.getElementById('offer_product_wrapper');
		var childToRemove = document.getElementById('offer_product_content');

		if(childToRemove)
		{
			fadeOutEle( childToRemove, 1000, 'remove' );
		}

		newOfferHTML = theHTML;
		setTimeout("showNewOffer(" + websiteCount + ")", 1000);
	}

	function showNewOffer( websiteCount)
	{
		var parentToAppend = document.getElementById('offer_product_wrapper');

		newOfferFrame = document.createElement('div');

		if(websiteCount > 0)
		{
			newOfferFrame.id = 'offer_product_content';
		}
		else
		{
			newOfferFrame.id = 'offer_product_update';
		}

		newOfferFrame.style.opacity = 0;

		parentToAppend.appendChild(newOfferFrame); 
		newOfferFrame.innerHTML = newOfferHTML;

		if(websiteCount > 0)
		{
			fadeInEle( newOfferFrame, 1000, 0, 0, false );
		}
		else
		{
			fadeInEle( newOfferFrame, 500, 2000, 1000, 'remove' );

			setTimeout("removeOfferProduct()", 3600);
		}
	}
	// END SHOW ANOTHER OFFER FORM

	function showHideDivTag(div_name, show_div)
	{
		if(show_div)
		{
			document.getElementById(div_name).style.display = "inline-block";
		}
		else
		{
			document.getElementById(div_name).style.display = "none";
		}
	}
	
	var priceArray = new Array();
	priceArray[0] = 0; 
	priceArray[1] = 15; 
	priceArray[2] = 40;
	priceArray[3] = 200; 
	priceArray[4] = 350; 
	priceArray[5] = 500; 
	priceArray[6] = 750; 
	priceArray[7] = 100;

	function showHidePriceAndUrl(obj_drop_down, drop_down_name)
	{
		div_price = 'div_' + drop_down_name;
		span_earning = drop_down_name + '_earning';

		if(obj_drop_down.value == 'custom_price')
		{
			custom_value_id = drop_down_name + '_custom';
			span_value = document.getElementById(custom_value_id).value;

			document.getElementById(div_price).style.display = "inline-block";
			setCustomerPrice(span_earning, span_value);
		}
		else
		{
			document.getElementById(div_price).style.display = "none";
			setCustomerPrice(span_earning, priceArray[obj_drop_down.value]);
		}
	}

	function setCustomerPrice(theElement, dollarAmount, differentElementID)
	{
		if(differentElementID != undefined)
		{
			elementIdArray = theElement.split(/[_]{1}/);
			theElement = '';
			for(i=0;i<(elementIdArray.length-1);i++)
			{
				theElement += elementIdArray[i] + '_';
			}
			theElement += 'earning';
		}

		prtBillforRatePercent = prtBillforRate / 100;
		partnerEarning = dollarAmount * prtBillforRatePercent;

		if(partnerEarning > 0)
		{
			theElement = document.getElementById(theElement);
			theElement.innerHTML = "\<span class='earning_label'\>" + youWillEarnText + " \$ " + partnerEarning.toFixed(2) + '\<\/span\>';
			theElement.style.visibility = 'visible';
		}
		else
		{
			theElement = document.getElementById(theElement)
			theElement.innerHTML = '\&nbsp\;';
			theElement.style.visibility = 'hidden';
		}
	}

	function getZoneToolTip2()
	{
		zone = document.offer_product_form.prt_website_zone_placement.value;

		if(zone == 0)
		{
			image_name = 'banner-zones.jpg';
		}
		else
		{
			image_name = 'banner-zone-'+zone+'-big.jpg';
		}

		content = '<img id=\'banner_zones\' src=\'images/zones/'+image_name+'\' border=\'0\' width=\'350\' height=\'263\' usemap=\'#zones_map\'>';
	
		return overlib(content, STICKY, CAPTION, 'Zone Placement', MOUSEOFF, WIDTH, 350, HEIGHT, 263);
	}

	function saveZoneSelection2(zone)
	{
		document.offer_product_form.prt_website_zone_placement.value = zone;
	
		document.getElementById("zone_placement").innerHTML = arr_zone_names[zone];
	
		return nd();
	}

	function clearTextArea(textAreaID)
	{
		textArea = document.getElementById(textAreaID);

		if(textArea.value == 'Type Template Here.' || textArea.value == 'Type Description Here.')
		{
			textArea.value = ''
		}
	}