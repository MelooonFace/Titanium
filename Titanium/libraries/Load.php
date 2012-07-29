<?php

	class Load {
		
		function view( $filename, $vars, $return = false )
		{
			$view_data = null;
			extract($vars);
						
			if( file_exists( APP_PATH. "views/" .$filename ) )
			{
				if( $return )
					ob_start();
					
				include APP_PATH. "views/" .$filename;
				
				if( $return ) {
					$view_data = ob_get_contents();
					ob_end_clean();
					
					return $view_data;
				}
				
				else
					return false;
			}
			
			else
				return false;
		}
		
	}