<?php

	class Loader
	{
		
		private static $classes = array();
		private static $loaded = array();
		
		function __construct() 
		{
			// Nothing yet :)
		}
		
		public function &load_class( $class = null, $folder = 'libraries' )
		{
			if( isset( self::$classes[$class] ) )
				return self::$classes[$class];
			
			if( file_exists( APP_PATH . $folder . '/' . $class . '.php' ) )
			{
				require_once( APP_PATH . $folder . '/' . $class . '.php' ); // Require the file
				
				if( class_exists( $class ) )
				{
					self::loaded( $class, $folder );
					
					self::$classes[$class] = new $class();
					return self::$classes[$class];
				}
				
				else
				{
					exit("Could not load class, instance of class not found.");
				}
					
			}
			
			else
			{
				exit("Could not load class, file does not exist.");
			}
		}
		
		public function &loaded( $class = null, $folder = 'libraries' )
		{
			if( $class != null )
				self::$loaded[$class] = $class. ':' .$folder;
			
			return self::$loaded;
		}
		
		public function &get_classes()
		{
			return self::$classes;
		}
		
		public function load_core()
		{
			foreach( glob( APP_PATH . "core/*.php") as $inc )
				require( $inc );
		}
		
		public function load_helper( $helper )
		{
			if( file_exists( APP_PATH . 'helpers/' . $helper . '.php' ) )
			{
				require_once( APP_PATH . 'helpers/' . $helper . '.php' );
			}
		}
		
	}