<?php 
require_once("Include/DB.php");
if(isset($_POST['Submit'])){
	if((!empty($_POST["EName"]))and(!empty($_POST["SSN"]))){
		$EName = $_POST["EName"];
		$SSN = $_POST["SSN"];
		$Dept = $_POST["Dept"];
		$Salary = $_POST["Salary"];
		$HomeAddress=$_POST["HomeAddress"];
		global $ConnectingDB;
		$sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)
		VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
		$stmt =  $ConnectingDB->prepare($sql);
		$stmt->bindValue(':enamE',$EName);
		$stmt->bindValue(':ssN',$SSN);
		$stmt->bindValue(':depT',$Dept);
		$stmt->bindValue(':salarY',$Salary);
		$stmt->bindValue(':homeaddresS',$HomeAddress);
		$Execute = $stmt->execute();
		if($Execute){
			echo '<span class="success">Record Has been Addedd Successfully</span>'; 
		}
	}else{
		echo '<span class="FieldInfoHeading">Pleas Add atleast Name and Social Securiti Number</span>';
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	
	<title>DB&PHP</title>
	<link type="text/css" rel="stylesheet" href="include/style.css" media="all" />
	<style>
		.FieldInfo{
	color:rgb(251,174,44);
	font-family: Bitter,Georgia,"Times New Roman",Times,serif;
	font-size: 1em;
}
div{
	widows: 500px;
	margin-left: 360px;
	margin-right: 700px;
}
input[type="text"],textarea{
	border:1px solid dashed;
	background-color: rgb(221,216,212);
	width: 480px;
	padding: .5em;
	font-size: 1.0em;
}
input[type="Submit"]{
	color: white;
	font-size: 1.0em;
	font-family: Bitter,Georgia,Times,"Times New Roman",serif;
	width: 200px;
		height: 40px;
		background-color: #5D0580;
		border:5px solid;
		border-bottom-left-radius:35px;
		border-bottom-right-radius:35px;
		border-top-left-radius: 35px;
		border-top-right-radius:35px;
		border-color: rgb(221,216,212);
		font-weight: bold;
		float:left;
}
.FieldInfoHeading{
	color: rgb(251,174,44);
	font-family:Bitter,Georgia,"Times New Roman",Times,serif;
	font-size:1.3em;


}
.success{
	color: rgb(158,27,214);
	font-family: Bitter,Georgia,"Times New Roman",Times,serif;
	font-size: 1.4em;
	font-weight:bold;
}
	</style>


</head>
<body>
	<?php  ?>
	<div class="" >
		<form class="" action="insetr_into_database.php" method="post">
			<fieldset>
				<span class="FieldInfo">Employee Name:</span>
				<br>
				<input type="text" name="EName" value="">
				<br>
				<span class="FieldInfo">Social Securiti Num:</span>
				<br>
				<input type="text" name="SSN" value=""> 
				<br>
				<span class="FieldInfo">Department:</span>
				<br>
				<input type="text" name="Dept" value="">
				<br>
				<span class="FieldInfo">Salary:</span>
				<br>
				<input type="text" name="Salary" value="">
				<br>
				<span class="FieldInfo">Home Address:</span>
				<br>
				<textarea name="HomeAddress" rows="8" cols="80"></textarea>
				<br>
				<input type="submit" name="Submit" value="Sumit your recorde" >
			</fieldset>


		</form>


	</div>
</body>
</html>