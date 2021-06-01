<!DOCTYPE html>
<html>
  <body>

    <h2 id="myh1">MODIFY: INSERT</h2><br><br> 
	<input type="button" value="BACK TO MODIFY MENU" onclick="location.href='/police/mymain/modify_menu.php'"></input><br><br>
    <h4 id="myh1">Please enter the new data to be inserted and click SUBMIT</h4><br><br> 
	<form method="post" action="process.php">
		Name:<br>
		<input type="text" name="name" required placeholder="ex: Genghis Swan">
		<br><br>
		Date:<br>
		<input type="text" name="date" required placeholder="DD/MM/YY">
		<br><br>
		Manner of Death:<br>
		<input type="text" name="manner_of_death" required placeholder="ex: shot">
		<br><br>
		Armed:<br>
		<input type="text" name="armed" required placeholder="ex: gun, knife, etc">
		<br><br>
		Age:<br>
		<input type="text" name="age" required placeholder="ex: 25">
		<br><br>
		Gender:<br>
		<select name="gender" required placeholder="M/F"></input>
			<option value="M">Male</option>
			<option value="F">Female</option>
		</select><br><br>
		Race:<br>
		<select name="race" required placeholder="A/B/H/W"></input>
			<option value="A">Asian</option>
			<option value="B">Black</option>
			<option value="W">White</option>
			<option value="H">Hispanic</option>
		</select><br><br>
		City:<br>
		<input type="text" name="city" required placeholder="ex: Los Angeles">
		<br><br>
		State:<br>
		<select name="state" placeholder="state">
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
		<br><br>
		Signs of Mental illness:<br>
		<select name="signs_of_mental_illness" required placeholder="Yes/No"></input>
			<option value="TRUE">Yes</option>
			<option value="FALSE">No</option>
		</select>
		<br><br>
		Threat Level:<br>
		<select name="threat_level" required placeholder="ex:attack"></input>
			<option value="attack">Attack</option>
			<option value="other">Other</option>
			<option value="undetermined">Undetermined</option>
		</select>
		<br><br>
		Flee:<br>
		<input type="text" name="flee" required placeholder="vehicle or not fleeing">
		<br><br>
		Body Camera:<br>
		<select name="body_camera" required placeholder="Yes/No"></input>
			<option value="TRUE">Yes</option>
			<option value="FALSE">No</option>
		</select>
		<br><br>
		<input type="submit" name="save" value="SUBMIT">
	</form>

<br><br>
  </body>
</html>