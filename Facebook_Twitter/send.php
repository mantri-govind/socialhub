
<?php 
	if(isset($_POST['submit']))
	{
		ob_start();
		require("twitter/twitteroauth.php");
		require 'config/twconfig.php';
		require 'config/functions.php';
		session_start();
	//var_dump($_SESSION['oauth_token'].'  AND  '. $_SESSION['oauth_token_secret']);die;
$twitteroauths = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
  	
	
	 $message = $_POST['tweet'];
			
			 // Send tweet
		
			if($twitteroauths->post('statuses/update', array('status' => "$message")))
			var_dump("Success");die;
  }
}
?>
 <html>
<body>
	<form action="" method="post" name="form1">
	<label>Make a Tweet</label>
	<textarea placeholder="Only 140 Characters" name="tweet" rows="3" cols="50"></textarea>
	<input type="submit" value="Tweet" name="submit"/>
	
	</form></body>
	</html>