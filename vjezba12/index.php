<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Početna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "menu.php"; ?>

<h2>Početna stranica</h2>

<?php
if (isset($_COOKIE['news'])) {
    echo "<p><strong>" . $_COOKIE['news'] . "</strong></p>";
} else {
    echo "<p>Niste još posjetili news stranicu.</p>";
}
?>

</body>
</html>
