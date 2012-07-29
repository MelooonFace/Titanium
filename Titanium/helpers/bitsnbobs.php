<?php

	function get_message( $code = 200 )
	{
		$stati = get_error_codes();

		if ( isset($stati[$code]) )
		{
			return $code . ' ' .$stati[$code];
		}
		
		else
		{
			return get_message( 500 );
		}
	}

	function set_status_header( $code = 200, $text = null )
	{		
		$stati = get_error_codes();

		if ( isset($stati[$code]) && $text == null )
		{
			$text = $stati[$code];
		}

		$server_protocol = (isset($_SERVER['SERVER_PROTOCOL'])) ? $_SERVER['SERVER_PROTOCOL'] : FALSE;

		if ( substr(php_sapi_name(), 0, 3) == 'cgi' )
		{
			header("Status: {$code} {$text}", TRUE);
		}
		
		else if ( $server_protocol == 'HTTP/1.1' || $server_protocol == 'HTTP/1.0' )
		{
			header($server_protocol . " " .$code. " " .$text, TRUE, $code);
		}
		
		else
		{
			header("HTTP/1.1 " .$code. " " .$text, TRUE, $code);
		}
	}

	function get_error_codes()
	{
		return array(
			200	=> 'OK',
			201	=> 'Created',
			202	=> 'Accepted',
			203	=> 'Non-Authoritative Information',
			204	=> 'No Content',
			205	=> 'Reset Content',
			206	=> 'Partial Content',
	
			300	=> 'Multiple Choices',
			301	=> 'Moved Permanently',
			302	=> 'Found',
			304	=> 'Not Modified',
			305	=> 'Use Proxy',
			307	=> 'Temporary Redirect',
	
			400	=> 'Bad Request',
			401	=> 'Unauthorized',
			403	=> 'Forbidden',
			404	=> 'Not Found',
			405	=> 'Method Not Allowed',
			406	=> 'Not Acceptable',
			407	=> 'Proxy Authentication Required',
			408	=> 'Request Timeout',
			409	=> 'Conflict',
			410	=> 'Gone',
			411	=> 'Length Required',
			412	=> 'Precondition Failed',
			413	=> 'Request Entity Too Large',
			414	=> 'Request-URI Too Long',
			415	=> 'Unsupported Media Type',
			416	=> 'Requested Range Not Satisfiable',
			417	=> 'Expectation Failed',
	
			500	=> 'Internal Server Error',
			501	=> 'Not Implemented',
			502	=> 'Bad Gateway',
			503	=> 'Service Unavailable',
			504	=> 'Gateway Timeout',
			505	=> 'HTTP Version Not Supported'
		);
	}