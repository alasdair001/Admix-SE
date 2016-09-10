<?php
	
	// Parse API plugin
	
	abstract class UserParse
	{
		function parse_single($array)
		{
			if(array_has_keys($array, array('id', 'username', 'email', 'password', 'state', 'capes', 'active_cape')))
			{
				$id = $array['id'];
				$username = $array['username'];
				$email = $array['email'];
				$password = $array['password'];
				$state = $array['state'];
				$capes = $array['capes'];
				$active_cape = $array['active_cape'];
				
				if(all_not_empty(array($id, $username, $email, $password, $state)))
				{
					if(is_numeric($id) && is_numeric($state) && is_numeric($active_cape))
					{
						$capes = json_decode($capes, false);
						
						if($capes != false)
						{
							return new User(intval($id), $username, $email, $password, intval($state), $capes, intval($active_cape));	
						}
					}
				}
			}
			
			return false;
		}
		
		function parse_multiple($array)
		{
			$parsed = array();
			
			foreach($array as $_array)
			{
				$parse = parse_single($_array);
				
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