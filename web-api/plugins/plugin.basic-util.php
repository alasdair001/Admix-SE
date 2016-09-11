<?php
	
	// Basic Util API plugin
	
	function array_has_keys($array, $keys)
	{
		foreach($keys as $key)
		{
			if(!array_key_exists($key, $array))
			{	
				return false;
			}
		}
		
		return true;
	}

	function all_not_empty($array)
	{
		foreach($array as $check)
		{
			if(empty($check))
			{
				return false;
			}
		}
		
		return true;
	}
	
?>