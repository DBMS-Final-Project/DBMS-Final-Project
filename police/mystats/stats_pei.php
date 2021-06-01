<?php
include_once 'database.php';	

if(isset($_POST['istate4'])){
	$pei_q = mysqli_query($conn,"select p.`Geographic Area` as state, ROUND(q.avg_poverty_rate, 2)avg_poverty_rate, ROUND(x.avg_percent_completed_hs, 2)avg_percent_completed_hs, ROUND(i.avg_Median_Income, 2)avg_Median_Income, ROUND(1000000*k.ratio, 2) as ratio
from
(
select `Geographic Area`
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as p,
(
select `Geographic Area`, avg(poverty_rate) avg_poverty_rate
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as q,
(
select `Geographic Area`, avg(percent_completed_hs) avg_percent_completed_hs
from PercentOver25CompletedHighSchool
group by(`Geographic Area`)
)as x,
(
select `Geographic Area`, avg(`Median Income`) avg_Median_Income
from MedianHouseholdIncome2015
group by(`Geographic Area`)
)as i,
(
SELECT case_num.state, (case_num.num)/(pop.`2018 Population`) AS ratio
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
)as k
where p.`Geographic Area` = q.`Geographic Area` and p.`Geographic Area` = x.`Geographic Area` and i.`Geographic Area` = x.`Geographic Area` and p.`Geographic Area` = i.`Geographic Area` and p.`Geographic Area` = k.state and p.`Geographic Area` = '" . $_POST['istate4'] . "'
ORDER BY ratio DESC ");
}
else if(isset($_POST['icolumn4']) && $_POST['icolumn4'] == 'avg_poverty_rate'){
	$pei_q = mysqli_query($conn, "select p.`Geographic Area` as state, ROUND(q.avg_poverty_rate, 2)avg_poverty_rate, ROUND(x.avg_percent_completed_hs, 2)avg_percent_completed_hs, ROUND(i.avg_Median_Income, 2)avg_Median_Income, ROUND(1000000*k.ratio, 2) as ratio
from
(
select `Geographic Area`
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as p,
(
select `Geographic Area`, avg(poverty_rate) avg_poverty_rate
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as q,
(
select `Geographic Area`, avg(percent_completed_hs) avg_percent_completed_hs
from PercentOver25CompletedHighSchool
group by(`Geographic Area`)
)as x,
(
select `Geographic Area`, avg(`Median Income`) avg_Median_Income
from MedianHouseholdIncome2015
group by(`Geographic Area`)
)as i,
(
SELECT case_num.state, (case_num.num)/(pop.`2018 Population`) AS ratio
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
)as k
where p.`Geographic Area` = q.`Geographic Area` and p.`Geographic Area` = x.`Geographic Area` and i.`Geographic Area` = x.`Geographic Area` and p.`Geographic Area` = i.`Geographic Area` and p.`Geographic Area` = k.state 
ORDER BY avg_poverty_rate DESC 
");
}
else if(isset($_POST['icolumn4']) && $_POST['icolumn4'] == 'avg_percent_completed_hs'){
	$pei_q = mysqli_query($conn, "select p.`Geographic Area` as state, ROUND(q.avg_poverty_rate, 2)avg_poverty_rate, ROUND(x.avg_percent_completed_hs, 2)avg_percent_completed_hs, ROUND(i.avg_Median_Income, 2)avg_Median_Income, ROUND(1000000*k.ratio, 2) as ratio
from
(
select `Geographic Area`
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as p,
(
select `Geographic Area`, avg(poverty_rate) avg_poverty_rate
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as q,
(
select `Geographic Area`, avg(percent_completed_hs) avg_percent_completed_hs
from PercentOver25CompletedHighSchool
group by(`Geographic Area`)
)as x,
(
select `Geographic Area`, avg(`Median Income`) avg_Median_Income
from MedianHouseholdIncome2015
group by(`Geographic Area`)
)as i,
(
SELECT case_num.state, (case_num.num)/(pop.`2018 Population`) AS ratio
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
)as k
where p.`Geographic Area` = q.`Geographic Area` and p.`Geographic Area` = x.`Geographic Area` and i.`Geographic Area` = x.`Geographic Area` and p.`Geographic Area` = i.`Geographic Area` and p.`Geographic Area` = k.state 
ORDER BY avg_percent_completed_hs DESC 
");
}
else if(isset($_POST['icolumn4']) && $_POST['icolumn4'] == 'avg_Median_Income'){
	$pei_q = mysqli_query($conn, "select p.`Geographic Area` as state, ROUND(q.avg_poverty_rate, 2)avg_poverty_rate, ROUND(x.avg_percent_completed_hs, 2)avg_percent_completed_hs, ROUND(i.avg_Median_Income, 2)avg_Median_Income, ROUND(1000000*k.ratio, 2) as ratio
from
(
select `Geographic Area`
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as p,
(
select `Geographic Area`, avg(poverty_rate) avg_poverty_rate
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as q,
(
select `Geographic Area`, avg(percent_completed_hs) avg_percent_completed_hs
from PercentOver25CompletedHighSchool
group by(`Geographic Area`)
)as x,
(
select `Geographic Area`, avg(`Median Income`) avg_Median_Income
from MedianHouseholdIncome2015
group by(`Geographic Area`)
)as i,
(
SELECT case_num.state, (case_num.num)/(pop.`2018 Population`) AS ratio
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
)as k
where p.`Geographic Area` = q.`Geographic Area` and p.`Geographic Area` = x.`Geographic Area` and i.`Geographic Area` = x.`Geographic Area` and p.`Geographic Area` = i.`Geographic Area` and p.`Geographic Area` = k.state 
ORDER BY avg_Median_Income DESC 
");
}
else{
	$pei_q = mysqli_query($conn,"select p.`Geographic Area` as state, ROUND(q.avg_poverty_rate, 2)avg_poverty_rate, ROUND(x.avg_percent_completed_hs, 2)avg_percent_completed_hs, ROUND(i.avg_Median_Income, 2)avg_Median_Income, ROUND(1000000*k.ratio, 2) as ratio
from
(
select `Geographic Area`
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as p,
(
select `Geographic Area`, avg(poverty_rate) avg_poverty_rate
from PercentagePeopleBelowPovertyLevel
group by `Geographic Area`
)as q,
(
select `Geographic Area`, avg(percent_completed_hs) avg_percent_completed_hs
from PercentOver25CompletedHighSchool
group by(`Geographic Area`)
)as x,
(
select `Geographic Area`, avg(`Median Income`) avg_Median_Income
from MedianHouseholdIncome2015
group by(`Geographic Area`)
)as i,
(
SELECT case_num.state, (case_num.num)/(pop.`2018 Population`) AS ratio
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
)as k
where p.`Geographic Area` = q.`Geographic Area` and p.`Geographic Area` = x.`Geographic Area` and i.`Geographic Area` = x.`Geographic Area` and p.`Geographic Area` = i.`Geographic Area` and p.`Geographic Area` = k.state and p.`Geographic Area` = 'fishsticks'
ORDER BY ratio DESC ");}
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
	<h4 id="myh1">Search by state</h4>
	<form name="bystate" method="post" action="">
	<select name="istate4">
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
	

<h4 id="myh1">Search by attribute</h4>
	<form name="bycolumn" method="post" action="">
	<select name="icolumn4">
		<option value="avg_poverty_rate">Poverty Rate</option>
		<option value="avg_percent_completed_hs">Percentage Completed Highschool</option>
		<option value="avg_Median_Income">Median Income</option>
		
	</select>
	<input type="submit" name="submit" value="Submit" class="button">
	</form>


<table>
<?php if(mysqli_num_rows($pei_q)>0){
?>
	  <tr>
		<td WIDTH="100">state</td>
		<td WIDTH="100">poverty rate</td>
		<td WIDTH="200">percentage completed highschool</td>
		<td WIDTH="100">median income</td>
		<td WIDTH="200">cases per million people</td>
		<td><?php //echo $_POST["icolumn4"]; ?></td>
		<td WIDTH="100"></td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($pei_q)) {
			?>
	  <tr>
	    <td><?php echo $row["state"]; ?></td>
		<td><?php echo $row["avg_poverty_rate"]; ?></td>
		<td><?php echo $row["avg_percent_completed_hs"]; ?></td>
		<td><?php echo $row["avg_Median_Income"]; ?></td>
		<td><?php echo $row["ratio"]; ?></td>
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