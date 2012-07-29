<?php

	class Uri
	{
	
		public $segments;
		
		function __construct()
		{
			
			if( !isset( $_GET['req'] ) || empty( $_GET['req'] ) )
				$this->segments = array();
			
			else
				$this->segments = explode( "/", $_GET['req'] );
			
		}
		
		public function segment( $index )
		{
			if( !isset( $this->segments[$index] ) )
				return null;
			
			return $this->segments[$index];
		}
		
		public function item( $index )
		{
			return $this->segment( $index );
		}
		
	}