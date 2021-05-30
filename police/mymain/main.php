<?php
include_once 'database.php';
if(isset($_POST['age']) and isset($_POST['race']) and isset($_POST['gender']) and isset($_POST['city'])){
$result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM policekillingsus WHERE race='" . $_POST['race'] . "'");
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
<input type="button" value="STATS & FACTS" onclick="location.href='/police/mystats/statsandfacts.php'"></input>
<input type="button" value="MODIFY DATABASE" onclick="location.href='/police/mymain/modify_menu.php'"></input>


<h2 id="myh1">AM I SAFE FROM THE POLICE?</h2> 

<form name="frmUser" method="post" action="">
AGE <input type="number" name="age" required min="1" max="200"></input><br><br>
RACE <input type="text" name="race" required placeholder="white/black/yellow"></input><br><br>
GENDER <input type="text" name="gender" required placeholder="female/male"></input><br><br>
DESTINATION CITY <input type="text" name="city" required placeholder="austin"></input><br><br>

<input type="submit" name="submit" value="Submit" class="button">
</form>

<h4>Result</h4>

<?php
$i=0;
if(isset($_POST['race'])){
	while($row = mysqli_fetch_array($result)) {
		echo $row['count']; 
	$i++;
	}
}
?>

</body>

</html>