<?php

	class Model
	{
	
		function __construct()
		{
			// Nothing yet :)
		}
		
		public function _Ti( $item )
		{
			$Ti =& getInstance();
			return $Ti->$item;
		}
		
	}