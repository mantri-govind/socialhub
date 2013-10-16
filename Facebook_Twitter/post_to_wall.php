<?php
# We require the library

require 'facebook/facebook.php';
require 'config/fbconfig.php';
require 'config/functions.php';

$facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
            ));
# Let's see if we have an active session
 	try{
		$uid = $facebook->getUser();
		
		# let's check if the user has granted access to posting in the wall
		$api_call = array(
			'method' => 'users.hasAppPermission',
			'uid' => $uid,
			'ext_perm' => 'publish_stream'
		);
		$can_post = $facebook->api($api_call);
		if($can_post){
			# post it!
			  $facebook->api('/'.$uid.'/feed', 'post', array('message' => 'Saying hello from my Facebook app!'));
			
			# using all the arguments
			$facebook->api('/'.$uid.'/feed', 'post', array(
				'message' => 'The message',
				'name' => 'The name',
				'description' => 'The description',
				'caption' => 'The caption',
				'picture' => 'http://i.imgur.com/yx3q2.png',
				'link' => 'http://net.tutsplus.com/'
			));
			echo 'Posted!';
		} else {
			die('Permissions required!');
		}
	} catch (Exception $e){}
 