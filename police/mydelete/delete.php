<?php
include_once 'database.php';
if(isset($_POST['idnum'])){
	$result = mysqli_query($conn,"SELECT * FROM policekillingsus WHERE id = '" . $_POST['idnum'] . "'");
}
else{
	$result = mysqli_query($conn,"SELECT * FROM policekillingsus");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete employee data</title>
</head>
<body>

    <h2 id="myh1">MODIFY: DELETE</h2><br><br> 
    <h4 id="myh1">Please click the data to be deleted</h4><br><br> 
	
	<form name="frmUser" method="post" action="">
	<input type="text" name="idnum" placeholder="please search id"/>
	<input type="submit" name="submit" value="Submit" class="button">
	</form>

<table>
	<tr>
	<td>id</td>
	<td>name</td>
	<td WIDTH="100">date</td>
	<td WIDTH="150">manner_of_death</td>
	<td WIDTH="150">city</td>
	<td WIDTH="60">state</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
	<td><?php echo $row["manner_of_death"]; ?></td>
	<td><?php echo $row["city"]; ?></td>
	<td><?php echo $row["state"]; ?></td>
	<td><a href="delete-process.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>

<br><br>
<input type="button" value="BACK TO MODIFY MENU" onclick="location.href='/police/mymain/modify_menu.php'"></input><br><br>
</body>
</html>