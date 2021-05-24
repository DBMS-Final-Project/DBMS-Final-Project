
<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM policekillingsus");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>

    <h2 id="myh1">MODIFY: UPDATE</h2><br><br> 
    <h4 id="myh1">Please click the data to be updated</h4><br><br> 

<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
	    <td>id</td>
		<td>name</td>
		<td WIDTH="100">date</td>
		<td WIDTH="150">manner_of_death</td>
		<td WIDTH="100">armed</td>
		<td WIDTH="60">age</td>
		<td WIDTH="60">gender</td>
		<td WIDTH="60">race</td>
		<td WIDTH="150">city</td>
		<td WIDTH="60">state</td>
		<td WIDTH="150">signs_of_mental_illness</td>
		<td WIDTH="100">threat_level</td>
		<td WIDTH="150">flee</td>
		<td WIDTH="150">body_camera</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["date"]; ?></td>
		<td><?php echo $row["manner_of_death"]; ?></td>
		<td><?php echo $row["armed"]; ?></td>
		<td><?php echo $row["age"]; ?></td>
		<td><?php echo $row["gender"]; ?></td>
		<td><?php echo $row["race"]; ?></td>
		<td><?php echo $row["city"]; ?></td>
		<td><?php echo $row["state"]; ?></td>
		<td><?php echo $row["signs_of_mental_illness"]; ?></td>
		<td><?php echo $row["threat_level"]; ?></td>
		<td><?php echo $row["flee"]; ?></td>
		<td><?php echo $row["body_camera"]; ?></td>
		<td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>

<br><br>
<input type="button" value="BACK TO MODIFY MENU" onclick="location.href='/police/mymain/modify_menu.php'"></input><br><br>
 </body>
</html>