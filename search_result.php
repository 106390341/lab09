<?php

require_once('settings.php');

$db_conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$db_conn) {
    echo "<p>Database connection has failed</p>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>

    <h1>Search Results</h1>

    <?php
    if (isset($_GET['model']) ) {
        $model = mysqli_real_escape_string($db_conn, trim($_GET['model']));
        $sql = "SELECT car_id, make, model, price, yom FROM cars WHERE model LIKE '%$model%'";
        $result = mysqli_query($db_conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['car_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                echo "<td>$" . number_format($row['price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['yom']) . "</td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='message error'>🚫 No matching cars found.</p>";
        }
    } else {
        echo "<p class='message error'>Please enter a model to search.</p>";
    }

    mysqli_close($db_conn);
    ?>

    <p><a href="search_form.php">Try again!</a></p>

</body>
</html>