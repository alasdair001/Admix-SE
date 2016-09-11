<?php
	
	// API usage example
	
	include('api/init.php');	
	
	if(Database::connect())
	{
		if(Database::connect_db("admix-se"))
		{
			$user = UserFetch::by_id(1);
			
			if($user != false)
			{
				die('Username: '.$user->username);
			}else
			{
				die('Failed to select user :(');
			}
		}else
		{
			die('Failed to connect to database');
		}
		
		Database::disconnect();	
	}else
	{
		die('Failed to connect to MySQL');
	}
	
?>