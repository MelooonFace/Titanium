<?php

	class Welcome extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function __request()
		{
			$this->output->append_output(print_r(func_get_args()));
		}
		
		public function index()
		{			
			$this->output->append_output("Welcome to Titanium!");
		}
		
	}