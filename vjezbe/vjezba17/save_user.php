<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Preuzimanje podataka iz forme
    $firstName = $_POST["first_name"];
    $lastName  = $_POST["last_name"];
    $email     = $_POST["email"];
    $username  = $_POST["username"];
    $countryId = $_POST["country_id"];

    // Hashiranje lozinke
    $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // SQL upit
    $sql = "INSERT INTO users 
            (first_name, last_name, email, username, password, country_id)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Priprema i izvršavanje
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssi",
        $firstName,
        $lastName,
        $email,
        $username,
        $passwordHash,
        $countryId
    );

    if ($stmt->execute()) {
        echo "<h2>Registracija uspješna!</h2>";
        echo "<p>Korisnik je uspješno spremljen u bazu.</p>";
        echo "<a href='register.html'>Nazad na formu</a><br>";
        echo "<a href='users_list.php'>Prikaži korisnike</a>";
    } else {
        echo "<h2>Greška pri spremanju</h2>";
        echo $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
