<?php
require "db_connect.php";

$userId = $_GET["id"];

// Dohvati korisnika
$userSql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($userSql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Dohvati države
$countries = $conn->query("SELECT * FROM countries");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit user</title>
</head>
<body>

<h2>Edit user</h2>

<form action="update_user.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <input type="text" name="first_name"
           value="<?php echo $user['first_name']; ?>" required><br><br>

    <input type="text" name="last_name"
           value="<?php echo $user['last_name']; ?>" required><br><br>

    <select name="country_id" required>
        <?php while ($c = $countries->fetch_assoc()): ?>
            <option value="<?php echo $c['id']; ?>"
                <?php if ($c['id'] == $user['country_id']) echo "selected"; ?>>
                <?php echo $c['name']; ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit">Save changes</button>
</form>

</body>
</html>
