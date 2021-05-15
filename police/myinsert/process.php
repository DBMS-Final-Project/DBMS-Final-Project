
<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $name = $_POST['name'];
	 $date = $_POST['date'];
	 $manner_of_death = $_POST['manner_of_death'];
	 $armed = $_POST['armed'];
	 $age = $_POST['age'];
	 $gender = $_POST['gender'];
	 $race = $_POST['race'];
	 $city = $_POST['city'];
	 $state = $_POST['state'];
	 $signs_of_mental_illness = $_POST['signs_of_mental_illness'];
	 $threat_level = $_POST['threat_level'];
	 $flee = $_POST['flee'];
	 $body_camera = $_POST['body_camera'];
	 $sql = "INSERT INTO policekillingsus (name, date, manner_of_death, armed, age, gender, race, city, state, signs_of_mental_illness, threat_level, flee, body_camera)
	 VALUES ('$name','$date','$manner_of_death','$armed','$age','$gender','$race','$city','$state','$signs_of_mental_illness','$threat_level','$flee','$body_camera')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
<br><br>
<input type="button" value="OK" onclick="location.href='/myinsert/insert.php'"></input><br><br>