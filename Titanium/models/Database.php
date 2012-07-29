<?php

	class Database extends Model
	{
		
		public $conn, $host, $port, $user, $pass, $prefix, $db;
		
		public function __construct( $host = null, $port = null, $user = null, $pass = null, $prefix = null, $db = null, $connect = false )
		{
			if( isset( $host ) )
			{
				$this->host = $host;
				$this->port = $port;
				$this->user = $user;
				$this->pass = $pass;
				$this->prefix = $prefix;
				$this->db = $db;
				
				if( $connect )
					$this->__connect();
			}
		}
		
		public function __connect()
		{
			$this->conn = mysql_connect(
				$this->host. ':' .$this->port,
				$this->user, $this->pass
			);
			
			mysql_select_db( $this->prefix . $this->db, $this->conn );
			
			return $this;
		}
		
		public function setHost( $host )
		{
			$this->host = $host;
			
			return $this;
		}
		
		public function setPort( $port )
		{
			$this->port = $port;
			
			return $this;
		}
		
		public function setUser( $user )
		{
			$this->user = $user;
			
			return $this;
		}
		
		public function setPass( $pass )
		{
			$this->pass = $pass;
			
			return $this;
		}
		
		public function setPrefix( $prefix )
		{
			$this->prefix = $prefix;
			
			return $this;
		}
		
		public function setDatabase( $db )
		{
			$this->db = $db;
			
			return $this;
		}
		
		public function getHost()
		{
			return $this->host;
		}
		
		public function getPort()
		{
			return $this->port;
		}
		
		public function getUser()
		{
			return $this->user;
		}
		
		public function getPass()
		{
			return $this->pass;
		}
		
		public function getPrefix()
		{
			return $this->prefix;
		}
		
		public function getDatabase()
		{
			return $this->db;
		}
		
	}