<?php

	class Controller
	{
		
		private static $instance;
		
		function __construct()
		{
			self::$instance =& $this;
						
			foreach(Loader::loaded() as $info)
			{
				$split = explode(":", $info);
								
				$obj = strtolower($split[0]);
				$folder = $split[1];
				
				$this->$obj =& Loader::load_class( $split[0], $folder );
			}
		}
		
		public function &getInstance()
		{
			return self::$instance;
		}
		
	}