<?php
	
	// User MySQL API plugin
	
	abstract class SessionFactory
	{
		static function insert($user)
		{
			$token = Database::safe_str(sha1($user->id.$user->username.md5($user->email)));
			if($token != false)
			{			
				 return Database::insert('SESSIONS', array('USER_ID' => $user->id, 'TOKEN' => Database::to_mysql_string($token), 'UPDATE_DATE' => 'NOW()', 'CREATION_DATE' => 'NOW()'));
			}
			
			return false;
		}
	}	
		
?>