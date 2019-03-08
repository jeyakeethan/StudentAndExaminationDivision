<?php require 'header.php';?>
<style>
.internal table, th, td {
    border-collapse: collapse;
}
.internal th, td{
	height:30px;
    text-align: center;
	text-indent:8px;
	min-width:170px;
}
#container{
	padding-left: 20px;
}
</style>
<div class="bordered_frame" >
<?php
	if(isset($_GET['customer_id'])&&!empty($_GET['customer_id'])){
		$customer_id = $_GET['customer_id'];
		$query ="SELECT `c_name`, `aproval_status`".
				"FROM `customers`".
				"WHERE `c_id` = '$customer_id'".
				"LIMIT 1";
		$result = true;
		if($result!=NULL){
			$customer_name = mysqli_fetch_row($result)[0];
			if($result){
				$query ="UPDATE TABLE `customers`".
					"SET `aproval_status` = 'false'".
					"WHERE `c_id` = '$customer_id'".
					"LIMIT 1";
				$aproval_status = "Disaproved";
			}
			else{
				$query ="UPDATE TABLE `customers`".
					"SET `aproval_status` = 'true'".
					"WHERE `c_id` = '$customer_id'".
					"LIMIT 1";
				$aproval_status = "Aproved";
			}
		}
		$result = true;
		if(result){echo "Customer $customer_id, $customer_name has $aproval_status Successfully.";}
?>
<?php
	}
	else{
?>

<div id="Search bar" align="right">
	<form action="" method="GET">
		<input id="search_id" name="search_id" type="text" placeholder="Customer ID">
		<input type="submit" value="Search">
	</form>
</div>
</br>

<?php
	if (isset($_GET['search_id'])&&!empty($_GET['search_id'])){
		$search_text = $_GET['search_id'];
		$query = "SELECT (`c_id`, `c_name`)".
				"FROM `customers`".
				"WHERE `c_id` LIKE '$search_text%' OR `c_name` LIKE '%$search_text%'";
	}
	else{
		$query = "";
	}
		$result = false and mysqli_query($mydb, $query);
		if($result){
			echo '<table class="internal">'.
				'<tr><th>ID</th><th>Name</th><th>Details</th><th>Approve/Disaprove</th></tr>';
		
			while($customer = mysqli_fetch_row($result)){
				$status=$customer[2]?"Disaprove":"Approve";
				echo
				'<tr>'
						.'<td width="auto">'.$customer[0].'</td>'
						.'<td width="auto"">'.$customer[1].'</td>'
						.'<td align="center">'
							.'<a href="##########Customer_detail_link?='.$customer[0].'">Details</a>'
						.'</td>'
						.'<td align="center">'
							.'<a href="?customer_id='.$customer[0].'">'.$status.'</a>'
						.'</td>'
				.'</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>
<?php require_once 'footer.php';?>
