<?php
class Instructor{
	public $id;
	public $type;
	public $links = array('Passpapers'=>'uploadpasspaper.php');
	public $registered_modules;
	public $connection;
	
	function __construct($id, $connection = null){
		$this->id = $id;
		$this->type ="instructor";
		if(!empty($connection))$this->connection=$connection;
	}

	function getDBConnetion(){
		return $this->connection;
	}
	
	public function getRegisteredModules($user){

		$query="SELECT  modules from instructor_modules where instructor_name='$user->id'";
		try {
			$execute_object=$this->connection->query($mydb,$query);
		} catch (Exception $e) {
			echo "Query not executed successfully!!!";
		}

		if ($execute_object) {
			$result_set=mysqli_fetch_assoc($execute_object);
			$registered_modules=explode(",",$result_set['modules']);
			

		}

		return $registered_modules;

	}
}
?>