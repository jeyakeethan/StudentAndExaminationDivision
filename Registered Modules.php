<?php 

	require_once 'header.php';
	if(!isset($_SESSION['user'])|| $_SESSION['user']->type!="student"){logout($this_page);}
     
 ?>

	<title>Registered Modules</title>
	<link rel="stylesheet" type="text/css" href="includes/list_style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">


	<h2 style="margin-left:10px;">Select a Module</h2>
	<?php 

		$query="select modules from student_modules where student_name='$user->id'";
		$connection = $user->getDBConnetion();
		$execute_object=connection->query($query);
		if ($execute_object) {
			$result_set=mysqli_fetch_assoc($execute_object);
			$registered_modules=explode(",",$result_set['modules']);
		}

		





	 ?>

<ul class="b">
	<?php 

		foreach ($registered_modules as $m) {

			echo "<li class='b' style='font-size:35px;'><a href='Given_CAs.php?module=$m'>".$m."</a></li>";   
			
		}

	 ?>
	
	



</ul>


<?php require_once 'footer.php';?>