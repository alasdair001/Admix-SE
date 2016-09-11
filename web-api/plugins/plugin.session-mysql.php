<?php
	
	// User MySQL API plugin
	
	abstract class SessionFetch
	{
		static function by_id($id)
		{
			if(is_numeric($id))
			{
				$id = Database::safe_str($id);
				
				if($id != false)
				{
					$id = intval($id);
					
					if($id != false)
					{
						$array = Database::select_single("SELECT * FROM `SESSIONS` WHERE `ID` = $id;");
						if($array != false)
						{	
							return SessionParse::parse_single($array);
						}
					}
				}
			}	
			
			return false;
		}	
		
		static function by_user_id($user_id)
		{
			if(is_numeric($user_id))
			{
				$user_id = Database::safe_str($user_id);
				
				if($user_id != false)
				{
					$user_id = intval($user_id);
					
					if($user_id != false)
					{
						$array = Database::select_single("SELECT * FROM `SESSIONS` WHERE `USER_ID` = $user_id;");
						if($array != false)
						{	
							return SessionParse::parse_single($array);
						}
					}
				}
			}	
			
			return false;
		}	
	}	
	
?>