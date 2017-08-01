<?php
// Wyświetlenie obrazu z możliwością edycji pól tytul i opis
$plik = $_GET["obraz"];

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT picture_file FROM pictures WHERE picture_file = '" . $plik . "';";
$result_of_login_check = $db_connection->query($sql);

// Sprawdzenie, czy obraz o podanej nazwie pliku jest w bazie
// Jeżeli nie, to zapisać obraz w bazie
if ($result_of_login_check->num_rows < 1) {
    $sql = "INSERT INTO pictures (picture_file) VALUES('" . $plik . "');";
    $query_new_user_insert = $db_connection->query($sql);
}

// Pobrać wartość pól tytul i opis (picture_title i picture_description)
$sql = "SELECT picture_file, picture_title, picture_description FROM pictures WHERE picture_file = '" . $plik . "';";
$result = $db_connection->query($sql);

$result_row = $result->fetch_object();

// Wyprowadzić na stronie obraz i w formularzu pola tytuł oraz opis
print("<img src='img/".$_GET["obraz"]."' alt='".$_GET["obraz"]."' width=50%>");
// Po zaakceptowaniu edycji zapisać pola tytuł i opis do bazy
?>
<form id="opisObrazu" action="views/zapisz_obraz.php" method="POST">
    <input type="text" name="title" value='<?php echo $result_row->picture_title?>'>
    <input type="text" name="file" value='<?php echo $result_row->picture_file?>'>
    <input type="submit" value="Zapisz">
</form>
<textarea form="opisObrazu" name="description" cols="40" rows="5"><?php echo $result_row->picture_description?></textarea>

<?php
$db_connection->close();

// Dodatkowe klawisze/ skróty: powrót do zbioru, wylogowanie.
