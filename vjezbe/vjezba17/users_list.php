<?php
require "db_connect.php";

$sql = "
SELECT 
    users.first_name,
    users.last_name,
    countries.name AS country
FROM users
JOIN countries ON users.country_id = countries.id
ORDER BY users.last_name
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Users list</title>
</head>
<body>

<h2>Lista korisnika</h2>

<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        👤 <strong><?php echo $row['first_name'] . " " . $row['last_name']; ?></strong>
        (<?php echo $row['country']; ?>)
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>
