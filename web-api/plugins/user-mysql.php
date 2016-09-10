<?php
	
	// User MySQL API plugin
	
	function fetch_user_by_id($id)
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
	
?>