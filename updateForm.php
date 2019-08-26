<?php
	$sid="";
	$name="";
	$age="";
	$address="";
		
if (isset($_REQUEST["searchid"])){
		$searchid=$_REQUEST["searchid"];
	
	
	$con=mysqli_connect("localhost","nadeesha","pdnc");
	
	
	$database=mysqli_select_db($con,"students");
	
	
	$sql="SELECT * FROM student WHERE sid='$searchid' ";
	
	
	$result=mysqli_query($con,$sql);
 
 	if($row = mysqli_fetch_array($result)){
		$sid=$row[0];
		$name=$row[1];
		$age=$row[2];
		$address=$row[3];
		//echo "Records Updated";
	}else{
		echo "Not  This Record In Database<br/>";	
	}
	
//CLOSE CONNECTION
	mysqli_close($con);
	
	
	}
	
?>
<?php
if (isset($_REQUEST["update"])){
		//$searchid=$_REQUEST["searchid"];
	$con=mysqli_connect("localhost","nadeesha","pdnc");
	
	
	$database=mysqli_select_db($con,"students");
	
	
$sql="UPDATE student SET  name='$_POST[name]' , age='$_POST[age]' , address='$_POST[address]' WHERE sid='$_POST[sid]'";
	
	
	if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
		
	mysqli_close($con);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update  Student</title>
</head>

<body>

<form method="post" action="updateForm.php" name="form" style="text-align:center" >
<h1>Update Student</h1>
Enter SId: <input type="text" name="searchid" size="10px" value="<?php echo $sid; ?>"  />
<input type="submit" name="search" value="Search" />
</form>
<form method="post" action="updateForm.php" name="form" style="text-align:center">
<br/ >
<table align="center">
<tr>
<td>St ID</td>
<td><input type="text" name="sid" value="<?php echo $sid; ?>" /></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
</tr>
<tr>
<td>Age</td>
<td><input type="text" name="age" value="<?php echo $age; ?>" /></td>
</tr>
<tr>
<td>Address</td>
<td><textarea name="address"><?php echo $address; ?></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="update" value="Update"/><input type="reset" name="reset" /></td>
</tr>

</table>

<a href="insertForm.php" >Insert Student Details</a><br/>
<a href="deleteForm.php" >Delete Student Details</a>
</form>
</body>

</html>