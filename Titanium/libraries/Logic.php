<?php

	class Logic
	{
		
		private static $uri;
		public $match, $controller, $method, $arguments;
		
		function __construct()
		{
			$this->uri =& Loader::load_class("Uri");
			$this->config =& Loader::load_class("Config");
			
			$this->init();
		}
		
		public function init()
		{
			
			if( !$this->uri->segment(0) )
				$this->controller = $this->config->get('default_controller');
			else
				$this->controller = $this->uri->segment(0);
			
			if( !$this->uri->segment(1) )
				$this->method = $this->config->get('default_method');
			else
				$this->method = $this->uri->segment(1);
			
			if( !$this->uri->segment(2) )
				$this->arguments = array();
			else
			{
				$final = array();
				
				$args_pre = $this->uri->segments;
				unset($args_pre[0], $args_pre[1]);
				
				foreach($args_pre as $arg)
					$final[] = $arg;
				
				$this->arguments = $final;
			}
			
			// Fix stuff
			$this->controller = ucfirst(strtolower($this->controller));
			$this->method = strtolower($this->method);
			
		}
		
		/* public function init()
		{
			switch( count( $this->uri->segments ) )
			{
				case 0:
					$this->logic_zero();
					break;
				
				case 1:
					$this->logic_one();
					break;
					
				default:
					$this->logic_default();
					break;
			}
		}
		
		public function logic_zero()
		{
			$this->controller = $this->config->item('default_controller');
			$this->method = $this->config->item('default_method');
			$this->arguments = array();
			
			$this->match = true;
		}
		
		public function logic_one()
		{
			if( check_logic( $this->config->item('default_controller'), $this->uri->segment(0) ) )
			{
				$this->controller = $this->config->item('default_controller');
				$this->method = $this->uri->segment(0);
				$this->arguments = array();
				
				$this->match = true;
			}
			
			else if( check_logic( $this->uri->segment(0), $this->config->item('default_method') ) )
			{
				$this->controller = $this->uri->segment(0);
				$this->method =$this->config->item('default_method');
				$this->arguments = array();
				
				$this->match = true;
			}
			
			else
			{
				$this->match = false;
			}
		}
		
		public function logic_default()
		{
			$this->controller = $this->uri->segment(0);
			$this->method = $this->uri->segment(1);
			
			$final = array();
			
			$args_pre = $this->uri->segments;
			unset($args_pre[0], $args_pre[1]);
			foreach($args_pre as $arg)
				$final[] = $arg;
			
			$this->arguments = $final;
			
			$this->match = true;
		}
		
		public function matched()
		{
			return ($this->match);
		}
		
		public function get( $item )
		{
			return $this->$item;
		}
		
		public function check_logic( $controller, $method )
		{
			if( !file_exists(APP_PATH. 'controller/') )
		} */
		
	}