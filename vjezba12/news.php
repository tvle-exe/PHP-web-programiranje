<?php
setcookie(
    "news",
    "Posjetili ste news stranicu",
    time() + 3600 // 1 sat
);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "menu.php"; ?>

<h2>News stranica</h2>
<p>Ovdje se nalaze vijesti.</p>
<p>Kolačić je postavljen.</p>

</body>
</html>
