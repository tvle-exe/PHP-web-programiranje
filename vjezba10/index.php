<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Brojanje riječi</title>
</head>
<body>

<h3>Zadatak: str_word_count</h3>

<form method="post">
    <label>Ulazni niz:</label><br>
    <input type="text" name="recenica" style="width:400px" required>
    <br><br>
    <button type="submit">Ispiši broj riječi</button>
</form>

<?php
if (isset($_POST['recenica'])) {

    $recenica = $_POST['recenica'];
    $brojRijeci = str_word_count($recenica);

    echo "<p>Ulazni niz: $recenica</p>";
    echo "<p>Sadrži $brojRijeci riječi.</p>";
}
?>

</body>
</html>
