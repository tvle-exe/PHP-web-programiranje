<?php include "inc/header.php"; ?>

<h2>Početna stranica</h2>

<?php
if (isset($_SESSION['last_news'])) {
    echo "<p><strong>Zadnja pročitana vijest:</strong> " . $_SESSION['last_news'] . "</p>";
} else {
    echo "<p>Niste još čitali nijednu vijest.</p>";
}
?>

<?php include "inc/footer.php"; ?>
