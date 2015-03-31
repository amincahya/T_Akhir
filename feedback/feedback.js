/*
<?php
require_once( '/home/sp3nt/www/config.php' );
?>
var webroot = '<?=LW_WEB_ROOT;?>';
*/
var webroot = '/';
var feedbackDiv;
var open_feedback_height = 395;
var open_feedback_width = 325;
var closed_feedback_height = 395;
var closed_feedback_width = 32;
var feedback_slide_steps = 40;
var feedback_slide_step = 0;
var current_feedback_height = closed_feedback_height;
var current_feedback_width = closed_feedback_width;
var current_feedback_timeout = false;
var feedbackMessage;
var feedbackLink;
var feedbackName;
var feedbackEmail;
var feedbackSend;

function createFeedback ( )
{
	if ( window.XMLHttpRequest || window.ActiveXObject ) // if we don't have ajax, don't even print it.
	{
		feedbackDiv = document.createElement( 'div' );
		feedbackDiv.id = 'feedback';
		feedbackDiv.className = 'closed';
	
		var feedbackWrapper = document.createElement( 'div' );
		feedbackWrapper.id = 'feedback_wrapper';
	
		var feedbackClose = document.createElement( 'div' );
		feedbackClose.id = 'feedback_close';
		feedbackClose.onmouseover = function () { this.className = 'feedback_close_over' };
		feedbackClose.onmouseout = function () { this.className = '' };
		feedbackClose.onclick = function () { toggleFeedback() };
		// add a text node or can we skip it?
		feedbackWrapper.appendChild( feedbackClose );
	
		feedbackLink = document.createElement( 'div' );
		feedbackLink.id = 'feedback_link';
		feedbackLink.className = 'feedback_link';
		feedbackLink.onmouseover = function () { this.className = '' };
		feedbackLink.onmouseout = function () { if ( !current_feedback_timeout ) this.className = 'feedback_link' };
		feedbackLink.onclick = function () { toggleFeedback() };
	// 	feedbackLink.appendChild( document.createTextNode( ' ' ) );
		feedbackWrapper.appendChild( feedbackLink );

		feedbackName = document.createElement( 'input' );
		feedbackName.id = 'feedback_name';
		feedbackName.tabIndex = '-1';
		feedbackName.value = 'Click to enter your name (optional)';
		feedbackName.onfocus = function () { if ( this.value == 'Click to enter your name (optional)' ) this.value = ''; this.className = '' };
		feedbackName.onblur = function () { if ( this.value == '' ) { this.value = 'Click to enter your name (optional)'; this.className = 'empty' } };
		feedbackName.className = 'empty';
		feedbackWrapper.appendChild( feedbackName );

		feedbackEmail = document.createElement( 'input' );
		feedbackEmail.id = 'feedback_email';
		feedbackEmail.tabIndex = '-1';
		feedbackEmail.value = 'Click to enter your email (optional)';
		feedbackEmail.onfocus = function () { if ( this.value == 'Click to enter your email (optional)' ) this.value = ''; this.className = '' };
		feedbackEmail.onblur = function () { if ( this.value == '' ) { this.value = 'Click to enter your email (optional)'; this.className = 'empty' } };
		feedbackEmail.className = 'empty';
		feedbackWrapper.appendChild( feedbackEmail );

		feedbackMessage = document.createElement( 'textarea' );
		feedbackMessage.tabIndex = '-1';
		feedbackMessage.value = "Enter Feedback, Bugs, Errors here \nAll others to support@linkworth.com \n(required)";
		feedbackMessage.onfocus = function () { if ( this.value == "Enter Feedback, Bugs, Errors here \nAll others to support@linkworth.com \n(required)" ) this.value = ''; this.className = '' };
		feedbackMessage.onblur = function () { if ( this.value == '' ) { this.value = "Enter Feedback, Bugs, Errors here \nAll others to support@linkworth.com \n(required)"; this.className = 'empty' } };
		feedbackMessage.className = 'empty';
		feedbackWrapper.appendChild( feedbackMessage );
	
		feedbackSend = document.createElement( 'div' );
		feedbackSend.tabIndex = '-1';
		feedbackSend.id = 'feedback_send';
		feedbackSend.onmouseover = function () { this.className = 'feedback_send_over' };
		feedbackSend.onmouseout = function () { this.className = '' };
		feedbackSend.onclick = function () { sendFeedback() };
		// add a text node or can we skip it?
		feedbackWrapper.appendChild( feedbackSend );
	
		feedbackDiv.appendChild( feedbackWrapper );

		var feedbackPositionDiv = document.createElement( 'div' );
		feedbackPositionDiv.id = 'feedback_position';
		feedbackPositionDiv.appendChild( feedbackDiv );

		document.getElementsByTagName( 'body' )[0].appendChild( feedbackPositionDiv );
	}
}

function addEvent( obj, evType, fn, useCapture )
{
	if ( obj.addEventListener )
	{
		obj.addEventListener( evType, fn, useCapture );
		return true;
	}
	else if ( obj.attachEvent )
	{
		var r = obj.attachEvent( 'on' + evType, fn );
		return r;
	}
	else
	{
		return false;
	}
}

addEvent( window, 'load', createFeedback, false );

function toggleFeedback ( )
{
	if ( current_feedback_timeout )
	{
		clearTimeout( current_feedback_timeout );
		current_feedback_timeout = false;
	}

	feedbackDiv.style.width = current_feedback_width + 'px';
	feedbackDiv.style.height = current_feedback_height + 'px';

	if ( feedbackDiv.className == 'closed' || feedbackDiv.className == 'opening' ) // we're opening
	{
		if ( feedback_slide_step <= feedback_slide_steps )
		{
			feedbackDiv.className = 'opening';
			feedback_slide_step++;

			current_feedback_height = Math.min( open_feedback_height, closed_feedback_height + ( open_feedback_height - closed_feedback_height ) / feedback_slide_steps * feedback_slide_step );
			current_feedback_width = Math.min( open_feedback_width, closed_feedback_width + ( open_feedback_width - closed_feedback_width ) / feedback_slide_steps * feedback_slide_step );
		}
		else
		{
			feedbackDiv.className = 'opened';
			feedbackMessage.tabIndex = '';
			feedbackLink.tabIndex = '';
			feedbackName.tabIndex = '';
			feedbackEmail.tabIndex = '';
			feedbackSend.tabIndex = '';
			return;
		}
	}
	else
	{
		if ( feedback_slide_step >= 0 )
		{
			feedback_slide_step--;

			current_feedback_height = Math.max( closed_feedback_height, closed_feedback_height + ( open_feedback_height - closed_feedback_height ) / feedback_slide_steps * feedback_slide_step );
			current_feedback_width = Math.max( closed_feedback_width, closed_feedback_width + ( open_feedback_width - closed_feedback_width ) / feedback_slide_steps * feedback_slide_step );
		}
		else
		{
			feedbackDiv.className = 'closed';
			feedbackLink.className = 'feedback_link'
			feedbackMessage.tabIndex = '-1';
			feedbackLink.tabIndex = '-1';
			feedbackName.tabIndex = '-1';
			feedbackEmail.tabIndex = '-1';
			feedbackSend.tabIndex = '-1';
			return;
		}
	}
	current_feedback_timeout = setTimeout( toggleFeedback, 1 );
}

var sendFeedbackAjax;
var sending_message;

function sendFeedback ( )
{
	if ( window.XMLHttpRequest )
	{
		sendFeedbackAjax = new XMLHttpRequest();
	}
	else if ( window.ActiveXObject )
	{
		sendFeedbackAjax = new ActiveXObject( 'Microsoft.XMLHTTP' );
	}
	else
	{
		alert( 'Feedback Not Supported.' );
		feedbackDiv.style.width = closed_feedback_width + 'px';
		feedbackDiv.style.height = closed_feedback_height + 'px';
		feedbackDiv.className = 'closed';
		feedback_slide_step = 0;
		return;
	}

	sendFeedbackAjax.onreadystatechange = handleSendFeedbackAjaxReturn;

//	var params = 'href=' + escape( location.href ) + '&message=' + escape( feedbackMessage.value );
	var params = 'name=' + escape( feedbackName.value ) + '&email=' + escape( feedbackEmail.value ) + '&message=' + escape( feedbackMessage.value );
	sendFeedbackAjax.open( 'POST', webroot + 'feedback/feedback_ajax.php', true );
	sendFeedbackAjax.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
	sendFeedbackAjax.setRequestHeader( 'Content-length', params.length );
	sendFeedbackAjax.setRequestHeader( 'Connection', 'close' );

	sending_message = feedbackMessage.value;

	feedbackMessage.value = '... Sending Message ... ';

	feedbackLink.className = 'feedback_sending';
	feedbackLink.onmouseover = '';
	feedbackLink.onmouseout = '';
	feedbackLink.onclick = '';
	feedbackSend.onclick = '';

	toggleFeedback();

	sendFeedbackAjax.send( params );
}

var feedback_response;

function handleSendFeedbackAjaxReturn ( )
{
	if ( sendFeedbackAjax.readyState == 4 && sendFeedbackAjax.status == 200 )
	{
		feedback_response = sendFeedbackAjax.responseText;
		confirmFeedback();
	}
}

function confirmFeedback ( )
{
	if ( !current_feedback_timeout || feedbackDiv.className == 'closed' )
	{
		var feedback_sent = false;
		var message = false;

		eval( feedback_response );
		feedback_response = false;

		if ( feedback_sent )
		{
			feedbackMessage.value = "Enter Feedback, Bugs, Errors here \nAll others to support@linkworth.com \n(required)";
			alert( 'Thank you, your feedback has been sent.' );
		}
		else
		{
			if ( message )
			{
				alert( message );
			}
			else
			{
				alert( 'SYSTEM ERROR:\nYour message could not be sent.' );
			}

			feedbackMessage.value = sending_message;
			toggleFeedback();
		}

		feedbackLink.className = 'feedback_link';
		feedbackLink.onmouseover = function () { this.className = '' };
		feedbackLink.onmouseout = function () { this.className = 'feedback_link' };
		feedbackLink.onclick = function () { toggleFeedback() };
		feedbackSend.onclick = function () { sendFeedback() };
	}
	else
	{
		setTimeout( confirmFeedback, 10 );
	}
}
