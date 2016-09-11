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
	
?>