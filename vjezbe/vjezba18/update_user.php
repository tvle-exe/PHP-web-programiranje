<?php
require "db_connect.php";

$id        = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName  = $_POST["last_name"];
$countryId = $_POST["country_id"];

$sql = "UPDATE users
        SET first_name = ?, last_name = ?, country_id = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $firstName, $lastName, $countryId, $id);

if ($stmt->execute()) {
    header("Location: users_list.php");
    exit;
} else {
    echo "Greška pri ažuriranju.";
}
