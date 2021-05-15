<!DOCTYPE html>

<html lang="zh-TW">

<head>
<title>MODIFY 選單</title>   


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

<h2 id="myh1">SELECT MODIFY OPTION</h2><br><br> 
<input type="button" value="INSERT" onclick="location.href='/myinsert/insert.php'"></input><br><br>
<input type="button" value="DELETE" onclick="location.href='/mydelete/delete.php'"></input><br><br>
<input type="button" value="UPDATE" onclick="location.href='/myupdate/update.php'"></input><br><br>
<input type="button" value="BACK TO MAINPAGE" onclick="location.href='/mymain/main.php'"></input><br><br>

</body>

</html>