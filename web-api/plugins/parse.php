<?php
	
	// Parse API plugin
	
	abstract class UserParse
	{
		function run_checks($array)
		{
			if(array_has_keys($array, array('id', 'username', 'email', 'password', 'state', 'capes', 'active_cape')))
			{
				
			}
		}
		
		function parse_single($array)
		{
			
		}	
	}
	
?>