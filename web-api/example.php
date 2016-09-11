<?php
	
	// API usage example
	
	include('api/init.php');	
	
	$user_array_1 = array(
		'id' => 1,
		'username' => 'user1',
		'email' => 'user1@example.com',
		'password' => 'password',
		'state' => USER_STATE_ACTIVE,
		'capes' => '[1, 2, 3]',
		'active_cape' => 3
	);
	$user_array_2 = array(
		'id' => 1,
		'username' => 'user2',
		'email' => 'user2@example.com',
		'password' => 'password',
		'state' => USER_STATE_INACTIVE,
		'capes' => '[1, 2]',
		'active_cape' => 2
	);
	
	$users = UserParse::parse_multiple(array($user_array_1, $user_array_2));	
	
	if($users != false)
	{
		echo $users[0]->state;
		echo $users[1]->state;
	}else
	{
		die('Failed to parse user arrays..');
	}
	
?>