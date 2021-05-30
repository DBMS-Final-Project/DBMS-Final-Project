
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

if(isset($_POST['icity2']) & isset($_POST['istate2']) & isset($_POST['imonth2'])){
	$city_month = mysqli_query($conn,"SELECT f1.state, f1.city, f1.cnt/f2.cnt AS ratio
FROM
(SELECT state, city, COUNT(*) AS cnt
FROM policekillingsus
WHERE state = '" . $_POST['istate2'] . "' AND city = '" . $_POST['icity2'] . "' AND date LIKE '%" . $_POST['imonth2'] . "%'
GROUP BY state, city) AS f1,
(SELECT state, city, COUNT(*) AS cnt
FROM policekillingsus
GROUP BY state, city) AS f2
WHERE f1.state = f2.state AND f1.city = f2.city;");
}
else{
	$city_month = mysqli_query($conn,"SELECT f1.state, f1.city, f1.cnt/f2.cnt AS ratio
FROM
(SELECT state, city, COUNT(*) AS cnt
FROM policekillingsus
WHERE state = 'fishsticks' AND city = 'fishsticks' AND date = 'fishsticks'
GROUP BY state, city) AS f1,
(SELECT state, city, COUNT(*) AS cnt
FROM policekillingsus
GROUP BY state, city) AS f2
WHERE f1.state = f2.state AND f1.city = f2.city;");
}

if(isset($_POST['iweapon3'])){
	$weapon_q = mysqli_query($conn,"SELECT race, state
FROM
(SELECT race, COUNT(*) AS cnt
FROM
(SELECT armed, race
FROM policekillingsus
WHERE armed = '" . $_POST['iweapon3'] . "') AS r
WHERE race IS NOT NULL
GROUP BY race
ORDER BY cnt DESC
LIMIT 1) AS r,
(SELECT state, COUNT(*) AS cnt
FROM
(SELECT armed, state
FROM policekillingsus
WHERE armed = '" . $_POST['iweapon3'] . "') AS s
WHERE state IS NOT NULL
GROUP BY state
ORDER BY cnt DESC
LIMIT 1) AS s;");
}
else{
	$weapon_q = mysqli_query($conn,"SELECT race, state
FROM
(SELECT race, COUNT(*) AS cnt
FROM
(SELECT armed, race
FROM policekillingsus
WHERE armed = 'fishsticks') AS r
WHERE race IS NOT NULL
GROUP BY race
ORDER BY cnt DESC
LIMIT 1) AS r,
(SELECT state, COUNT(*) AS cnt
FROM
(SELECT armed, state
FROM policekillingsus
WHERE armed = 'fishsticks') AS s
WHERE state IS NOT NULL
GROUP BY state
ORDER BY cnt DESC
LIMIT 1) AS s;");
}

if(isset($_POST['irace'])){
	$result = mysqli_query($conn,"SELECT * FROM policekillingsus WHERE race = '" . $_POST['irace'] . "'");
}
else{
	$result = mysqli_query($conn,"SELECT * FROM policekillingsus");
}
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>

    <h2 id="myh1">STATS AND FACTS</h2><br><br> 
	<input type="button" value="BACK TO MAIN MENU" onclick="location.href='/police/mymain/main.php'" style="margin-center"></input><br><br>
	
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
	
	
	<h4 id="myh1">MONTHLY RATIO IN CITY</h4>
	<form name="m_c_ratio" method="post" action="">
	<select name="imonth2" placeholder="month">
		<option value="/01/">JANUARY</option>
		<option value="/02/">FEBRUARY</option>
		<option value="/03/">MARCH</option>
		<option value="/04/">APRIL</option>
		<option value="/05/">MAY</option>
		<option value="/06/">JUNE</option>
		<option value="/07/">JULY</option>
		<option value="/08/">AUGUST</option>
		<option value="/09/">SEPTEMBER</option>
		<option value="/10/">OCTOBER</option>
		<option value="/11/">NOVEMBER</option>
		<option value="/12/">DECEMBER</option>
	</select>
	
	<input type="text" name="icity2" placeholder="city"/>
	
	<select name="istate2" placeholder="state">
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
<?php
if (mysqli_num_rows($city_month) > 0) {
	$row = mysqli_fetch_array($city_month);
?>
	<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in to the whole year is <?php echo $row['ratio'];?></h5>
 <?php
}
else
{
	$inner_q_m = mysqli_query($conn,"
SELECT state, city
FROM policekillingsus
WHERE state = '" . $_POST['istate2'] . "' AND city = '" . $_POST['icity2'] . "' AND date LIKE '%" . $_POST['imonth2'] . "%'
GROUP BY state, city;");
	$inner_q_a = mysqli_query($conn,"
SELECT state, city
FROM policekillingsus
WHERE state = '" . $_POST['istate2'] . "' AND city = '" . $_POST['icity2'] . "'
GROUP BY state, city;");
	if(mysqli_num_rows($inner_q_a)!=0 && mysqli_num_rows($inner_q_m)==0){
		$row = mysqli_fetch_array($inner_q_a);
		$tp = $_POST['imonth2'];
		if($tp == '/01/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in January to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/02/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in February to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/03/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in March to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/04/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in April to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/05/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in May to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/06/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in June to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/07/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in July to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/08/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in August to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/09/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in September to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/10/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in October to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/11/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in November to the whole year is 0</h5>
<?php
		}else if($_POST['imonth2'] == '/12/'){
?>		
		<h5 id="myh1">The ratio of cases in <?php echo $row['city'];?> in <?php echo $row['state'];?> in December to the whole year is 0</h5>
<?php	
		}
	}else{
		echo "No result found";
	}
}
?>	
	
	
	<h4 id="myh1">VIEW BY WEAPON</h4>
	<form name="form_weapon" method="post" action="">
	<select name="iweapon3">
		<option value="gun">gun</option>
		<option value="knife">knife</option>
		<option value="vehicle">vehicle</option>
		<option value="unarmed">unarmed</option>
		<option value="undetermined">undetermined</option>
		<option value="toy weapon">toy weapon</option>
		<option value="machete">machete</option>
		<option value="ax">ax</option>
		<option value="Taser">Taser</option>
		<option value="baseball bat">baseball bat</option>
		<option value="sword">sword</option>
		<option value="hammer">hammer</option>
		<option value="box cutter">box cutter</option>
		<option value="metal pipe">metal pipe</option>
		<option value="crossbow">crossbow</option>
		<option value="hatchet">hatchet</option>
		<option value="screwdriver">screwdriver</option>
		<option value="blunt object">blunt object</option>
		<option value="gun and knife">gun and knife</option>
	</select>
	<input type="submit" name="submit" value="Submit" class="button">
	</form> 
<?php
if (mysqli_num_rows($weapon_q) > 0) {
	$row = mysqli_fetch_array($weapon_q);
?>
	<h5 id="myh1">The <?php echo $_POST['iweapon3'];?> is most used by <?php echo $row['race'] ?> males in <?php echo $row['state'] ?> </h5>
 <?php
}
else
{
    echo "No result found";
}
?>








	<h4 id="myh1">VIEW BY RACE</h4>
	<form name="frmUser" method="post" action="">
	<select name="irace">
		<option value="A">ASIAN</option>
		<option value="W">WHITE</option>
		<option value="B">BLACK</option>
		<option value="H">HISPANIC</option>
	</select>
	<input type="submit" name="submit" value="Submit" class="button">
	</form> 
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