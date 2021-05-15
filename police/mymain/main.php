<!DOCTYPE html>

<html lang="zh-TW">

<head>
<title>我的網頁</title>   


<?php
$dsn = "mysql:host=localhost;dbname=crud";
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
<input type="button" value="STATS & FACTS"></input>
<input type="button" value="MODIFY DATABASE" onclick="location.href='/mymain/modify_menu.php'"></input>


<h2 id="myh1">AM I SAFE FROM THE POLICE?</h2> 

AGE <input type="number" name="age" required min="1" max="200"></input><br><br>
RACE <input type="text" name="race" required placeholder="white/black/yellow"></input><br><br>
GENDER <input type="text" name="gender" required placeholder="female/male"></input><br><br>
DESTINATION CITY <input type="text" name="city" required placeholder="austin"></input><br><br>

<input type="button" onclick="getData()" value="SEARCH"></input>

</body>

</html>