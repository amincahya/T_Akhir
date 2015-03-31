// START index action handler
function goAdvertise ( )
{
	$('#action_form').attr('class', 'tab_content advertiser');
	$('#action').val('advertiser');
	signupDefaultFormText('adv');
}

function goEarn ( )
{
	$('#action_form').attr('class', 'tab_content earn');
	$('#action').val('partner');
	signupDefaultFormText('prt');
}

// END index action handler

// START login popout handler

var showingLogin = false;
var hidingLogin = false;
var loginUp = false;

function hintLogin ( )
{
	if ( showingLogin || hidingLogin || loginUp )
	{
		return;
	}

	$('#login').animate( {'top':'-100px'}, 200 );
}

function hideHintLogin ( )
{
	if ( showingLogin || hidingLogin || loginUp )
	{
		return;
	}

	hidingLogin = true;

	$('#login').animate( {'top':'-105px'}, 200, function(){hidingLogin=false} );
}

function showLogin ( )
{
	if ( hidingLogin )
	{
		return;
	}

	showingLogin = true;
	loginUp = true;

	$('#login').animate( {'top':'0px'}, 1000, function(){showingLogin=false} );
}

function closeLogin ( )
{
	if ( showingLogin )
	{
		return;
	}

	hidingLogin = true;

	$('#login').animate( {'top':'-105px'}, 500, function(){hidingLogin=false;loginUp=false} );
}

	function signupFormText()
	{
		if( $('#signup_url').val() == advText || $('#signup_url').val() == prtText)
		{
			$('#signup_url').val('');
			$('#signup_url').removeClass('grey');
		}
	}

	function signupDefaultFormText(actType)
	{
		if( $('#signup_url').val() == advText || $('#signup_url').val() == prtText || $('#signup_url').val() == '' )
		{
			$('#signup_url').addClass('grey');

			if( actType == 'prt' )
			{
				$('#signup_url').val(prtText);
				$('#signup_url').attr('onblur', "signupDefaultFormText('prt')");
			}
			else
			{
				$('#signup_url').val(advText);
				$('#signup_url').attr('onblur', "signupDefaultFormText('adv')");
			}
		}
	}

	function sendRetrievalEmail()
	{
		var userEmail = $('#retrieval_email').val();

		$.ajax({
			type: "POST",
			url: "ajax/retrieve_password.php",
			data: 'account_email=' + userEmail,
			beforeSend: function() {
				$('#retrieve_form').css('text-align', 'center').html('<img src="images/stats/loading.gif" alt="Loading" />');
			},
			success: function(data) {
				var output_array = data.split('=+=');
				$('#CCL-username').val(output_array[0]);
				$('#retrieve_form').html(output_array[1]);
				
				if($('input[name=email_sent]').val() == 1)
				{
					setTimeout('resetPassword()',4000);
				}
			}
		});
	}

	function resetPassword()
	{
		if($('#contact_form').is(':visible'))
		{
			$('#contact_form').fadeOut();
			$('#retrieval_response').remove();
			$('input[name=account_email]').val('');
		}
		else
		{
			$('#contact_form').fadeIn();
		}
	}