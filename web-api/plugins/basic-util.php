<?php
	
	// Basic Util API plugin
	
	function array_has_keys($array, $keys)
	{
		foreach($keys as $key)
		{
			if(!array_key_exists(strval($key), $array))
			{	
				return false;
			}
		}
		
		return true;
	}
	
?>