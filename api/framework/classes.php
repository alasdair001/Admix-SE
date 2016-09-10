<?php

	// Framework classes
	
	class User
	{
		private $id;
		private $username;
		private $email;
		private $password;
		private $state;
		
		function __construct($id, $username, $email, $password, $state)
		{
			$this->id = $id;
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->state = $state;
		}
	}
	
?>