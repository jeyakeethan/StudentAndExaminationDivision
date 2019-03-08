<?php
class Student{
	public $id;
	public $type;
	public $batch;
	public $connection;
	
	public $links = array('Passpapers'=>'listpasspapers.php', 'Conn. Assignments' => 'Registered%20Modules.php', 'Register Exams' => 'RegisterForExamStudent.php','Time Table' => 'time_tableStudent.php', 'Recorrection' => 'stud_recorrection.php', 'QUIZ' => 'quiz_home.php', 'Result' => 'resultsview.php?results=show');
	function __construct($id, $connection = null){
		$this->id = $id;
		$this->batch = "20".substr($id,0,-5);
		$this->type ="student";
		if(!empty($connection))$this->connection=$connection;
	}

	function getDBConnetion(){
		return $this->connection;
	}
}
?>