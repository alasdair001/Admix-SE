<?php

	include('api/init.php');	
	
	$user_array = array(
		'id' => 0,
		'username' => 'user',
		'email' => 'email@example.com',
		'password' => "password",
		'state' => 0,
		'capes' => '[]',
		'active_cape' => 0
	);
	
	$user = UserParse::parse_single($user_array);	
	
	echo $user->username;
?>