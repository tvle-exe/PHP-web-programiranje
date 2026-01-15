<?php
// Povezivanje s bazom
$con = mysqli_connect("localhost", "root", "123", "my_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Provjera je li forma poslana
$results = [];
if (isset($_POST['search'])) {
    // Dobivanje unosa i zaštita od SQL injection
    $search = mysqli_real_escape_string($con, $_POST['search']);

    // SELECT upit za pretraživanje po imenu ili prezimenu
    $query = "SELECT firstname, lastname FROM users 
              WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'
              ORDER BY lastname ASC";
    
    $result = mysqli_query($con, $query);

    // Provjera jesu li pronađeni rezultati
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Tražilica korisnika</title>
</head>
<body>
    <h2>Pretraži korisnika po imenu ili prezimenu</h2>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Unesite ime ili prezime" required>
        <button type="submit">Traži</button>
    </form>

    <?php if (!empty($results)) : ?>
        <h3>Rezultati pretrage:</h3>
        <ul>
            <?php foreach ($results as $user) : ?>
                <li><?php echo htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif (isset($_POST['search'])) : ?>
        <p>Nema rezultata za "<?php echo htmlspecialchars($_POST['search']); ?>"</p>
    <?php endif; ?>

</body>
</html>

<?php

mysqli_close($con);
?>
