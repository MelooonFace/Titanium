<?php

	class Util
	{
		
		public function init_controller()
		{
			$data = getControllerData();
			$controller = $data['controller'];
			$method = $data['method'];
			$args = $data['args'];
			
			if( file_exists( APP_PATH . 'controllers/' . $controller . '.php' ) )
			{
				require_once( APP_PATH . 'controllers/' . $controller . '.php' );
				
				if( class_exists( $controller ) )
				{
					$Ti = new $controller();
					
					if( $Ti instanceof Controller )
					{
						if( method_exists( $Ti, "__request" ) )
						{
							call_user_func_array(
								array(
									$Ti,
									"__request"
								),
								array(
									$method,
									$args
								)
							);
						}
					
						else if( method_exists( $Ti, $method ) )
						{
							call_user_func_array(
								array(
									$Ti,
									$method
								),
								$args
							);
						}
						
						else
						{
							error_404();
						}
					}
					
					else
					{
						error_404();
					}
				}
				
				else
				{
					error_404();
				}
			}
			
			else
			{
				error_404();
			}
		}
		
	}