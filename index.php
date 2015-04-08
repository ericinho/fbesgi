<?php
	error_reporting(E_ALL);
    ini_set("display_errors", 1);

	session_start();

	// Autoload the required files
	require "facebook-php-sdk-v4-4.0-dev/autoload.php";

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	
	const APPID = "777570462308288";
	const APPSECRET = "efcd2629bd5221212ae7645efb7bc4b8";

	// Initialize the SDK
	FacebookSession::setDefaultApplication(APPID, APPSECRET);

	$helper = new FacebookRedirectLoginHelper('https://fbesgi.herokuapp.com/');
	$loginUrl = $helper->getLoginUrl();
	// Use the login url on a link or button to redirect to Facebook for authentication
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Mon facebook-like</title>
		<meta charset="UTF-8">
		<meta name="description" content="description de ma page">
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo APPID; ?>',
		      xfbml      : true,
		      version    : 'v2.3'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/fr_FR/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
	</head>
	<body>
		<h1>Mon application facebook</h1>

        <div
          class="fb-like"
          data-share="true"
          data-width="450"
          data-show-faces="true">
        </div>

	<?php
		$loginUrl = $helper->getLoginUrl();
		echo "<a href='".$loginUrl."'> Se Connecter </a>";

		$session = $helper->getSessionFromRedirect();
	?>	
	</body>
</html>