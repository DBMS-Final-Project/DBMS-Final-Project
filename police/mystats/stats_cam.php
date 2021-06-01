<?php
include_once 'database.php';	

if(isset($_POST['istate'])){
	$cam_q = mysqli_query($conn,"SELECT tot.state, cam.count AS cam_cases, tot.count AS tot_cases,(cam.count/tot.count)AS cam_ratio
FROM(SELECT state, COUNT(*) AS count
FROM policekillingsus 
WHERE body_camera= \"true\"
GROUP BY state) AS cam,
(SELECT state, COUNT(*) AS count
FROM policekillingsus 
GROUP BY state) AS tot
WHERE tot.state = cam.state AND tot.count > 0 AND tot.state = '" . $_POST['istate'] . "'");
}
else{
	$cam_q = mysqli_query($conn,"SELECT tot.state, cam.count AS cam_cases, tot.count AS tot_cases,(cam.count/tot.count)AS cam_ratio
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

    <h2 id="myh1">STATS AND FACTS: Cam ratio</h2><br><br> 
	<input type="button" value="BACK TO MAIN MENU" onclick="location.href='/police/mymain/main.php'" style="margin-center"></input>
	<input type="button" value="Cam ratio" onclick="location.href='/police/mystats/stats_cam.php'" style="margin-center"></input>
	<input type="button" value="Monthly ratio" onclick="location.href='/police/mystats/stats_month.php'" style="margin-center"></input>
	<input type="button" value="Weapons" onclick="location.href='/police/mystats/stats_weapon.php'" style="margin-center"></input>
	<input type="button" value="Indexes by state" onclick="location.href='/police/mystats/stats_pei.php'" style="margin-center"></input>
	<h4 id="myh1">CAM RATIO BY STATE</h4>
	<form name="cam_ratio" method="post" action="">
	<select name="istate">
		<option value="AL">ALABAMA</option>
		<option value="AK">ALASKA</option>
		<option value="AZ">ARIZONA</option>
		<option value="AR">ARKANSAS</option>
		<option value="CA">CALIFORNIA</option>
		<option value="CO">COLORADO</option>
		<option value="CT">CONNETICUT</option>
		<option value="DE">DELAWARE</option>
		<option value="DC">WASHINGTON DC</option>
		<option value="FL">FLORIDA</option>
		<option value="GA">GEORGIA</option>
		<option value="HI">HAWAII</option>
		<option value="ID">IDAHO</option>
		<option value="IL">ILLINOIS</option>
		<option value="IN">INDIANA</option>
		<option value="IA">IOWA</option>
		<option value="KS">KANSAS</option>
		<option value="KY">KENTUCKY</option>
		<option value="LA">LOUISIANA</option>
		<option value="ME">MAINE</option>
		<option value="MD">MARYLAND</option>
		<option value="MA">MASSACHUSETTS</option>
		<option value="MI">MICHIGAN</option>
		<option value="MN">MINNESOTA</option>
		<option value="MS">MISSISSIPPI</option>
		<option value="MO">MISSOURI</option>
		<option value="MT">MONTANA</option>
		<option value="NE">NEBRASKA</option>
		<option value="NV">NEVADA</option>
		<option value="NH">NEW HAMPSHIRE</option>
		<option value="NJ">NEW JERSEY</option>
		<option value="NM">NEW MEXICO</option>
		<option value="NY">NEW YORK</option>
		<option value="NC">NORTH CAROLINA</option>
		<option value="ND">NORTH DAKOTA</option>
		<option value="OH">OHIO</option>
		<option value="OK">OKLAHOMA</option>
		<option value="OR">OREGON</option>
		<option value="PA">PENNSYLVANIA</option>
		<option value="RI">RHODE ISLAND</option>
		<option value="SC">SOUTH CAROLINA</option>
		<option value="SD">SOUTH DAKOTA</option>
		<option value="TN">TENNESSEE</option>
		<option value="TX">TEXAS</option>
		<option value="UT">UTAH</option>
		<option value="VT">VERMONT</option>
		<option value="VA">VIRGINIA</option>
		<option value="WA">WASHINGTON</option>
		<option value="WV">WEST VIRGINIA</option>
		<option value="WI">WISCONSIN</option>
		<option value="WY">WYOMING</option>
		
	</select>
	<input type="submit" name="submit" value="Submit" class="button">
	</form>
	


<table>
<?php if(mysqli_num_rows($cam_q)>0){
?>
	  <tr>
		<td WIDTH="100">state</td>
		<td WIDTH="100">cases filmed</td>
		<td WIDTH="100">total cases</td>
		<td WIDTH="100">ratio of cases recorded</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($cam_q)) {
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
 </body>
</html>