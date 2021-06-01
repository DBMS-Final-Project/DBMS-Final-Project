
<?php
include_once 'database.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE employee set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', date='" . $_POST['date'] . "', manner_of_death='" . $_POST['manner_of_death'] . "' ,armed='" . $_POST['armed'] . "', age='" . $_POST['age'] . "', gender='" . $_POST['gender'] . "', race='" . $_POST['race'] . "', city='" . $_POST['city'] . "', state='" . $_POST['state'] . "', signs_of_mental_illness='" . $_POST['signs_of_mental_illness'] . "', threat_level='" . $_POST['threat_level'] . "', flee='" . $_POST['flee'] . "', body_camera='" . $_POST['body_camera'] . "' WHERE userid='" . $_POST['userid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM policekillingsus WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>
ID: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>
Name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
Date :<br>
<input type="text" name="date" class="txtField" value="<?php echo $row['date']; ?>">
<br>
Manner of death:<br>
<input type="text" name="manner_of_death" class="txtField" value="<?php echo $row['manner_of_death']; ?>">
<br>
Armed:<br>
<input type="text" name="armed" class="txtField" value="<?php echo $row['armed']; ?>">
<br>
Age:<br>
<input type="text" name="age" class="txtField" value="<?php echo $row['age']; ?>">
<br>
Gender:<br>
<input type="text" name="gender" class="txtField" value="<?php echo $row['gender']; ?>">
<br>
Race:<br>
<input type="text" name="race" class="txtField" value="<?php echo $row['race']; ?>">
<br>
City:<br>
<input type="text" name="city" class="txtField" value="<?php echo $row['city']; ?>">
<br>
State:<br>
<input type="text" name="state" class="txtField" value="<?php echo $row['state']; ?>">
<br>
Signs of mental illness:<br>
<input type="text" name="signs_of_mental_illness" class="txtField" value="<?php echo $row['signs_of_mental_illness']; ?>">
<br>
Threat Level:<br>
<input type="text" name="threat_level" class="txtField" value="<?php echo $row['threat_level']; ?>">
<br>
Flee:<br>
<input type="text" name="flee" class="txtField" value="<?php echo $row['flee']; ?>">
<br>
Body camera:<br>
<input type="text" name="body_camera" class="txtField" value="<?php echo $row['body_camera']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="button">

</form>

<br><br>
<input type="button" value="Back to update menu" onclick="location.href='/police/myupdate/update.php'"></input><br><br>
</body>
</html>