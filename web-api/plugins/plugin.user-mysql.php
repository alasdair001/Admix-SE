<?php
	
	// User MySQL API plugin
	
	abstract class UserFetch
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
						$array = Database::select_single("SELECT * FROM `USERS` WHERE `ID` = $id;");
						if($array != false)
						{	
							return UserParse::parse_single($array);
						}
					}
				}
			}	
			
			return false;
		}
		
		static function by_username($username)
		{
			$username = Database::safe_str($username);
				
			if($username != false)
			{
				$array = Database::select_single("SELECT * FROM `USERS` WHERE `USERNAME` = '$username';");
				if($array != false)
				{	
					return UserParse::parse_single($array);
				}
			}
						
			return false;
		}	
	}	
	
?>