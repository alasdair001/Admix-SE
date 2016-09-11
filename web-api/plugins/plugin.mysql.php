<?php
	
	// MySQL API plugin

	abstract class Database
	{
		static private $host = 'localhost';
		static private $user = 'user';
		static private $pass = 'xxxxxxxxxxx';
		
		static function connect()
		{
			return mysql_connect($host, $user, $pass) != false;
		}
		
		static function disconnect()
		{
			return mysql_close() != false;
		}
		
		static function safe_str($str)
		{
			return mysql_real_escape_string($str);
		}		
		
		static function select_single($mysql_query_string)
		{
			$mysql_query = mysql_query($mysql_query_string);
			
			if($mysql_query != false)
			{
				return mysql_fetch_assoc($mysql_query);
			}
			
			return false;
		}
		
		static function select_multiple($mysql_query_string)
		{
			$mysql_query = mysql_query($mysql_query_string);
			
			if($mysql_query != false)
			{
				$array = array();
				
				while($row = mysql_fetch_row($mysql_query))
				{
					if(!array_push($array, $row))
					{
						return false;
					}
				}
				
				return array();
			}
			
			return false;
		}
	}
	
?>