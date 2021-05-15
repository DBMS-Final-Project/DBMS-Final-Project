
<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM employee");
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
	    <td>Sl No</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>City</td>
		<td>Email id</td>
		<td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["userid"]; ?></td>
		<td><?php echo $row["first_name"]; ?></td>
		<td><?php echo $row["last_name"]; ?></td>
		<td><?php echo $row["city_name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><a href="update-process.php?id=<?php echo $row["userid"]; ?>">Update</a></td>
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
<input type="button" value="BACK TO MODIFY MENU" onclick="location.href='/mymain/modify_menu.php'"></input><br><br>
 </body>
</html>