<?php


class Connection extends mysqli{
	private static $availableConnections = array();
	private static $blockedConnections = array();
	private static $numberOfConnections = 0;
	
	private $id;
	private static $host;
	private static $username;
	private static $password;
	private static $database;
	
	
	private function __construct(){
		if(self::$host&&self::$username&&self::$database)
			parent::__construct(self::$host, self::$username, self::$password, self::$database);
		else throw new Exception('Server and Database must be set using static method setConnectionData() before create a connection object');
		$this->id = "conn".self::$numberOfConnections;
		self::$numberOfConnections++;
		self::$availableConnections[$this->id] = $this;
	}
	
	public static function grabAConnection(){
		if(empty(self::$availableConnections)){
			$connection = new Connection();
		}
		$conn = array_pop(self::$availableConnections);
		return self::$blockedConnections[$conn->getID()] = $conn;
	}
	
	public static function setConnectionData($host,$username,$password,$database){
		self::$host = $host;
		self::$username=$username;
		self::$password=$password;
		self::$database=$database;
	}
	
	public static function fleshObjectPool(){
		while(sizeof(self::$availableConnections)>10)
			array_pop(self::$availableConnections);
	}
	
	public static function releaseAConnection($connection){
		self::$availableConnections[$connection->getID()] = self::$blockedConnections[$connection->getID()];
		unset(self::$blockedConnections[$connection->getID()]);
		$connection = null;
		self::fleshObjectPool();
	}
	
	public function getID(){
		return $this->id;
	}
}
?>