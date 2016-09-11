<?php

	include('api/init.php');	
	
	$user_array = array(
		'id' => 1,
		'username' => 'user',
		'email' => 'email@example.com',
		'password' => 'password',
		'state' => STATE_ACTIVE,
		'capes' => '[1, 2, 3]',
		'active_cape' => 3
	);
	
	$user = UserParse::parse_single($user_array);	
	
	echo $user->username;
?>