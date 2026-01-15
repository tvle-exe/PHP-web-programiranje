<?php
require "db_connect.php";

$sql = "
SELECT 
    users.id,
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
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

<h2>Lista korisnika</h2>

<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        👤 <strong>
        <?php echo $row['first_name'] . " " . $row['last_name']; ?>
        </strong>
        (<?php echo $row['country']; ?>)
        - <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>
