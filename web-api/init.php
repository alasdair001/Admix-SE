<?php

	// Framework init
	
	$plugin_dir = '/home/alasdairxd/public_html/temp/api/plugins/';	
	
	require 'framework/classes.php';
	require 'framework/variables.php';
	
	function startsWith($haystack, $needle) {
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}
	
	function endsWith($haystack, $needle) {
	    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
	}
	
	if(file_exists($plugin_dir))
	{
		$files = scandir($plugin_dir);
		
		if($files != false)
		{
			foreach($files as $file)
			{				
				if(startsWith($file, "plugin.") && endsWith($file, ".php"))
				{				
					if(!@include($plugin_dir.$file))
					{
						error_log('Failed to include additional plugin ('.$file.')');
					}
				}
			}
		}
	}
	
	
?>