<?php

	// Framework classes
	
	class User
	{
		public $id;
		public $username;
		public $email;
		public $password;
		public $state;
		public $capes;
		public $active_cape;
		
		function __construct($id, $username, $email, $password, $state, $capes, $active_cape)
		{
			$this->id = $id;
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->state = $state;
			$this->capes = $capes;
			$this->active_cape = $active_cape;
		}
	}
	
	// For now i think we should do like $0.10 per cape, just to get things rolling.
	
	class Cape
	{
		public $id;
		public $name;
		public $price;
		
		function __construct($id, $name, $price)
		{
			$this->id = $id;
			$this->name = $name;
			$this->price = $price;
		}
		
		function image_location()
		{
			return "/home/billybob1060/public_html/api/storage/capes/".sha1($this->id).".png";
		}
	}
	
?>