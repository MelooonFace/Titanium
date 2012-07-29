<?php

	/**
	 * ---------------------------
	 *     Titanium Framework
	 * ---------------------------
	 */
	
	require_once( APP_PATH . 'libraries/Functions.php' );
	set_error_handler( '_ti_handler' );
	
	require_once( APP_PATH . 'libraries/Loader.php' );
	new Loader();
	
	require_once( APP_PATH . 'libraries/Util.php' );
	new Util();
	
	$_benchmark =& Loader::load_class( 'Benchmark' );
	$_benchmark->mark( "titanium_start" );
	
	$_config =& Loader::load_class( 'Config' );
	$_output =& Loader::load_class( 'Output' );
	$_uri =& Loader::load_class( 'Uri' );
	$_logic =& Loader::load_class( 'Logic' );
	
	$_load =& Loader::load_class( 'Load' );
	
	Loader::load_core();	
	Util::init_controller();
	
	$_benchmark->mark( "titanium_end" );
	$_output->parse();
	$_output->render();