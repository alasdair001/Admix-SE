<?php
	
	// User MySQL API plugin
	
	abstract class SessionFactory
	{
		static function insert($user)
		{
			$token = Database::safe_str(sha1($user->id.$user->username.md5($user->email.rand(0, 100)).rand(2)));
			$remember_me = Database::safe_str(sha1($user->id.$user->username.md5($user->email.rand(0, 100)).rand(2)));
			
			if($token != false && $remember_me != false)
			{			
				$session = SessionFetch::by_user_id($user->id);
				
				if(!$session)
				{
					if(Database::insert('SESSIONS', array('USER_ID' => $user->id, 'TOKEN' => Database::to_mysql_string($token), 'REMEMBER_ME' => Database::to_mysql_string($remember_me), 'UPDATE_DATE' => 'NOW()', 'CREATION_DATE' => 'NOW()')))
					{
						$session = SessionFetch::by_user_id($user->id);
						return $session;
					}
				}else
				{
					$mysql_query = mysql_query("UPDATE `SESSIONS` SET `TOKEN` = '$token', `REMEMBER_ME` = '$remember_me', `UPDATE_DATE` = NOW() WHERE `ID` = ".$session->id.";");
					if($mysql_query != false)
					{
						$session = SessionFetch::by_user_id($user->id);
						return $session;
					}
				}
			}
			
			return false;
		}
	}	
		
?>