<?php
include_once 'database.php';
if(isset($_POST['age']) and isset($_POST['race']) and isset($_POST['gender']) and isset($_POST['city']) and isset($_POST['state'])){
$result = mysqli_query($conn,"SELECT

(
    (SELECT COUNT(*) 
	FROM `policekillingsus` 
	WHERE gender = '" . $_POST['gender'] . "' AND state = '" . $_POST['state'] . "')
	/
	(SELECT COUNT(*)
	FROM `policekillingsus` 
	WHERE state = '" . $_POST['state'] . "')*0.4
	+
	(SELECT COUNT(*) 
	FROM `policekillingsus` 
	WHERE race = '" . $_POST['race'] . "' AND state = '" . $_POST['state'] . "')
    /
	(SELECT COUNT(*)
	FROM `policekillingsus` 
	WHERE state = '" . $_POST['state'] . "')*0.4 
	+
	(SELECT COUNT(*) 
	FROM `policekillingsus` 
	WHERE age >= '" . $_POST['age'] . "'-5 AND age < '" . $_POST['age'] . "'+5 AND state = '" . $_POST['state'] . "')
    /
	(SELECT COUNT(*)
	FROM `policekillingsus` 
	WHERE state = '" . $_POST['state'] . "')*0.2
)
*
(SELECT (case_num.num)/(pop.`2018 Population`)*1000000 AS ratio
FROM ( SELECT state ,COUNT(* ) AS num
	FROM `policekillingsus` 
	WHERE 1
	GROUP BY state
	ORDER BY num DESC ) AS case_num
INNER JOIN
	(SELECT `state_abbrev`.`Abbreviation` , `state_populations`.`2018 Population`
	FROM `state_populations` ,`state_abbrev`
	WHERE `state_abbrev`.`State` = `state_populations`.`State` ) AS pop
ON case_num.state = pop.Abbreviation
WHERE state = '" . $_POST['state'] . "') AS Danger_Index
,
(SELECT COUNT(*) 
FROM `policekillingsus` 
WHERE race = '" . $_POST['race'] . "' AND state = '" . $_POST['state'] . "'
)/
(SELECT COUNT(*)
FROM `policekillingsus` 
WHERE state = '" . $_POST['state'] . "') AS race_ratio
,
(SELECT COUNT(*) 
FROM `policekillingsus` 
WHERE age >= '" . $_POST['age'] . "'-5 AND age < '" . $_POST['age'] . "'+5 AND state = '" . $_POST['state'] . "'
)/
(SELECT COUNT(*)
FROM `policekillingsus` 
WHERE state = '" . $_POST['state'] . "') AS age_ratio
,
(SELECT COUNT(*) 
FROM `policekillingsus` 
WHERE gender = '" . $_POST['gender'] . "' AND state = '" . $_POST['state'] . "'
)/
(SELECT COUNT(*)
FROM `policekillingsus` 
WHERE state = '" . $_POST['state'] . "') AS gender_ratio");
}else{
	$result = mysqli_query($conn,"SELECT * FROM policekillingsus WHERE gender = 'fishsticks'");
}
?>

<!DOCTYPE html>

<html lang="zh-TW">

<head>
<title>我的網頁</title>   


<?php
$dsn = "mysql:host=localhost;dbname=police_kills";
$username = "root";
$password = "";

try{
  $db = new PDO($dsn, $username, $password);
  echo "you have connected!"; 
}catch(PDOException $e){
  $error_message = $e->getMessage();
  echo $error_message;
  exit();
}
?>


</head>

<body>
<input type="button" value="STATS & FACTS" onclick="location.href='/police/mystats/stats_cam.php'"></input>
<input type="button" value="MODIFY DATABASE" onclick="location.href='/police/mymain/modify_menu.php'"></input>


<h2 id="myh1">AM I SAFE FROM THE POLICE?</h2> 

<form name="frmUser" method="post" action="">
AGE <input type="number" name="age" required min="1" max="200"></input><br><br>
RACE <select name="race" required placeholder="white/black/yellow"></input>
		<option value="A">Asian</option>
		<option value="B">Black</option>
		<option value="W">White</option>
		<option value="H">Hispanic</option>
	</select><br><br>
GENDER <select name="gender" required placeholder="female/male"></input>
		<option value="M">Male</option>
		<option value="F">Female</option>
	</select><br><br>
DESTINATION CITY <input type="text" name="city" required placeholder="ex:Austin"></input><br><br>
DESTINATION STATE <select name="state" placeholder="state">
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

<h4>Result</h4>

<?php
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_array($result);
?>
	<h3 id="myh1">Your danger index in your destination is: <?php echo $row['Danger_Index']?> </h3>
<?php
	if($_POST['race']=='A'){
?>
	<h4 id="myh2"><?php echo 100*$row['race_ratio']?>% of the people killed by the police at your state are Asian</h4>
<?php
	}else if($_POST['race']=='B'){
?>
	<h4 id="myh2"><?php echo 100*$row['race_ratio']?>% of the people killed by the police at your state are Black</h4>
<?php
	}else if($_POST['race']=='W'){
?>
	<h4 id="myh2"><?php echo 100*$row['race_ratio']?>% of the people killed by the police at your state are White</h4>
<?php
	}else if($_POST['race']=='H'){
?>
	<h4 id="myh2"><?php echo 100*$row['race_ratio']?>% of the people killed by the police at your state are Hispanic</h4>
<?php
	}
?>
	<h4 id="myh2"><?php echo 100*$row['age_ratio']?>% are in your age group: <?php echo $_POST['age']?>+-5</h4>
<?php
	if($_POST['gender']=='M'){
?>
	<h4 id="myh2"><?php echo 100*$row['gender_ratio']?>% are MALE</h4>
<?php
	}else if($_POST['gender']=='F'){
?>
	<h4 id="myh2"><?php echo $row['gender_ratio']?>% are FEMALE</h4>
<?php
	}
?>
<?php
}else{
	echo "No result found.";
}
?>

</body>

</html>