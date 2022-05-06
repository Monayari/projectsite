<?php
class Dbconnection
{
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $db="test1";
	private $char="utf8";
	protected $connection;
	
	public function __construct()
	{
		if(!isset($this->connection))
		{
			$this->connection= new PDO("mysql:host=".$this->host."; dbname=".$this->db.";charset=".$this->char,$this->user);
//$this->connection->exec("SET character_set_ connection='utf8'");
//$this->connection->exec("SET NAMES 'utf8'");
			if(!$this->connection)
			{
				echo  "Cannot connect to database server";
                exit;
			}
			        return $this->connection;

		}
	}
	
}





?>