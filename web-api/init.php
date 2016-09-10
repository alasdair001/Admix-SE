<?php

	// Framework init
	
	$plugin_dir = 'plugins/';	
	
	require 'framework/classes.php';
	require 'framework/variables.php';
	
	if(file_exists($plugin_dir))
	{
		$files = scandir($plugin_dir);
		
		if($files != FALSE)
		{
			foreach($files as $file)
			{
				if(!@include($file))
				{
					error_log('Failed to include additional plugin ('.$file.')');
				}
			}
		}
	}
	
	
?>