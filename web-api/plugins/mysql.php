<?php
	
	// MySQL API plugin

	abstract class Database
	{
		private $host = 'localhost';
		private $user = 'user';
		private $pass = 'xxxxxxxxxxx';
		
		function connect()
		{
			return mysql_connect($host, $user, $pass) != false;
		}
		
		function disconnect()
		{
			return mysql_close() != false;
		}
		
		function select_single($mysql_query_string)
		{
			$mysql_query = mysql_query($mysql_query_string);
			
			if($mysql_query != false)
			{
				return mysql_fetch_assoc($mysql_query);
			}
			
			return false;
		}
	}
	
?>