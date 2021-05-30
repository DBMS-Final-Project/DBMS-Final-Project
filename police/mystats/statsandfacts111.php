
<?php
include_once 'database.php';
if(isset($_POST['idnum'])){
	$result = mysqli_query($conn,"SELECT tot.state, cam.count AS cam_cases, tot.count AS tot_cases,(cam.count/tot.count)AS cam_ratio
FROM(SELECT state, COUNT(*) AS count
FROM policekillingsus 
WHERE body_camera= \"true\"
GROUP BY state) AS cam,
(SELECT state, COUNT(*) AS count
FROM policekillingsus 
GROUP BY state) AS tot
WHERE tot.state = cam.state AND tot.count > 0 AND tot.state = '" . $_POST['idnum'] . "'");
}
else{
	$result = mysqli_query($conn,"SELECT tot.state, cam.count AS cam_cases, tot.count AS tot_cases,(cam.count/tot.count)AS cam_ratio
FROM(SELECT state, COUNT(*) AS count
FROM policekillingsus
WHERE body_camera=\"true\"
GROUP BY state) AS cam,
(SELECT state, COUNT(*) AS count
FROM policekillingsus
GROUP BY state) AS tot
WHERE tot.state = cam.state AND tot.count > 0;");
}
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
	<form name="frmUser" method="post" action="">
	<select name="idnum">
		<option value="AL">al</option>
		<option value="AK">ak</option>
		<option value="AZ">az</option>
		<option value="AR">ar</option>
	</select>
	<input type="submit" name="submit" value="Submit" class="button">
	</form>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
		<td WIDTH="100">state</td>
		<td WIDTH="100">cam_count</td>
		<td WIDTH="100">tot_count</td>
		<td WIDTH="100">cam_ratio</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["state"]; ?></td>
		<td><?php echo $row["cam_cases"]; ?></td>
		<td><?php echo $row["tot_cases"]; ?></td>
		<td><?php echo $row["cam_ratio"]; ?></td>
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