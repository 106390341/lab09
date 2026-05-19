<?php

require_once('settings.php');

$db_conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$db_conn) {
    echo "<p>Database connection has failed". mysqli_connect_error()."</p>";
} else{
    $sql = "SELECT car_id, make, model, price FROM cars";
    $result = mysqli_query($db_conn, $sql);
     if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Make</th>";
        echo "<th>Model</th>";
        echo "<th>Price ($)</th>";
        echo "<th>YOM</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $car_id = htmlspecialchars($row['car_id']);
            $make = htmlspecialchars($row['make']);
            $model = htmlspecialchars($row['model']);
            $yom = htmlspecialchars($row['yom']);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['car_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
            // Formatting price nicely
            echo "<td>$" . number_format($row['price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['yom']) . "</td>";
            echo "</tr>";
        }
            echo "</tbody>";
            echo "</table>";
}else {
        echo "<p class='error'>There are no cars to display.</p>";
    }
    } 

    mysqli_close($db_conn);
?>

</body>
</html>
