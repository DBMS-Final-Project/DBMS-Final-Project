<!DOCTYPE html>
<html>
  <body>

    <h2 id="myh1">MODIFY: INSERT</h2><br><br> 
    <h4 id="myh1">Please enter the new data to be inserted and click SUBMIT</h4><br><br> 
	<form method="post" action="process.php">
		Name:<br>
		<input type="text" name="name">
		<br>
		Date:<br>
		<input type="text" name="date" placeholder="DD/MM/YY">
		<br>
		Manner of Death:<br>
		<input type="text" name="manner_of_death">
		<br>
		Armed:<br>
		<input type="text" name="armed">
		<br>
		Age:<br>
		<input type="text" name="age">
		<br>
		Gender:<br>
		<input type="text" name="gender">
		<br>
		Race:<br>
		<input type="text" name="race">
		<br>
		City:<br>
		<input type="text" name="city">
		<br>
		State:<br>
		<input type="text" name="state">
		<br>
		Signs of Mental illness:<br>
		<input type="text" name="signs_of_mental_illness">
		<br>
		Threat Level:<br>
		<input type="text" name="threat_level">
		<br>
		Flee:<br>
		<input type="text" name="flee">
		<br>
		Body Camera:<br>
		<input type="text" name="body_camera">
		<br><br>
		<input type="submit" name="save" value="SUBMIT">
	</form>

<br><br>
<input type="button" value="BACK TO MODIFY MENU" onclick="location.href='/mymain/modify_menu.php'"></input><br><br>
  </body>
</html>