<?php
class Lecturer{
	public $id;
	public $type;
	public $links = array('Assignments' => 'assignment.php', 'Recorrection' => 'lec_recorrection.php', 'Set QUIZ' => 'quiz_home.php?content=QC', 'Result' => 'updateresults.php', 'Passpapers'=>'uploadpasspaper.php');
	public $connection;
	
	function __construct($id, $connection = null){
		$this->id = $id;
		$this->type ='lecturer';
		if(!empty($connection))$this->connection=$connection;
	}
	
	function getDBConnetion(){
		return $this->connection;
	}
}
?>