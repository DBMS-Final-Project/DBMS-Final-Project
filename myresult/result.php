<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM policekillingsus WHERE race="W"");
?>

<!DOCTYPE html>
<html>
  <body>

    <h2 id="myh1">Search Result</h2><br><br> 
    <h4 id="myh1">search result</h4><br><br> 
	<table>
	<tr>
	<td>risk_index</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["count"]; ?></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>

<br><br>
<input type="button" value="BACK TO MAIN MENU" onclick="location.href='/police/mymain/main.php'"></input><br><br>
  </body>
</html>