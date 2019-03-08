<?php
class Admin{
	public $id;
	public $type;
	public $connection;
	
	public $links = array('Register Exams' => 'register.php', 'Recorrection' => 'admin_recorrection.php', 'Accept Result'=>'approveresults.php');
	function __construct($id, $connection = null){
		$this->id = $id;
		$this->type ="admin";
		if(!empty($connection))$this->connection=$connection;
	}
	
	function getDBConnetion(){
		return $this->connection;
	}
}
?>