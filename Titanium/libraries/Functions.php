<?php

	function _ti_handler( $severity, $message, $filepath, $line )
	{
		if( $severity != E_STRICT )
			echo "<b>Error:</b> $message in <b>$filepath</b> at line <b>$line</b><br />\n";
		
		// print_r(func_get_args());
	}
	
	function &getInstance()
	{
		return Controller::getInstance();
	}
	
	function getControllerData()
	{
		$logic =& Loader::load_class('Logic');
		return array(
			'controller' => $logic->controller,
			'method' => $logic->method,
			'args' => $logic->arguments
		);
	}
	
	function error_404()
	{
		$out =& Loader::load_class('Output');
		$load =& Loader::load_class('Load');
				
		$try = $load->view( "errors/error_404.php", array(), true );
		
		if( $try != false )
			$out->set_output($try);
			
		else
			$out->set_output("<h1>404 Not Found!</h1>");
	}