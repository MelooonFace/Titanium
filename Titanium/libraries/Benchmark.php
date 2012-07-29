<?php

	class Benchmark
	{
		
		public $marks;
		
		public function mark( $key = null )
		{
			if( $key == null )
				return;
			
			$this->marks[$key] = microtime();
			
			return $this;
		}
		
		function elapsed_time($a = 'titanium_start', $b = 'titanium_end', $dec = 4)
		{
			list($sm, $ss) = explode(' ', $this->marks[$a]);
			list($em, $es) = explode(' ', $this->marks[$b]);
	
			return number_format(($em + $es) - ($sm + $ss), $dec);
		}
		
	}