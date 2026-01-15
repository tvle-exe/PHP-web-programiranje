<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["first_name"];
    $lastName  = $_POST["last_name"];
    $email     = $_POST["email"];
    $username  = $_POST["username"];
    $country   = $_POST["country"];

    // Hashiranje lozinke
    $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, username, password, country)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssss",
        $firstName,
        $lastName,
        $email,
        $username,
        $passwordHash,
        $country
    );

    if ($stmt->execute()) {
        echo "<h2>Registracija uspješna!</h2>";
        echo "<a href='register.html'>Nazad na formu</a>";
    } else {
        echo "Greška: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
