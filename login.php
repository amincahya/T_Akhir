<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel='stylesheet' type='text/css' href='https://act.linkworth.com/stylesheets-home/mainstyle.css' />
		<script type='text/javascript' src='https://act.linkworth.com/js-home/main.js'></script>
		<script type='text/javascript' src='https://act.linkworth.com/js-home/jquery-1.6.1.min.js'></script>
		<link rel='stylesheet' href='https://act.linkworth.com/feedback-home/feedback.css' type='text/css' />
		<script type='text/javascript' src='https://act.linkworth.com/feedback-home/feedback.js'></script>
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
				<a class='sign-up-tab' href='http://www.linkworth.com/'>Sign Up</a>
				<a href='https://act.linkworth.com/login.php' class='login-tab'>Login</a>
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
				<a href='http://www.linkworth.com/'><img src='https://act.linkworth.com/images-home/lw_logo2.png' alt='LinkWorth' /></a>
            </div>
			<div id='main_content'>

<form method="post" action="/login.php">
	<div class="loginWrapper">
		<div class="loginFormContent">
			<div class="loginHeader">
				<h1>LinkWorth Control Center Login</h1>
			</div>
			<div class="loginBody">
				<div class="loginLeft">
					<p>
						<label for="CCL-username">Username:<br />
							<input type="text" name="account_username" id="CCL-username" tabindex="20" value="" />
						</label>
					</p>
					<p>
						<label for="CCL-password">Password:<br />
							<input type="password" name="account_password" id="CCL-password" tabindex="21" />
						</label>
					</p>
					<div>
						<input type="submit" name="submitted_login" class="loginButton" value="Sign in" />
					</div>
					<p class="forgotPassword"><span class="link_look" onclick="resetPassword()">Forget your password?</span></p>
				</div><!-- /end loginLeft -->
			</div><!-- /end loginBody -->
		</div><!-- /end loginFormContent -->

		<div class="loginNav">
			
			<p>Not a LinkWorth customer yet?<br /></p>
				<a href="http://www.linkworth.com/">Create your Free LinkWorth Account today!</a>
		</div> <!-- /end loginRight -->
	</div><!-- /end loginWrapper -->
</form>

<div id="contact_form" class="hidden-contact-form" style="display:none;">
	<img onclick="resetPassword()" title="close" alt="close" src="https://act.linkworth.com/thirdparty-home/fancy_zoom/images/closebox.png" class="close_form" />
	<div class="contact-us-wrapper">
		<h2 style="font-size:30px;">Retrieve Password</h2>
		<form method="post" action="/login.php">
			<div id="retrieve_form">
				<label for="retrieval_email">Email:</label> <input type="text" id="retrieval_email" name="account_email" value="" />
				<button id="send_now" class="form_submit_button" onclick="sendRetrievalEmail()">Send Now</button>
			</div>
		</form>
	</div>
</div>
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
