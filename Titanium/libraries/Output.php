<?php

	class Output
	{
		
		private $output = "";
		
		public function set_output($out)
		{
			$this->output = $out;
			
			return $this;
		}
		
		public function append_output($out)
		{
			$this->output .= $out;
			
			return $this;
		}
		
		public function get_output()
		{
			return $this->output;
		}
		
		public function clear_output()
		{
			$this->set_output("");
			
			return $this;
		}
		
		public function parse()
		{
			$bench =& Loader::load_class("Benchmark");
			
			str_replace("{elapsed_time}", $bench->elapsed_time(), $this->get_output());
			return; // TODO parser
		}
		
		public function render()
		{
			echo $this->get_output();
		}
		
	}