<?php 
require_once("Include/DB.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>View From into Databasse</title>
	<link type="text/css" rel="stylesheet" href="include/style.css" media="all" />
</head>
<body>
	<h2 class="success"><?php echo @$_GET['id']; ?></h2>
	<div>
		<fieldset>
			<form action="view_from_database.php" method="get">
				<input type="text" name="Search" placeholder="Search by name / ssn">
				<input type="submit" name="Button" value="Search record">
			</form>
		</fieldset>
		</div>
	<?php 
	if (isset($_GET["Button"])) {
			$Search = $_GET["Search"];
			$sql ="SELECT * FROM emp_record	WHERE ename=:searcH OR ssn=:searcH";
			$stmt=$ConnectingDB->prepare($sql);
			$stmt->bindValue('searcH',$Search);
			$stmt->execute();
			while ($DataRows = $stmt->fetch()) {
					$Id          = $DataRows["id"];
					$EName       = $DataRows["ename"];
					$SSN         = $DataRows["ssn"];
					$Department  = $DataRows["dept"];
					$Salary      = $DataRows["salary"];
					$HomeAddress = $DataRows["homeaddress"];
					?>
					<div class="success">
					<table width="1000" border="5" align="center">	
						<caption>Search Result</caption>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>SSN</th>
							<th>Department</th>
							<th>Salary</th>
							<th>Home Address</th>
							<th>Search Again</th>
						</tr>
							<tr>	
								<td><?php echo $Id ;?></td>
								<td><?php echo $EName ;?></td>
								<td><?php echo $SSN ;?></td>
								<td><?php echo $Department ;?></td>
								<td><?php echo $Salary ;?></td>
								<td><?php echo $HomeAddress ;?></td>
								<td><a href="view_from_database.php">Search Again</a></td>	
							</tr>	
					</table>
					</div>	
			<?php }//ending while loop
	}//Ending of submit button 
	 ?>
	<table width="1000" border="5" align="center">
		<caption>Vie From Database</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>SSN</th>
			<th>Department</th>
			<th>Salary</th>
			<th>HomeAddress</th>
			<th>Update</th>
			<th>Deloete</th>
		</tr>

	
	<?php 
		global $ConnectingDB;
		$sql="SELECT * FROM emp_record";
		$stmt = $ConnectingDB->query($sql);
		while ($DataRows=$stmt->fetch()){
			$Id          = $DataRows['id'];
			$EName       = $DataRows['ename'];
			$SSN         = $DataRows['ssn'];
			$Department  = $DataRows['dept'];
			$Salary      = $DataRows['salary'];
			$HomeAddress = $DataRows["homeaddress"];
		
	 ?>
	 <tr>
	 	<td><?php echo $Id;?></td>
	 	<td><?php echo $EName;?></td>
	 	<td><?php echo $SSN;?></td>
	 	<td><?php echo $Department;?></td>
	 	<td><?php echo $Salary;?></td>
	 	<td><?php echo $HomeAddress;?></td>
	 	<td><a href="Update.php?id=<?php echo $Id;?>">Update</a></td>
	 	<td><a href="Delete.php?id=<?php echo $Id;?>">Delete</a></td>
	 </tr>
	 <td><?php } ?></td>
	</table>
	<div>
	</div>
</body>
</html>