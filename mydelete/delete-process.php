<?php
include_once 'database.php';
$sql = "DELETE FROM policekillingsus WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<br><br>
<input type="button" value="OK" onclick="location.href='/police/mydelete/delete.php'"></input><br><br>