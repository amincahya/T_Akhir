<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel='stylesheet' type='text/css' href='stylesheets/mainstyle.css' />
		<script type='text/javascript' src='js/main.js'></script>
		<script type='text/javascript' src='js/jquery-1.6.1.min.js'></script>
		<link rel='stylesheet' href='feedback/feedback.css' type='text/css' />
		<script type='text/javascript' src='feedback/feedback.js'></script>
		<title>LinkWorth | Search Engine Marketing - Text Link Advertising</title>

		<!--[if lt IE 9]>
		<style type="text/css">
		body {
			height:auto;
		}
		</style>
		<![endif]-->

		<!--[if gte IE 9]>
			<style type="text/css">
			.gradient {
			filter: none;
			}
			</style>
		<![endif]-->

		<script type="text/javascript">
		//<![CDATA[
			var advText = "Enter url to sign up and improve search ranking...";
			var prtText = "Enter url to sign up and start making money...";

			$(document).ready( function() {
				if( window.location.hash == '#publisher' )
				{
					goEarn();
				}
			});
		//]]>
		</script>
	</head>
	<body>
		<div id='lwbar_nav'>
			<ul>
				<li><a href='http://www.linkworth.com'>Home</a></li>
				<li><a href='http://www.linkworth.com/about/'>About</a>
					<ul>
						<li><a href='http://www.linkworth.com/about/'>LinkWorth</a></li>
					</ul>
				</li>
				<li><a href='http://www.linkworth.com/products/'>Services</a>
					<ul>
						<li><a href='http://www.linkworth.com/products/'>Products</a></li>
						<li><a href='http://www.linkworth.com/tools/'>Tools</a></li>
					</ul>
				</li>
				<li><a href='http://www.linkworth.com/support/faq.php'>Support</a>
					<ul>
						<li><a href='http://www.linkworth.com/support/faq.php'>FAQ's</a></li>
						<li><a href='http://www.linkworth.com/support/terms.php'>Terms</a></li>
						<li><a href='http://www.linkworth.com/support/ppay.php'>Payouts</a></li>
						<li><a href='http://www.linkworth.com/contact/'>Contact</a></li>
					</ul>
				</li>
			</ul>

			<div id='login'>
				<a href='login.php' class='login-tab'>Login</a>
			</div>
		</div> <!-- /end #lwbar_nav -->
		<div id='wrapper'>

			<noscript>
				<div class="warning">
					<p>Your browser does not have JavaScript capabilities which are required to utilise the full functionality of our site. This could be the result of two possible scenarios:</p>
					<ol>
						<li>You are using an old web browser, in which case you should upgrade it to a newer version. We recommend the latest version of <a href='http://www.getfirefox.com'>Firefox</a>.</li>
						<li>You have disabled JavaScript in you browser, in which case you will have to enable it to properly use our site. <a href='http://www.google.com/support/bin/answer.py?answer=23852'>Learn how to enable JavaScript</a>.</li>
					</ol>
				</div>
			</noscript>
            <div id="logo">
				<a href='http://www.linkworth.com/'><img src='http://www.linkworth.com/images/lw_logo2.png' alt='LinkWorth' /></a>
            </div>
			<div id='main_content'>

				<div id='search_wrap'>
					<ul class='tabs'>
						<li class='advertise_tab'><a href='#advertiser' onclick='goAdvertise()'>Advertiser</a></li>
						<li class='earn_tab'><a href='#publisher' onclick='goEarn()'>Publisher</a></li>
					</ul>
					<form method='post' action='/index.php'>
						<input type='hidden' id='action' name='action' value='advertiser' />
						<div class='tab_container'>
							<div id='action_form' class='tab_content advertiser'>
								<div class='search_bar'>
									<input id="signup_url" class='search_input grey' name='url' tabindex='1' value='Enter url to sign up and improve search ranking...' onfocus="signupFormText()" onblur="signupDefaultFormText('adv')" /> 
									<input class='go_button' type='submit' name='submitBtn' tabindex='2' value='Go!' />
								</div><!-- end #search_bar -->
							</div>
						</div><!-- END tab_container -->
					</form>
				</div><!-- end #search_wrap -->

<!-- for testing -->

				<div id='slideshow_wrapper'>
					<div id='slideshow'>
						<div id='slide_holder'>
							<div id='slide_content'></div>
							<div id='slide_shadow'></div>
						</div><!-- /end #slide_holder -->
						<div id='slide_mask'></div>

			<div class='slide'>
				<div id='agency'></div>
				<div class='bubblez-container'>
					<div id='column_1' class='columns'>
						<div class='bubblez'>
							<h2>Agency-Friendly</h2>
							<p>Our Control Center makes it simple to manage multiple client campaigns through a single login.</p>
						</div>
					</div>
					<div id='column_2' class='columns'>
						<div class='bubblez'>
							<h2>Reporting</h2>
							<p>Our cloud-based ranking reports can be branded for your clients and will help show the progress made.</p>
						</div>
					</div>
					<div id='column_3' class='columns'>
						<div class='bubblez'>
							<h2>Free Help</h2>
							<p>We’ve been doing this for a long time. Let our expert link-builders assist you. It’s free!</p>
						</div>
					</div>
				</div><!--/end bubblez-container -->
				<div class='shadows'></div>
			</div>

			<div class='slide'>
				<div id='advertiser'></div>
				<div class='bubblez-container'>
					<div id='column_4' class='columns'>
						<div class='bubblez'>
							<h2>Easy to Pay</h2>
							<p>We accept most credit cards, Paypal, wire transfers, checks and more.</p>
						</div>
					</div>
					<div id='column_5' class='columns'>
						<div class='bubblez'>
							<h2>Watch Rankings</h2>
							<p>Effective link-building is the most productive aspect of SEO. See rankings skyrocket to the top.</p>
						</div>
					</div>
					<div id='column_6' class='columns'>
						<div class='bubblez'>
							<h2>Marketing MVP</h2>
							<p>You’ll be the envy of your marketing department after achieving 1st page rankings! We can help.</p>
						</div>
					</div>
				</div><!-- /end bubblez-container -->
				<div class='shadows'></div>
			</div> <!-- /end .slide -->

			<div class='slide'>
				<div id='partner'></div>
				<div class='bubblez-container'>
					<div id='column_7' class='columns'>
						<div class='bubblez'>
							<h2>Blog for Cash</h2>
							<p>We have thousands of advertisers that pay bloggers to review their products and services.</p>
						</div>
					</div>
					<div id='column_8' class='columns'>
						<div class='bubblez'>
							<h2>Payout Options</h2>
							<p>Direct deposit, Paypal, check, wire transfer, money bookers… Payouts on time. Every time.</p>
						</div>
					</div>
					<div id='column_9' class='columns'>
						<div class='bubblez'>
							<h2>Earn from Home</h2>
							<p>Making money from home has never been easier. Publish our ads and earn from the comfort of home.</p>
						</div>
					</div>
				</div><!--/end bubblez-container -->
				<div class='shadows'></div>
			</div><!-- /end .slide -->

			<div class='slide'>
				<div id='stats'></div>
				<div class='bubblez-container'>
					<div id='column_10' class='columns'>
						<div class='bubblez'>
							<h2>High Performance</h2>
							<p>We have the inventory and the expertise to increase the octane of your link-building.</p>
						</div>
					</div>
					<div id='column_11' class='columns'>
						<div class='bubblez'>
							<h2>Results-Driven</h2>
							<p>We have a long track record of providing exceptional results. Let us show you how.</p>
						</div>
					</div>
					<div id='column_12' class='columns'>
						<div class='bubblez'>
							<h2>It’s Not Luck…</h2>
							<p>If you’re good at it, there is no need to have good luck to rank well.  Compete with anyone.</p>
						</div>
					</div>
					</div><!-- /end bubblez-container -->
				<div class='shadows'></div>
			</div><!-- /end slide -->

			<div class='slide'>
				<div id='rank'></div>
				<div class='bubblez-container'>
					<div id='column_13' class='columns'>
						<div class='bubblez'>
							<h2>More Clicks</h2>
							<p>Did you know that over 70% of searchers click one of the top 5 natural search results?</p>
						</div>
					</div>
					<div id='column_14' class='columns'>
						<div class='bubblez'>
							<h2>Increase Traffic</h2>
							<p>Better rankings mean more traffic. Period. Let the search traffic overflow to your website.</p>
						</div>
					</div>
					<div id='column_15' class='columns'>
						<div class='bubblez'>
							<h2>Dominate SERPs</h2>
							<p>We can help you build a strategy to improve your rankings for all of your keywords!</p>
						</div>
					</div>
				</div><!-- /end  bubblez-container -->
				<div class='shadows'></div>
			</div><!-- /end .slide -->	

					</div>
				</div>
				<script type='text/javascript'>
					/* <![CDATA[ */
					var currentPosition = 0;
					var lastDir = 1;
					var autoScrolling = true;
					var slides;
					var numberOfSlides;
					var autoTimer = false;
					var sliding = false;
					showControls = false;

					$(document).ready( setupSlider() );

					function setupSlider ( )
					{
						slides = $('.slide');
						numberOfSlides = slides.length;

						$('#slideshow').append( "<span class='control' id='leftControl'>Move left<"  + "/span>" ).append( "<span class='control' id='rightControl'>Move right<" + "/span>" );
						$('.control').css( { 'opacity' : 0 } );
						$('#slide_content').html( slides[currentPosition].innerHTML );

						slides.each(
							function ( )
							{
								$(this).css( 'display', 'none' );
							}
						);

						$('.control').bind( 'click', function ( )
							{
								clearInterval( autoTimer );
								autoTimer = setInterval( 'animateSlides(0,0)', 20000 );

								if ( $(this).attr( 'id' ) == 'rightControl' )
								{
									animateSlides ( 1, 1 );
								}
								else
								{
									animateSlides ( -1, 1 );
								}
							}
						);

						$('#slideshow').bind( 'mouseover', function ( )
							{
								showControls = true;
								$('.control').animate( { 'opacity' : 1 }, 200 );
							}
						);

						$('#slideshow').bind( 'mouseout', function ( )
							{
								showControls = false;
								setTimeout( fadeOutControls, 200 );
							}
						);

						autoTimer = setInterval( 'animateSlides(0,0)', 10000 );
					}

					function fadeOutControls ( )
					{
						if ( !showControls )
						{
							$('.control').animate( { 'opacity' : 0 }, 200 );
						}
					}

					function animateSlides ( theDir, wasClicked )
					{
						if ( sliding )
						{
							return;
						}
						else if ( showControls && !wasClicked )
						{
							clearInterval( autoTimer );
							autoTimer = setInterval( 'animateSlides(0,0)', 10000 );
							return;
						}

						sliding = true;

						if ( showControls )
						{
							$('.control').animate( { 'opacity' : 0 }, 200 ).delay( 600 ).animate( { 'opacity' : 1 }, 200 );
						}

						if ( theDir == 0 )
						{
							theDir = lastDir;
						}
						else
						{
							lastDir = theDir;
						}

						currentPosition = ( currentPosition + theDir ) % numberOfSlides;

						if ( currentPosition < 0 )
						{
							currentPosition += numberOfSlides;
						}

						var slideWidth = ( Math.ceil( $(window).width() / 2 ) + $('#slide_holder').width() );

						$('#slide_holder')
							.animate( { 'left' : -1 * theDir * slideWidth }, 500, function(){$('#slide_content').html( slides[currentPosition].innerHTML );$(this).css( { 'left' : theDir * slideWidth } ).animate( { 'left' : 0 }, 500, function(){ sliding=false } ); } );
					}

					function hookEvent ( element, eventName, callback )
					{
						if ( typeof( element ) == 'string' )
						{
							element = document.getElementById( element );
						}

						if ( element == null )
						{
							return;
						}

						if ( element.addEventListener )
						{
							if ( eventName == 'mousewheel' )
							{
								element.addEventListener( 'DOMMouseScroll', callback, false );
							}

							element.addEventListener( eventName, callback, false );
						}
						else if ( element.attachEvent )
						{
							element.attachEvent( 'on' + eventName, callback );
						}
					}

					function unhookEvent ( element, eventName, callback )
					{
						if ( typeof( element ) == 'string' )
						{
							element = document.getElementById( element );
						}

						if ( element == null )
						{
							return;
						}

						if ( element.removeEventListener )
						{
							if ( eventName == 'mousewheel' )
							{
								element.removeEventListener( 'DOMMouseScroll', callback, false );
							}

							element.removeEventListener( eventName, callback, false );
						}
						else if ( element.detachEvent )
						{
							element.detachEvent( 'on' + eventName, callback );
						}
					}

					function cancelEvent ( e )
					{
						e = e ? e : window.event;

						if ( e.stopPropagation )
						{
							e.stopPropagation();
						}

						if ( e.preventDefault )
						{
							e.preventDefault();
						}

						e.cancelBubble = true;
						e.cancel = true;
						e.returnValue = false;
						return false;
					}


//					hookEvent( 'slideshow_wrapper', 'mousewheel', handleScroll );
					/* ]]> */
				</script>
				</div>
			<div class='push'></div>
		</div><!-- end #wrapper -->
		<div class='footer'>

			<div id='footer-nav'>
				<ul>
					<li><a href='/about/'>About</a></li>
					<li><a href='/products/'>Products</a></li>
					<li><a href='/contact/'>Contact</a></li>
				</ul>
			</div>

		</div><!-- END .footer -->
	</body>
</html>
