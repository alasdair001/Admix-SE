<?php
	
	// MySQL API plugin

	abstract class Database
	{
		public static $host = 'localhost';
		public static $user = 'Admix-SE-API';
		public static $pass = 'xAR,#@Cakn.,';
		
		static function connect()
		{
			return mysql_connect(self::$host, self::$user, self::$pass) != false;
		}
		
		static function connect_db($database)
		{
			return mysql_select_db($database) != false;
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