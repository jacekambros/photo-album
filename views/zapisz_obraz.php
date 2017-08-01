<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-21
 * Time: 12:43
 */

include('../config/db.php');
echo $_POST["title"]."<br>";
echo $_POST["description"]."<br>";

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "UPDATE pictures SET picture_title='".$_POST["title"]."', picture_description='".$_POST["description"]."' WHERE picture_file='".$_POST["file"]."';";
echo $sql;
$query_update_picture = $db_connection->query($sql);
$db_connection->close();
?>
<a href="index.php?obraz='"<?php echo $_POST['file'] ?>"'>Powrót</a>"
