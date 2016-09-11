<?php
	
	// Parse API plugin
	
	abstract class UserParse
	{
		static function parse_single($array)
		{
			if(array_has_keys($array, array('ID', 'USERNAME', 'EMAIL', 'PASSWORD', 'STATE', 'CAPES', 'ACTIVE_CAPE')))
			{
				$id = $array['ID'];
				$username = $array['USERNAME'];
				$email = $array['EMAIL'];
				$password = $array['PASSWORD'];
				$state = $array['STATE'];
				$capes = $array['CAPES'];
				$active_cape = $array['ACTIVE_CAPE'];
							
				if(all_not_empty(array($username, $email, $password, $capes)))
				{
					if(is_numeric($id) && is_numeric($state) && is_numeric($active_cape))
					{
						if($capes == "[]")
						{
							$capes = array();	
						}else
						{
							$capes = json_decode($capes, false);
							
							if(!$capes)
							{
								return false;
							}
						}				
						
						return new User(intval($id), $username, $email, $password, intval($state), $capes, intval($active_cape));	
					}
				}
			}
			
			return false;
		}
		
		static function parse_multiple($array)
		{
			$parsed = array();
			
			foreach($array as $_array)
			{
				$parse = self::parse_single($_array);
				
				if(!$parse)
				{
					return false;
				}
				
				if(!array_push($parsed, $parse))
				{
					return false;
				}
			}
			
			return $parsed;
		}
	}
	
	abstract class SessionParse
	{
		static function parse_single($array)
		{
			if(array_has_keys($array, array('ID', 'USER_ID', 'TOKEN', 'REMEMBER_ME', 'UPDATE_DATE', 'CREATION_DATE')))
			{
				$id = $array['ID'];
				$user_id = $array['USER_ID'];
				$token = $array['TOKEN'];
				$remember_me = $array['REMEMBER_ME'];
				$update_date = $array['UPDATE_DATE'];
				$creation_date = $array['CREATION_DATE'];
							
				if(all_not_empty(array($id, $user_id, $token, $remember_me, $update_date, $creation_date)))
				{
					if(is_numeric($id) && is_numeric($user_id))
					{			
						return new Session(intval($id), intval($user_id), $token, $remember_me, $update_date, $creation_date);	
					}
				}
			}
			
			return false;
		}
		
		static function parse_multiple($array)
		{
			$parsed = array();
			
			foreach($array as $_array)
			{
				$parse = self::parse_single($_array);
				
				if(!$parse)
				{
					return false;
				}
				
				if(!array_push($parsed, $parse))
				{
					return false;
				}
			}
			
			return $parsed;
		}
	}
	
	
	
?>