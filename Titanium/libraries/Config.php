<?php

	class Config
	{
	
		public $config = array();
		
		function __construct()
		{
			$this->config = $this->load_config();
			
			if( !$this->get('base_url') )
			{
				if (isset($_SERVER['HTTP_HOST']))
				{
					$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
					$base_url .= '://'. $_SERVER['HTTP_HOST'];
					$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
				}
	
				else
				{
					$base_url = 'http://localhost/';
				}
				
				$this->set('base_url', $base_url);
			}
		}
		
		public function set( $item = null, $value = '' )
		{
			if($item == null)
				return false;
				
			$this->config[$item] = $value;
			
			return $this;
		}
		
		public function get( $item = null )
		{
			if($item == null)
				return null;
				
			return (isset($this->config[$item])) ? $this->config[$item] : null;
		}
		
		public function item( $item = null )
		{
			return $this->get( $item );
		}
		
		private function load_config()
		{
			if( file_exists( APP_PATH . 'config/' . 'config.php' ) )
			{
				include APP_PATH . 'config/' . 'config.php';
				
				if( !isset( $config ) )
					exit("Config file not formatted correctly.");
				
				return $config;
			}
			
			exit("Config file does not exist!");
		}
		
	}