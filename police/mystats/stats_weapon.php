<?php
include_once 'database.php';	

if(isset($_POST['iweapon3'])){
	$weapon_q = mysqli_query($conn,"SELECT r.race, s.state
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
LIMIT 1) AS s");
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
?>

<!DOCTYPE html>

<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>

    <h2 id="myh1">STATS AND FACTS: Weapons</h2><br><br> 
	<input type="button" value="BACK TO MAIN MENU" onclick="location.href='/police/mymain/main.php'" style="margin-center"></input>
	<input type="button" value="Cam ratio" onclick="location.href='/police/mystats/stats_cam.php'" style="margin-center"></input>
	<input type="button" value="Monthly ratio" onclick="location.href='/police/mystats/stats_month.php'" style="margin-center"></input>
	<input type="button" value="Weapons" onclick="location.href='/police/mystats/stats_weapon.php'" style="margin-center"></input>
	<input type="button" value="Indexes by state" onclick="location.href='/police/mystats/stats_pei.php'" style="margin-center"></input>
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
 
<?php
	if($row['race']=='A'){
?>
	<h4 id="myh1">The <?php echo $_POST['iweapon3'];?> is most used by asian males in <?php echo $row['state'] ?> </h4>
<?php
	}else if($row['race']=='B'){
?>
	<h4 id="myh1">The <?php echo $_POST['iweapon3'];?> is most used by black males in <?php echo $row['state'] ?> </h4>
<?php
	}else if($row['race']=='W'){
?>
	<h4 id="myh1">The <?php echo $_POST['iweapon3'];?> is most used by white males in <?php echo $row['state'] ?> </h4>
<?php
	}else if($row['race']=='H'){
?>
	<h4 id="myh1">The <?php echo $_POST['iweapon3'];?> is most used by hispanic males in <?php echo $row['state'] ?> </h4>
<?php
	}
?>
 
 
 
 
 
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>