<?php include "inc/header.php"; ?>

<h2>Vijesti</h2>

<p>Klikni na vijest:</p>

<ul>
    <li>
        <a href="news.php?title=PHP Session osnove">
            PHP Session osnove
        </a>
    </li>
    <li>
        <a href="news.php?title=Rad sa $_SESSION varijablama">
            Rad sa $_SESSION varijablama
        </a>
    </li>
    <li>
        <a href="news.php?title=Sigurnost PHP sesija">
            Sigurnost PHP sesija
        </a>
    </li>
</ul>

<?php
if (isset($_GET['title'])) {
    $_SESSION['last_news'] = $_GET['title'];
    echo "<p><strong>Odabrana vijest:</strong> " . $_SESSION['last_news'] . "</p>";
}
?>

<?php include "inc/footer.php"; ?>
