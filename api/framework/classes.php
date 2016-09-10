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
	
	class Pricing
	{
		private $currencies = array();
		
		function put($currency, $price)
		{
			$currencies[$currency] = $price;
		}
		
		function get($currency)
		{
			return $currencies[$currency];
		}
	}
	
	class Product
	{
		private $id;
		private $name;
		private $description;
		private $pricing;
		
		function __construct($id, $name, $description, $price)
		{
			$this->id = $id;
			$this->name = $name;
			$this->description = $description;
			$this->price = $price;
		}
	}
	
?>